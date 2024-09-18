<?php
/* Smarty version 4.3.4, created on 2024-05-08 05:01:31
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Settings/SharingAccess/EditRule.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_663b072b2f7280_00060457',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b8b6eedf0df4e5088faf1b4ed90781c494e5edca' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Settings/SharingAccess/EditRule.tpl',
      1 => 1712062367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_663b072b2f7280_00060457 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('RULE_MODEL_EXISTS', true);
$_smarty_tpl->_assignInScope('RULE_ID', $_smarty_tpl->tpl_vars['RULE_MODEL']->value->getId());
if (empty($_smarty_tpl->tpl_vars['RULE_ID']->value)) {
$_smarty_tpl->_assignInScope('RULE_MODEL_EXISTS', false);
}?><div class="modal-dialog modelContainer"'><?php ob_start();
echo vtranslate('LBL_ADD_CUSTOM_RULE_TO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
$_prefixVariable1 = ob_get_clean();
ob_start();
echo vtranslate($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name'),$_smarty_tpl->tpl_vars['MODULE']->value);
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('HEADER_TITLE', (($_prefixVariable1).(" ")).($_prefixVariable2));
$_smarty_tpl->_subTemplateRender(vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('TITLE'=>$_smarty_tpl->tpl_vars['HEADER_TITLE']->value), 0, true);
?><div class="modal-content"><form class="form-horizontal" id="editCustomRule" method="post"><input type="hidden" name="for_module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name');?>
" /><input type="hidden" name="record" value="<?php echo $_smarty_tpl->tpl_vars['RULE_ID']->value;?>
" /><div name='massEditContent'><div class="modal-body"><div class="form-group"><label class="control-label fieldLabel col-sm-5"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name'),$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<?php echo vtranslate('LBL_OF',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="controls fieldValue col-xs-6"><select class="select2 col-sm-9" name="source_id"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALL_RULE_MEMBERS']->value, 'ALL_GROUP_MEMBERS', false, 'GROUP_LABEL');
$_smarty_tpl->tpl_vars['ALL_GROUP_MEMBERS']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['GROUP_LABEL']->value => $_smarty_tpl->tpl_vars['ALL_GROUP_MEMBERS']->value) {
$_smarty_tpl->tpl_vars['ALL_GROUP_MEMBERS']->do_else = false;
?><optgroup label="<?php echo vtranslate($_smarty_tpl->tpl_vars['GROUP_LABEL']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALL_GROUP_MEMBERS']->value, 'MEMBER');
$_smarty_tpl->tpl_vars['MEMBER']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['MEMBER']->value) {
$_smarty_tpl->tpl_vars['MEMBER']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['MEMBER']->value->getId();?>
"<?php if ($_smarty_tpl->tpl_vars['RULE_MODEL_EXISTS']->value) {?> <?php if ($_smarty_tpl->tpl_vars['RULE_MODEL']->value->getSourceMember()->getId() == $_smarty_tpl->tpl_vars['MEMBER']->value->getId()) {?>selected<?php }
}?>><?php echo $_smarty_tpl->tpl_vars['MEMBER']->value->getName();?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></optgroup><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></div></div><div class="form-group"><label class="control-label fieldLabel col-sm-5"><?php echo vtranslate('LBL_CAN_ACCESSED_BY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label><div class="controls fieldValue col-xs-6"><select class="select2 col-sm-9" name="target_id"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALL_RULE_MEMBERS']->value, 'ALL_GROUP_MEMBERS', false, 'GROUP_LABEL');
$_smarty_tpl->tpl_vars['ALL_GROUP_MEMBERS']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['GROUP_LABEL']->value => $_smarty_tpl->tpl_vars['ALL_GROUP_MEMBERS']->value) {
$_smarty_tpl->tpl_vars['ALL_GROUP_MEMBERS']->do_else = false;
?><optgroup label="<?php echo vtranslate($_smarty_tpl->tpl_vars['GROUP_LABEL']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALL_GROUP_MEMBERS']->value, 'MEMBER');
$_smarty_tpl->tpl_vars['MEMBER']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['MEMBER']->value) {
$_smarty_tpl->tpl_vars['MEMBER']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['MEMBER']->value->getId();?>
"<?php if ($_smarty_tpl->tpl_vars['RULE_MODEL_EXISTS']->value) {
if ($_smarty_tpl->tpl_vars['RULE_MODEL']->value->getTargetMember()->getId() == $_smarty_tpl->tpl_vars['MEMBER']->value->getId()) {?>selected<?php }
}?>><?php echo $_smarty_tpl->tpl_vars['MEMBER']->value->getName();?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></optgroup><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></div></div><div class="form-group"><label class="control-label fieldLabel col-sm-5"><?php echo vtranslate('LBL_WITH_PERMISSIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label><div class="controls fieldValue col-sm-5" style="margin-left: 3%;"><label class="radio"><input type="radio" value="0" name="permission" <?php if ($_smarty_tpl->tpl_vars['RULE_MODEL_EXISTS']->value) {?> <?php if ($_smarty_tpl->tpl_vars['RULE_MODEL']->value->isReadOnly()) {?> checked <?php }?> <?php } else { ?> checked <?php }?>/>&nbsp;<?php echo vtranslate('LBL_READ',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
&nbsp;</label><label class="radio"><input type="radio" value="1" name="permission" <?php if ($_smarty_tpl->tpl_vars['RULE_MODEL']->value->isReadWrite()) {?> checked <?php }?> />&nbsp;<?php echo vtranslate('LBL_READ_WRITE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
&nbsp;</label></div></div></div></div><?php $_smarty_tpl->_subTemplateRender(vtemplate_path('ModalFooter.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></form></div></div>
<?php }
}
