<?php
/* Smarty version 4.3.4, created on 2024-08-23 11:37:06
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/layouts/v7/modules/Vtiger/partials/Menubar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66c87462717ad8_31395406',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3fb9c2211a894c1858add875bf2bf6fd8ff173d6' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/layouts/v7/modules/Vtiger/partials/Menubar.tpl',
      1 => 1724413015,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66c87462717ad8_31395406 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['MENU_STRUCTURE']->value) {
$_smarty_tpl->_assignInScope('topMenus', $_smarty_tpl->tpl_vars['MENU_STRUCTURE']->value->getTop());
$_smarty_tpl->_assignInScope('moreMenus', $_smarty_tpl->tpl_vars['MENU_STRUCTURE']->value->getMore());?>

<div id="modules-menu" class="modules-menu">
   <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SELECTED_CATEGORY_MENU_LIST']->value, 'moduleModel', false, 'moduleName');
$_smarty_tpl->tpl_vars['moduleModel']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['moduleName']->value => $_smarty_tpl->tpl_vars['moduleModel']->value) {
$_smarty_tpl->tpl_vars['moduleModel']->do_else = false;
?>
    <?php $_smarty_tpl->_assignInScope('translatedModuleLabel', vtranslate($_smarty_tpl->tpl_vars['moduleModel']->value->get('label'),$_smarty_tpl->tpl_vars['moduleName']->value));?>
    <ul title="<?php echo $_smarty_tpl->tpl_vars['translatedModuleLabel']->value;?>
" class="module-qtip">
        <li <?php if ($_smarty_tpl->tpl_vars['MODULE']->value == $_smarty_tpl->tpl_vars['moduleName']->value) {?>class="active"<?php } else { ?>class=""<?php }?>>
            <a href="<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getDefaultUrl();?>
&app=<?php echo $_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value;?>
">
                <?php if ($_smarty_tpl->tpl_vars['moduleName']->value == 'Potentials') {?>
                    <div class="potentials-icon-wrapper">
                        <img src="layouts/v7/resources/Images/icons/openings-white.png" class="potentials-icon" style="width: 26px; height: 26px;">
                        <div class="potentials-icon-overlay"></div>
                    </div>
                <?php } elseif ($_smarty_tpl->tpl_vars['moduleName']->value == 'Accounts') {?>
                    <img src="layouts/v7/resources/Images/icons/Clients-white.png" class="accounts-icon" style="width: 27px; height: 27px;">
                <?php } elseif ($_smarty_tpl->tpl_vars['moduleName']->value == 'Contacts') {?>
                    <img src="layouts/v7/resources/Images/icons/Contacts-white.png" class="contacts-icon" style="width: 26px; height: 26px;">
                <?php } elseif ($_smarty_tpl->tpl_vars['moduleName']->value == 'Leads') {?>
                    <img src="layouts/v7/resources/Images/icons/Profile-white.png" class="leads-icon" style="width: 26px; height: 26px;">
                <?php } elseif ($_smarty_tpl->tpl_vars['moduleName']->value == 'Broadcast') {?>
    <i class="fas fa-broadcast-tower" style="color: white;"></i>
<?php } else { ?>
                
                
                
                    <?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getModuleIcon();?>

                <?php }?>
                <span><?php echo $_smarty_tpl->tpl_vars['translatedModuleLabel']->value;?>
</span>
            </a>
        </li>
    </ul>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
<?php }?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<?php }
}
