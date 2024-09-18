<?php
/* Smarty version 4.3.4, created on 2024-03-26 10:56:33
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Rss/RssWidgetContents.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6602a9e1d7fee5_39945708',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'edfdccd869f0b7b9b2a2b8b0ffee1f6262930f2b' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Rss/RssWidgetContents.tpl',
      1 => 1706189738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6602a9e1d7fee5_39945708 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="sidebar-menu quickWidgetContainer">
    <?php $_smarty_tpl->_assignInScope('val', 1);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['QUICK_LINKS']->value['SIDEBARWIDGET'], 'SIDEBARWIDGET', false, 'index');
$_smarty_tpl->tpl_vars['SIDEBARWIDGET']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['SIDEBARWIDGET']->value) {
$_smarty_tpl->tpl_vars['SIDEBARWIDGET']->do_else = false;
?>
    <div class="module-filters">    
        <div class="sidebar-container lists-menu-container">
            <div class="sidebar-header clearfix">
                <h5 class="pull-left"><?php echo vtranslate($_smarty_tpl->tpl_vars['SIDEBARWIDGET']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h5>
                <button class="btn btn-default pull-right sidebar-btn rssAddButton" title="<?php echo vtranslate('LBL_FEED_SOURCE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
            </div>
            <hr>
            <div class="menu-scroller mCustomScrollBox" data-mcs-theme="dark">
                <div class="mCustomScrollBox mCS-light-2 mCSB_inside" tabindex="0">
                    <div class="mCSB_container" style="position:relative; top:0; left:0;">
                        <div class="list-menu-content">
                            <ul class="lists-menu widgetContainer" data-url="<?php echo $_smarty_tpl->tpl_vars['SIDEBARWIDGET']->value->getUrl();?>
">
                                <?php $_smarty_tpl->_assignInScope('RSS_MODULE_MODEL', Vtiger_Module_Model::getInstance($_smarty_tpl->tpl_vars['MODULE']->value));?>
                                <?php $_smarty_tpl->_assignInScope('RSS_SOURCES', $_smarty_tpl->tpl_vars['RSS_MODULE_MODEL']->value->getRssSources());?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RSS_SOURCES']->value, 'recordsModel');
$_smarty_tpl->tpl_vars['recordsModel']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['recordsModel']->value) {
$_smarty_tpl->tpl_vars['recordsModel']->do_else = false;
?>
                                    <li>
                                        <a href="#" class="rssLink filter-name" data-id=<?php echo $_smarty_tpl->tpl_vars['recordsModel']->value->getId();?>
 data-url="<?php echo $_smarty_tpl->tpl_vars['recordsModel']->value->get('rssurl');?>
" title="<?php echo decode_html($_smarty_tpl->tpl_vars['recordsModel']->value->getName());?>
"><?php echo decode_html($_smarty_tpl->tpl_vars['recordsModel']->value->getName());?>
</a>
                                    </li>
                                    <?php
}
if ($_smarty_tpl->tpl_vars['recordsModel']->do_else) {
?>
                                        <li class="noRssFeeds" style="text-align:center"><?php echo vtranslate('LBL_NO_RECORDS',$_smarty_tpl->tpl_vars['MODULE']->value);?>

                                        </li>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                             </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
</div>

<?php }
}