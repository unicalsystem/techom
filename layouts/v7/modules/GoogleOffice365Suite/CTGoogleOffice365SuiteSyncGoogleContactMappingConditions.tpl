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
        <input id="google_fields" type="hidden" value='{Zend_Json::encode($GOOGLECONTACTSFIELDS)}' />
        <input id="user_field_mapping" type="hidden" name="fieldmapping" value="fieldmappings" />
        <table width=100% id="getModuleFilter">
            <br>
            <tr class="newFilter">
                <td colspan="2">
                    {vtranslate('LBL_SELECT_FILTER', $MODULE)}
                </td>
                <td width="40%">
                    <select class="inputElement select2" id="customFilter"  data-fieldtype="picklist" name="customFilter">
                    {foreach key=GROUP_LABEL item=GROUP_CUSTOM_VIEWS from=$CUSTOM_VIEWS}
                        <optgroup label='{vtranslate($GROUP_LABEL, $MODULE)}'>
                            {foreach item="CUSTOM_VIEW" from=$GROUP_CUSTOM_VIEWS}
                                    <option  data-editurl="{$CUSTOM_VIEW->getEditUrl()}" data-deleteurl="{$CUSTOM_VIEW->getDeleteUrl()}" data-approveurl="{$CUSTOM_VIEW->getApproveUrl()}" data-denyurl="{$CUSTOM_VIEW->getDenyUrl()}" data-editable="{$CUSTOM_VIEW->isEditable()}" data-deletable="{$CUSTOM_VIEW->isDeletable()}" data-pending="{$CUSTOM_VIEW->isPending()}" id="filterOptionId_{$CUSTOM_VIEW->get('cvid')}" value="{$CUSTOM_VIEW->get('cvid')}" data-id="{$CUSTOM_VIEW->get('cvid')}"
                                    {if $CUSTOM_VIEW->get('cvid') eq $CVID} selected {/if} class="filterOptionId_{$CUSTOM_VIEW->get('cvid')}">{if $CUSTOM_VIEW->get('viewname') eq 'All'}{vtranslate($CUSTOM_VIEW->get('viewname'), $SOURCE_MODULE)} {vtranslate($SOURCE_MODULE, $SOURCE_MODULE)}{else}{vtranslate($CUSTOM_VIEW->get('viewname'), $SOURCE_MODULE)}{/if}{if $GROUP_LABEL neq 'Mine'} [ {$CUSTOM_VIEW->getOwnerName()} ]  {/if}</option>
                            {/foreach}
                        </optgroup>
                    {/foreach}
                </select>
                </td>
            </tr>
        </table>
        <div class="col-sm-12 col-xs-12" style="padding: 0px;">
            <div class="editViewContainer ">
                <form id="fieldMapping" method="POST">
                    <div class="editViewBody ">
                        <div class="editViewContents table-container" style="overflow: unset; padding-bottom:20px;">
                            
                            <table class="table listview-table-norecords" width="100%" id="convertMapping" style="margin-bottom: 10px;">
                                <tbody>
                                    <tr>
                                        <th width="33.33%"></th>
                                        <th width="33.33%">{vtranslate('LBL_VTIGER_FIELD',$MODULE)}</th>
                                        <th width="33.33%">{vtranslate('LBL_GOOGLE_FIELD',$MODULE)}</th>
                                    </tr>
                                    {foreach item=SELECTED_FIELDS_VALUE key=SELECTED_FIELDS_KEY from=$GOOGLECONTACTSFIELDMAPPING name="mappingLoop"}
                                        {assign var=COUNTER value=$smarty.foreach.mappingLoop.iteration }
                                        {assign var=GOOGLEFIELDSELECTEDTYPE value="`$SELECTED_FIELDS_VALUE['google_field_name']`_`$SELECTED_FIELDS_VALUE['google_field_type']`"}
                                        <tr class="listViewEntries googlesyncfieldmapping" sequence-number="{$smarty.foreach.mappingLoop.iteration}">
                                            <td width="5%" style="padding-left: 5%;">
                                                <div class="table-actions">
                                                    <span class="actionImages">
                                                        <i title="{vtranslate('LBL_DELETE', $MODULE)}" class="fa fa-trash {if ($SELECTED_FIELDS_KEY neq 'lastname' and $PRIMARY_MODULE_NAME neq 'Accounts') or ($SELECTED_FIELDS_KEY neq 'accountname' and $PRIMARY_MODULE_NAME eq 'Accounts')} deleteMapping{/if}" style="cursor: pointer;"></i>
                                                    </span>
                                                </div>
                                            </td>
                                            
                                            <td width="10%">
                                                <select class="Vtiger select2 col-sm-12 moduleField" style="width:180px" name="vtiger_fields[{$COUNTER}]" {if $SELECTED_FIELDS_KEY eq 'lastname'}disabled{/if}>
                                                <option value="">{vtranslate('LBL_SELECT_OPTION')}</option>
                                                    {foreach key=BLOCK_LABEL item=BLOCK_FIELDS from=$RECORD_STRUCTURE}
                                                        {assign var="BLOCKCOUNTER" value=$smarty.foreach.smartyloop.iteration}
                                                        <optgroup label='{vtranslate($BLOCK_LABEL, $PRIMARY_MODULE_NAME)}'>{vtranslate($BLOCK_LABEL, $PRIMARY_MODULE_NAME)}
                                                            {foreach item=FIELD_MODEL key=FIELD_NAME from=$BLOCK_FIELDS}
                                                                {assign var=FIELD_MODULE_NAME value=$FIELD_MODEL->getModule()->getName()}
                                                                <option value="{$FIELD_NAME}" {if trim($SELECTED_FIELDS_KEY) eq trim($FIELD_NAME) } selected {/if} data-field-name="{$FIELD_NAME}">{Vtiger_Util_Helper::toSafeHTML(vtranslate($FIELD_MODEL->get('label'), $PRIMARY_MODULE_NAME))}
                                                                {if $FIELD_MODEL->isMandatory() eq true} <span>*</span> {/if}
                                                                </option>
                                                            {/foreach}
                                                        </optgroup>
                                                    {/foreach}
                                                </select>
                                            </td>
                                            <td width="10%">
                                                <select name="Google[{$COUNTER}]" class="select2 Google googleField" style="width:180px" {if $SELECTED_FIELDS_KEY eq 'lastname'}disabled{/if}>
                                                    <option value="">{vtranslate('LBL_SELECT_OPTION','Vtiger')}</option>
                                                    {foreach item=VALUE key=KEY from=$GOOGLECONTACTSFIELDS}
                                                        {foreach item=VALUEVALUE key=KEYVALUE from=$VALUE}
                                                            {if 'types'|array_key_exists:$VALUE}
                                                                {if is_array($VALUEVALUE)}
                                                                    {foreach item=TYPEVALUE key=TYPEKEY from=$VALUEVALUE}
                                                                        {assign var=GOOGLEFIELDTYPE value="gd:`$KEY`_`$TYPEVALUE`"}
                                                                        <option value="gd:{$KEY}_{$TYPEVALUE}" {if $GOOGLEFIELDSELECTEDTYPE eq $GOOGLEFIELDTYPE} selected {/if} data-field-name="{$TYPEVALUE}">{vtranslate($KEY|ucfirst, $KEY)} ({$TYPEVALUE|ucfirst})</option>
                                                                    {/foreach}
                                                                {/if}
                                                            {else}
                                                                <option value="{$VALUEVALUE}" {if trim($SELECTED_FIELDS_VALUE['google_field_name']) eq trim($VALUEVALUE)} selected {/if}data-field-name="{$VALUEVALUE}">{vtranslate($KEY|ucfirst, $KEY)}</option>
                                                            {/if}
                                                        {/foreach}
                                                    {/foreach}
                                                </select>
                                                 &nbsp;&nbsp;
                                                {if $SELECTED_FIELDS_VALUE['google_custom_label'] neq ''}
                                                    <input type="text" id="customFields" name="custom_fields[{$COUNTER}]" class="inputElement" style="width: 170px;" value="{$SELECTED_FIELDS_VALUE['google_custom_label']}">
                                                {else}
                                                    <input type="text" id="customFields" name="custom_fields[{$COUNTER}]" class="inputElement hide " style="width: 170px;" value="{$SELECTED_FIELDS_VALUE['google_custom_label']}">
                                                {/if}
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
                                            <select class="Vtiger newSelect moduleField" style="width:180px;">
                                            <option value="">{vtranslate('LBL_SELECT_OPTION')}</option>
                                                {foreach key=BLOCK_LABEL item=BLOCK_FIELDS from=$RECORD_STRUCTURE}
                                                    <optgroup label='{vtranslate($BLOCK_LABEL, $PRIMARY_MODULE_NAME)}'>
                                                        {foreach key=FIELD_NAME item=FIELD_MODEL from=$BLOCK_FIELDS}
                                                            <option value="{$FIELD_NAME}" data-field-name="{$FIELD_NAME}">{vtranslate($FIELD_MODEL->get('label'), $PRIMARY_MODULE_NAME)}
                                                            </option>
                                                        {/foreach}
                                                    </optgroup>
                                                {/foreach}
                                            </select>
                                        </td>
                                        <td width="10%">
                                            <select class="Google newSelect googleField" style="width:180px;">
                                                <option value="">{vtranslate('LBL_SELECT_OPTION')}</option>
                                                {foreach item=VALUE key=KEY from=$GOOGLECONTACTSFIELDS}
                                                    {foreach item=VALUEVALUE key=KEYVALUE from=$VALUE}
                                                        {if 'types'|array_key_exists:$VALUE}
                                                            {if is_array($VALUEVALUE)}
                                                                {foreach item=TYPEVALUE key=TYPEKEY from=$VALUEVALUE}
                                                                    <option value="gd:{$KEY}_{$TYPEVALUE}" data-field-name="{$TYPEVALUE}">{vtranslate($KEY|ucfirst, $KEY)} ({$TYPEVALUE|ucfirst})</option>
                                                                {/foreach}
                                                            {/if}
                                                        {else}
                                                            <option value="{$VALUEVALUE}" data-field-name="{$VALUEVALUE}">{vtranslate($KEY|ucfirst, $KEY)}</option>
                                                        {/if}
                                                    {/foreach}
                                                {/foreach}
                                            </select>
                                            <input type="text" id="customFields" name="custom_fields" class="inputElement customFields hide " style="width: 170px;" value="">
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