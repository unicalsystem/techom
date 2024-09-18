{*<!--
/* * *******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
 * ****************************************************************************** */
-->*}
<div class="container-fluid editViewContainer">
    <div class="contentHeader row-fluid">
        <h3 class="span4 textOverflowEllipsis" title="{vtranslate('LBL_OUTLOOK_API_SETTING', $QUALIFIED_MODULE)}" style="height: 30px;">{vtranslate('LBL_OUTLOOK_API_SETTING', $QUALIFIED_MODULE)}</h3>
        <h4><a class='fa fa-info-circle' href="index.php?module=GoogleOffice365Suite&view=CTOffice365SuiteDocument&type=Contacts" title="{vtranslate('LBL_CLIECK_HERE_TO_GET_CLIENT_ID_AND_CLIENT_SECRET_AND_REDIRECT_URL', $MODULE)}"></a></h4>
    </div>
    <hr>
    <div class="col-sm-12 col-xs-12" id="EditView">
        <form name="editCTGoogleContacts"  class="form-horizontal">
            <div class="editViewBody">
                <div class="form-group">
                    <div class="col-sm-3 control-label" >
                        {vtranslate('LBL_CLIENT_ID', $QUALIFIED_MODULE)} <span class="redColor">* </span>
                    </div>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control inputElement" id="clientId" name="clientId" value="{$CLIENTID}" data-validation-engine="validate[required]">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 control-label" >
                        {vtranslate('LBL_CLIENT_SECRET', $QUALIFIED_MODULE)} <span class="redColor">* </span>
                    </div>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control inputElement" id="clientSecret" name="clientSecret" value="{$CLIENTSECRET}" data-validation-engine="validate[required]">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 control-label" >
                        {vtranslate('LBL_TENANTID', $QUALIFIED_MODULE)} <span class="redColor">* </span>
                    </div>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control inputElement" id="tenantId" name="tenantId" value="{$TENATID}" data-validation-engine="validate[required]">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 control-label" >
                        {vtranslate('LBL_REDIRECT_URL', $QUALIFIED_MODULE)} <span class="redColor">* </span>
                    </div>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control inputElement" id="redirectUrl" name="redirectUrl" value="{$REDIRECTURL}" data-validation-engine="validate[required]">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 control-label" >
                        {vtranslate('LBL_USERNAME', $QUALIFIED_MODULE)} <span class="redColor">* </span>
                    </div>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control inputElement" id="userName" name="userName" value="{$USERNAME}" data-validation-engine="validate[required]">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 control-label" >
                        {vtranslate('LBL_PASSWORD', $QUALIFIED_MODULE)} <span class="redColor">* </span>
                    </div>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control inputElement" id="password" name="password" value="{$PASSWORD}" data-validation-engine="validate[required]">
                    </div>
                </div>
            </div>
            <br>
                <div class="row-fluid">
                    <div class="pull-right">
                        <button type="button" class="btn btn-success" id="saveOutlookAPIsSetting" name="saveOutlookAPIsSetting">{vtranslate('LBL_SAVE', $QUALIFIED_MODULE)}</button>
                        <a class='cancelLink' href="javascript:history.back()" type="reset">{vtranslate('LBL_CANCEL', $MODULE)}</a>
                    </div>
                </div>
        </form>
    </div>
</div>

