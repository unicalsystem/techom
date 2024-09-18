<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

class GPTIntegration_AskOpenAI_Action extends Vtiger_BasicAjax_Action {

    public function __construct() {
        parent::__construct();
        $this->exposeMethod('requestOpenAI');
    }

    public function process(Vtiger_Request $request) {
        $mode = $request->get('mode');
        if (!empty($mode)) {
            $this->invokeExposedMethod($mode, $request);
            return;
        }
    }

    public static function requestOpenAI(Vtiger_Request $request) {
        $query = $request->get('query');
        $type = $request->get('type');
        $connector = GPTIntegration_Connector::getInstance();
        $formattedQuery = array();
        if ($type == 'formal') {
            $formattedQuery = array(
                array('role' => 'system', 'content' => 'You are a helpful assistant.'),
                array('role' => 'user', 'content' => $query),
                array('role' => 'user', 'content' => "Can you please provide simple and formal mail body")
            );
        } else if ($type == 'suggestion') {
            $formattedQuery = array(
                array('role' => 'system', 'content' => 'You are a helpful assistant.'),
                array('role' => 'user', 'content' => 'Suggest me best email subjects for "' . $query . '"'),
                array('role' => 'user', 'content' => 'Give each alternative suggestion in a new line without any other text except the subject.. 5 suggestions in 5 lines')
            );
        }
        $response = $connector->getAIResponse($formattedQuery);
        $formattedResponse = array();
        if ($response) {
            //Save request detail in db
            self::saveAIReqeust($query, $type, $response);
            $formattedResponse = self::formatResponse($type, $response);
        }
        return $formattedResponse;
    }

    public static function saveAIReqeust($query, $type, $response) {
        $moduleModel = Vtiger_Module_Model::getInstance('GPTIntegration');
        $moduleModel->saveAIRequest($query, $type, $response);
    }

    public static function formatResponse($type, $airesponse) {
        $airesponse = json_decode($airesponse, true);
        $content = array();
        if($airesponse){
            if (!$airesponse['error']) {
                $tempContent = $airesponse['choices'][0]['message']['content'];
                $firstChar = mb_substr($tempContent,0,1);
                $lastChar = mb_substr($tempContent, -1);
                if($firstChar == '{' && $lastChar == '}'){
                    // To handle new lines in the json
                    $tempContent = preg_replace('/\r|\n/','\n',trim($tempContent));
                    $tempContent = '['.$tempContent.']';

                    $tempContent = json_decode($tempContent,true);
                } else if($firstChar == '[' && $lastChar == ']'){
                    $tempContent = json_decode($tempContent,true);
                }
                
                // Replace 2 or more new lines with single line
                $tempContent = preg_replace("/[\n]{2,}/", "\n", $tempContent);
                
                if($type == 'suggestion'){
                    $tempContent = strip_tags(trim(decode_html($tempContent)));
                    // Use regex to extract lines based on numbering
                    preg_match_all("/\d+\. (.*?)(?:(?=\d+\. )|$)/s", $tempContent, $matches);
                    $tempContent = $matches[1];
                } else if($type == 'reply'){
                    $tempContent = strip_tags(trim(decode_html($tempContent)));
                    $tempContent = trim($tempContent, '"');
                }else {
                    $tempContent = nl2br(trim($tempContent));
                    // Replace multiple br tags with one tag
                    $tempContent = preg_replace('#(<br */?>\s*)+#i', '<br />', $tempContent);
                    $tempContent = trim($tempContent, '"');
                }
                // Replace multiple br tags with one tag
                $content['data'] = $tempContent;
                $content['createdon'] = date('d M Y H:i:s', $airesponse['created']);
            } else {
                $content['error'] = $airesponse['error']['message'];
            }
        }
        return $content;
    }
}
