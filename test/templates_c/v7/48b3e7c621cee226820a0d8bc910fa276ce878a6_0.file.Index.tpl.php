<?php
/* Smarty version 4.3.4, created on 2024-04-02 14:56:59
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Settings/SharingAccess/Index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_660c1cbb438497_20757838',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '48b3e7c621cee226820a0d8bc910fa276ce878a6' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Settings/SharingAccess/Index.tpl',
      1 => 1712062367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660c1cbb438497_20757838 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="listViewPageDiv " id="sharingAccessContainer"><div class="col-sm-12 col-xs-12"><form name="EditSharingAccess" action="index.php" method="post" class="form-horizontal" id="EditSharingAccess"><input type="hidden" name="module" value="SharingAccess" /><input type="hidden" name="action" value="SaveAjax" /><input type="hidden" name="parent" value="Settings" /><input type="hidden" class="dependentModules" value='<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['DEPENDENT_MODULES']->value);?>
' /><br><div class="contents"><table class="table table-bordered table-condensed sharingAccessDetails marginBottom50px"><colgroup><col width="20%"><col width="15%"><col width="15%"><col width="20%"><col width="10%"><col width="20%"></colgroup><thead><tr class="blockHeader"><th><?php echo vtranslate('LBL_MODULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALL_ACTIONS']->value, 'ACTION_MODEL', false, 'ACTION_ID');
$_smarty_tpl->tpl_vars['ACTION_MODEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ACTION_ID']->value => $_smarty_tpl->tpl_vars['ACTION_MODEL']->value) {
$_smarty_tpl->tpl_vars['ACTION_MODEL']->do_else = false;
?><th><?php echo vtranslate($_smarty_tpl->tpl_vars['ACTION_MODEL']->value->getName(),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?><th nowrap="nowrap"><?php echo vtranslate('LBL_ADVANCED_SHARING_RULES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th></tr></thead><tbody><tr data-module-name="Calendar"><td><?php echo vtranslate('SINGLE_Calendar','Calendar');?>
</td><td class=""><center><div><input type="radio" disabled="disabled" /></div></center></td><td class=""><center><div><input type="radio" disabled="disabled" /></div></center></td><td class=""><center><div><input type="radio" disabled="disabled" /></div></center></td><td class=""><center><div><input type="radio" checked="true" disabled="disabled" /></div></center></td><td><div class="row"><span class="col-sm-4">&nbsp;</span><span class="col-sm-4"><button type="button" class="btn btn-sm btn-default vtButton arrowDown row-fluid" disabled="disabled" style="padding-right: 20px; padding-left: 20px;"><i class="fa fa-chevron-down"></i></button></span></div></td></tr><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALL_MODULES']->value, 'MODULE_MODEL', false, 'TABID');
$_smarty_tpl->tpl_vars['MODULE_MODEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['TABID']->value => $_smarty_tpl->tpl_vars['MODULE_MODEL']->value) {
$_smarty_tpl->tpl_vars['MODULE_MODEL']->do_else = false;
?><tr data-module-name="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name');?>
"><td><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getName());?>
</td><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALL_ACTIONS']->value, 'ACTION_MODEL', false, 'ACTION_ID');
$_smarty_tpl->tpl_vars['ACTION_MODEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ACTION_ID']->value => $_smarty_tpl->tpl_vars['ACTION_MODEL']->value) {
$_smarty_tpl->tpl_vars['ACTION_MODEL']->do_else = false;
?><td class=""><?php if ($_smarty_tpl->tpl_vars['ACTION_MODEL']->value->isModuleEnabled($_smarty_tpl->tpl_vars['MODULE_MODEL']->value)) {?><center><div><input type="radio" name="permissions[<?php echo $_smarty_tpl->tpl_vars['TABID']->value;?>
]" data-action-state="<?php echo $_smarty_tpl->tpl_vars['ACTION_MODEL']->value->getName();?>
" value="<?php echo $_smarty_tpl->tpl_vars['ACTION_ID']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getPermissionValue() == $_smarty_tpl->tpl_vars['ACTION_ID']->value) {?>checked="true"<?php }?>></div></center><?php }?></td><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?><td class="triggerCustomSharingAccess"><div class="row"><span class="col-sm-4">&nbsp;</span><span class="col-sm-4"><button type="button" class="btn btn-sm btn-default vtButton" data-handlerfor="fields" data-togglehandler="<?php echo $_smarty_tpl->tpl_vars['TABID']->value;?>
-rules" style="padding-right: 20px; padding-left: 20px;"><i class="fa fa-chevron-down"></i></button></span></div></td></tr><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></tbody></table></div><div class='modal-overlay-footer clearfix saveSharingAccess hide'><div class="row clearfix"><div class=' textAlignCenter col-lg-12 col-md-12 col-sm-12 '><button class="btn btn-success saveButton" name="saveButton" type="submit"><?php echo vtranslate('LBL_APPLY_NEW_SHARING_RULES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>&nbsp;&nbsp;</div></div></div></form></div></div>
<?php }
}
