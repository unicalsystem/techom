<?php
/* Smarty version 4.3.4, created on 2024-04-04 11:12:16
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Calendar/EditActivityType.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_660e8b10709349_79803586',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed406e8d6f4eb2412c804207c8efe7d426737c2d' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Calendar/EditActivityType.tpl',
      1 => 1712062367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660e8b10709349_79803586 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="modal-dialog modelContainer modal-content"><?php ob_start();
echo vtranslate('LBL_EDITING_CALENDAR_VIEW',$_smarty_tpl->tpl_vars['MODULE']->value);
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('HEADER_TITLE', $_prefixVariable1);
$_smarty_tpl->_subTemplateRender(vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('TITLE'=>$_smarty_tpl->tpl_vars['HEADER_TITLE']->value), 0, true);
?><div class="modal-body"><form class="form-horizontal"><input type="hidden" class="selectedType" value="" /><input type="hidden" class="selectedColor" value="" /><input type="hidden" class="editorMode" value="edit" /><input type=hidden name="moduleDateFields" data-value='<?php echo json_encode($_smarty_tpl->tpl_vars['EDITVIEWS']->value,(defined('JSON_HEX_APOS') ? constant('JSON_HEX_APOS') : null));?>
' /><div class="form-group"><label class="control-label fieldLabel col-sm-4"><?php echo vtranslate('LBL_SELECT_MODULE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="controls fieldValue col-sm-6"><select id="editModulesList" class="select2" name="modulesList" style="min-width: 250px;"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['EDITVIEWS']->value, 'DATE_FIELDS_LIST', false, 'MODULE_NAME');
$_smarty_tpl->tpl_vars['DATE_FIELDS_LIST']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['MODULE_NAME']->value => $_smarty_tpl->tpl_vars['DATE_FIELDS_LIST']->value) {
$_smarty_tpl->tpl_vars['DATE_FIELDS_LIST']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
" data-viewmodule="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></div></div><div class="form-group"><label class="control-label fieldLabel col-sm-4"><?php echo vtranslate('LBL_SELECT_FIELD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="controls fieldValue col-sm-6"><select id="editFieldsList" class="select2" name="fieldsList" style="min-width: 250px;"><option value=" "><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option></select></div></div><div id="js-eventtype-condition" class="form-group hide"><label class="control-label fieldLabel col-sm-4"><?php echo vtranslate('LBL_SELECT_EVENT_TYPE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="controls fieldValue col-sm-6"><select id="calendarviewconditions" class="select2" name="conditions" style="min-width: 250px;"><option value=""><?php echo vtranslate('LBL_ALL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['VIEWCONDITIONS']->value['Events'], 'CONDITION', false, 'CONDITION_NAME');
$_smarty_tpl->tpl_vars['CONDITION']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['CONDITION_NAME']->value => $_smarty_tpl->tpl_vars['CONDITION']->value) {
$_smarty_tpl->tpl_vars['CONDITION']->do_else = false;
?><option value='<?php if ($_smarty_tpl->tpl_vars['CONDITION']->value != '') {
echo Zend_Json::encode($_smarty_tpl->tpl_vars['CONDITION']->value);
}?>'><?php echo $_smarty_tpl->tpl_vars['CONDITION_NAME']->value;?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></div></div><div class="form-group"><label class="control-label fieldLabel col-sm-4"><?php echo vtranslate('LBL_SELECT_CALENDAR_COLOR',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="controls fieldValue col-sm-8"><p class="calendarColorPicker"></p></div></div></form></div><?php $_smarty_tpl->_subTemplateRender(vtemplate_path("ModalFooter.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></div><?php }
}
