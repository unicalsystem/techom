<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

class Settings_GPTIntegration_Record_Model extends Settings_Vtiger_Record_Model {

    const tableName = 'vtiger_gptintegration_config';

    public function getId() {
        return $this->get('id');
    }

    public function getName() {
        
    }

    public function getModule() {
        return new Settings_GPTIntegration_Module_Model;
    }

    static function getCleanInstance() {
        return new self;
    }

    public static function getInstance() {
        $serverModel = new self();
        $db = PearDatabase::getInstance();
        $query = 'SELECT * FROM ' . self::tableName;
        $gptintegrationConfigResult = $db->pquery($query, array());
        $gptintegrationResultCount = $db->num_rows($gptintegrationConfigResult);
        if ($gptintegrationResultCount > 0) {
            $rowData = $db->query_result_rowdata($gptintegrationConfigResult, 0);
            $serverModel->set('id', $rowData['id']);
            $serverModel->set('api_key', $rowData['api_key']);
            $serverModel->set('org_id', $rowData['org_id']);
            $serverModel->set('enc_key', $rowData['enc_key']);
            $serverModel->set('mask_api_key', self::getMaskedValue($rowData['api_key']));
            $serverModel->set('mask_org_id', self::getMaskedValue($rowData['org_id']));
        }
        return $serverModel;
    }
    
    static function getMaskedValue($key) {
        $startPart = substr($key, 0, 2);
        $endPart = substr($key, -2);
        $maskedPart = str_repeat("*", 25);
        return $startPart . $maskedPart . $endPart;
    }

    public static function getInstanceById($recordId, $qualifiedModuleName) {
        $db = PearDatabase::getInstance();
        $result = $db->pquery('SELECT * FROM ' . self::tableName . ' WHERE id = ?', array($recordId));

        if ($db->num_rows($result)) {
            $moduleModel = Settings_Vtiger_Module_Model::getInstance($qualifiedModuleName);
            $rowData = $db->query_result_rowdata($result, 0);

            $recordModel = new self();
            $recordModel->setData($rowData);
            return $recordModel;
        }
        return false;
    }

    public function save() {
        $db = PearDatabase::getInstance();
        $id = $this->getId();
        // Encrypt api_key and store in table.
        $encryptionKey = $this->encryptApiKey($this->get('api_key'));
        $params = array($this->get('org_id'), $encryptionKey['api_key'],$encryptionKey['enc_key'], $this->get('provider'));
        if ($id) {
            $query = 'UPDATE ' . self::tableName . ' SET org_id = ?, api_key = ?, enc_key = ? WHERE provider=? AND id = ?';
            array_push($params, $id);
        } else {
            $query = 'INSERT INTO ' . self::tableName . '(org_id, api_key, enc_key, provider, isactive) VALUES(?, ?, ?, ?, ?)';
            array_push($params, 1);
        }
        $db->pquery($query, $params);
    }
    
    protected function encryptApiKey($apikey) {
        $cipher = 'aes-256-cbc';
        $iv = random_bytes(16);
        $encryptionKey = bin2hex(random_bytes(32));
        $encryptedKey = openssl_encrypt($apikey, $cipher, $encryptionKey, 0, $iv);
        $encryptedApiKey = base64_encode($iv . $encryptedKey);
        return array('enc_key' => $encryptionKey, 'api_key' =>$encryptedApiKey);
    }
    
    public function getDecryptedKey() {
        $decryptData = array();
        if(empty($this->get('api_key'))) {
            $db = PearDatabase::getInstance();
            $gptintegrationConfigResult = $db->pquery($query, array());
            $data = $db->fetchByAssoc($gptintegrationConfigResult);
            $decryptData = $this->decryptApiKey($data['api_key'], $data['enc_key']);
        } else {
            $decryptData = $this->decryptApiKey($this->get('api_key'), $this->get('enc_key'));
        }
        return $decryptData;
    }
    
    protected function decryptApiKey($encApiKey, $enKey) {
        $apiKey = '';
        if ($encApiKey) {
            $cipher = 'aes-256-cbc';
            $encryptedApiKey = $encApiKey;
            $encryptionKey = $enKey;
            $data = base64_decode($encryptedApiKey);
            $iv = substr($data, 0, 16);
            $encryptedKey = substr($data, 16);
            $apiKey = openssl_decrypt($encryptedKey, $cipher, $encryptionKey, 0, $iv);
        }
        return $apiKey;
    }
}
