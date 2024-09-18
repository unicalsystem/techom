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
        <h3 class="span4 textOverflowEllipsis" title="{vtranslate('LBL_GOOGLE_API_SETTING', $QUALIFIED_MODULE)}" style="height: 30px;">{vtranslate('LBL_GOOGLE_API_SETTING', $QUALIFIED_MODULE)}</h3>
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
                        {vtranslate('LBL_DOMAIN_URL', $QUALIFIED_MODULE)} <span class="redColor">* </span>
                    </div>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control inputElement" id="domainUrl" name="domainUrl" value="{$DOMAINURL}" data-validation-engine="validate[required]">
                    </div>
                </div>
            </div>
            <br>
                <div class="row-fluid">
                    <div class="pull-right">
                        <button type="button" class="btn btn-success" id="saveGoogleAPIsSetting" name="saveGoogleAPIsSetting">{vtranslate('LBL_SAVE', $QUALIFIED_MODULE)}</button>
                        <a class='cancelLink' href="javascript:history.back()" type="reset">{vtranslate('LBL_CANCEL', $MODULE)}</a>
                    </div>
                </div>
        </form>
    </div>
</div>

