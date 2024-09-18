<?php
/* Smarty version 4.3.4, created on 2024-07-31 11:58:04
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Vtiger/ListViewContents.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66aa26cc4c3743_90010231',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ecfc577eeb8ba77d5ac158097a3124d19f6988f9' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Vtiger/ListViewContents.tpl',
      1 => 1722427077,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66aa26cc4c3743_90010231 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(vtemplate_path("PicklistColorMap.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<div class="col-sm-12 col-xs-12 ">
	<?php if ($_smarty_tpl->tpl_vars['MODULE']->value != 'EmailTemplates' && $_smarty_tpl->tpl_vars['SEARCH_MODE_RESULTS']->value != true) {?>
		<?php $_smarty_tpl->_assignInScope('LEFTPANELHIDE', $_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('leftpanelhide'));?>
		<div class="essentials-toggle" title="<?php echo vtranslate('LBL_LEFT_PANEL_SHOW_HIDE','Vtiger');?>
">
			<span class="essentials-toggle-marker fa <?php if ($_smarty_tpl->tpl_vars['LEFTPANELHIDE']->value == '1') {?>fa-chevron-right<?php } else { ?>fa-chevron-left<?php }?> cursorPointer"></span>
		</div>
	<?php }?>
	<input type="hidden" name="view" id="view" value="<?php echo $_smarty_tpl->tpl_vars['VIEW']->value;?>
" />
	<input type="hidden" name="cvid" value="<?php echo $_smarty_tpl->tpl_vars['VIEWID']->value;?>
" />
	<input type="hidden" name="pageStartRange" id="pageStartRange" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getRecordStartRange();?>
" />
	<input type="hidden" name="pageEndRange" id="pageEndRange" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getRecordEndRange();?>
" />
	<input type="hidden" name="previousPageExist" id="previousPageExist" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->isPrevPageExists();?>
" />
	<input type="hidden" name="nextPageExist" id="nextPageExist" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->isNextPageExists();?>
" />
	<input type="hidden" name="alphabetSearchKey" id="alphabetSearchKey" value= "<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getAlphabetSearchField();?>
" />
	<input type="hidden" name="Operator" id="Operator" value="<?php echo $_smarty_tpl->tpl_vars['OPERATOR']->value;?>
" />
	<input type="hidden" name="totalCount" id="totalCount" value="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_COUNT']->value;?>
" />
	<input type='hidden' name="pageNumber" value="<?php echo $_smarty_tpl->tpl_vars['PAGE_NUMBER']->value;?>
" id='pageNumber'>
	<input type='hidden' name="pageLimit" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getPageLimit();?>
" id='pageLimit'>
	<input type="hidden" name="noOfEntries" value="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value;?>
" id="noOfEntries">
	<input type="hidden" name="currentSearchParams" value="<?php echo Vtiger_Util_Helper::toSafeHTML(Zend_JSON::encode($_smarty_tpl->tpl_vars['SEARCH_DETAILS']->value));?>
" id="currentSearchParams" />
        <input type="hidden" name="currentTagParams" value="<?php echo Vtiger_Util_Helper::toSafeHTML(Zend_JSON::encode($_smarty_tpl->tpl_vars['TAG_DETAILS']->value));?>
" id="currentTagParams" />
	<input type="hidden" name="noFilterCache" value="<?php echo $_smarty_tpl->tpl_vars['NO_SEARCH_PARAMS_CACHE']->value;?>
" id="noFilterCache" >
	<input type="hidden" name="orderBy" value="<?php echo $_smarty_tpl->tpl_vars['ORDER_BY']->value;?>
" id="orderBy">
	<input type="hidden" name="sortOrder" value="<?php echo $_smarty_tpl->tpl_vars['SORT_ORDER']->value;?>
" id="sortOrder">
	<input type="hidden" name="list_headers" value='<?php echo $_smarty_tpl->tpl_vars['LIST_HEADER_FIELDS']->value;?>
'/>
	<input type="hidden" name="tag" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_TAG']->value;?>
" />
	<input type="hidden" name="folder_id" value="<?php echo $_smarty_tpl->tpl_vars['FOLDER_ID']->value;?>
" />
	<input type="hidden" name="folder_value" value="<?php echo $_smarty_tpl->tpl_vars['FOLDER_VALUE']->value;?>
" />
	<input type="hidden" name="viewType" value="<?php echo $_smarty_tpl->tpl_vars['VIEWTYPE']->value;?>
" />
	<input type="hidden" name="app" id="appName" value="<?php echo $_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value;?>
">
	<input type="hidden" id="isExcelEditSupported" value="<?php if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isExcelEditAllowed()) {?>yes<?php } else { ?>no<?php }?>" />
	
	
	
	<?php if (!empty($_smarty_tpl->tpl_vars['PICKIST_DEPENDENCY_DATASOURCE']->value)) {?>
		<input type="hidden" name="picklistDependency" value='<?php echo Vtiger_Util_Helper::toSafeHTML($_smarty_tpl->tpl_vars['PICKIST_DEPENDENCY_DATASOURCE']->value);?>
' />
	<?php }?>
	
<?php if (!$_smarty_tpl->tpl_vars['SEARCH_MODE_RESULTS']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("ListViewActions.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
   <?php if ($_smarty_tpl->tpl_vars['MODULE']->value == 'Leads') {?>
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
<?php }?>

<?php }?>

	<div id="table-content" class="table-container">
		<form name='list' id='listedit' action='' onsubmit="return false;">
			<table id="listview-table" class="table <?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value == '0') {?>listview-table-norecords <?php }?> listview-table ">
				<thead>
					<tr class="listViewContentHeader">
						<th>
							<?php if (!$_smarty_tpl->tpl_vars['SEARCH_MODE_RESULTS']->value) {?>
					<div class="table-actions">
						<div class="dropdown" style="float:left;">
							<span class="input dropdown-toggle" data-toggle="dropdown" title="<?php echo vtranslate('LBL_CLICK_HERE_TO_SELECT_ALL_RECORDS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
">
								<input class="listViewEntriesMainCheckBox" type="checkbox">
							</span>
						</div>
						<?php if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isFilterColumnEnabled()) {?>
							<div id="listColumnFilterContainer">
								<div class="listColumnFilter <?php if ($_smarty_tpl->tpl_vars['CURRENT_CV_MODEL']->value && !($_smarty_tpl->tpl_vars['CURRENT_CV_MODEL']->value->isCvEditable())) {?>disabled<?php }?>"  
									 <?php if ($_smarty_tpl->tpl_vars['CURRENT_CV_MODEL']->value->isCvEditable()) {?>
										 title="<?php echo vtranslate('LBL_CLICK_HERE_TO_MANAGE_LIST_COLUMNS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"
									 <?php } else { ?>
										 <?php if ($_smarty_tpl->tpl_vars['CURRENT_CV_MODEL']->value->get('viewname') == 'All' && !$_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->isAdminUser()) {?> 
											 title="<?php echo vtranslate('LBL_SHARED_LIST_NON_ADMIN_MESSAGE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"
										 <?php } elseif (!$_smarty_tpl->tpl_vars['CURRENT_CV_MODEL']->value->isMine()) {?>
											 <?php $_smarty_tpl->_assignInScope('CURRENT_CV_USER_ID', $_smarty_tpl->tpl_vars['CURRENT_CV_MODEL']->value->get('userid'));?>
											 <?php if (!Vtiger_Functions::isUserExist($_smarty_tpl->tpl_vars['CURRENT_CV_USER_ID']->value)) {?>
												 <?php $_smarty_tpl->_assignInScope('CURRENT_CV_USER_ID', Users::getActiveAdminId());?>
											 <?php }?>
											 title="<?php echo vtranslate('LBL_SHARED_LIST_OWNER_MESSAGE',$_smarty_tpl->tpl_vars['MODULE']->value,getUserFullName($_smarty_tpl->tpl_vars['CURRENT_CV_USER_ID']->value));?>
"
										 <?php }?>
									 <?php }?>
									 <?php if ($_smarty_tpl->tpl_vars['MODULE']->value == 'Documents') {?>style="width: 10%;"<?php }?>
									 data-toggle="tooltip" data-placement="bottom" data-container="body">
									<i class="fa fa-th-large"></i>
								</div>
							</div>
						<?php }?>
					</div>
				<?php } elseif ($_smarty_tpl->tpl_vars['SEARCH_MODE_RESULTS']->value) {?>
					<?php echo vtranslate('LBL_ACTIONS',$_smarty_tpl->tpl_vars['MODULE']->value);?>

				<?php }?>
				</th>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LISTVIEW_HEADERS']->value, 'LISTVIEW_HEADER');
$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value) {
$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->do_else = false;
?>
					<?php if ($_smarty_tpl->tpl_vars['SEARCH_MODE_RESULTS']->value || ($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getFieldDataType() == 'multipicklist')) {?>
						<?php $_smarty_tpl->_assignInScope('NO_SORTING', 1);?>
					<?php } else { ?>
						<?php $_smarty_tpl->_assignInScope('NO_SORTING', 0);?>
					<?php }?>
					<th <?php if ($_smarty_tpl->tpl_vars['COLUMN_NAME']->value == $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('name')) {?> nowrap="nowrap" <?php }?>>
						<a href="#" class="<?php if ($_smarty_tpl->tpl_vars['NO_SORTING']->value) {?>noSorting<?php } else { ?>listViewContentHeaderValues<?php }?>" <?php if (!$_smarty_tpl->tpl_vars['NO_SORTING']->value) {?>data-nextsortorderval="<?php if ($_smarty_tpl->tpl_vars['COLUMN_NAME']->value == $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('name')) {
echo $_smarty_tpl->tpl_vars['NEXT_SORT_ORDER']->value;
} else { ?>ASC<?php }?>" data-columnname="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('name');?>
"<?php }?> data-field-id='<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getId();?>
'>
							<?php if (!$_smarty_tpl->tpl_vars['NO_SORTING']->value) {?>
								<?php if ($_smarty_tpl->tpl_vars['COLUMN_NAME']->value == $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('name')) {?>
									<i class="fa fa-sort <?php echo $_smarty_tpl->tpl_vars['FASORT_IMAGE']->value;?>
"></i>
								<?php } else { ?>
									<i class="fa fa-sort customsort"></i>
								<?php }?>
							<?php }?>
							&nbsp;<?php echo vtranslate($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('label'),$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getModuleName());?>
&nbsp;
						</a>
						<?php if ($_smarty_tpl->tpl_vars['COLUMN_NAME']->value == $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('name')) {?>
							<a href="#" class="removeSorting"><i class="fa fa-remove"></i></a>
							<?php }?>
					</th>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</tr>

				<?php if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isQuickSearchEnabled() && !$_smarty_tpl->tpl_vars['SEARCH_MODE_RESULTS']->value) {?>
                                    <tr class="searchRow listViewSearchContainer">
                                        <th class="inline-search-btn">
                                            <div class="table-actions">
                                                <button class="btn btn-success btn-sm <?php if (php7_count($_smarty_tpl->tpl_vars['SEARCH_DETAILS']->value) > 0) {?>hide<?php }?>" data-trigger="listSearch">
                                                    <i class="fa fa-search"></i> &nbsp;
                                                    <span class="s2-btn-text"><?php echo vtranslate("LBL_SEARCH",$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span>
                                                </button>
                                                <button class="searchAndClearButton t-btn-sm btn btn-danger <?php if (php7_count($_smarty_tpl->tpl_vars['SEARCH_DETAILS']->value) == 0) {?>hide<?php }?>" data-trigger="clearListSearch"><i class="fa fa-close"></i>&nbsp;<?php echo vtranslate("LBL_CLEAR",$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>
                                            </div>
                                        </th>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LISTVIEW_HEADERS']->value, 'LISTVIEW_HEADER');
$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value) {
$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->do_else = false;
?>
						<th>
							<?php $_smarty_tpl->_assignInScope('FIELD_UI_TYPE_MODEL', $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getUITypeModel());?>
							<?php $_smarty_tpl->_assignInScope('SEARCH_INFO_DETAILS_FOR_FIELD', array('searchValue'=>'','comparator'=>''));?>
							<?php if ((isset($_smarty_tpl->tpl_vars['SEARCH_DETAILS']->value[$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getName()]))) {?>
								<?php $_smarty_tpl->_assignInScope('SEARCH_INFO_DETAILS_FOR_FIELD', $_smarty_tpl->tpl_vars['SEARCH_DETAILS']->value[$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getName()]);?>
							<?php }?>
							<?php $_smarty_tpl->_subTemplateRender(vtemplate_path($_smarty_tpl->tpl_vars['FIELD_UI_TYPE_MODEL']->value->getListSearchTemplateName(),$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('FIELD_MODEL'=>$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value,'SEARCH_INFO'=>$_smarty_tpl->tpl_vars['SEARCH_INFO_DETAILS_FOR_FIELD']->value,'USER_MODEL'=>$_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value), 0, true);
?>
							<input type="hidden" class="operatorValue" value="<?php echo $_smarty_tpl->tpl_vars['SEARCH_INFO_DETAILS_FOR_FIELD']->value['comparator'];?>
">
						</th>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</tr>
				<?php }?>
				</thead>
				<tbody class="overflow-y">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES']->value, 'LISTVIEW_ENTRY', false, NULL, 'listview', array (
  'index' => true,
));
$_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value) {
$_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_listview']->value['index']++;
?>
						<?php $_smarty_tpl->_assignInScope('DATA_ID', $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getId());?>
						<?php $_smarty_tpl->_assignInScope('DATA_URL', $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getDetailViewUrl());?>
						<?php if ($_smarty_tpl->tpl_vars['SEARCH_MODE_RESULTS']->value && $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getModuleName() == "ModComments") {?>
							<?php $_smarty_tpl->_assignInScope('RELATED_TO', $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('related_to_model'));?>
							<?php $_smarty_tpl->_assignInScope('DATA_ID', $_smarty_tpl->tpl_vars['RELATED_TO']->value->getId());?>
							<?php $_smarty_tpl->_assignInScope('DATA_URL', $_smarty_tpl->tpl_vars['RELATED_TO']->value->getDetailViewUrl());?>
						<?php }?>
						<tr class="listViewEntries" data-id='<?php echo $_smarty_tpl->tpl_vars['DATA_ID']->value;?>
' data-recordUrl='<?php echo $_smarty_tpl->tpl_vars['DATA_URL']->value;?>
&app=<?php echo $_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value;?>
' id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_row_<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_listview']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_listview']->value['index'] : null)+1;?>
" <?php if ($_smarty_tpl->tpl_vars['MODULE']->value == 'Calendar') {?>data-recurring-enabled='<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->isRecurringEnabled();?>
'<?php }?>>
							<td class = "listViewRecordActions">
								<?php $_smarty_tpl->_subTemplateRender(vtemplate_path("ListViewRecordActions.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
							</td>
							<?php if (($_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('document_source') == 'Google Drive' && $_smarty_tpl->tpl_vars['IS_GOOGLE_DRIVE_ENABLED']->value) || ($_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('document_source') == 'Dropbox' && $_smarty_tpl->tpl_vars['IS_DROPBOX_ENABLED']->value)) {?>
						<input type="hidden" name="document_source_type" value="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('document_source');?>
">
					<?php }?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LISTVIEW_HEADERS']->value, 'LISTVIEW_HEADER');
$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value) {
$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->do_else = false;
?>
						<?php $_smarty_tpl->_assignInScope('LISTVIEW_HEADERNAME', $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('name'));?>
						<?php $_smarty_tpl->_assignInScope('LISTVIEW_ENTRY_RAWVALUE', $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getRaw($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('column')));?>
						<?php if ($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getFieldDataType() == 'currency' || $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getFieldDataType() == 'text') {?>
							<?php $_smarty_tpl->_assignInScope('LISTVIEW_ENTRY_RAWVALUE', $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getTitle($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value));?>
						<?php }?>
						<?php $_smarty_tpl->_assignInScope('LISTVIEW_ENTRY_VALUE', $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get($_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME']->value));?>
						<td class="listViewEntryValue" data-name="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('name');?>
" title="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getTitle($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value);?>
" data-rawvalue="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY_RAWVALUE']->value;?>
" data-field-type="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getFieldDataType();?>
">
							<span class="fieldValue">
								<span class="value">
									<?php if (($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->isNameField() == true || $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('uitype') == '4') && $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isListViewNameFieldNavigationEnabled() == true) {?>
										<a href="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getDetailViewUrl();?>
&app=<?php echo $_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get($_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME']->value);?>
</a>
										<?php if ($_smarty_tpl->tpl_vars['MODULE']->value == 'Products' && $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->isBundle()) {?>
											&nbsp;-&nbsp;<i class="mute"><?php echo vtranslate('LBL_PRODUCT_BUNDLE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</i>
										<?php }?>
									<?php } elseif ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getName() == 'Documents' && $_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME']->value == 'document_source') {?>
										<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get($_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME']->value);?>

									<?php } else { ?>
										<?php if ($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('uitype') == '72') {?>
											<?php ob_start();
echo $_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('currency_symbol_placement');
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('CURRENCY_SYMBOL_PLACEMENT', $_prefixVariable1);?>
											<?php if ($_smarty_tpl->tpl_vars['CURRENCY_SYMBOL_PLACEMENT']->value == '1.0$') {?>
												<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY_VALUE']->value;
echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('currencySymbol');?>

											<?php } else { ?>
												<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('currencySymbol');
echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY_VALUE']->value;?>

											<?php }?>
										<?php } elseif ($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('uitype') == '71') {?>
											<?php $_smarty_tpl->_assignInScope('CURRENCY_SYMBOL', $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('userCurrencySymbol'));?>
											<?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get($_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME']->value) != NULL) {?>
												<?php echo CurrencyField::appendCurrencySymbol($_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get($_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME']->value),$_smarty_tpl->tpl_vars['CURRENCY_SYMBOL']->value);?>

											<?php }?>
										<?php } elseif ($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getFieldDataType() == 'picklist') {?>
											<?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('activitytype') == 'Task') {?>
												<?php ob_start();
echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getId();
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('PICKLIST_FIELD_ID', $_prefixVariable2);?>
											<?php } else { ?>
												<?php if ($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getName() == 'taskstatus') {?>
													<?php $_smarty_tpl->_assignInScope('EVENT_STATUS_FIELD_MODEL', Vtiger_Field_Model::getInstance('eventstatus',Vtiger_Module_Model::getInstance('Events')));?>
													<?php if ($_smarty_tpl->tpl_vars['EVENT_STATUS_FIELD_MODEL']->value) {?>
														<?php ob_start();
echo $_smarty_tpl->tpl_vars['EVENT_STATUS_FIELD_MODEL']->value->getId();
$_prefixVariable3 = ob_get_clean();
$_smarty_tpl->_assignInScope('PICKLIST_FIELD_ID', $_prefixVariable3);?>
													<?php } else { ?> 
														<?php ob_start();
echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getId();
$_prefixVariable4 = ob_get_clean();
$_smarty_tpl->_assignInScope('PICKLIST_FIELD_ID', $_prefixVariable4);?>
													<?php }?>
												<?php } else { ?>
													<?php ob_start();
echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getId();
$_prefixVariable5 = ob_get_clean();
$_smarty_tpl->_assignInScope('PICKLIST_FIELD_ID', $_prefixVariable5);?>
												<?php }?>
											<?php }?>
											<span <?php if (!empty($_smarty_tpl->tpl_vars['LISTVIEW_ENTRY_VALUE']->value)) {?> class="picklist-color picklist-<?php echo $_smarty_tpl->tpl_vars['PICKLIST_FIELD_ID']->value;?>
-<?php echo Vtiger_Util_Helper::convertSpaceToHyphen($_smarty_tpl->tpl_vars['LISTVIEW_ENTRY_RAWVALUE']->value);?>
" <?php }?>> <?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY_VALUE']->value;?>
 </span>
										<?php } elseif ($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getFieldDataType() == 'multipicklist') {?>
											<?php $_smarty_tpl->_assignInScope('MULTI_RAW_PICKLIST_VALUES', explode('|##|',$_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getRaw($_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME']->value)));?>
											<?php $_smarty_tpl->_assignInScope('MULTI_PICKLIST_VALUES', explode(',',$_smarty_tpl->tpl_vars['LISTVIEW_ENTRY_VALUE']->value));?>
											<?php $_smarty_tpl->_assignInScope('ALL_MULTI_PICKLIST_VALUES', array_flip($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getPicklistValues()));?>
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MULTI_PICKLIST_VALUES']->value, 'MULTI_PICKLIST_VALUE', false, 'MULTI_PICKLIST_INDEX');
$_smarty_tpl->tpl_vars['MULTI_PICKLIST_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['MULTI_PICKLIST_INDEX']->value => $_smarty_tpl->tpl_vars['MULTI_PICKLIST_VALUE']->value) {
$_smarty_tpl->tpl_vars['MULTI_PICKLIST_VALUE']->do_else = false;
?>
												<span <?php if (!empty($_smarty_tpl->tpl_vars['LISTVIEW_ENTRY_VALUE']->value)) {?> class="picklist-color picklist-<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->getId();?>
-<?php echo Vtiger_Util_Helper::convertSpaceToHyphen(trim($_smarty_tpl->tpl_vars['ALL_MULTI_PICKLIST_VALUES']->value[trim($_smarty_tpl->tpl_vars['MULTI_PICKLIST_VALUE']->value)]));?>
"<?php }?> > 
													<?php if (trim($_smarty_tpl->tpl_vars['MULTI_PICKLIST_VALUES']->value[$_smarty_tpl->tpl_vars['MULTI_PICKLIST_INDEX']->value]) == vtranslate('LBL_NOT_ACCESSIBLE',$_smarty_tpl->tpl_vars['MODULE']->value)) {?> 
														<font color="red"> 
														<?php echo trim($_smarty_tpl->tpl_vars['MULTI_PICKLIST_VALUES']->value[$_smarty_tpl->tpl_vars['MULTI_PICKLIST_INDEX']->value]);?>
 
														</font> 
													<?php } else { ?> 
														<?php echo trim($_smarty_tpl->tpl_vars['MULTI_PICKLIST_VALUES']->value[$_smarty_tpl->tpl_vars['MULTI_PICKLIST_INDEX']->value]);?>
 
													<?php }?>
													<?php if (!empty($_smarty_tpl->tpl_vars['MULTI_PICKLIST_VALUES']->value[$_smarty_tpl->tpl_vars['MULTI_PICKLIST_INDEX']->value+1])) {?>,<?php }?>
												</span>
											<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										<?php } else { ?>
											<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY_VALUE']->value;?>

										<?php }?>
									<?php }?>
								</span>
							</span>
							<?php if ($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->isEditable() == 'true' && $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->isAjaxEditable() == 'true') {?>
								<span class="hide edit">
								</span>
							<?php }?>
						</td>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</tr>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				<?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value == '0') {?>
					<tr class="emptyRecordsDiv">
						<?php ob_start();
echo php7_count($_smarty_tpl->tpl_vars['LISTVIEW_HEADERS']->value);
$_prefixVariable6 = ob_get_clean();
$_smarty_tpl->_assignInScope('COLSPAN_WIDTH', $_prefixVariable6+1);?>
						<td colspan="<?php echo $_smarty_tpl->tpl_vars['COLSPAN_WIDTH']->value;?>
">
							<div class="emptyRecordsContent">
								<?php $_smarty_tpl->_assignInScope('SINGLE_MODULE', "SINGLE_".((string)$_smarty_tpl->tpl_vars['MODULE']->value));?>
								<?php echo vtranslate('LBL_NO');?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate('LBL_FOUND');?>
.
								<?php if ($_smarty_tpl->tpl_vars['IS_CREATE_PERMITTED']->value) {?>
									<a style="color:blue" href="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getCreateRecordUrl();?>
"> <?php echo vtranslate('LBL_CREATE');?>
</a>
									<?php if (Users_Privileges_Model::isPermitted($_smarty_tpl->tpl_vars['MODULE']->value,'Import') && $_smarty_tpl->tpl_vars['LIST_VIEW_MODEL']->value->isImportEnabled()) {?>
										<?php echo vtranslate('LBL_OR',$_smarty_tpl->tpl_vars['MODULE']->value);?>

										<a style="color:blue" href="#" onclick="return Vtiger_Import_Js.triggerImportAction()"><?php echo vtranslate('LBL_IMPORT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
										<?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>

									<?php } else { ?>
										<?php echo vtranslate($_smarty_tpl->tpl_vars['SINGLE_MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>

									<?php }?>
								<?php }?>
							</div>
						</td>
					</tr>
				<?php }?>
				</tbody>
			</table>
		</form>
	</div>
	<div id="scroller_wrapper" class="bottom-fixed-scroll">
		<div id="scroller" class="scroller-div"></div>
	</div>
</div>
<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
>

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



<?php }
}
