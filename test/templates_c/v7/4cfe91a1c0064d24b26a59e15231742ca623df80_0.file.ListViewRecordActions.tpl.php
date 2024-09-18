<?php
/* Smarty version 4.3.4, created on 2024-08-28 16:03:55
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/layouts/v7/modules/Settings/PickListDependency/ListViewRecordActions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66cf4a6b9e4788_65757398',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4cfe91a1c0064d24b26a59e15231742ca623df80' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/layouts/v7/modules/Settings/PickListDependency/ListViewRecordActions.tpl',
      1 => 1724413015,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66cf4a6b9e4788_65757398 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="table-actions"><?php $_smarty_tpl->_assignInScope('RECORD_SOURCE_MODULE', $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('sourceModule'));
$_smarty_tpl->_assignInScope('RECORD_SOURCE_FIELD', $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('sourcefield'));
$_smarty_tpl->_assignInScope('RECORD_TARGET_FIELD', $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('targetfield'));?><span class="fa fa-pencil" onclick="javascript:Settings_PickListDependency_Js.triggerEdit(event, '<?php echo $_smarty_tpl->tpl_vars['RECORD_SOURCE_MODULE']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['RECORD_SOURCE_FIELD']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['RECORD_TARGET_FIELD']->value;?>
')" title="<?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"></span><span class="fa fa-trash-o" onclick="javascript:Settings_PickListDependency_Js.triggerDelete(event, '<?php echo $_smarty_tpl->tpl_vars['RECORD_SOURCE_MODULE']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['RECORD_SOURCE_FIELD']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['RECORD_TARGET_FIELD']->value;?>
')" title="<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"></span></div><?php }
}
