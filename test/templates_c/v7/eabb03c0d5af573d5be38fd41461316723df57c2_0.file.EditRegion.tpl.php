<?php
/* Smarty version 4.3.4, created on 2024-08-01 08:51:15
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Settings/Vtiger/EditRegion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66ab4c83c58450_69136697',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eabb03c0d5af573d5be38fd41461316723df57c2' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Settings/Vtiger/EditRegion.tpl',
      1 => 1712062367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66ab4c83c58450_69136697 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('TAX_REGION_ID', $_smarty_tpl->tpl_vars['TAX_REGION_MODEL']->value->getId());?><div class="taxRegionContainer modal-dialog modal-xs"><div class="modal-content"><form id="editTaxRegion" class="form-horizontal"><?php if ($_smarty_tpl->tpl_vars['TAX_REGION_ID']->value) {
ob_start();
echo vtranslate('LBL_EDIT_REGION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
$_prefixVariable1 = ob_get_clean();
ob_start();
echo $_prefixVariable1;
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('TITLE', $_prefixVariable2);
} else {
ob_start();
echo vtranslate('LBL_ADD_NEW_REGION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
$_prefixVariable3 = ob_get_clean();
ob_start();
echo $_prefixVariable3;
$_prefixVariable4 = ob_get_clean();
$_smarty_tpl->_assignInScope('TITLE', $_prefixVariable4);
}
$_smarty_tpl->_subTemplateRender(vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('TITLE'=>$_smarty_tpl->tpl_vars['TITLE']->value), 0, true);
?><input type="hidden" name="taxRegionId" value="<?php echo $_smarty_tpl->tpl_vars['TAX_REGION_ID']->value;?>
" /><div class="modal-body"><div class="row"><div class="nameBlock"><div class="col-lg-1"></div><div class="col-lg-3"><label class="pull-right"><?php echo vtranslate('LBL_REGION_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></div><div class="col-lg-5"><input class="inputElement" type="text" name="name" placeholder="<?php echo vtranslate('LBL_ENTER_REGION_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" value="<?php echo $_smarty_tpl->tpl_vars['TAX_REGION_MODEL']->value->getName();?>
" data-rule-required="true" /></div><div class="col-lg-3"></div></div></div></div><?php $_smarty_tpl->_subTemplateRender(vtemplate_path('ModalFooter.tpl','Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></form></div></div><?php }
}
