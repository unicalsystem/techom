<?php
/* Smarty version 4.3.4, created on 2024-04-01 10:10:52
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Import/Import_Mapping.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_660a882c2c28b5_17362646',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc0aa85e76161892156eb37b3e0c2dc86b48af25' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Import/Import_Mapping.tpl',
      1 => 1711370906,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660a882c2c28b5_17362646 (Smarty_Internal_Template $_smarty_tpl) {
?>
<input type="hidden" name="merge_type" value='<?php echo $_smarty_tpl->tpl_vars['USER_INPUT']->value->get('merge_type');?>
' /><input type="hidden" name="merge_fields" value='<?php echo $_smarty_tpl->tpl_vars['MERGE_FIELDS']->value;?>
' /><input type="hidden" name="lineitem_currency" value='<?php echo $_smarty_tpl->tpl_vars['LINEITEM_CURRENCY']->value;?>
'><input type="hidden" id="mandatory_fields" name="mandatory_fields" value='<?php echo $_smarty_tpl->tpl_vars['ENCODED_MANDATORY_FIELDS']->value;?>
' /><input type="hidden" name="field_mapping" id="field_mapping" value="" /><input type="hidden" name="default_values" id="default_values" value="" /><table width="100%" class="table table-bordered"><thead><tr><?php if ($_smarty_tpl->tpl_vars['HAS_HEADER']->value == true) {?><th width="25%"><?php echo vtranslate('LBL_FILE_COLUMN_HEADER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th><?php }?><th width="25%"><?php echo vtranslate('LBL_ROW_1',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th><th width="23%"><?php echo vtranslate('LBL_CRM_FIELDS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th><th width="27%"><?php echo vtranslate('LBL_DEFAULT_VALUE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th></tr></thead><tbody><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ROW_1_DATA']->value, '_FIELD_VALUE', false, '_HEADER_NAME', 'headerIterator', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['_FIELD_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_HEADER_NAME']->value => $_smarty_tpl->tpl_vars['_FIELD_VALUE']->value) {
$_smarty_tpl->tpl_vars['_FIELD_VALUE']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_headerIterator']->value['iteration']++;
$_smarty_tpl->_assignInScope('_COUNTER', (isset($_smarty_tpl->tpl_vars['__smarty_foreach_headerIterator']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_headerIterator']->value['iteration'] : null));?><tr class="fieldIdentifier" id="fieldIdentifier<?php echo $_smarty_tpl->tpl_vars['_COUNTER']->value;?>
"><?php if ($_smarty_tpl->tpl_vars['HAS_HEADER']->value == true) {?><td><span style="word-break:break-all" name="header_name"><?php echo $_smarty_tpl->tpl_vars['_HEADER_NAME']->value;?>
</span></td><?php }?><td><span><?php echo textlength_check($_smarty_tpl->tpl_vars['_FIELD_VALUE']->value);?>
</span></td><td><input type="hidden" name="row_counter" value="<?php echo $_smarty_tpl->tpl_vars['_COUNTER']->value;?>
" /><select name="mapped_fields" class="select2 mappedFieldsSelect" style="width:100%" onchange="Vtiger_Import_Js.loadDefaultValueWidget('fieldIdentifier<?php echo $_smarty_tpl->tpl_vars['_COUNTER']->value;?>
')"><option value=""><?php echo vtranslate('LBL_SELECT_OPTION',$_smarty_tpl->tpl_vars['FOR_MODULE']->value);?>
</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['AVAILABLE_FIELDS']->value, '_FIELD_INFO', false, '_FIELD_NAME');
$_smarty_tpl->tpl_vars['_FIELD_INFO']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_FIELD_NAME']->value => $_smarty_tpl->tpl_vars['_FIELD_INFO']->value) {
$_smarty_tpl->tpl_vars['_FIELD_INFO']->do_else = false;
$_smarty_tpl->_assignInScope('_TRANSLATED_FIELD_LABEL', vtranslate($_smarty_tpl->tpl_vars['_FIELD_INFO']->value->getFieldLabelKey(),$_smarty_tpl->tpl_vars['FOR_MODULE']->value));
$_smarty_tpl->_assignInScope('EVENTS_TRANSLATED_FIELD_LABEL', vtranslate($_smarty_tpl->tpl_vars['_FIELD_INFO']->value->getFieldLabelKey(),'Events'));?><option value="<?php echo $_smarty_tpl->tpl_vars['_FIELD_NAME']->value;?>
" <?php if (strtolower(decode_html($_smarty_tpl->tpl_vars['_HEADER_NAME']->value)) == strtolower($_smarty_tpl->tpl_vars['_TRANSLATED_FIELD_LABEL']->value)) {?> selected <?php }
if ($_smarty_tpl->tpl_vars['_FIELD_NAME']->value == 'due_date' && strtolower(decode_html($_smarty_tpl->tpl_vars['_HEADER_NAME']->value)) == strtolower($_smarty_tpl->tpl_vars['EVENTS_TRANSLATED_FIELD_LABEL']->value)) {?> selected <?php }?>data-label="<?php echo $_smarty_tpl->tpl_vars['_TRANSLATED_FIELD_LABEL']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['_TRANSLATED_FIELD_LABEL']->value;
if ($_smarty_tpl->tpl_vars['_FIELD_INFO']->value->isMandatory() == 'true' || $_smarty_tpl->tpl_vars['_FIELD_NAME']->value == 'activitytype') {?>&nbsp; (*)<?php }?></option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></td><td name="default_value_container">&nbsp;</td></tr><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></tbody></table><?php }
}
