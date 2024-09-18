<?php
/* Smarty version 4.3.4, created on 2024-08-28 11:01:03
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/layouts/v7/modules/Vtiger/PopupNavigation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66cf036f2d0461_35024793',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '679a0eb4e2a7af6cf88bf6013f4635972a04762b' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/layouts/v7/modules/Vtiger/PopupNavigation.tpl',
      1 => 1724413015,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66cf036f2d0461_35024793 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-md-2"><?php if ($_smarty_tpl->tpl_vars['MULTI_SELECT']->value) {
if (!empty($_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES']->value)) {?><button class="select btn btn-default" disabled="disabled"><strong><?php echo vtranslate('LBL_ADD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button><?php }
} else { ?>&nbsp;<?php }?></div><div class="col-md-10"><?php $_smarty_tpl->_assignInScope('RECORD_COUNT', $_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value);
$_smarty_tpl->_subTemplateRender(vtemplate_path("Pagination.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('SHOWPAGEJUMP'=>true), 0, true);
?></div><?php }
}
