<?php
/* Smarty version 4.3.4, created on 2024-04-02 13:22:04
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Users/uitypes/BooleanFieldSearchView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_660c067c802064_04655984',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93f3a52dccb9af68e87e38fe883f5895c074edc1' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Users/uitypes/BooleanFieldSearchView.tpl',
      1 => 1712062368,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660c067c802064_04655984 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('FIELD_INFO', Zend_Json::encode($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldInfo()));
$_smarty_tpl->_assignInScope('SEARCH_VALUES', $_smarty_tpl->tpl_vars['SEARCH_INFO']->value['searchValue']);
$_smarty_tpl->_assignInScope('CHECKED_VALUE', "1");
$_smarty_tpl->_assignInScope('UNCHECKED_VALUE', "0");
if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('name') == 'is_admin') {
$_smarty_tpl->_assignInScope('CHECKED_VALUE', "on");
$_smarty_tpl->_assignInScope('UNCHECKED_VALUE', "off");
} elseif ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('name') == 'is_owner') {
$_smarty_tpl->_assignInScope('UNCHECKED_VALUE', ' ');
}?><div class=""><select class="select2 listSearchContributor" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('name');?>
" style="width:90px;" data-fieldinfo='<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['FIELD_INFO']->value, ENT_QUOTES, 'UTF-8', true);?>
'><option value=""><?php echo vtranslate('LBL_SELECT_OPTION','Vtiger');?>
</option><option value="<?php echo $_smarty_tpl->tpl_vars['CHECKED_VALUE']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['SEARCH_VALUES']->value == $_smarty_tpl->tpl_vars['CHECKED_VALUE']->value) {?> selected<?php }?>><?php echo vtranslate('LBL_YES',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><option value="<?php echo $_smarty_tpl->tpl_vars['UNCHECKED_VALUE']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['SEARCH_VALUES']->value == $_smarty_tpl->tpl_vars['UNCHECKED_VALUE']->value) {?> selected<?php }?>><?php echo vtranslate('LBL_NO',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option></select></div><?php }
}
