{*<!--
/* * *******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
 * ****************************************************************************** */
-->*}

<div class="container-fluid">
    <div class="col-md-6">
            <h3>{vtranslate('LBL_CTGOOGLE_EXTENSION', $MODULE)}</h3>
    </div>
    <div class="col-md-6 mt-15" style="display: flex; justify-content: flex-end;">
        <a href="index.php?module=GoogleOffice365Suite&view=List" class="btn btn-success br-3 mr-5"><strong>{vtranslate('LBL_HOME', $MODULE)}</strong></a>
        <a href="https://kb.crmtiger.com/article-categories/google-office365-suite-integration/" target="_blank" class="btn btn-success mr-5 br-3">
            <strong>{vtranslate('LBL_HELP', $MODULE)}</strong>
        </a>
        <a href="index.php?module=GoogleOffice365Suite&view=CTGoogleDashboard" class="btn btn-success br-3 mr-5"><strong>{vtranslate('LBL_BACK', $MODULE)}</strong></a>
    </div>
    <hr>
    <div class="clearfix"></div>
    <div class="summaryWidgetContainer" style="margin: 10px 15px;">
        <div class="row-fluid">
            <span class="span2"><h4>{vtranslate('LBL_ENABLE_CTGOOGLE_EXTENSION',$MODULE)}
            <input type="checkbox" name="enableSyncGoogle" id="enableSyncGoogle" value="1" {if $ENABLE eq '1'}checked="" {/if}/>
            </h4></span>
        </div>
    </div>
    <div class="col-md-6">
        <p><b>{vtranslate('LBL_NOTE',$MODULE)} :</b> {vtranslate('LBL_GOOGLE_EMAIL_NOTE_1',$MODULE)} <a href='https://kb.crmtiger.com/knowledge-base/how-to-use-the-crmtiger-chrome-gmail-extension-2/' target="_blank"><u>{vtranslate('LBL_CLICK_HERE',$MODULE)}</u></a> {vtranslate('LBL_GOOGLE_EMAIL_NOTE_1_2',$MODULE)}</p>
        <p><b>P.S:</b> {vtranslate('LBL_GOOGLE_EMAIL_NOTE_2',$MODULE)}</p>
    </div>
</div>

	