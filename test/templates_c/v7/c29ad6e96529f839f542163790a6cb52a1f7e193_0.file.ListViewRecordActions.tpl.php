<?php
/* Smarty version 4.3.4, created on 2024-03-28 03:55:32
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Settings/PickListDependency/ListViewRecordActions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6604ea340a2886_43643355',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c29ad6e96529f839f542163790a6cb52a1f7e193' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Settings/PickListDependency/ListViewRecordActions.tpl',
      1 => 1706189738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6604ea340a2886_43643355 (Smarty_Internal_Template $_smarty_tpl) {
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
