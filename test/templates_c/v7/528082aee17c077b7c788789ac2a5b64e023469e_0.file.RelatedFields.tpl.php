<?php
/* Smarty version 4.3.4, created on 2024-04-25 05:54:31
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Reports/RelatedFields.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6629f017eb73e7_65016031',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '528082aee17c077b7c788789ac2a5b64e023469e' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Reports/RelatedFields.tpl',
      1 => 1712062367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6629f017eb73e7_65016031 (Smarty_Internal_Template $_smarty_tpl) {
?><span><div class="col-lg-6"><select class="select2 col-lg-11 selectedSortFields " name="selectstep2dropdown_<?php echo $_smarty_tpl->tpl_vars['ROW_VAL']->value;?>
"><option value="none"><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PRIMARY_MODULE_FIELDS']->value, 'PRIMARY_MODULE', false, 'PRIMARY_MODULE_NAME');
$_smarty_tpl->tpl_vars['PRIMARY_MODULE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['PRIMARY_MODULE_NAME']->value => $_smarty_tpl->tpl_vars['PRIMARY_MODULE']->value) {
$_smarty_tpl->tpl_vars['PRIMARY_MODULE']->do_else = false;
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PRIMARY_MODULE']->value, 'BLOCK', false, 'BLOCK_LABEL');
$_smarty_tpl->tpl_vars['BLOCK']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['BLOCK_LABEL']->value => $_smarty_tpl->tpl_vars['BLOCK']->value) {
$_smarty_tpl->tpl_vars['BLOCK']->do_else = false;
?><optgroup label='<?php echo vtranslate($_smarty_tpl->tpl_vars['PRIMARY_MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
-<?php echo vtranslate($_smarty_tpl->tpl_vars['BLOCK_LABEL']->value,$_smarty_tpl->tpl_vars['PRIMARY_MODULE_NAME']->value);?>
'><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BLOCK']->value, 'FIELD_LABEL', false, 'FIELD_KEY');
$_smarty_tpl->tpl_vars['FIELD_LABEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_KEY']->value => $_smarty_tpl->tpl_vars['FIELD_LABEL']->value) {
$_smarty_tpl->tpl_vars['FIELD_LABEL']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_KEY']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['FIELD_KEY']->value == $_smarty_tpl->tpl_vars['SELECTED_SORT_FIELD_KEY']->value) {?>selected=""<?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_LABEL']->value,$_smarty_tpl->tpl_vars['PRIMARY_MODULE_NAME']->value);?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></optgroup><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SECONDARY_MODULE_FIELDS']->value, 'SECONDARY_MODULE', false, 'SECONDARY_MODULE_NAME');
$_smarty_tpl->tpl_vars['SECONDARY_MODULE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value => $_smarty_tpl->tpl_vars['SECONDARY_MODULE']->value) {
$_smarty_tpl->tpl_vars['SECONDARY_MODULE']->do_else = false;
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SECONDARY_MODULE']->value, 'BLOCK', false, 'BLOCK_LABEL');
$_smarty_tpl->tpl_vars['BLOCK']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['BLOCK_LABEL']->value => $_smarty_tpl->tpl_vars['BLOCK']->value) {
$_smarty_tpl->tpl_vars['BLOCK']->do_else = false;
?><optgroup label='<?php echo vtranslate($_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
-<?php echo vtranslate($_smarty_tpl->tpl_vars['BLOCK_LABEL']->value,$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
'><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BLOCK']->value, 'FIELD_LABEL', false, 'FIELD_KEY');
$_smarty_tpl->tpl_vars['FIELD_LABEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_KEY']->value => $_smarty_tpl->tpl_vars['FIELD_LABEL']->value) {
$_smarty_tpl->tpl_vars['FIELD_LABEL']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_KEY']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['FIELD_KEY']->value == $_smarty_tpl->tpl_vars['SELECTED_SORT_FIELD_KEY']->value) {?>selected=""<?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_LABEL']->value,$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></optgroup><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></div></span><span class="col-lg-6"><div class="row"><span class="col-lg-6"><?php $_smarty_tpl->_assignInScope('ROW', ('row_').($_smarty_tpl->tpl_vars['ROW_VAL']->value));?><input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['ROW']->value;?>
" class="sortOrder" value="Ascending" <?php if ($_smarty_tpl->tpl_vars['SELECTED_SORT_FIELD_VALUE']->value == 'Ascending') {?> checked="" <?php }?> />&nbsp;<span><?php echo vtranslate('LBL_ASCENDING',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span>&nbsp;&nbsp;<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['ROW']->value;?>
" class="sortOrder" value="Descending" <?php if ($_smarty_tpl->tpl_vars['SELECTED_SORT_FIELD_VALUE']->value == 'Descending') {?> checked="" <?php }?>/>&nbsp;<span><?php echo vtranslate('LBL_DESCENDING',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span></span></div></span><?php }
}
