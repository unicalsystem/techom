<?php
/* Smarty version 4.3.4, created on 2024-04-02 09:17:40
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Settings/Workflows/Tasks/VTEntityMethodTask.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_660bcd34ce2e59_80021029',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd14ad939d467249cfdc3a8d6ec7820c45047ea80' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Settings/Workflows/Tasks/VTEntityMethodTask.tpl',
      1 => 1706189738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660bcd34ce2e59_80021029 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row form-group"><div class="col-sm-6 col-xs-6"><div class="row"><div class="col-sm-3 col-xs-3"><?php echo vtranslate('LBL_METHOD_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 :</div><div class="col-sm-8 col-xs-8"><?php $_smarty_tpl->_assignInScope('ENTITY_METHODS', $_smarty_tpl->tpl_vars['WORKFLOW_MODEL']->value->getEntityMethods());
if (empty($_smarty_tpl->tpl_vars['ENTITY_METHODS']->value)) {?><div class="alert alert-info"><?php echo vtranslate('LBL_NO_METHOD_IS_AVAILABLE_FOR_THIS_MODULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><?php } else { ?><select name="methodName" class="select2"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ENTITY_METHODS']->value, 'METHOD');
$_smarty_tpl->tpl_vars['METHOD']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['METHOD']->value) {
$_smarty_tpl->tpl_vars['METHOD']->do_else = false;
?><option <?php if ($_smarty_tpl->tpl_vars['TASK_OBJECT']->value->methodName == $_smarty_tpl->tpl_vars['METHOD']->value) {?>selected="" <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['METHOD']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['METHOD']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select><?php }?></div></div></div></div>	
<?php }
}