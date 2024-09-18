<?php
/* Smarty version 4.3.4, created on 2024-04-01 10:13:10
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Import/ImportResult.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_660a88b615ecb5_64664529',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'db42f4d263726c5c43216b974dced353c3dec4db' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Import/ImportResult.tpl',
      1 => 1711370906,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660a88b615ecb5_64664529 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class='fc-overlay-modal modal-content'>
    <div class="overlayHeader">
        <?php ob_start();
echo vtranslate('LBL_IMPORT_SUMMARY',$_smarty_tpl->tpl_vars['MODULE']->value);
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_assignInScope('TITLE', $_prefixVariable1);?>
        <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('TITLE'=>$_smarty_tpl->tpl_vars['TITLE']->value), 0, true);
?>
    </div>
    <div class='modal-body' style="margin-bottom:100%">
        <div class="summaryWidgetContainer">
            <input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['FOR_MODULE']->value;?>
" />
            <h4><?php echo vtranslate('LBL_TOTAL_RECORDS_SCANNED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['IMPORT_RESULT']->value['TOTAL'];?>
</h4>
            <?php if ($_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value != '') {?><span><?php echo $_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value;?>
</span><?php }?>
            <hr>
            <div><?php $_smarty_tpl->_subTemplateRender(vtemplate_path("Import_Result_Details.tpl",'Import'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></div>
        </div>
    </div>
    <div class='modal-overlay-footer border1px clearfix'>
       <div class="row clearfix">
            <div class='textAlignCenter col-lg-12 col-md-12 col-sm-12 '>
                <button name="next" class="btn btn-primary btn-lg"
                        onclick="return Vtiger_Import_Js.triggerImportAction();"><?php echo vtranslate('LBL_IMPORT_MORE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>
                &nbsp;&nbsp;&nbsp;
                <?php if ($_smarty_tpl->tpl_vars['MERGE_ENABLED']->value == '0') {?>
                    <button name="next" class="btn btn-danger btn-lg"
                            onclick="Vtiger_Import_Js.undoImport('index.php?module=<?php echo $_smarty_tpl->tpl_vars['FOR_MODULE']->value;?>
&view=Import&mode=undoImport&foruser=<?php echo $_smarty_tpl->tpl_vars['OWNER_ID']->value;?>
')"><?php echo vtranslate('LBL_UNDO_LAST_IMPORT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>
                    &nbsp;&nbsp;&nbsp;
                <?php }?>
                <button class='btn btn-success btn-lg' data-dismiss="modal" onclick="Vtiger_Import_Js.loadListRecords();"><?php echo vtranslate('LBL_FINISH',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>
            </div>
        </div>
    </div>
</div>
<?php }
}
