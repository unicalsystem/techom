<?php
/* Smarty version 4.3.4, created on 2024-08-24 15:40:19
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/layouts/v7/modules/Documents/partials/Menubar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66c9fee32faf15_59334940',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d6564ccdbb278b4dcb7ecb0b5b0bfe20190c481' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/layouts/v7/modules/Documents/partials/Menubar.tpl',
      1 => 1724413015,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66c9fee32faf15_59334940 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['REQ']->value->get('view') == 'Detail') {?>
<div id="modules-menu" class="modules-menu">    
    <ul>
        <li class="active">
            <a href="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getListViewUrl();?>
">
				<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getModuleIcon();?>

                <span><?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
</span>
            </a>
        </li>
    </ul>
</div>
<?php }
}
}
