<?php
/* Smarty version 4.3.4, created on 2024-08-23 11:37:06
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/layouts/v7/modules/Vtiger/ListViewActions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66c87462895a06_30115497',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5078f1ac006aa8000ebd46313e2e364e5784311e' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/layouts/v7/modules/Vtiger/ListViewActions.tpl',
      1 => 1724413015,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66c87462895a06_30115497 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/vendor/smarty/smarty/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
?>

<?php $_smarty_tpl->_assignInScope('LISTVIEW_MASSACTIONS_1', array());?><div id="listview-actions" class="listview-actions-container"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LISTVIEW_MASSACTIONS']->value, 'LIST_MASSACTION', false, NULL, 'massActions', array (
));
$_smarty_tpl->tpl_vars['LIST_MASSACTION']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['LIST_MASSACTION']->value) {
$_smarty_tpl->tpl_vars['LIST_MASSACTION']->do_else = false;
if ($_smarty_tpl->tpl_vars['LIST_MASSACTION']->value->getLabel() == 'LBL_EDIT') {
$_smarty_tpl->_assignInScope('editAction', $_smarty_tpl->tpl_vars['LIST_MASSACTION']->value);
} elseif ($_smarty_tpl->tpl_vars['LIST_MASSACTION']->value->getLabel() == 'LBL_DELETE') {
$_smarty_tpl->_assignInScope('deleteAction', $_smarty_tpl->tpl_vars['LIST_MASSACTION']->value);
} elseif ($_smarty_tpl->tpl_vars['LIST_MASSACTION']->value->getLabel() == 'LBL_ADD_COMMENT') {
$_smarty_tpl->_assignInScope('commentAction', $_smarty_tpl->tpl_vars['LIST_MASSACTION']->value);
} else {
$_smarty_tpl->_assignInScope('a', array_push($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTIONS_1']->value,$_smarty_tpl->tpl_vars['LIST_MASSACTION']->value));
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?><div class="row"><div class="col-md-8"><div class="btn-group listViewActionsContainer" role="group" aria-label="..."><?php if ($_smarty_tpl->tpl_vars['editAction']->value) {?><button type="button" class="btn btn-default" id=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_massAction_<?php echo $_smarty_tpl->tpl_vars['editAction']->value->getLabel();
if (stripos($_smarty_tpl->tpl_vars['editAction']->value->getUrl(),'javascript:') === 0) {?> href="javascript:void(0);" onclick='<?php echo substr($_smarty_tpl->tpl_vars['editAction']->value->getUrl(),strlen("javascript:"));?>
'<?php } else { ?> href='<?php echo $_smarty_tpl->tpl_vars['editAction']->value->getUrl();?>
' <?php }?> title="<?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" disabled="disabled"><i class="fa fa-pencil"></i></button><?php }
if ($_smarty_tpl->tpl_vars['deleteAction']->value) {?><button type="button" class="btn btn-default" id=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_massAction_<?php echo $_smarty_tpl->tpl_vars['deleteAction']->value->getLabel();
if (stripos($_smarty_tpl->tpl_vars['deleteAction']->value->getUrl(),'javascript:') === 0) {?> href="javascript:void(0);" onclick='<?php echo substr($_smarty_tpl->tpl_vars['deleteAction']->value->getUrl(),strlen("javascript:"));?>
'<?php } else { ?> href='<?php echo $_smarty_tpl->tpl_vars['deleteAction']->value->getUrl();?>
' <?php }?> title="<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" disabled="disabled"><i class="fa fa-trash"></i></button><?php }
if ($_smarty_tpl->tpl_vars['commentAction']->value) {?><button type="button" class="btn btn-default" id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_massAction_<?php echo $_smarty_tpl->tpl_vars['commentAction']->value->getLabel();?>
"onclick="Vtiger_List_Js.triggerMassAction('<?php echo $_smarty_tpl->tpl_vars['commentAction']->value->getUrl();?>
')" title="<?php echo vtranslate('LBL_COMMENT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" disabled="disabled"><i class="fa fa-comment"></i></button><?php }
if (php7_count($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTIONS_1']->value) > 0 || smarty_modifier_count($_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEW']) > 0) {?><div class="btn-group listViewMassActions" role="group"><button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><?php echo vtranslate('LBL_MORE','Vtiger');?>
&nbsp;<span class="caret"></span></button><ul class="dropdown-menu" role="menu"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LISTVIEW_MASSACTIONS_1']->value, 'LISTVIEW_MASSACTION', false, NULL, 'advancedMassActions', array (
));
$_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value) {
$_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->do_else = false;
?><li class="hide"><a id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_massAction_<?php echo Vtiger_Util_Helper::replaceSpaceWithUnderScores($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->getLabel());?>
" <?php if (stripos($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->getUrl(),'javascript:') === 0) {?> href="javascript:void(0);" onclick='<?php echo substr($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->getUrl(),strlen("javascript:"));?>
;'<?php } else { ?> href='<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->getUrl();?>
' <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if (php7_count($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTIONS_1']->value) > 0 && smarty_modifier_count($_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEW']) > 0) {?><li class="divider hide"></li><?php }
if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isStarredEnabled()) {?><li class="hide"><a id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_massAction_LBL_ADD_STAR" onclick="Vtiger_List_Js.triggerAddStar()"><?php echo vtranslate('LBL_FOLLOW',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><li class="hide"><a id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_massAction_LBL_REMOVE_STAR" onclick="Vtiger_List_Js.triggerRemoveStar()"><?php echo vtranslate('LBL_UNFOLLOW',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php }?><li class="hide"><a id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_massAction_LBL_ADD_TAG" onclick="Vtiger_List_Js.triggerAddTag()"><?php echo vtranslate('LBL_ADD_TAG',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php if ($_smarty_tpl->tpl_vars['CURRENT_TAG']->value != '') {?><li class="hide"><a id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listview_massAction_LBL_REMOVE_TAG" onclick="Vtiger_List_Js.triggerRemoveTag(<?php echo $_smarty_tpl->tpl_vars['CURRENT_TAG']->value;?>
)"><?php echo vtranslate('LBL_REMOVE_TAG',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php }?><li class="divider hide" style="margin:9px 0px;"></li><?php $_smarty_tpl->_assignInScope('FIND_DUPLICATES_EXITS', false);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEW'], 'LISTVIEW_ADVANCEDACTIONS');
$_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value) {
$_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->do_else = false;
if ($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getLabel() == 'Print') {
$_smarty_tpl->_assignInScope('PRINT_TEMPLATE', $_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value);
} else {
if ($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getLabel() == 'LBL_FIND_DUPLICATES') {
$_smarty_tpl->_assignInScope('FIND_DUPLICATES_EXISTS', true);
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if ($_smarty_tpl->tpl_vars['PRINT_TEMPLATE']->value) {?><li class="hide"><a id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_advancedAction_<?php echo Vtiger_Util_Helper::replaceSpaceWithUnderScores($_smarty_tpl->tpl_vars['PRINT_TEMPLATE']->value->getLabel());?>
" <?php if (stripos($_smarty_tpl->tpl_vars['PRINT_TEMPLATE']->value->getUrl(),'javascript:') === 0) {?> href="javascript:void(0);" onclick='<?php echo substr($_smarty_tpl->tpl_vars['PRINT_TEMPLATE']->value->getUrl(),strlen("javascript:"));?>
;'<?php } else { ?> href='<?php echo $_smarty_tpl->tpl_vars['PRINT_TEMPLATE']->value->getUrl();?>
' <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['PRINT_TEMPLATE']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php }
if ($_smarty_tpl->tpl_vars['FIND_DUPLICATES_EXISTS']->value) {?><li class="hide"><a id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_advancedAction_MERGE_RECORD"  href="javascript:void(0);" onclick='Vtiger_List_Js.triggerMergeRecord()'><?php echo vtranslate('LBL_MERGE_SELECTED_RECORDS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php }
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEW'], 'LISTVIEW_ADVANCEDACTIONS');
$_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value) {
$_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->do_else = false;
if ($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getLabel() == 'LBL_IMPORT') {
} elseif ($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getLabel() == 'Print') {
$_smarty_tpl->_assignInScope('PRINT_TEMPLATE', $_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value);
} else {
if ($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getLabel() == 'LBL_FIND_DUPLICATES') {
$_smarty_tpl->_assignInScope('FIND_DUPLICATES_EXISTS', true);
}
if ($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getLabel() != 'Print') {?><li class="selectFreeRecords"><a id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_advancedAction_<?php echo Vtiger_Util_Helper::replaceSpaceWithUnderScores($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getLabel());?>
" <?php if (stripos($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getUrl(),'javascript:') === 0) {?> href="javascript:void(0);" onclick='<?php echo substr($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getUrl(),strlen("javascript:"));?>
;'<?php } else { ?> href='<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getUrl();?>
' <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul></div><?php }
if ($_smarty_tpl->tpl_vars['MODULE']->value == 'Potentials') {?><div class="listViewStatusActions"><a class="btn btn-success" id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_massAction_LBL_ACTIVE"href="https://unical.smartrecruitmentsolution.com/index.php?module=Potentials&parent=&page=&view=List&viewname=67&orderby=&sortorder=&app=SALES&tag_params=%5B%5D&nolistcache=0&list_headers=&tag="><?php echo vtranslate('Active',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a><a class="btn btn-warning" id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_massAction_LBL_HOLD"href="https://unical.smartrecruitmentsolution.com/index.php?module=Potentials&parent=&page=&view=List&viewname=68&orderby=&sortorder=&app=SALES&tag_params=%5B%5D&nolistcache=0&list_headers=&tag="><?php echo vtranslate('Hold',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a><a class="btn btn-danger" id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_massAction_LBL_INACTIVE"href="https://unical.smartrecruitmentsolution.com/index.php?module=Potentials&parent=&page=&view=List&viewname=69&orderby=&sortorder=&app=SALES&tag_params=%5B%5D&nolistcache=0&list_headers=&tag="><?php echo vtranslate('InActive',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></div><?php }?></div></div><div class="col-md-4"><?php $_smarty_tpl->_assignInScope('RECORD_COUNT', $_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value);
$_smarty_tpl->_subTemplateRender(vtemplate_path("Pagination.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('SHOWPAGEJUMP'=>true), 0, true);
?></div></div><div class="row"><div class="col-md-12"><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value == '0' && $_smarty_tpl->tpl_vars['REQUEST_INSTANCE']->value && $_smarty_tpl->tpl_vars['REQUEST_INSTANCE']->value->isAjax()) {
if ($_SESSION['lvs'][$_smarty_tpl->tpl_vars['MODULE']->value]['viewname']) {
$_smarty_tpl->_assignInScope('VIEWID', $_SESSION['lvs'][$_smarty_tpl->tpl_vars['MODULE']->value]['viewname']);
}
if ($_smarty_tpl->tpl_vars['VIEWID']->value) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CUSTOM_VIEWS']->value, 'FILTER_TYPES');
$_smarty_tpl->tpl_vars['FILTER_TYPES']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FILTER_TYPES']->value) {
$_smarty_tpl->tpl_vars['FILTER_TYPES']->do_else = false;
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['FILTER_TYPES']->value, 'FILTERS');
$_smarty_tpl->tpl_vars['FILTERS']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FILTERS']->value) {
$_smarty_tpl->tpl_vars['FILTERS']->do_else = false;
if ($_smarty_tpl->tpl_vars['FILTERS']->value->get('cvid') == $_smarty_tpl->tpl_vars['VIEWID']->value) {
$_smarty_tpl->_assignInScope('CVNAME', $_smarty_tpl->tpl_vars['FILTERS']->value->get('viewname'));
break 1;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_smarty_tpl->_assignInScope('DEFAULT_FILTER_URL', $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getDefaultUrl());
$_smarty_tpl->_assignInScope('DEFAULT_FILTER_ID', $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getDefaultCustomFilter());
if ($_smarty_tpl->tpl_vars['DEFAULT_FILTER_ID']->value) {
$_smarty_tpl->_assignInScope('DEFAULT_FILTER_URL', (((($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getListViewUrl()).("&viewname=")).($_smarty_tpl->tpl_vars['DEFAULT_FILTER_ID']->value)).("&app=")).($_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value));
}
if ($_smarty_tpl->tpl_vars['CVNAME']->value != 'All') {?><div><?php echo vtranslate('LBL_DISPLAYING_RESULTS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate('LBL_FROM',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <b><?php echo $_smarty_tpl->tpl_vars['CVNAME']->value;?>
</b>. <a style="color:blue" href='<?php echo $_smarty_tpl->tpl_vars['DEFAULT_FILTER_URL']->value;?>
'><?php echo vtranslate('LBL_SEARCH_IN',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate('All',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a> </div><?php }
}
}?><div class="hide messageContainer" style = "height:30px;"><center><a href="#" id="selectAllMsgDiv"><?php echo vtranslate('LBL_SELECT_ALL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;(<span id="totalRecordsCount" value=""></span>)</a></center></div><div class="hide messageContainer" style = "height:30px;"><center><a href="#" id="deSelectAllMsgDiv"><?php echo vtranslate('LBL_DESELECT_ALL_RECORDS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></center></div></div></div></div><style>.listViewStatusActions {display: inline-flex;background: #f0f0f0;padding: 5px;padding-top: 0px !important;border-radius: 25px;box-shadow: 0 2px 10px rgba(0,0,0,0.1);}.listViewStatusActions .btn {padding: 5.5px 20px;margin: 0 4px;transition: all 0.3s ease;font-weight: 600;text-transform: uppercase;font-size: 12px;border: none;border-radius: 20px;display: flex;align-items: center;justify-content: center;}.listViewStatusActions .btn:hover {transform: translateY(-2px);box-shadow: 0 4px 8px rgba(0,0,0,0.15);}.listViewStatusActions .btn-success {background-color: #2ecc71;color: white;}.listViewStatusActions .btn-warning {background-color: #f39c12;color: white;}.listViewStatusActions .btn-danger {background-color: #e74c3c;color: white;}.listViewStatusActions .btn i {margin-right: 8px;font-size: 14px;}.listViewStatusActions .btn:first-child {margin-left: 0;}.listViewStatusActions .btn:last-child {margin-right: 0;}</style><?php }
}
