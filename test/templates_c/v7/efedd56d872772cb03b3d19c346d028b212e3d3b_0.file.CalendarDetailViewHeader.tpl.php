<?php
/* Smarty version 4.3.4, created on 2024-08-27 11:33:21
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/layouts/v7/modules/Users/CalendarDetailViewHeader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66cdb981ac2e90_81619272',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'efedd56d872772cb03b3d19c346d028b212e3d3b' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/layouts/v7/modules/Users/CalendarDetailViewHeader.tpl',
      1 => 1724413015,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66cdb981ac2e90_81619272 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('MODULE_NAME', $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name'));?><input id="recordId" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getId();?>
" /><div class="detailViewContainer"><div class="detailViewTitle" id="prefPageHeader"></div><div class="detailViewInfo userPreferences row-fluid"><div class="details col-xs-12"><?php }
}
