<?php
/* Smarty version 4.3.4, created on 2024-04-25 04:05:17
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Vtiger/ListViewQuickPreview.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6629d67dd21ee7_85802525',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a737a477f2ce9f53935dc96dfd38a73000b8be0' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Vtiger/ListViewQuickPreview.tpl',
      1 => 1712062367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6629d67dd21ee7_85802525 (Smarty_Internal_Template $_smarty_tpl) {
?><div class = "quickPreview">
    <input type="hidden" name="sourceModuleName" id="sourceModuleName" value="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
" />
    <input type="hidden" id = "nextRecordId" value ="<?php echo $_smarty_tpl->tpl_vars['NEXT_RECORD_ID']->value;?>
">
    <input type="hidden" id = "previousRecordId" value ="<?php echo $_smarty_tpl->tpl_vars['PREVIOUS_RECORD_ID']->value;?>
">

    <div class='quick-preview-modal modal-content'>
        <div class='modal-body'>
            <div class = "quickPreviewModuleHeader row">
                <div class = "col-lg-10">
                    <div class="row qp-heading">
                        <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("ListViewQuickPreviewHeaderTitle.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('MODULE_MODEL'=>$_smarty_tpl->tpl_vars['MODULE_MODEL']->value,'RECORD'=>$_smarty_tpl->tpl_vars['RECORD']->value), 0, true);
?>
                    </div>
                </div>
                <div class = "col-lg-2 pull-right">
                    <button class="close" aria-hidden="true" data-dismiss="modal" type="button" title="<?php echo vtranslate('LBL_CLOSE');?>
">x</button>
                </div>
            </div>

            <div class="quickPreviewActions clearfix">
                <div class="btn-group pull-left">
                    <button class="btn btn-success btn-xs" onclick="window.location.href = '<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getFullDetailViewUrl();?>
&app=<?php echo $_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value;?>
'">
                       <?php echo vtranslate('LBL_VIEW_DETAILS',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
 
                    </button>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['NAVIGATION']->value) {?>
                    <div class="btn-group pull-right">
                        <button class="btn btn-default btn-xs" id="quickPreviewPreviousRecordButton" data-record="<?php echo $_smarty_tpl->tpl_vars['PREVIOUS_RECORD_ID']->value;?>
" data-app="<?php echo $_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value;?>
" <?php if (empty($_smarty_tpl->tpl_vars['PREVIOUS_RECORD_ID']->value)) {?> disabled="disabled" <?php }?> >
                            <i class="fa fa-chevron-left"></i>
                        </button>
                        <button class="btn btn-default btn-xs" id="quickPreviewNextRecordButton" data-record="<?php echo $_smarty_tpl->tpl_vars['NEXT_RECORD_ID']->value;?>
" data-app="<?php echo $_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value;?>
" <?php if (empty($_smarty_tpl->tpl_vars['NEXT_RECORD_ID']->value)) {?> disabled="disabled" <?php }?>>
                            <i class="fa fa-chevron-right"></i>
                        </button>
                    </div>
                <?php }?>

            </div>
            <div class = "quickPreviewSummary">
                <table class="summary-table no-border" style="width:100%;">
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SUMMARY_RECORD_STRUCTURE']->value['SUMMARY_FIELDS'], 'FIELD_MODEL', false, 'FIELD_NAME');
$_smarty_tpl->tpl_vars['FIELD_MODEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_NAME']->value => $_smarty_tpl->tpl_vars['FIELD_MODEL']->value) {
$_smarty_tpl->tpl_vars['FIELD_MODEL']->do_else = false;
?>
                            <?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('name') != 'modifiedtime' && $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('name') != 'createdtime') {?>
                                <tr class="summaryViewEntries">
                                    <td class="fieldLabel col-lg-5" ><label class="muted"><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</label></td>
                                    <td class="fieldValue col-lg-7">
                                        <div class="row">
                                            <span class="value textOverflowEllipsis" <?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') == '19' || $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') == '20' || $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') == '21') {?>style="word-wrap: break-word;"<?php }?>>
                                                <?php $_smarty_tpl->_subTemplateRender(vtemplate_path($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getUITypeModel()->getDetailViewTemplateName(),$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('FIELD_MODEL'=>$_smarty_tpl->tpl_vars['FIELD_MODEL']->value,'USER_MODEL'=>$_smarty_tpl->tpl_vars['USER_MODEL']->value,'MODULE'=>$_smarty_tpl->tpl_vars['MODULE_NAME']->value,'RECORD'=>$_smarty_tpl->tpl_vars['RECORD']->value), 0, true);
?>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            <?php }?>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>

            <div class="engagementsContainer">
				<?php ob_start();
echo vtranslate('LBL_UPDATES',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(vtemplate_path("ListViewQuickPreviewSectionHeader.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('TITLE'=>$_prefixVariable1), 0, true);
?>
				<?php $_smarty_tpl->_subTemplateRender(vtemplate_path("RecentActivities.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            </div>

            <br>
            <?php if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isCommentEnabled()) {?>
                <div class="quickPreviewComments">
                    <?php ob_start();
echo vtranslate('LBL_RECENT_COMMENTS',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_subTemplateRender(vtemplate_path("ListViewQuickPreviewSectionHeader.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('TITLE'=>$_prefixVariable2), 0, true);
?>
                    <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("QuickViewCommentsList.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                </div>
            <?php }?>
        </div>
    </div>
</div>

<?php }
}
