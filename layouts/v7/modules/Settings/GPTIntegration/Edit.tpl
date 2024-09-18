{*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************}

{strip}
    <div class="contents">
        <form class="form-horizontal confEditForm" data-detail-url="{$MODULE_MODEL->getDetailViewUrl()}">
            <input type="hidden" name="module" value="GPTIntegration"/>
            <input type="hidden" name="action" value="SaveAjax"/>
            <input type="hidden" name="parent" value="Settings"/>
            <input type="hidden" name="id" value="{$RECORD_ID}">
            <div class="detailViewInfo">
                {assign var=FIELDS value=$CONFIG_FIELDS}
                {foreach item=FIELD_TYPE key=FIELD_NAME from=$FIELDS}
                    <div class="row form-group">
                        <div class="col-lg-3 control-label fieldLabel">
                            <label>{vtranslate($FIELD_NAME, $QUALIFIED_MODULE)}&nbsp;<span class="redColor">*</span></label>
                        </div>
                        <div  class="{$WIDTHTYPE} col-lg-4 input-group">
                            <div class=" input-group inputElement"> 
                                <input class="inputElement fieldValue" type="{$FIELD_TYPE}" name="{$FIELD_NAME}" data-rule-required="true" value="" />
                            </div>
                        </div>
                    </div>
                {/foreach}
                <div class='modal-overlay-footer clearfix'>
                    <div class=" row clearfix">
                        <div class=' textAlignCenter col-lg-12 col-md-12 col-sm-12 '>
                            <button type='submit' class='btn btn-success saveButton'  >{vtranslate('LBL_SAVE', $MODULE)}</button>&nbsp;&nbsp;
                            <a class='cancelLink' type="reset">{vtranslate('LBL_CANCEL', $MODULE)}</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


{/strip}