<?php
/* Smarty version 4.3.4, created on 2024-04-04 07:30:06
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Settings/MailConverter/EditHeader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_660e56fe5fc9d2_35357282',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8056f52aa9e7cc2096626827db595e6e593281bc' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Settings/MailConverter/EditHeader.tpl',
      1 => 1712062368,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660e56fe5fc9d2_35357282 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="editViewPageDiv mailBoxEditDiv viewContent"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><input type="hidden" id="create" value="<?php echo $_smarty_tpl->tpl_vars['CREATE']->value;?>
" /><input type="hidden" id="recordId" value="<?php echo $_smarty_tpl->tpl_vars['RECORD_ID']->value;?>
" /><input type="hidden" id="step" value="<?php echo $_smarty_tpl->tpl_vars['STEP']->value;?>
" /><h4><?php if ($_smarty_tpl->tpl_vars['CREATE']->value == 'new') {
echo vtranslate('LBL_ADDING_NEW_MAILBOX',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
} else {
echo vtranslate('LBL_EDIT_MAILBOX',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
}?></h4><hr><div class="editViewContainer" style="padding-left: 2%;padding-right: 2%"><div class="row"><?php $_smarty_tpl->_assignInScope('BREADCRUMB_LABELS', array("step1"=>"MAILBOX_DETAILS","step2"=>"SELECT_FOLDERS"));
if ($_smarty_tpl->tpl_vars['CREATE']->value == 'new') {
$_tmp_array = isset($_smarty_tpl->tpl_vars['BREADCRUMB_LABELS']) ? $_smarty_tpl->tpl_vars['BREADCRUMB_LABELS']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array['step3'] = 'ADD_RULES';
$_smarty_tpl->_assignInScope('BREADCRUMB_LABELS', $_tmp_array);
}
$_smarty_tpl->_subTemplateRender(vtemplate_path("BreadCrumbs.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('BREADCRUMB_LABELS'=>$_smarty_tpl->tpl_vars['BREADCRUMB_LABELS']->value,'MODULE'=>$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), 0, true);
?></div><div class="clearfix"></div><?php }
}
