{*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************}
{strip}
    <div class="col-lg-12 col-md-12 col-sm-12" id="OpenAIContainer">
        <div class="editViewHeader">
            <h4>{vtranslate('LBL_GPTIntegration', $QUALIFIED_MODULE)}</h4>
        </div>
        <hr>
        <div class="contents tabbable clearfix">
                <ul class="nav nav-tabs gptintegrationtabs">
                    <li class="tab-item gptintegrationconfig active" data-tabname='gptintegrationconfig'><a data-toggle="gptintegrationconfig" href="#gptintegrationconfig"><strong>{vtranslate('LBL_GPTIntegration_CONFIG', $QUALIFIED_MODULE)}</strong></a></li>
                    <li class="tab-item gptintegrationconfig " data-tabname='gptintegrationlogs'> <a data-toggle="gptintegrationlogs" href="#gptintegrationlogs"><strong>{vtranslate('LBL_GPTIntegration_Logs', $QUALIFIED_MODULE)}</strong></a></li>	
                </ul>
            <div class="tab-content gptintegrationconfigcontent padding20 overflowVisible">
                <div class="tab-pane active gptintegrationconfigcontainer" id="gptintegrationconfig">
                      {include file="OpenAIConfig.tpl"|vtemplate_path:$QUALIFIED_MODULE}
                </div>
                <div class="tab-pane gptintegrationlogscontainer" id="gptintegrationlogs">
                </div>
            </div>
        </div>
    </div>
{/strip}
