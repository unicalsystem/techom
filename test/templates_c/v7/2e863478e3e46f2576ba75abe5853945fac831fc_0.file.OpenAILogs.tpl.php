<?php
/* Smarty version 4.3.4, created on 2024-08-29 05:01:43
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/layouts/v7/modules/Settings/GPTIntegration/OpenAILogs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66d000b7e50fc3_67826381',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2e863478e3e46f2576ba75abe5853945fac831fc' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/layouts/v7/modules/Settings/GPTIntegration/OpenAILogs.tpl',
      1 => 1724413015,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66d000b7e50fc3_67826381 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row"><div class="col-lg-12" id="gptintegrationlogscontainer"><div class="contents table-container" id="detailView"><table class="table listview-table" id="listview-table"><thead><tr><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AILOGS_HEADERS']->value, 'HEADERNAME');
$_smarty_tpl->tpl_vars['HEADERNAME']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['HEADERNAME']->value) {
$_smarty_tpl->tpl_vars['HEADERNAME']->do_else = false;
?><th><?php echo vtranslate($_smarty_tpl->tpl_vars['HEADERNAME']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></tr></thead><tbody><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AILOGS']->value, 'LOGDATA', false, 'LOG_ID');
$_smarty_tpl->tpl_vars['LOGDATA']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['LOG_ID']->value => $_smarty_tpl->tpl_vars['LOGDATA']->value) {
$_smarty_tpl->tpl_vars['LOGDATA']->do_else = false;
?><tr class="listViewEntries" data-cfmid="<?php echo $_smarty_tpl->tpl_vars['LOG_ID']->value;?>
"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AILOGS_HEADERS']->value, 'HEADERNAME');
$_smarty_tpl->tpl_vars['HEADERNAME']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['HEADERNAME']->value) {
$_smarty_tpl->tpl_vars['HEADERNAME']->do_else = false;
?><td><?php echo $_smarty_tpl->tpl_vars['LOGDATA']->value[$_smarty_tpl->tpl_vars['HEADERNAME']->value];?>
</td><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></tr><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></tbody></table></div></div><div id="scroller_wrapper" class="bottom-fixed-scroll"><div id="scroller" class="scroller-div"></div></div></div><?php }
}
