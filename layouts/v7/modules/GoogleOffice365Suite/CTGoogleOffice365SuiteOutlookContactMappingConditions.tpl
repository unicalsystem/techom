{*<!--
/*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ******************************************************************************/
-->*}

{strip} 
    <div class="fieldMappingEditPageDiv">
    <input id="contactsFieldMapping" type="hidden" name="fieldmapping" value="fieldmappings" />
        <table width=100% id="getModuleFilter">
            <br>
            <tr class="newFilter">
                <td colspan="2">
                    {vtranslate('LBL_SELECT_FILTER', $MODULE)}
                </td>
                <td width="40%">
                    <select class="inputElement select2" id="customFilter"  data-fieldtype="picklist" name="customFilter">
                    {foreach key=GROUP_LABEL item=GROUP_CUSTOM_VIEWS from=$CUSTOM_VIEWS}
                    
                        <optgroup label=' {if $GROUP_LABEL eq 'Mine'} {vtranslate($GROUP_LABEL, $MODULE)} {else if} {vtranslate($GROUP_LABEL)} {/if}' >
                            {foreach item="CUSTOM_VIEW" from=$GROUP_CUSTOM_VIEWS}
                                    <option  data-editurl="{$CUSTOM_VIEW->getEditUrl()}" data-deleteurl="{$CUSTOM_VIEW->getDeleteUrl()}" data-approveurl="{$CUSTOM_VIEW->getApproveUrl()}" data-denyurl="{$CUSTOM_VIEW->getDenyUrl()}" data-editable="{$CUSTOM_VIEW->isEditable()}" data-deletable="{$CUSTOM_VIEW->isDeletable()}" data-pending="{$CUSTOM_VIEW->isPending()}" data-public="{$CUSTOM_VIEW->isPublic()}" id="filterOptionId_{$CUSTOM_VIEW->get('cvid')}" value="{$CUSTOM_VIEW->get('cvid')}" data-id="{$CUSTOM_VIEW->get('cvid')}" 
                                    {if $CUSTOM_VIEW->get('cvid') eq $CVID} selected {/if}  class="filterOptionId_{$CUSTOM_VIEW->get('cvid')}">{if $CUSTOM_VIEW->get('viewname') eq 'All'}{vtranslate($CUSTOM_VIEW->get('viewname'), $SOURCE_MODULE)} {vtranslate($SOURCE_MODULE, $SOURCE_MODULE)}{else}{vtranslate($CUSTOM_VIEW->get('viewname'), $SOURCE_MODULE)}{/if}{if $GROUP_LABEL neq 'Mine'} [ {$CUSTOM_VIEW->getOwnerName()} ]  {/if}</option>
                            {/foreach}
                        </optgroup>
                    {/foreach}
                </select>
                </td>
            </tr>
        </table>
        <div class="col-sm-12 col-xs-12">
            <div class="editViewContainer ">
                <form id="fieldMapping" method="POST">
                    <div class="editViewBody ">
                        <div class="editViewContents table-container" style="overflow:unset; padding-bottom:20px;">
                            
                            <table class="table listview-table-norecords" width="100%" id="convertMapping" style="margin-top: 8px;">
                                <tbody>
                                    <tr>
                                        <th width="33.33%"></th>
                                        <th width="33.33%">{vtranslate('LBL_VTIGER_FIELD',$MODULE)}</th>
                                        <th width="33.33%">{vtranslate('LBL_OUTLOOK_FIELD',$MODULE)}</th>
                                    </tr>

                                {foreach item=SELECTED_FIELDS_VALUE key=SELECTED_FIELDS_KEY from=$FIELDSMAPPING name="mappingLoop"}
                                <tr class="listViewEntries {if $SELECTED_FIELDS_VALUE['editable'] eq 1 }outlookSyncFieldMapping{/if}" sequence-number="{$smarty.foreach.mappingLoop.iteration}">
                                    <td width="5%" style="padding-left: 5%;">
                                        {if $SELECTED_FIELDS_VALUE['editable'] eq 0}
                                            <div class="table-actions">
                                                <span class="actionImages">
                                                    <i title="{vtranslate('LBL_DELETE', $MODULE)}" class="fa fa-trash deleteMapping" style="cursor: pointer;pointer-events:none"></i>
                                                </span>
                                            </div>
                                        {else}
                                            <div class="table-actions">
                                                <span class="actionImages">
                                                    <i title="{vtranslate('LBL_DELETE', $MODULE)}" class="fa fa-trash deleteMapping" style="cursor: pointer;"></i>
                                                </span>
                                            </div>                                     
                                        {/if}
                                    </td>
                                    <td width="10%">
                                        <select class="Vtiger select2 col-sm-12 vtigerColumn" style="width:180px" name="vtiger_fields[{$SELECTED_FIELDS_KEY+1}]" {if $SELECTED_FIELDS_VALUE['editable'] eq 0} disabled {/if}>
                                            
                                            {foreach item=BLOCK_FIELDS key=BLOCK_LABEL from=$VTIGERRECORDSTRUCTURE}
                                                <optgroup label='{vtranslate($BLOCK_LABEL, $PRIMARY_MODULE_NAME)}'>{vtranslate($BLOCK_LABEL, $PRIMARY_MODULE_NAME)}
                                                    {foreach item=FIELD_MODEL key=FIELD_NAME from=$BLOCK_FIELDS}
                                                        {assign var=FIELD_MODULE_NAME value=$FIELD_MODEL->getModule()->getName()}
                                                        <option value="{$FIELD_NAME}" {if trim($SELECTED_FIELDS_VALUE['vtiger_fields']) eq trim($FIELD_NAME) } selected {/if} data-field-name="{$FIELD_NAME}">{Vtiger_Util_Helper::toSafeHTML(vtranslate($FIELD_MODEL->get('label'), $PRIMARY_MODULE_NAME))}
                                                        {if $FIELD_MODEL->isMandatory() eq true} <span>*</span> {/if}
                                                        </option>
                                                    {/foreach}
                                                </optgroup>
                                            {/foreach}

                                        </select>
                                    </td>
                                    <td width="10%">
                                        <select name="outlook_fields[{$SELECTED_FIELDS_KEY+1}]" class="select2 Outlook outlookColumn" style="width:180px" {if $SELECTED_FIELDS_VALUE['editable'] eq 0} disabled {/if}>
                                        {foreach item=ALL_SOURCEMODULE_VALUE key=ALL_SOURCEMODULE_KEY from=$OUTLOOK_FIELDNAME}
                                            <option value="{$ALL_SOURCEMODULE_KEY}" {if trim($SELECTED_FIELDS_VALUE['outlook_fields']) eq trim($ALL_SOURCEMODULE_KEY) } selected {/if} data-field-name="{$ALL_SOURCEMODULE_KEY}">{vtranslate($ALL_SOURCEMODULE_VALUE, $ALL_SOURCEMODULE_VALUE)}
                                            </option>
                                        {/foreach}
                                        </select>
                                    </td>
                                </tr>
                                {/foreach}
                                    <tr class="hide newMapping listViewEntries">
                                        <td width="5%" style="padding-left: 5%;">
                                            <div class="table-actions">
                                                <span class="actionImages">
                                                    <i title="{vtranslate('LBL_DELETE', $MODULE)}" class="fa fa-trash deleteMapping" style="cursor: pointer;"></i>
                                                </span>
                                            </div>
                                        </td>
                                        
                                        <td width="10%">
                                            <select class="Vtiger newSelect vtigerColumn" style="width:180px;">
                                                <option value="">{vtranslate('LBL_SELECT_OPTION')}</option>
                                                {foreach key=BLOCK_LABEL item=BLOCK_FIELDS from=$VTIGERRECORDSTRUCTURE}
                                                    <optgroup label='{vtranslate($BLOCK_LABEL, $PRIMARY_MODULE_NAME)}'>
                                                        {foreach key=FIELD_NAME item=FIELD_MODEL from=$BLOCK_FIELDS}
                                                            {if $FIELD_NAME neq "lastname"}
                                                                <option value="{$FIELD_NAME}" data-field-name="{$FIELD_NAME}">{vtranslate($FIELD_MODEL->get('label'), $PRIMARY_MODULE_NAME)}
                                                                </option>
                                                            {/if}
                                                        {/foreach}
                                                    </optgroup>
                                                {/foreach}
                                            </select>
                                        </td>
                                        <td width="10%">
                                            <select class="Outlook newSelect outlookColumn" style="width:180px;">
                                                <option value="">{vtranslate('LBL_SELECT_OPTION')}</option>
                                                 {foreach item=ALL_SOURCEMODULE_VALUE key=ALL_SOURCEMODULE_KEY from=$OUTLOOK_FIELDNAME}
                                                    {if $ALL_SOURCEMODULE_KEY neq "givenName"}
                                                        <option value="{$ALL_SOURCEMODULE_KEY}" data-field-name="{$ALL_SOURCEMODULE_KEY}">{vtranslate($ALL_SOURCEMODULE_VALUE, $ALL_SOURCEMODULE_VALUE)}
                                                        </option>
                                                    {/if}
                                                {/foreach}
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row" style="padding-left: 5%;">
                                <span class="col-sm-4">
                                    <button id="addMapping" class="btn addButton module-buttons" type="button">
                                        <i class="fa fa-plus"></i>&nbsp;&nbsp;{vtranslate('LBL_ADD_MAPPING', $MODULE)}
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
{/strip}