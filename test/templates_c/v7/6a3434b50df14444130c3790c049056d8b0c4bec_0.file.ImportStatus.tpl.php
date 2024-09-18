<?php
/* Smarty version 4.3.4, created on 2024-05-01 11:45:56
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Import/ImportStatus.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66322b74993ca8_03608063',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a3434b50df14444130c3790c049056d8b0c4bec' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Import/ImportStatus.tpl',
      1 => 1712062367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66322b74993ca8_03608063 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class='fc-overlay-modal' id="scheduleImportStatus">
    <div class = "modal-content">
        <div class="overlayHeader">
            <?php ob_start();
echo vtranslate('LBL_IMPORT',$_smarty_tpl->tpl_vars['MODULE']->value);
$_prefixVariable1=ob_get_clean();
ob_start();
echo vtranslate($_smarty_tpl->tpl_vars['FOR_MODULE']->value,$_smarty_tpl->tpl_vars['FOR_MODULE']->value);
$_prefixVariable2=ob_get_clean();
ob_start();
echo vtranslate('LBL_RUNNING',$_smarty_tpl->tpl_vars['MODULE']->value);
$_prefixVariable3=ob_get_clean();
$_smarty_tpl->_assignInScope('TITLE', $_prefixVariable1." ".$_prefixVariable2." -
                    <span style = 'color:red'>".$_prefixVariable3." ... </span>");?>
			<?php $_smarty_tpl->_subTemplateRender(vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('TITLE'=>$_smarty_tpl->tpl_vars['TITLE']->value), 0, true);
?>
			</div>
        <div class='modal-body' id = "importStatusDiv" style="margin-bottom:100%">
            <hr>
                <form onsubmit="VtigerJS_DialogBox.block();" action="index.php" enctype="multipart/form-data" method="POST" name="importStatusForm" id = "importStatusForm">
                    <input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['FOR_MODULE']->value;?>
" />
                    <input type="hidden" name="view" value="Import" />
                    <?php if ($_smarty_tpl->tpl_vars['CONTINUE_IMPORT']->value == 'true') {?>
                        <input type="hidden" name="mode" value="continueImport" />
                    <?php } else { ?>
                        <input type="hidden" name="mode" value="" />
                    <?php }?>
                </form>
                <?php if ($_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value != '') {?>
                    <div class = "alert alert-danger">
                        <?php echo $_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value;?>

                    </div>
                <?php }?>
                <div class = "col-lg-12 col-md-12 col-sm-12">
                    <div class = "col-lg-3 col-md-4 col-sm-6">
                        <span><?php echo vtranslate('LBL_TOTAL_RECORDS_IMPORTED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span> 
                    </div>
                    <div class ="col-lg-1 col-md-1 col-sm-1"><span>:</span> </div>
                    <div class = "col-lg-2 col-md-3 col-sm-4"><span><strong><?php echo $_smarty_tpl->tpl_vars['IMPORT_RESULT']->value['IMPORTED'];?>
 / <?php echo $_smarty_tpl->tpl_vars['IMPORT_RESULT']->value['TOTAL'];?>
</strong></span></div> 
                </div>
                <div class = "col-lg-12 col-md-12 col-sm-12">
                    <div class = "col-lg-3 col-md-4 col-sm-6">
                        <span><?php echo vtranslate('LBL_NUMBER_OF_RECORDS_CREATED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span> 
                    </div>
                    <div class ="col-lg-1 col-md-1 col-sm-1"><span>:</span> </div>
                    <div class = "col-lg-2 col-md-3 col-sm-4"><span><strong><?php echo $_smarty_tpl->tpl_vars['IMPORT_RESULT']->value['CREATED'];?>
</strong></span></div> 
                </div>
                <div class = "col-lg-12 col-md-12">
                    <div class = "col-lg-3 col-md-3">
                        <span><?php echo vtranslate('LBL_NUMBER_OF_RECORDS_UPDATED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span> 
                    </div>
                    <div class ="col-lg-1 col-md-1"><span>:</span> </div>
                    <div class = "col-lg-2 col-md-2"><span><strong><?php echo $_smarty_tpl->tpl_vars['IMPORT_RESULT']->value['UPDATED'];?>
</strong></span></div> 
                </div>
                <div class = "col-lg-12 col-md-12">
                    <div class = "col-lg-3 col-md-3">
                        <span><?php echo vtranslate('LBL_NUMBER_OF_RECORDS_SKIPPED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span> 
                    </div>
                    <div class ="col-lg-1 col-md-1"><span>:</span> </div>
                    <div class = "col-lg-2 col-md-2"><span><strong><?php echo $_smarty_tpl->tpl_vars['IMPORT_RESULT']->value['SKIPPED'];?>
</strong></span></div> 
                </div>
                <div class = "col-lg-12 col-md-12">
                    <div class = "col-lg-3 col-md-3">
                        <span><?php echo vtranslate('LBL_NUMBER_OF_RECORDS_MERGED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span> 
                    </div>
                    <div class ="col-lg-1 col-md-1"><span>:</span> </div>
                    <div class = "col-lg-2 col-md-2"><span><strong><?php echo $_smarty_tpl->tpl_vars['IMPORT_RESULT']->value['MERGED'];?>
</strong></span></div> 
                </div>
        </div>
        <div class='modal-overlay-footer border1px clearfix'>
            <div class="row clearfix">
                <div class='textAlignCenter col-lg-12 col-md-12 col-sm-12 '>
                    <button name="cancel" class="btn btn-danger btn-lg"
                            onclick="return Vtiger_Import_Js.cancelImport('index.php?module=<?php echo $_smarty_tpl->tpl_vars['FOR_MODULE']->value;?>
&view=Import&mode=cancelImport&import_id=<?php echo $_smarty_tpl->tpl_vars['IMPORT_ID']->value;?>
')"><?php echo vtranslate('LBL_CANCEL_IMPORT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
}
