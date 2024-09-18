{*+**********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.1
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
************************************************************************************}
{* modules/Vtiger/views/List.php *}

{* START YOUR IMPLEMENTATION FROM BELOW. Use {debug} for information *}
{include file="PicklistColorMap.tpl"|vtemplate_path:$MODULE}

<div class="col-sm-12 col-xs-12 ">
	{if $MODULE neq 'EmailTemplates' && $SEARCH_MODE_RESULTS neq true}
		{assign var=LEFTPANELHIDE value=$CURRENT_USER_MODEL->get('leftpanelhide')}
		<div class="essentials-toggle" title="{vtranslate('LBL_LEFT_PANEL_SHOW_HIDE', 'Vtiger')}">
			<span class="essentials-toggle-marker fa {if $LEFTPANELHIDE eq '1'}fa-chevron-right{else}fa-chevron-left{/if} cursorPointer"></span>
		</div>
	{/if}
	<input type="hidden" name="view" id="view" value="{$VIEW}" />
	<input type="hidden" name="cvid" value="{$VIEWID}" />
	<input type="hidden" name="pageStartRange" id="pageStartRange" value="{$PAGING_MODEL->getRecordStartRange()}" />
	<input type="hidden" name="pageEndRange" id="pageEndRange" value="{$PAGING_MODEL->getRecordEndRange()}" />
	<input type="hidden" name="previousPageExist" id="previousPageExist" value="{$PAGING_MODEL->isPrevPageExists()}" />
	<input type="hidden" name="nextPageExist" id="nextPageExist" value="{$PAGING_MODEL->isNextPageExists()}" />
	<input type="hidden" name="alphabetSearchKey" id="alphabetSearchKey" value= "{$MODULE_MODEL->getAlphabetSearchField()}" />
	<input type="hidden" name="Operator" id="Operator" value="{$OPERATOR}" />
	<input type="hidden" name="totalCount" id="totalCount" value="{$LISTVIEW_COUNT}" />
	<input type='hidden' name="pageNumber" value="{$PAGE_NUMBER}" id='pageNumber'>
	<input type='hidden' name="pageLimit" value="{$PAGING_MODEL->getPageLimit()}" id='pageLimit'>
	<input type="hidden" name="noOfEntries" value="{$LISTVIEW_ENTRIES_COUNT}" id="noOfEntries">
	<input type="hidden" name="currentSearchParams" value="{Vtiger_Util_Helper::toSafeHTML(Zend_JSON::encode($SEARCH_DETAILS))}" id="currentSearchParams" />
        <input type="hidden" name="currentTagParams" value="{Vtiger_Util_Helper::toSafeHTML(Zend_JSON::encode($TAG_DETAILS))}" id="currentTagParams" />
	<input type="hidden" name="noFilterCache" value="{$NO_SEARCH_PARAMS_CACHE}" id="noFilterCache" >
	<input type="hidden" name="orderBy" value="{$ORDER_BY}" id="orderBy">
	<input type="hidden" name="sortOrder" value="{$SORT_ORDER}" id="sortOrder">
	<input type="hidden" name="list_headers" value='{$LIST_HEADER_FIELDS}'/>
	<input type="hidden" name="tag" value="{$CURRENT_TAG}" />
	<input type="hidden" name="folder_id" value="{$FOLDER_ID}" />
	<input type="hidden" name="folder_value" value="{$FOLDER_VALUE}" />
	<input type="hidden" name="viewType" value="{$VIEWTYPE}" />
	<input type="hidden" name="app" id="appName" value="{$SELECTED_MENU_CATEGORY}">
	<input type="hidden" id="isExcelEditSupported" value="{if $MODULE_MODEL->isExcelEditAllowed()}yes{else}no{/if}" />
	
	
	
	{if !empty($PICKIST_DEPENDENCY_DATASOURCE)}
		<input type="hidden" name="picklistDependency" value='{Vtiger_Util_Helper::toSafeHTML($PICKIST_DEPENDENCY_DATASOURCE)}' />
	{/if}
	
{if !$SEARCH_MODE_RESULTS}
    {include file="ListViewActions.tpl"|vtemplate_path:$MODULE}
   {if $MODULE eq 'Leads'}
    <div class="btn-group listView" style="display: flex; justify-content: flex-end; gap: 10px; padding-top: 12px;">
        <input type="text" name="module" placeholder="Filter" class="form-control" style="margin-right: 10px; border-radius: 20px; width:150px;box-shadow: 0 2px 10px rgba(0,0,0,0.1);" />

        <a class="btn btn-custom" style="background-color: #ff0000; border-radius: 24px;" href="https://unical.smartrecruitmentsolution.com/index.php?module=Leads&parent=&page=&view=List&viewname=56&orderby=&sortorder=&app=MARKETING&tag_params=%5B%5D&nolistcache=0&list_headers=&tag=">Not Contacted</a>
        <a class="btn btn-custom" style="background-color: #ffa700; border-radius: 24px;" href="https://unical.smartrecruitmentsolution.com/index.php?module=Leads&parent=&page=&view=List&viewname=58&orderby=&sortorder=&app=MARKETING&tag_params=%5B%5D&nolistcache=0&list_headers=&tag=">Shortlisted</a>
        <a class="btn btn-custom" style="background-color: #fff400; border-radius: 24px;" href="https://unical.smartrecruitmentsolution.com/index.php?module=Leads&parent=&page=&view=List&viewname=59&orderby=&sortorder=&app=MARKETING&tag_params=%5B%5D&nolistcache=0&list_headers=&tag=">L1 Scheduled</a>
        <a class="btn btn-custom" style="background-color: #d0f01d; border-radius: 24px;" href="https://unical.smartrecruitmentsolution.com/index.php?module=Leads&parent=&page=&view=List&viewname=60&orderby=&sortorder=&app=MARKETING&tag_params=%5B%5D&nolistcache=0&list_headers=&tag=">L2 Scheduled</a>
        <a class="btn btn-custom" style="background-color: #a3ff00; border-radius: 24px;" href="https://unical.smartrecruitmentsolution.com/index.php?module=Leads&parent=&page=&view=List&viewname=61&orderby=&sortorder=&app=MARKETING&tag_params=%5B%5D&nolistcache=0&list_headers=&tag=">Selected</a>
        <a class="btn btn-custom" style="background-color: #47ba00; border-radius: 24px;" href="https://unical.smartrecruitmentsolution.com/index.php?module=Leads&parent=&page=&view=List&viewname=62&orderby=&sortorder=&app=MARKETING&tag_params=%5B%5D&nolistcache=0&list_headers=&tag=">Offer Released</a>
        <a class="btn btn-custom" style="background-color: #00ba2b; border-radius: 24px;" href="https://unical.smartrecruitmentsolution.com/index.php?module=Leads&parent=&page=&view=List&viewname=64&orderby=&sortorder=&app=MARKETING&tag_params=%5B%5D&nolistcache=0&list_headers=&tag=">Joined</a>
    </div>
{/if}

{/if}

	<div id="table-content" class="table-container">
		<form name='list' id='listedit' action='' onsubmit="return false;">
			<table id="listview-table" class="table {if $LISTVIEW_ENTRIES_COUNT eq '0'}listview-table-norecords {/if} listview-table ">
				<thead>
					<tr class="listViewContentHeader">
						<th>
							{if !$SEARCH_MODE_RESULTS}
					<div class="table-actions">
						<div class="dropdown" style="float:left;">
							<span class="input dropdown-toggle" data-toggle="dropdown" title="{vtranslate('LBL_CLICK_HERE_TO_SELECT_ALL_RECORDS',$MODULE)}">
								<input class="listViewEntriesMainCheckBox" type="checkbox">
							</span>
						</div>
						{if $MODULE_MODEL->isFilterColumnEnabled()}
							<div id="listColumnFilterContainer">
								<div class="listColumnFilter {if $CURRENT_CV_MODEL and !($CURRENT_CV_MODEL->isCvEditable())}disabled{/if}"  
									 {if $CURRENT_CV_MODEL->isCvEditable()}
										 title="{vtranslate('LBL_CLICK_HERE_TO_MANAGE_LIST_COLUMNS',$MODULE)}"
									 {else}
										 {if $CURRENT_CV_MODEL->get('viewname') eq 'All' and !$CURRENT_USER_MODEL->isAdminUser()} 
											 title="{vtranslate('LBL_SHARED_LIST_NON_ADMIN_MESSAGE',$MODULE)}"
										 {elseif !$CURRENT_CV_MODEL->isMine()}
											 {assign var=CURRENT_CV_USER_ID value=$CURRENT_CV_MODEL->get('userid')}
											 {if !Vtiger_Functions::isUserExist($CURRENT_CV_USER_ID)}
												 {assign var=CURRENT_CV_USER_ID value=Users::getActiveAdminId()}
											 {/if}
											 title="{vtranslate('LBL_SHARED_LIST_OWNER_MESSAGE',$MODULE, getUserFullName($CURRENT_CV_USER_ID))}"
										 {/if}
									 {/if}
									 {if $MODULE eq 'Documents'}style="width: 10%;"{/if}
									 data-toggle="tooltip" data-placement="bottom" data-container="body">
									<i class="fa fa-th-large"></i>
								</div>
							</div>
						{/if}
					</div>
				{elseif $SEARCH_MODE_RESULTS}
					{vtranslate('LBL_ACTIONS',$MODULE)}
				{/if}
				</th>
				{foreach item=LISTVIEW_HEADER from=$LISTVIEW_HEADERS}
					{if $SEARCH_MODE_RESULTS || ($LISTVIEW_HEADER->getFieldDataType() eq 'multipicklist')}
						{assign var=NO_SORTING value=1}
					{else}
						{assign var=NO_SORTING value=0}
					{/if}
					<th {if $COLUMN_NAME eq $LISTVIEW_HEADER->get('name')} nowrap="nowrap" {/if}>
						<a href="#" class="{if $NO_SORTING}noSorting{else}listViewContentHeaderValues{/if}" {if !$NO_SORTING}data-nextsortorderval="{if $COLUMN_NAME eq $LISTVIEW_HEADER->get('name')}{$NEXT_SORT_ORDER}{else}ASC{/if}" data-columnname="{$LISTVIEW_HEADER->get('name')}"{/if} data-field-id='{$LISTVIEW_HEADER->getId()}'>
							{if !$NO_SORTING}
								{if $COLUMN_NAME eq $LISTVIEW_HEADER->get('name')}
									<i class="fa fa-sort {$FASORT_IMAGE}"></i>
								{else}
									<i class="fa fa-sort customsort"></i>
								{/if}
							{/if}
							&nbsp;{vtranslate($LISTVIEW_HEADER->get('label'), $LISTVIEW_HEADER->getModuleName())}&nbsp;
						</a>
						{if $COLUMN_NAME eq $LISTVIEW_HEADER->get('name')}
							<a href="#" class="removeSorting"><i class="fa fa-remove"></i></a>
							{/if}
					</th>
				{/foreach}
				</tr>

				{if $MODULE_MODEL->isQuickSearchEnabled() && !$SEARCH_MODE_RESULTS}
                                    <tr class="searchRow listViewSearchContainer">
                                        <th class="inline-search-btn">
                                            <div class="table-actions">
                                                <button class="btn btn-success btn-sm {if php7_count($SEARCH_DETAILS) gt 0}hide{/if}" data-trigger="listSearch">
                                                    <i class="fa fa-search"></i> &nbsp;
                                                    <span class="s2-btn-text">{vtranslate("LBL_SEARCH",$MODULE)}</span>
                                                </button>
                                                <button class="searchAndClearButton t-btn-sm btn btn-danger {if php7_count($SEARCH_DETAILS) eq 0}hide{/if}" data-trigger="clearListSearch"><i class="fa fa-close"></i>&nbsp;{vtranslate("LBL_CLEAR",$MODULE)}</button>
                                            </div>
                                        </th>
                                    {foreach item=LISTVIEW_HEADER from=$LISTVIEW_HEADERS}
						<th>
							{assign var=FIELD_UI_TYPE_MODEL value=$LISTVIEW_HEADER->getUITypeModel()}
							{assign var=SEARCH_INFO_DETAILS_FOR_FIELD value=array( 'searchValue' => '', 'comparator' => '' )}
							{if isset($SEARCH_DETAILS[$LISTVIEW_HEADER->getName()])}
								{assign var=SEARCH_INFO_DETAILS_FOR_FIELD value=$SEARCH_DETAILS[$LISTVIEW_HEADER->getName()]}
							{/if}
							{include file=vtemplate_path($FIELD_UI_TYPE_MODEL->getListSearchTemplateName(),$MODULE) FIELD_MODEL= $LISTVIEW_HEADER SEARCH_INFO=$SEARCH_INFO_DETAILS_FOR_FIELD USER_MODEL=$CURRENT_USER_MODEL}
							<input type="hidden" class="operatorValue" value="{$SEARCH_INFO_DETAILS_FOR_FIELD['comparator']}">
						</th>
					{/foreach}
					</tr>
				{/if}
				</thead>
				<tbody class="overflow-y">
					{foreach item=LISTVIEW_ENTRY from=$LISTVIEW_ENTRIES name=listview}
						{assign var=DATA_ID value=$LISTVIEW_ENTRY->getId()}
						{assign var=DATA_URL value=$LISTVIEW_ENTRY->getDetailViewUrl()}
						{if $SEARCH_MODE_RESULTS && $LISTVIEW_ENTRY->getModuleName() == "ModComments"}
							{assign var=RELATED_TO value=$LISTVIEW_ENTRY->get('related_to_model')}
							{assign var=DATA_ID value=$RELATED_TO->getId()}
							{assign var=DATA_URL value=$RELATED_TO->getDetailViewUrl()}
						{/if}
						<tr class="listViewEntries" data-id='{$DATA_ID}' data-recordUrl='{$DATA_URL}&app={$SELECTED_MENU_CATEGORY}' id="{$MODULE}_listView_row_{$smarty.foreach.listview.index+1}" {if $MODULE eq 'Calendar'}data-recurring-enabled='{$LISTVIEW_ENTRY->isRecurringEnabled()}'{/if}>
							<td class = "listViewRecordActions">
								{include file="ListViewRecordActions.tpl"|vtemplate_path:$MODULE}
							</td>
							{if ($LISTVIEW_ENTRY->get('document_source') eq 'Google Drive' && $IS_GOOGLE_DRIVE_ENABLED) || ($LISTVIEW_ENTRY->get('document_source') eq 'Dropbox' && $IS_DROPBOX_ENABLED)}
						<input type="hidden" name="document_source_type" value="{$LISTVIEW_ENTRY->get('document_source')}">
					{/if}
					{foreach item=LISTVIEW_HEADER from=$LISTVIEW_HEADERS}
						{assign var=LISTVIEW_HEADERNAME value=$LISTVIEW_HEADER->get('name')}
						{assign var=LISTVIEW_ENTRY_RAWVALUE value=$LISTVIEW_ENTRY->getRaw($LISTVIEW_HEADER->get('column'))}
						{if $LISTVIEW_HEADER->getFieldDataType() eq 'currency' || $LISTVIEW_HEADER->getFieldDataType() eq 'text'}
							{assign var=LISTVIEW_ENTRY_RAWVALUE value=$LISTVIEW_ENTRY->getTitle($LISTVIEW_HEADER)}
						{/if}
						{assign var=LISTVIEW_ENTRY_VALUE value=$LISTVIEW_ENTRY->get($LISTVIEW_HEADERNAME)}
						<td class="listViewEntryValue" data-name="{$LISTVIEW_HEADER->get('name')}" title="{$LISTVIEW_ENTRY->getTitle($LISTVIEW_HEADER)}" data-rawvalue="{$LISTVIEW_ENTRY_RAWVALUE}" data-field-type="{$LISTVIEW_HEADER->getFieldDataType()}">
							<span class="fieldValue">
								<span class="value">
									{if ($LISTVIEW_HEADER->isNameField() eq true or $LISTVIEW_HEADER->get('uitype') eq '4') and $MODULE_MODEL->isListViewNameFieldNavigationEnabled() eq true }
										<a href="{$LISTVIEW_ENTRY->getDetailViewUrl()}&app={$SELECTED_MENU_CATEGORY}">{$LISTVIEW_ENTRY->get($LISTVIEW_HEADERNAME)}</a>
										{if $MODULE eq 'Products' &&$LISTVIEW_ENTRY->isBundle()}
											&nbsp;-&nbsp;<i class="mute">{vtranslate('LBL_PRODUCT_BUNDLE', $MODULE)}</i>
										{/if}
									{else if $MODULE_MODEL->getName() eq 'Documents' && $LISTVIEW_HEADERNAME eq 'document_source'}
										{$LISTVIEW_ENTRY->get($LISTVIEW_HEADERNAME)}
									{else}
										{if $LISTVIEW_HEADER->get('uitype') eq '72'}
											{assign var=CURRENCY_SYMBOL_PLACEMENT value={$CURRENT_USER_MODEL->get('currency_symbol_placement')}}
											{if $CURRENCY_SYMBOL_PLACEMENT eq '1.0$'}
												{$LISTVIEW_ENTRY_VALUE}{$LISTVIEW_ENTRY->get('currencySymbol')}
											{else}
												{$LISTVIEW_ENTRY->get('currencySymbol')}{$LISTVIEW_ENTRY_VALUE}
											{/if}
										{else if $LISTVIEW_HEADER->get('uitype') eq '71'}
											{assign var=CURRENCY_SYMBOL value=$LISTVIEW_ENTRY->get('userCurrencySymbol')}
											{if $LISTVIEW_ENTRY->get($LISTVIEW_HEADERNAME) neq NULL}
												{CurrencyField::appendCurrencySymbol($LISTVIEW_ENTRY->get($LISTVIEW_HEADERNAME), $CURRENCY_SYMBOL)}
											{/if}
										{else if $LISTVIEW_HEADER->getFieldDataType() eq 'picklist'}
											{if $LISTVIEW_ENTRY->get('activitytype') eq 'Task'}
												{assign var=PICKLIST_FIELD_ID value={$LISTVIEW_HEADER->getId()}}
											{else}
												{if $LISTVIEW_HEADER->getName() eq 'taskstatus'}
													{assign var="EVENT_STATUS_FIELD_MODEL" value=Vtiger_Field_Model::getInstance('eventstatus', Vtiger_Module_Model::getInstance('Events'))}
													{if $EVENT_STATUS_FIELD_MODEL}
														{assign var=PICKLIST_FIELD_ID value={$EVENT_STATUS_FIELD_MODEL->getId()}}
													{else} 
														{assign var=PICKLIST_FIELD_ID value={$LISTVIEW_HEADER->getId()}}
													{/if}
												{else}
													{assign var=PICKLIST_FIELD_ID value={$LISTVIEW_HEADER->getId()}}
												{/if}
											{/if}
											<span {if !empty($LISTVIEW_ENTRY_VALUE)} class="picklist-color picklist-{$PICKLIST_FIELD_ID}-{Vtiger_Util_Helper::convertSpaceToHyphen($LISTVIEW_ENTRY_RAWVALUE)}" {/if}> {$LISTVIEW_ENTRY_VALUE} </span>
										{else if $LISTVIEW_HEADER->getFieldDataType() eq 'multipicklist'}
											{assign var=MULTI_RAW_PICKLIST_VALUES value=explode('|##|',$LISTVIEW_ENTRY->getRaw($LISTVIEW_HEADERNAME))}
											{assign var=MULTI_PICKLIST_VALUES value=explode(',',$LISTVIEW_ENTRY_VALUE)}
											{assign var=ALL_MULTI_PICKLIST_VALUES value=array_flip($LISTVIEW_HEADER->getPicklistValues())}
											{foreach item=MULTI_PICKLIST_VALUE key=MULTI_PICKLIST_INDEX from=$MULTI_PICKLIST_VALUES}
												<span {if !empty($LISTVIEW_ENTRY_VALUE)} class="picklist-color picklist-{$LISTVIEW_HEADER->getId()}-{Vtiger_Util_Helper::convertSpaceToHyphen(trim($ALL_MULTI_PICKLIST_VALUES[trim($MULTI_PICKLIST_VALUE)]))}"{/if} > 
													{if trim($MULTI_PICKLIST_VALUES[$MULTI_PICKLIST_INDEX]) eq vtranslate('LBL_NOT_ACCESSIBLE', $MODULE)} 
														<font color="red"> 
														{trim($MULTI_PICKLIST_VALUES[$MULTI_PICKLIST_INDEX])} 
														</font> 
													{else} 
														{trim($MULTI_PICKLIST_VALUES[$MULTI_PICKLIST_INDEX])} 
													{/if}
													{if !empty($MULTI_PICKLIST_VALUES[$MULTI_PICKLIST_INDEX + 1])},{/if}
												</span>
											{/foreach}
										{else}
											{$LISTVIEW_ENTRY_VALUE}
										{/if}
									{/if}
								</span>
							</span>
							{if $LISTVIEW_HEADER->isEditable() eq 'true' && $LISTVIEW_HEADER->isAjaxEditable() eq 'true'}
								<span class="hide edit">
								</span>
							{/if}
						</td>
					{/foreach}
					</tr>
				{/foreach}
				{if $LISTVIEW_ENTRIES_COUNT eq '0'}
					<tr class="emptyRecordsDiv">
						{assign var=COLSPAN_WIDTH value={php7_count($LISTVIEW_HEADERS)}+1}
						<td colspan="{$COLSPAN_WIDTH}">
							<div class="emptyRecordsContent">
								{assign var=SINGLE_MODULE value="SINGLE_$MODULE"}
								{vtranslate('LBL_NO')} {vtranslate($MODULE, $MODULE)} {vtranslate('LBL_FOUND')}.
								{if $IS_CREATE_PERMITTED}
									<a style="color:blue" href="{$MODULE_MODEL->getCreateRecordUrl()}"> {vtranslate('LBL_CREATE')}</a>
									{if Users_Privileges_Model::isPermitted($MODULE, 'Import') && $LIST_VIEW_MODEL->isImportEnabled()}
										{vtranslate('LBL_OR', $MODULE)}
										<a style="color:blue" href="#" onclick="return Vtiger_Import_Js.triggerImportAction()">{vtranslate('LBL_IMPORT', $MODULE)}</a>
										{vtranslate($MODULE, $MODULE)}
									{else}
										{vtranslate($SINGLE_MODULE, $MODULE)}
									{/if}
								{/if}
							</div>
						</td>
					</tr>
				{/if}
				</tbody>
			</table>
		</form>
	</div>
	<div id="scroller_wrapper" class="bottom-fixed-scroll">
		<div id="scroller" class="scroller-div"></div>
	</div>
</div>
<script>
// Function to filter the table rows based on the module input
function filterTable() {
    const moduleInput = document.querySelector('input[name="module"]');
    const filter = moduleInput ? moduleInput.value.toLowerCase() : '';
    const table = document.getElementById('listview-table');
    if (!table) return; // Exit if table doesn't exist on this page
 
    const rows = table.getElementsByTagName('tr');
 
    for (let i = 1; i < rows.length; i++) { 
        const cells = rows[i].getElementsByTagName('td');
        let found = filter === '';
        for (let j = 0; j < cells.length; j++) {
            const cellText = cells[j].textContent || cells[j].innerText;
            if (cellText.toLowerCase().indexOf(filter) > -1) {
                found = true;
                break;
            }
        }
        rows[i].style.display = found ? '' : 'none';
    }
}
 
// Function to save filter state to local storage
function saveFilterState() {
    const moduleInput = document.querySelector('input[name="module"]');
    if (moduleInput) {
        localStorage.setItem('moduleFilter', moduleInput.value);
    }
}
 
// Function to restore filter state from local storage
function restoreFilterState() {
    const moduleInput = document.querySelector('input[name="module"]');
    if (moduleInput) {
        const savedFilter = localStorage.getItem('moduleFilter');
        if (savedFilter) {
            moduleInput.value = savedFilter;
            filterTable();
        }
    }
}
 
// Function to initialize the page
function initPage() {
    const moduleInput = document.querySelector('input[name="module"]');
    if (moduleInput) {
        moduleInput.addEventListener('input', function() {
            filterTable();
            saveFilterState();
        });
    }
 
    restoreFilterState();
 
    // Add event listeners to stage buttons
    const stageButtons = document.querySelectorAll('.btn-group .btn');
    stageButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            // Save filter state before changing the page
            saveFilterState();
        });
    });
}
 
// Initialize the page when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', initPage);
 
// Apply filter on page load (for cases where DOM might be manipulated after initial load)
window.addEventListener('load', filterTable);
</script>

<style>
    .listView {
        display: inline-flex;
        background: rgb(255 255 255) ;
        padding: 5px;
        padding-top: 10px !important;
        border-radius: 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,0);
    }
    .listView .btn {
        padding: 5.5px 20px;
        margin: 0 4px;
        transition: all 0.3s ease;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 12px;
        border: none;
        border-radius: 20px; /* Ensure all buttons have curved borders */
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .listView .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
    .listView .btn-success {
        background-color: #2ecc71;
        color: white;
    }
    .listView .btn-warning {
        background-color: #f39c12;
        color: white;
    }
    .listView .btn-danger {
        background-color: #e74c3c;
        color: white;
    }
    .listView .btn-custom {
        color: black;
        border-radius: 20px; 
    }
    .listView .btn i {
        margin-right: 8px;
        font-size: 14px;
    }
    .listView .btn:first-child {
        margin-left: 0;
    }
    .listView .btn:last-child {
        margin-right: 0;
    }
	
</style>



