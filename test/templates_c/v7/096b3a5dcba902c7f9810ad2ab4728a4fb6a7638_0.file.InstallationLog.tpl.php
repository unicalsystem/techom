<?php
/* Smarty version 4.3.4, created on 2024-04-02 05:13:59
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Settings/ExtensionStore/InstallationLog.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_660b94175d1958_33084586',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '096b3a5dcba902c7f9810ad2ab4728a4fb6a7638' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Settings/ExtensionStore/InstallationLog.tpl',
      1 => 1706189738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660b94175d1958_33084586 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="modal-dialog modal-lg installationLog"><div class='modal-content'><div class="modal-header" style="background: #596875;color:white;"><div class="row"><div class="col-lg-11 col-md-11"><?php if ($_smarty_tpl->tpl_vars['ERROR']->value) {?><input type="hidden" name="installationStatus" value="error" /><h3 class="modal-title" style="color: red"><?php echo vtranslate('LBL_INSTALLATION_FAILED',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3><?php } else { ?><input type="hidden" name="installationStatus" value="success" /><h3 class="modal-title"><?php echo vtranslate('LBL_SUCCESSFULL_INSTALLATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3><?php }?></div><div class="col-lg-1 col-md-1"><button class="close" aria-hidden="true" data-dismiss="modal" type="button" title="<?php echo vtranslate('LBL_CLOSE');?>
">X</button></div></div></div><div class="modal-body" id="installationLog"><?php if ($_smarty_tpl->tpl_vars['ERROR']->value) {?><p style="color:red;"><?php echo vtranslate($_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</p><?php } else { ?><div class="row"><span class="col-sm-12 col-xs-12 font-x-x-large"><?php echo vtranslate('LBL_INSTALLATION_LOG',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span></div><div id="extensionInstallationInfo" class="backgroundImageNone" style="background-color: white;padding: 2%;"><?php if ($_smarty_tpl->tpl_vars['MODULE_ACTION']->value == "Upgrade") {
echo $_smarty_tpl->tpl_vars['MODULE_PACKAGE']->value->update($_smarty_tpl->tpl_vars['TARGET_MODULE_INSTANCE']->value,$_smarty_tpl->tpl_vars['MODULE_FILE_NAME']->value);
} else {
echo $_smarty_tpl->tpl_vars['MODULE_PACKAGE']->value->import($_smarty_tpl->tpl_vars['MODULE_FILE_NAME']->value,'false');
}
ob_start();
echo unlink($_smarty_tpl->tpl_vars['MODULE_FILE_NAME']->value);
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('UNLINK_RESULT', $_prefixVariable1);?></div><?php }?></div><div class="modal-footer"><span class="pull-right"><button class="btn btn-success" id="importCompleted" onclick="location.reload()"><?php echo vtranslate('LBL_OK',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button></span></div></div></div><?php }
}
