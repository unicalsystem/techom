<?php
/* Smarty version 4.3.4, created on 2024-03-29 05:47:25
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Vtiger/ExtensionListLog.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_660655ed34a949_22918113',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d5845d9e870fe13819ce6f7cdfb4c0241791f76' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Vtiger/ExtensionListLog.tpl',
      1 => 1706189738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660655ed34a949_22918113 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="col-sm-12 col-xs-12 extensionContents">
    <div class="row">
        <?php if (!$_smarty_tpl->tpl_vars['MODAL']->value) {?>
            <div class="col-sm-6 col-xs-6">
                <h3 class="module-title pull-left"> <?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
 - <?php echo vtranslate('LBL_SYNC_LOG',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </h3>
            </div>
            <div class="col-sm-6 col-xs-6">
                <div class="pull-right">
                    <span class="module-title">
                        <h3><a data-url="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getExtensionSettingsUrl($_smarty_tpl->tpl_vars['SOURCE_MODULE']->value);?>
" class="btn addButton btn-default settingsPage" type="button" id="Contacts_basicAction_LBL_Sync_Settings"><span aria-hidden="true" class="fa fa-cog"></span> <?php echo vtranslate('LBL_SYNC_SETTINGS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></h3>
                    </span>
                </div>
            </div>
        <?php }?>
    </div>
    <br>
    <div class="row">
        <?php if (!$_smarty_tpl->tpl_vars['MODAL']->value) {?>
            <div class="col-sm-6 col-xs-6">
                <?php if ($_smarty_tpl->tpl_vars['IS_SYNC_READY']->value) {?>
                    <button class="btn addButton btn-success syncNow" type="button" id="Contacts_basicAction_LBL_Sync_Settings"><span aria-hidden="true" class="fa fa-refresh"></span><strong>&nbsp; <?php echo vtranslate('LBL_SYNC_NOW',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </strong></button>
                        <?php }?>
            </div>
        <?php }?>
        <?php if (!$_smarty_tpl->tpl_vars['MODAL']->value) {?>
            <div class="col-sm-6 col-xs-6">
            <?php } else { ?>
                <div class="col-sm-12 col-xs-12">
        <?php }?>
                <input type="hidden" name="pageStartRange" id="pageStartRange" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getRecordStartRange();?>
" /> 
	            <input type="hidden" name="pageEndRange" id="pageEndRange" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getRecordEndRange();?>
" /> 
	            <input type="hidden" name="previousPageExist" id="previousPageExist" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->isPrevPageExists();?>
" /> 
	            <input type="hidden" name="nextPageExist" id="nextPageExist" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->isNextPageExists();?>
" /> 
                <input type="hidden" name="totalCount" id="totalCount" value="<?php echo $_smarty_tpl->tpl_vars['TOTAL_RECORD_COUNT']->value;?>
" /> 
	            <input type='hidden' name="pageNumber" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->get('page');?>
" id='pageNumber'> 
	            <input type='hidden' name="pageLimit" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->getPageLimit();?>
" id='pageLimit'> 
                <input type="hidden" name="noOfEntries" value="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value;?>
" id="noOfEntries"> 
	            <?php $_smarty_tpl->_assignInScope('RECORD_COUNT', $_smarty_tpl->tpl_vars['TOTAL_RECORD_COUNT']->value);?> 
	            <?php $_smarty_tpl->_assignInScope('PAGE_NUMBER', $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->get('page'));?> 
	            <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("Pagination.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('SHOWPAGEJUMP'=>true), 0, true);
?> 
            </div>
        </div>
        <br>
        <div id="table-content" class="table-container">
        <table id="listview-table" class="listview-table table-bordered" align="center">
            <thead>
                <tr class="listViewContentHeader">
                    <th rowspan="2"> <?php echo vtranslate('LBL_DATE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </th>
                    <th rowspan="2"> <?php echo vtranslate('LBL_TIME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </th>
                    <th rowspan="2"> <?php echo vtranslate('LBL_MODULE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </th>
                    <th colspan = "4" > <?php echo vtranslate('APPTITLE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </th>
                    <th colspan = "4" > <?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </th>
                </tr>
                <tr class="listViewContentHeader">
                    <th> <?php echo vtranslate('Created',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </th>
                    <th> <?php echo vtranslate('LBL_UPDATED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </th>
                    <th> <?php echo vtranslate('LBL_DELETED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </th>
                    <th> <?php echo vtranslate('LBL_SKIPPED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </th>
                    <th> <?php echo vtranslate('Created',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </th>
                    <th> <?php echo vtranslate('LBL_UPDATED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </th>
                    <th> <?php echo vtranslate('LBL_DELETED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </th>
                    <th> <?php echo vtranslate('LBL_SKIPPED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['DATA']->value, 'LOG');
$_smarty_tpl->tpl_vars['LOG']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['LOG']->value) {
$_smarty_tpl->tpl_vars['LOG']->do_else = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['LOG']->value['sync_date'];?>
 </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['LOG']->value['sync_time'];?>
 </td>
                        <td><?php echo vtranslate($_smarty_tpl->tpl_vars['LOG']->value['module'],$_smarty_tpl->tpl_vars['LOG']->value['module']);?>
</td>
                        <td> <a class="<?php if ($_smarty_tpl->tpl_vars['LOG']->value['vt_create_count'] > 0) {?> syncLogDetail extensionLink <?php }?>" data-type="vt_create" data-id="<?php echo $_smarty_tpl->tpl_vars['LOG']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['LOG']->value['vt_create_count'];?>
 </a> </td>
                        <td> <a class="<?php if ($_smarty_tpl->tpl_vars['LOG']->value['vt_update_count'] > 0) {?> syncLogDetail extensionLink <?php }?>" data-type="vt_update" data-id="<?php echo $_smarty_tpl->tpl_vars['LOG']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['LOG']->value['vt_update_count'];?>
 </a> </td>
                        <td> <a class="<?php if ($_smarty_tpl->tpl_vars['LOG']->value['vt_delete_count'] > 0) {?> syncLogDetail extensionError <?php }?>" data-type="vt_delete" data-id="<?php echo $_smarty_tpl->tpl_vars['LOG']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['LOG']->value['vt_delete_count'];?>
 </a> </td>
                        <td> <a class="<?php if ($_smarty_tpl->tpl_vars['LOG']->value['vt_skip_count'] > 0) {?> syncLogDetail extensionError <?php }?>" data-type="vt_skip" data-id="<?php echo $_smarty_tpl->tpl_vars['LOG']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['LOG']->value['vt_skip_count'];?>
 </a></td>
                        <td> <a class="<?php if ($_smarty_tpl->tpl_vars['LOG']->value['app_create_count'] > 0) {?> syncLogDetail extensionLink <?php }?>" data-type="app_create" data-id="<?php echo $_smarty_tpl->tpl_vars['LOG']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['LOG']->value['app_create_count'];?>
 </a> </td>
                        <td> <a class="<?php if ($_smarty_tpl->tpl_vars['LOG']->value['app_update_count'] > 0) {?> syncLogDetail extensionLink <?php }?>" data-type="app_update" data-id="<?php echo $_smarty_tpl->tpl_vars['LOG']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['LOG']->value['app_update_count'];?>
 </a> </td>
                        <td> <a class="<?php if ($_smarty_tpl->tpl_vars['LOG']->value['app_delete_count'] > 0) {?> syncLogDetail extensionError  <?php }?>" data-type="app_delete" data-id="<?php echo $_smarty_tpl->tpl_vars['LOG']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['LOG']->value['app_delete_count'];?>
 </a> </td>
                        <td> <a class="<?php if ($_smarty_tpl->tpl_vars['LOG']->value['app_skip_count'] > 0) {?> syncLogDetail extensionError <?php }?>" data-type="app_skip" data-id="<?php echo $_smarty_tpl->tpl_vars['LOG']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['LOG']->value['app_skip_count'];?>
 </a></td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value == '0') {?>
                    <tr class="emptyRecordsDiv">
                        <?php $_smarty_tpl->_assignInScope('COLSPAN_WIDTH', 12);?>
                        <td colspan="<?php echo $_smarty_tpl->tpl_vars['COLSPAN_WIDTH']->value;?>
">
                            <div class="emptyRecordsContent">
                                <center> 
                                    <?php echo vtranslate('LBL_NO');?>
 <?php echo vtranslate('LBL_SYNC_LOG',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate('LBL_FOUND');?>
. 
                                    <?php if ($_smarty_tpl->tpl_vars['IS_SYNC_READY']->value) {?>
                                        <a href="#" class="syncNow"> <span class="blueColor"> <?php echo vtranslate('LBL_SYNC_NOW',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </span></a>
                                    <?php } else { ?>
                                        <a href="#" data-url="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getExtensionSettingsUrl($_smarty_tpl->tpl_vars['SOURCE_MODULE']->value);?>
" class="settingsPage"> <span class="blueColor"> <?php echo vtranslate('LBL_CONFIGURE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate('LBL_SYNC_SETTINGS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </span></a>
                                    <?php }?>
                                </center>
                            </div>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
    <div id="scroller_wrapper" class="bottom-fixed-scroll">
        <div id="scroller" class="scroller-div"></div>
    </div><?php }
}
