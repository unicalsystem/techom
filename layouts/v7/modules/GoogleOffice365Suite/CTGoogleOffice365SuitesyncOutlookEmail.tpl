{*<!--
/*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ******************************************************************************/
-->*}

<div class="container-fluid">
    <div class="col-md-6">
        <h3>{vtranslate('LBL_CTOUTLOOK_EXTENSION', $MODULE)}</h3>
    </div>
    
    <div class="col-md-6 mt-15" style="display: flex; justify-content: flex-end;">
        <button class="btn btn-success br-3 mr-5" id="homePage" ><strong>{vtranslate('LBL_HOME', $MODULE)}</strong></button>
        <a href="https://kb.crmtiger.com/article-categories/google-office365-suite-integration/" class="btn btn-success br-3 mr-5" target="_blank">
            <strong>{vtranslate('LBL_HELP', $MODULE)}</strong>
        </a>
        <a href="index.php?module=GoogleOffice365Suite&view=CTOffice365Dashboard" class="btn btn-success br-3 mr-5" ><strong>{vtranslate('LBL_BACK', $MODULE)}</strong></a>
    </div>    
    <hr>
    <div class="clearfix"></div>
    <div class="summaryWidgetContainer">
        <div class="row-fluid">
            <span class="span2"><h4>{vtranslate('LBL_ENABLE_CTOOUTLOOK_EXTENSION',$MODULE)}
            <input type="checkbox" name="enableSyncOutlook" id="enableSyncOutlook" value="{$ENABLE}" {if $ENABLE eq '1'} checked {/if}>
             </h4>
            </span>
        </div>
    </div>
     <div class="col-md-6">
        <p><b>{vtranslate('LBL_NOTES', $MODULE)}</b> {vtranslate('LBL_OUTLOOK_EMAIL_NOTE1', $MODULE)} <b><a href="https://kb.crmtiger.com/knowledge-base/how-to-use-vtiger-office365-email-integration/" target="_blank">{vtranslate('LBL_CLICK_HERE', $MODULE)}</a></b> {vtranslate('LBL_OUTLOOK_EMAIL_NOTE2', $MODULE)} </p>
        <p><b>P.S:</b> {vtranslate('LBL_OUTLOOK_EMAIL_NOTE3', $MODULE)} </p>
    </div>
</div>
