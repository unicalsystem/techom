<?php
/* Smarty version 4.3.4, created on 2024-04-25 13:40:15
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Settings/PickListDependency/ListViewHeader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_662a5d3fd88df0_59246230',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dfa22f3bc3384859bde0bc8fcfb54c1dfa05736c' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Settings/PickListDependency/ListViewHeader.tpl',
      1 => 1712062367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_662a5d3fd88df0_59246230 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="listViewPageDiv" id="listViewContent">
    <div class="col-sm-12 col-xs-12 ">
        <div id="listview-actions" class="listview-actions-container">
            <div class = "row">
                <div class='col-md-6'>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <span class="pull-right listViewActions" style="padding-right: 15px;">
                            <select class="select2 pickListSupportedModules" name="pickListSupportedModules" style="min-width: 220px;">
                                <option value=""><?php echo vtranslate('LBL_ALL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PICKLIST_MODULES_LIST']->value, 'MODULE_MODEL');
$_smarty_tpl->tpl_vars['MODULE_MODEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['MODULE_MODEL']->value) {
$_smarty_tpl->tpl_vars['MODULE_MODEL']->do_else = false;
?>
                                    <?php $_smarty_tpl->_assignInScope('MODULE_NAME', $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name'));?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value == $_smarty_tpl->tpl_vars['FOR_MODULE']->value) {?> selected <?php }?>>
                                        <?php if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('label') == 'Calendar') {?>
                                            <?php echo vtranslate('LBL_TASK',$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('label'));?>

                                        <?php } else { ?>
                                            <?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('label'));?>

                                        <?php }?>
                                    </option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </span>
                    </div>
                </div>
            </div>
            <br>
            <div class="list-content row"><?php }
}
