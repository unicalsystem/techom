<?php
/* Smarty version 4.3.4, created on 2024-04-01 14:09:38
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Settings/Workflows/Tasks/VTCreateEntityTask.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_660ac022e5ff54_05168983',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34deb3a25a6145650acdc245e873baf299d148bf' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Settings/Workflows/Tasks/VTCreateEntityTask.tpl',
      1 => 1706189738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660ac022e5ff54_05168983 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row"><div class="col-lg-9"><div class="row"><div class="col-lg-2" style="position:relative;top:4px;padding-right: 0px;"><?php echo vtranslate('LBL_MODULES_TO_CREATE_RECORD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 <span class="redColor">*</span></div><div class="col-lg-10"><?php $_smarty_tpl->_assignInScope('RELATED_MODULES_INFO', $_smarty_tpl->tpl_vars['WORKFLOW_MODEL']->value->getDependentModules());
$_smarty_tpl->_assignInScope('RELATED_MODULES', array_keys($_smarty_tpl->tpl_vars['RELATED_MODULES_INFO']->value));
$_smarty_tpl->_assignInScope('RELATED_MODULE_MODEL_NAME', $_smarty_tpl->tpl_vars['TASK_OBJECT']->value->entity_type);?><select class="select2" id="createEntityModule" name="entity_type" data-rule-required="true" style="min-width: 150px;"><option value=""><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RELATED_MODULES']->value, 'MODULE');
$_smarty_tpl->tpl_vars['MODULE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['MODULE']->value) {
$_smarty_tpl->tpl_vars['MODULE']->do_else = false;
?><option <?php if ($_smarty_tpl->tpl_vars['TASK_OBJECT']->value->entity_type == $_smarty_tpl->tpl_vars['MODULE']->value) {?> selected="" <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></div></div></div></div><br><div id="addCreateEntityContainer" style="margin-bottom: 70px;"><?php $_smarty_tpl->_subTemplateRender(vtemplate_path("CreateEntity.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></div>
<?php }
}
