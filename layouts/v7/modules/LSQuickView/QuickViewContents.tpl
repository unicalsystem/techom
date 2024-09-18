{*<!--
/************************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * Portions created by Libertus Solutions are Copyright (C) Libertus Solutions.
 * All Rights Reserved.
 *************************************************************************************/
-->*}
{strip}
<table class="table table-bordered">
    {foreach from=$RECORD_STRUCTURE['TOOLTIP_FIELDS'] item=FIELD_MODEL key=FIELD_NAME}
	    <tr>
		    <td class="fieldLabel narrowWidthType" nowrap>
			    <label class="muted">{vtranslate($FIELD_MODEL->get('label'),$MODULE)}</label>
		    </td>
		    <td class="fieldValue">
			    <span class="value">
				    {include file=vtemplate_path($FIELD_MODEL->getUITypeModel()->getDetailViewTemplateName(),$MODULE) FIELD_MODEL=$FIELD_MODEL USER_MODEL=$USER_MODEL MODULE=$MODULE RECORD=$RECORD}
			    </span>
		    </td>
	    </tr>
	{/foreach}
</table>
{/strip}
