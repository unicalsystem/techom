<?php
/* Smarty version 4.3.4, created on 2024-08-14 17:01:52
  from 'C:\xampp\htdocs\unical\layouts\v7\modules\Vtiger\dashboards\KeyMetricsContents.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66bce3008ca4b4_68357654',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3df5a1ce89bb66062d702317ec87cddce05cfcb5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\unical\\layouts\\v7\\modules\\Vtiger\\dashboards\\KeyMetricsContents.tpl',
      1 => 1723653972,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66bce3008ca4b4_68357654 (Smarty_Internal_Template $_smarty_tpl) {
?><div><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['KEYMETRICS']->value, 'KEYMETRIC');
$_smarty_tpl->tpl_vars['KEYMETRIC']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['KEYMETRIC']->value) {
$_smarty_tpl->tpl_vars['KEYMETRIC']->do_else = false;
?><div style="padding-bottom:6px;"><span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['KEYMETRIC']->value['count'];?>
</span><a href="?module=<?php echo $_smarty_tpl->tpl_vars['KEYMETRIC']->value['module'];?>
&view=List&viewname=<?php echo $_smarty_tpl->tpl_vars['KEYMETRIC']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['KEYMETRIC']->value['name'];?>
</a></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div>
<?php }
}
