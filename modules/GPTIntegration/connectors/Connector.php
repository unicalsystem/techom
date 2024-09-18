<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/
require_once 'vtlib/Vtiger/Net/Client.php';

class GPTIntegration_Connector {

    protected $OPENAIURL = '';
    protected $MODELURL = '';
    protected $OPENAIMODEL = '';
    protected $maxTokens = 200;
    protected $apiKey = false;

    protected function __construct() {
        $this->OPENAIURL = 'https://api.openai.com/v1/chat/completions';
        $this->MODELURL = 'https://api.openai.com/v1/models';
        $this->OPENAIMODEL = 'gpt-3.5-turbo';
    }
    
    /**
     * 
     * @static var type $instance
     * @return self
     */
    public static function getInstance() {
        static $instance = NULL;
        if ($instance === NULL) {
            $instance = new self();
        }
        return $instance;
    }
    
    /**
     * Function to construct default headers.
     * @return string
     */
    function defaultHeaders() {
        $accessKey = (!$this->apiKey) ? $this->getApiKey() : $this->apiKey;
        return array('Content-type' => 'application/json', 'Authorization' => 'Bearer '.$accessKey);
    }

    /**
     * Function to get response from openAI GPTIntegration
     */
    public function getApiKey() {
        $recordModel = Settings_GPTIntegration_Record_Model::getInstance();
        $api_key = $recordModel->getDecryptedKey();
        return $api_key;
    }
    
    /**
     * Helper function (internal)
     * @param type $uri
     * @param type $params
     * @param type $type
     * @return type
     * @throws Exception
     */
    protected function api($uri, $type = 'POST', $params = array(), $headers = array()) {
        $client = new Vtiger_Net_Client($uri);
        //set default default headers
        $client->setHeaders($this->defaultHeaders()); 
        if(!empty($headers)) {
            $client->setHeaders($headers);
        }
        $response = null;
        if ($type == 'POST') {
            $response = $client->doPost($params);
        } else if ($type == 'GET') {
            $response = $client->doGet($params);
        }
        return $response;
    }

    /**
     * Function to ask openAI.
     */
    public function getAIResponse($query) {
        $body = array('model' => $this->OPENAIMODEL, 'temperature' => 0.7,  'messages' => $query);
        $body = json_encode($body);
        return $this->api($this->OPENAIURL, 'POST', $body);
    }

    /**
     * Function to check openAI credentials
     * We are verifying by sending request to openAI before saving to DB.
     */
    public function checkCredentials($api_key, $org_id) {
        $this->apiKey = $api_key;
        $result = $this->api($this->MODELURL, 'GET', [], ['OpenAI-Organization' => $org_id]);
        return json_decode($result, true);
    }
}