<?php
/************************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * Portions created by Libertus Solutions are Copyright (C) Libertus Solutions.
 * All Rights Reserved.
 *************************************************************************************/

class LSQuickView extends CRMEntity {

    protected $headerScriptLinkType = 'HEADERSCRIPT';

    function vtlib_handler($module_name, $event_type) {
        global $log;
        $log->fatal('responding to event');
        if($event_type == 'module.postinstall') {

        } else if($event_type == 'module.disabled') {
            $this->removeLinks();
        } else if($event_type == 'module.enabled') {
            $this->addLinks();
        } else if($event_type == 'module.preupdate') {
        
        } else if($event_type == 'module.postupdate') {

        }
    }

    function addLinks() {
    	global $log;
        Vtiger_Link::addLink(getTabid('LSQuickView'), $this->headerScriptLinkType, 'LSQuickView', 
                'modules/LSQuickView/resources/LSQuickView.js');
        $log->fatal('Adding LSQuickView Links');
    }

    function removeLinks() {
    	global $log;
        Vtiger_Link::deleteLink(getTabid('LSQuickView'), $this->headerScriptLinkType, 'LSQuickView', 
                'modules/LSQuickView/resources/LSQuickView.js');
        $log->fatal('Removing LSQuickView Links');
    }

}

