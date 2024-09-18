<?php
/* Smarty version 4.3.4, created on 2024-04-02 13:24:42
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Vtiger/uitypes/CurrencyList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_660c071aefe872_07988150',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e66d092f78f4ecde26af8bd0af789581aece98c' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Vtiger/uitypes/CurrencyList.tpl',
      1 => 1712062367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660c071aefe872_07988150 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('CURRENCY_LIST', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getCurrencyList());?><select class="select2 inputElement" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldName();?>
"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CURRENCY_LIST']->value, 'CURRENCY_NAME', false, 'CURRENCY_ID');
$_smarty_tpl->tpl_vars['CURRENCY_NAME']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['CURRENCY_ID']->value => $_smarty_tpl->tpl_vars['CURRENCY_NAME']->value) {
$_smarty_tpl->tpl_vars['CURRENCY_NAME']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['CURRENCY_ID']->value;?>
" data-picklistvalue= '<?php echo $_smarty_tpl->tpl_vars['CURRENCY_ID']->value;?>
' <?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue') == $_smarty_tpl->tpl_vars['CURRENCY_ID']->value) {?> selected <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['CURRENCY_NAME']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select><?php }
}
