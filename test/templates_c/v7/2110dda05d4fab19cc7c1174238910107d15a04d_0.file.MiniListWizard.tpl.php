<?php
/* Smarty version 4.3.4, created on 2024-07-24 15:43:39
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Vtiger/dashboards/MiniListWizard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66a1212be71403_75915001',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2110dda05d4fab19cc7c1174238910107d15a04d' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Vtiger/dashboards/MiniListWizard.tpl',
      1 => 1712062367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66a1212be71403_75915001 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['WIZARD_STEP']->value == 'step1') {?><div id="minilistWizardContainer" class='modelContainer modal-dialog'><div class="modal-content"><?php ob_start();
echo vtranslate('LBL_MINI_LIST',$_smarty_tpl->tpl_vars['MODULE']->value);
$_prefixVariable1 = ob_get_clean();
ob_start();
echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('HEADER_TITLE', (($_prefixVariable1).(" ")).($_prefixVariable2));
$_smarty_tpl->_subTemplateRender(vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('TITLE'=>$_smarty_tpl->tpl_vars['HEADER_TITLE']->value), 0, true);
?><form class="form-horizontal" method="post" action="javascript:;"><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
" /><input type="hidden" name="action" value="MassSave" /><table class="table no-border"><tbody><tr><td class="col-lg-1"></td><td class="fieldLabel col-lg-4"><label class="pull-right"><?php echo vtranslate('LBL_SELECT_MODULE');?>
</label></td><td class="fieldValue col-lg-5"><select name="module" style="width: 100%"><option></option><?php $_smarty_tpl->_assignInScope('TRANSLATED_MODULES_NAMES', array());
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MODULES']->value, 'MODULE_MODEL', false, 'MODULE_NAME');
$_smarty_tpl->tpl_vars['MODULE_MODEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['MODULE_NAME']->value => $_smarty_tpl->tpl_vars['MODULE_MODEL']->value) {
$_smarty_tpl->tpl_vars['MODULE_MODEL']->do_else = false;
ob_start();
echo vtranslate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);
$_prefixVariable3 = ob_get_clean();
$_tmp_array = isset($_smarty_tpl->tpl_vars['TRANSLATED_MODULE_NAMES']) ? $_smarty_tpl->tpl_vars['TRANSLATED_MODULE_NAMES']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array[$_smarty_tpl->tpl_vars['MODULE_NAME']->value] = $_prefixVariable3;
$_smarty_tpl->_assignInScope('TRANSLATED_MODULE_NAMES', $_tmp_array);?><option value="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></td><td class="col-lg-4"></td></tr><tr><td class="col-lg-1"></td><td class="fieldLabel col-lg-4"><label class="pull-right"><?php echo vtranslate('LBL_FILTER');?>
</label></td><td class="fieldValue col-lg-5"><select name="filterid" style="width: 100%"><option></option></select></td><td class="col-lg-4"></td></tr><tr><td class="col-lg-1"></td><td class="fieldLabel col-lg-4"><label class="pull-right"><?php echo vtranslate('LBL_EDIT_FIELDS');?>
</label></td><td class="fieldValue col-lg-5"><select name="fields" size="2" multiple="true" style="width: 100%"><option></option></select></td><td class="col-lg-4"></td></tr></tbody><input type="hidden" id="translatedModuleNames" value='<?php echo Vtiger_Util_Helper::toSafeHTML(ZEND_JSON::encode($_smarty_tpl->tpl_vars['TRANSLATED_MODULE_NAMES']->value));?>
'></table><?php $_smarty_tpl->_subTemplateRender(vtemplate_path('ModalFooter.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></form></div></div><?php } elseif ($_smarty_tpl->tpl_vars['WIZARD_STEP']->value == 'step2') {?><option></option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALLFILTERS']->value, 'FILTERS', false, 'FILTERGROUP');
$_smarty_tpl->tpl_vars['FILTERS']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FILTERGROUP']->value => $_smarty_tpl->tpl_vars['FILTERS']->value) {
$_smarty_tpl->tpl_vars['FILTERS']->do_else = false;
?><optgroup label="<?php echo $_smarty_tpl->tpl_vars['FILTERGROUP']->value;?>
"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['FILTERS']->value, 'FILTER', false, 'FILTERNAME');
$_smarty_tpl->tpl_vars['FILTER']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FILTERNAME']->value => $_smarty_tpl->tpl_vars['FILTER']->value) {
$_smarty_tpl->tpl_vars['FILTER']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['FILTER']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['FILTER']->value->get('viewname');?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></optgroup><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} elseif ($_smarty_tpl->tpl_vars['WIZARD_STEP']->value == 'step3') {?><option></option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LIST_VIEW_CONTROLLER']->value->getListViewHeaderFields(), 'FIELD', false, 'FIELD_NAME');
$_smarty_tpl->tpl_vars['FIELD']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_NAME']->value => $_smarty_tpl->tpl_vars['FIELD']->value) {
$_smarty_tpl->tpl_vars['FIELD']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD']->value->getFieldLabelKey(),$_smarty_tpl->tpl_vars['SELECTED_MODULE']->value);?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
