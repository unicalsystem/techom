<?php
/* Smarty version 4.3.4, created on 2024-04-16 09:09:35
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Settings/SMSNotifier/EditView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_661e404ff17ca2_35812254',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd9b8cd47878a6359736a979a349b08909330fd7' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Settings/SMSNotifier/EditView.tpl',
      1 => 1712062367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661e404ff17ca2_35812254 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="modal-dialog modal-xs"><div class="modal-content"><?php if ($_smarty_tpl->tpl_vars['RECORD_ID']->value) {
ob_start();
echo vtranslate('LBL_EDIT_CONFIGURATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE_NAME']->value);
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_assignInScope('TITLE', $_prefixVariable1);
} else {
ob_start();
echo vtranslate('LBL_ADD_CONFIGURATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE_NAME']->value);
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_assignInScope('TITLE', $_prefixVariable2);
}
$_smarty_tpl->_subTemplateRender(vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?><form class="form-horizontal" id="smsConfig" method="POST"><div class="modal-body configContent"><?php if ($_smarty_tpl->tpl_vars['RECORD_ID']->value) {?><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['RECORD_ID']->value;?>
" name="record" id="recordId"/><?php }
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['EDITABLE_FIELDS']->value, 'FIELD_MODEL');
$_smarty_tpl->tpl_vars['FIELD_MODEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_MODEL']->value) {
$_smarty_tpl->tpl_vars['FIELD_MODEL']->do_else = false;
?><div class="col-lg-12"><?php $_smarty_tpl->_assignInScope('FIELD_NAME', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('name'));?><div class="form-group"><div class = "col-lg-4"><label for="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_NAME']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE_NAME']->value);?>
</label></div><div class = "col-lg-6"><?php $_smarty_tpl->_assignInScope('FIELD_TYPE', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldDataType());
$_smarty_tpl->_assignInScope('FIELD_VALUE', $_smarty_tpl->tpl_vars['RECORD_MODEL']->value->get($_smarty_tpl->tpl_vars['FIELD_NAME']->value));
if ($_smarty_tpl->tpl_vars['FIELD_TYPE']->value == 'picklist') {?><select <?php if ($_smarty_tpl->tpl_vars['FIELD_VALUE']->value && $_smarty_tpl->tpl_vars['FIELD_NAME']->value == 'providertype') {?> disabled="disabled" <?php }?> class="select2 providerType form-control" id="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" placeholder="<?php echo vtranslate('LBL_SELECT_OPTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE_NAME']->value);?>
"><option></option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PROVIDERS']->value, 'PROVIDER_MODEL');
$_smarty_tpl->tpl_vars['PROVIDER_MODEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['PROVIDER_MODEL']->value) {
$_smarty_tpl->tpl_vars['PROVIDER_MODEL']->do_else = false;
$_smarty_tpl->_assignInScope('PROVIDER_NAME', $_smarty_tpl->tpl_vars['PROVIDER_MODEL']->value->getName());?><option value="<?php echo $_smarty_tpl->tpl_vars['PROVIDER_NAME']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['FIELD_VALUE']->value == $_smarty_tpl->tpl_vars['PROVIDER_NAME']->value) {?> selected <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['PROVIDER_NAME']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE_NAME']->value);?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select><?php if ($_smarty_tpl->tpl_vars['FIELD_VALUE']->value && $_smarty_tpl->tpl_vars['FIELD_NAME']->value == 'providertype') {?><input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['FIELD_VALUE']->value;?>
" /><?php }
} elseif ($_smarty_tpl->tpl_vars['FIELD_TYPE']->value == 'radio') {?><input type="radio" id="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" value='1' <?php if ($_smarty_tpl->tpl_vars['FIELD_VALUE']->value) {?> checked="checked" <?php }?> />&nbsp;<?php echo vtranslate('LBL_YES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE_NAME']->value);?>
&nbsp;&nbsp;&nbsp;<input type="radio" id="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" value='0' <?php if (!$_smarty_tpl->tpl_vars['FIELD_VALUE']->value) {?> checked="checked" <?php }?>/>&nbsp;<?php echo vtranslate('LBL_NO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE_NAME']->value);
} elseif ($_smarty_tpl->tpl_vars['FIELD_TYPE']->value == 'password') {?><input type="password" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" class="form-control" id="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['FIELD_VALUE']->value;?>
" /><?php } else { ?><input type="text" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" class="form-control" id="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['FIELD_NAME']->value == 'username') {?> <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['FIELD_VALUE']->value;?>
" /><?php }?></div></div></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?><div id="provider"><?php if ($_smarty_tpl->tpl_vars['RECORD_MODEL']->value->get('providertype') != '') {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PROVIDERS_FIELD_MODELS']->value, 'PROVIDER_MODEL', false, 'PROVIDER_NAME');
$_smarty_tpl->tpl_vars['PROVIDER_MODEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['PROVIDER_NAME']->value => $_smarty_tpl->tpl_vars['PROVIDER_MODEL']->value) {
$_smarty_tpl->tpl_vars['PROVIDER_MODEL']->do_else = false;
if ($_smarty_tpl->tpl_vars['PROVIDER_NAME']->value == $_smarty_tpl->tpl_vars['RECORD_MODEL']->value->get('providertype')) {?><div id="<?php echo $_smarty_tpl->tpl_vars['PROVIDER_NAME']->value;?>
_container" class="providerFields"><?php $_smarty_tpl->_assignInScope('TEMPLATE_NAME', Settings_SMSNotifier_ProviderField_Model::getEditFieldTemplateName($_smarty_tpl->tpl_vars['PROVIDER_NAME']->value));
$_smarty_tpl->_subTemplateRender(vtemplate_path($_smarty_tpl->tpl_vars['TEMPLATE_NAME']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('RECORD_MODEL'=>$_smarty_tpl->tpl_vars['RECORD_MODEL']->value), 0, true);
?></div><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?></div><div><span id='phoneFormatWarning'><i data-trigger="hover" data-toggle ="popover" data-placement="right" id="phoneFormatWarningPop" class="glyphicon glyphicon-info-sign" style="padding-right : 5px; padding-left : 5px" data-original-title="<?php echo vtranslate('LBL_WARNING',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" data-trigger="hover" data-content="<?php echo vtranslate('LBL_PHONEFORMAT_WARNING_CONTENT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"></i><?php echo vtranslate('LBL_PHONE_FORMAT_WARNING',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span></div></div><?php $_smarty_tpl->_subTemplateRender(vtemplate_path('ModalFooter.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></form></div></div>
<?php }
}
