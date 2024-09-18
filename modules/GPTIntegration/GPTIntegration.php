<?php

/* +**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * ********************************************************************************** */

class GPTIntegration extends CRMEntity {

    function vtlib_handler($moduleName, $eventName) {
        if ($eventName == 'module.postinstall') {
            $this->addLinksForOpenAI();
            $this->addSettingsLinks();
            $this->addActionMapping();
        } else if ($eventName == 'module.preuninstall') {
            $this->removeLinksForOpenAI();
            $this->removeSettingsLinks();
            $this->removeActionMapping();
        } else if ($eventName == 'module.enabled') {
            $this->addLinksForOpenAI();
            $this->addSettingsLinks();
        } else if ($eventName == 'module.disabled') {
            $this->removeLinksForOpenAI();
            $this->removeSettingsLinks();
        }
    }

    /**
     * To add a link in vtiger_links which is to load our MassEdit.js 
     */
    function addLinksForOpenAI() {
        global $log;
        $module = new Vtiger_Module();
        $moduleInstance = $module->getInstance('GPTIntegration');
        Vtiger_Link::addLink($moduleInstance->getId(), 'HEADERSCRIPT', 'GPTIntegration', 'layouts/v7/modules/GPTIntegration/resources/MassEdit.js', '', '');
        $log->fatal('Links added');
    }

    /**
     * To remove link for GPTIntegration.js from vtiger_links
     */
    function removeLinksForOpenAI() {
        global $log;
        Vtiger_Link::deleteLink('HEADERSCRIPT', 'GPTIntegration', 'layouts/v7/modules/GPTIntegration/resources/MassEdit.js');
        $log->fatal('Links Removed');
    }

    /**
     * To add Integration->OpenAI block in Settings page
     */
    function addSettingsLinks() {
        global $log;
        $adb = PearDatabase::getInstance();
        $integrationBlock = $adb->pquery('SELECT * FROM vtiger_settings_blocks WHERE label=?', array('LBL_INTEGRATION'));
        $integrationBlockCount = $adb->num_rows($integrationBlock);

        // To add Block
        if ($integrationBlockCount > 0) {
            $blockid = $adb->query_result($integrationBlock, 0, 'blockid');
        } else {
            $blockid = $adb->getUniqueID('vtiger_settings_blocks');
            $sequenceResult = $adb->pquery("SELECT max(sequence) as sequence FROM vtiger_settings_blocks", array());
            if ($adb->num_rows($sequenceResult)) {
                $sequence = $adb->query_result($sequenceResult, 0, 'sequence');
            }
            $adb->pquery("INSERT INTO vtiger_settings_blocks(blockid, label, sequence) VALUES(?,?,?)", array($blockid, 'LBL_INTEGRATION', ++$sequence));
        }

        // To add a Field
        $fieldid = $adb->getUniqueID('vtiger_settings_field');
        $adb->pquery("INSERT INTO vtiger_settings_field(fieldid, blockid, name, iconpath, description, linkto, sequence, active) VALUES(?,?,?,?,?,?,?,?)", array($fieldid, $blockid, 'GPTIntegration', '', 'GPTIntegration module Configuration', 'index.php?module=GPTIntegration&parent=Settings&view=Index', 2, 0));
        $log->fatal('Settings Block and Field added');
    }

    /**
     * To delete Integration->GPTIntegration block in Settings page
     */
    function removeSettingsLinks() {
        global $log;
        $adb = PearDatabase::getInstance();
        $adb->pquery('DELETE FROM vtiger_settings_field WHERE name=?', array('GPTIntegration'));
        $log->fatal('Settings Field Removed');
    }

    /**
     * To enable AIPrompt utility action in profile
     */
    function addActionMapping() {
        global $log;
        $adb = PearDatabase::getInstance();
        $module = new Vtiger_Module();
        $moduleInstance = $module->getInstance('GPTIntegration');

        //To add actionname as ReceiveIncomingcalls
        $maxActionIdresult = $adb->pquery('SELECT max(actionid+1) AS actionid FROM vtiger_actionmapping', array());
        if ($adb->num_rows($maxActionIdresult)) {
            $actionId = $adb->query_result($maxActionIdresult, 0, 'actionid');
        }
        $adb->pquery('INSERT INTO vtiger_actionmapping
                     (actionid, actionname, securitycheck) VALUES(?,?,?)', array($actionId, 'AIPrompt', 0));
        $moduleInstance->enableTools('AIPrompt');
        $log->fatal('AIPrompt ActionName Added');
    }

    /**
     * To remove AIPrompt action from profile
     */
    function removeActionMapping() {
        global $log;
        $adb = PearDatabase::getInstance();
        $module = new Vtiger_Module();
        $moduleInstance = $module->getInstance('GPTIntegration');

        $moduleInstance->disableTools('AIPrompt');
        $adb->pquery('DELETE FROM vtiger_actionmapping 
                     WHERE actionname=?', array('AIPrompt'));
        $log->fatal('AIPrompt ActionName Removed');
    }
}
