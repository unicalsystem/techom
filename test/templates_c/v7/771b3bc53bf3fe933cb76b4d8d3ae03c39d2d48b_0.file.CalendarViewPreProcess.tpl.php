<?php
/* Smarty version 4.3.4, created on 2024-04-04 11:11:41
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Calendar/CalendarViewPreProcess.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_660e8aed7e6fd5_40911204',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '771b3bc53bf3fe933cb76b4d8d3ae03c39d2d48b' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Calendar/CalendarViewPreProcess.tpl',
      1 => 1712062367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:modules/Vtiger/partials/Topbar.tpl' => 1,
    'file:modules/Calendar/partials/SidebarHeader.tpl' => 1,
    'file:modules/Calendar/partials/Sidebar.tpl' => 1,
  ),
),false)) {
function content_660e8aed7e6fd5_40911204 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:modules/Vtiger/partials/Topbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="container-fluid app-nav"><div class="row"><?php $_smarty_tpl->_subTemplateRender("file:modules/Calendar/partials/SidebarHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender(vtemplate_path("CalendarHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></div></div></nav><div id='overlayPageContent' class='fade modal overlayPageContent content-area overlay-container-60' tabindex='-1' role='dialog' aria-hidden='true'><div class="data"></div><div class="modal-dialog"></div></div><div class="main-container"><?php $_smarty_tpl->_assignInScope('LEFTPANELHIDE', $_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('leftpanelhide'));?><div id="modnavigator" class="module-nav calendar-navigator clearfix"><div class="hidden-xs hidden-sm mod-switcher-container"><?php $_smarty_tpl->_subTemplateRender("file:modules/Calendar/partials/Sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?></div></div><div id="sidebar-essentials" class="sidebar-essentials <?php if ($_smarty_tpl->tpl_vars['LEFTPANELHIDE']->value == '1') {?> hide <?php }?>"><?php $_smarty_tpl->_subTemplateRender(vtemplate_path("partials/SidebarEssentials.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></div><div class="CalendarViewPageDiv content-area <?php if ($_smarty_tpl->tpl_vars['LEFTPANELHIDE']->value == '1') {?> full-width <?php }?>" id="CalendarViewContent">
<?php }
}
