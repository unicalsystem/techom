{*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************}

{strip}
    <div class="row">
        <div class="col-lg-12">
            <div class="gptintegrationconfiguration" id="gptintegrationconfiguration">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="clearfix col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-sm-8 col-xs-8">
                            <div class="alert alert-info container-fluid">
                                <b>{vtranslate('LBL_NOTE', $QUALIFIED_MODULE)}:</b>&nbsp;
                                {vtranslate('OPENAI_INFO', $QUALIFIED_MODULE)}
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-4">
                            <div class="btn pull-right editbutton-container">
                                <button class="btn btn-default editButton" data-url="{$MODULE_MODEL->getEditViewUrl()}&mode=showpopup&id={$RECORD_MODEL->get('id')}" title="{vtranslate('LBL_EDIT', $QUALIFIED_MODULE)}">{vtranslate('LBL_EDIT',$QUALIFIED_MODULE)}</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <div class="gptintegrationconfigurationDetail">
                        <div class="contents ">
                            <div class="detailViewInfo">
                                {assign var=FIELDS value=$CONFIG_FIELDS}
                                {foreach item=FIELD_TYPE key=FIELD_NAME from=$FIELDS}
                                    <div class="row form-group"><div class="col-lg-3 col-md-3 col-sm-3 fieldLabel"><label>{vtranslate($FIELD_NAME, $QUALIFIED_MODULE)}</label></div>
                                        {assign var="FIELD_NAME" value='mask_'|cat:$FIELD_NAME}
                                        <div  class="col-lg-9 col-md-9 col-sm-9 fieldValue break-word">
                                            <div>
                                                {$RECORD_MODEL->get($FIELD_NAME)}
                                            </div>
                                        </div>
                                    </div>
                                {/foreach}
                            </div>    
                        </div>
                    </div>
                    <div class="gptintegrationconfigurationEdit">
                    </div>
                </div>
            </div>
        </div>
    </div>
{/strip}
