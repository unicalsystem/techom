<?php
/* Smarty version 4.3.4, created on 2024-04-04 11:11:41
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Calendar/partials/SidebarEssentials.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_660e8aed82e1a9_52394176',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02d7d4f55c1da25c20ff7ae481dd1ab3f0323cb3' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Calendar/partials/SidebarEssentials.tpl',
      1 => 1712062367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660e8aed82e1a9_52394176 (Smarty_Internal_Template $_smarty_tpl) {
if ($_GET['view'] == 'Calendar' || $_GET['view'] == 'SharedCalendar') {?>
<div class="sidebar-menu">
    <div class="module-filters" id="module-filters">
        <div class="sidebar-container lists-menu-container">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['QUICK_LINKS']->value['SIDEBARWIDGET'], 'SIDEBARWIDGET');
$_smarty_tpl->tpl_vars['SIDEBARWIDGET']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['SIDEBARWIDGET']->value) {
$_smarty_tpl->tpl_vars['SIDEBARWIDGET']->do_else = false;
?>
            <?php if ($_smarty_tpl->tpl_vars['SIDEBARWIDGET']->value->get('linklabel') == 'LBL_ACTIVITY_TYPES' || $_smarty_tpl->tpl_vars['SIDEBARWIDGET']->value->get('linklabel') == 'LBL_ADDED_CALENDARS') {?>
            <div class="calendar-sidebar-tabs sidebar-widget" id="<?php echo $_smarty_tpl->tpl_vars['SIDEBARWIDGET']->value->get('linklabel');?>
-accordion" role="tablist" aria-multiselectable="true" data-widget-name="<?php echo $_smarty_tpl->tpl_vars['SIDEBARWIDGET']->value->get('linklabel');?>
">
                <div class="calendar-sidebar-tab">
                    <div class="sidebar-widget-header" role="tab" data-url="<?php echo $_smarty_tpl->tpl_vars['SIDEBARWIDGET']->value->getUrl();?>
">
                        <div class="sidebar-header clearfix">
                                                        <h5 class="pull-left"><?php echo vtranslate($_smarty_tpl->tpl_vars['SIDEBARWIDGET']->value->get('linklabel'),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h5>
                            <button class="btn btn-default pull-right sidebar-btn add-calendar-feed">
                                <div class="fa fa-plus" aria-hidden="true"></div>
                            </button> 
                        </div>
                    </div>
                    <hr style="margin: 5px 0;">
                    <div class="list-menu-content">
                        <div id="<?php echo $_smarty_tpl->tpl_vars['SIDEBARWIDGET']->value->get('linklabel');?>
" class="sidebar-widget-body activitytypes">
                            <div style="text-align:center;"><img src="layouts/v7/skins/images/loading.gif"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>    
        </div>
    </div>
</div>
<?php } else { ?>
    <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("partials/SidebarEssentials.tpl",'Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
}
