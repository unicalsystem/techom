<?php
/* Smarty version 4.3.4, created on 2024-03-27 01:58:58
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Settings/SMSNotifier/ClickATellNew.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66037d62023ba2_33378801',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f25bf2b936a05ff0378688681b6a9005980d0078' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Settings/SMSNotifier/ClickATellNew.tpl',
      1 => 1711370908,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66037d62023ba2_33378801 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PROVIDER_MODEL']->value, 'FIELD_MODEL', false, 'FIELD_NAME');
$_smarty_tpl->tpl_vars['FIELD_MODEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_NAME']->value => $_smarty_tpl->tpl_vars['FIELD_MODEL']->value) {
$_smarty_tpl->tpl_vars['FIELD_MODEL']->do_else = false;
?><div class="col-lg-12"><div class="form-group"><?php $_smarty_tpl->_assignInScope('FIELD_NAME', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('name'));?><div class = "col-lg-4"><label for="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('label'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE_NAME']->value);?>
</label></div><div class = "col-lg-6"><?php $_smarty_tpl->_assignInScope('FIELD_TYPE', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldDataType());
$_smarty_tpl->_assignInScope('FIELD_VALUE', $_smarty_tpl->tpl_vars['RECORD_MODEL']->value->get($_smarty_tpl->tpl_vars['FIELD_NAME']->value));
if ($_smarty_tpl->tpl_vars['FIELD_NAME']->value == 'username' || $_smarty_tpl->tpl_vars['FIELD_NAME']->value == 'password') {?> continue;<?php }
if (empty($_smarty_tpl->tpl_vars['FIELD_VALUE']->value) && $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('value')) {
$_smarty_tpl->_assignInScope('FIELD_VALUE', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('value'));
}
if ($_smarty_tpl->tpl_vars['FIELD_TYPE']->value == 'picklist') {?><select class="select2 form-control" id="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" placeholder="<?php echo vtranslate('LBL_SELECT_ONE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE_NAME']->value);?>
"><option></option><?php $_smarty_tpl->_assignInScope('PICKLIST_VALUES', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('picklistvalues'));
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PICKLIST_VALUES']->value, 'PICKLIST_VALUE', false, 'PICKLIST_KEY');
$_smarty_tpl->tpl_vars['PICKLIST_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['PICKLIST_KEY']->value => $_smarty_tpl->tpl_vars['PICKLIST_VALUE']->value) {
$_smarty_tpl->tpl_vars['PICKLIST_VALUE']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['PICKLIST_KEY']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['FIELD_VALUE']->value == $_smarty_tpl->tpl_vars['PICKLIST_KEY']->value) {?> selected <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['PICKLIST_VALUE']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE_NAME']->value);?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select><?php } elseif ($_smarty_tpl->tpl_vars['FIELD_TYPE']->value == 'radio') {?><input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" value='1' id="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['FIELD_VALUE']->value) {?> checked="checked" <?php }?> />&nbsp;<?php echo vtranslate('LBL_YES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE_NAME']->value);?>
&nbsp;&nbsp;&nbsp;<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" value='0' id="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" <?php if (!$_smarty_tpl->tpl_vars['FIELD_VALUE']->value) {?> checked="checked" <?php }?>/>&nbsp;<?php echo vtranslate('LBL_NO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE_NAME']->value);
} elseif ($_smarty_tpl->tpl_vars['FIELD_TYPE']->value == 'password') {?><input type="password" id="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" class="form-control" data-rule-required="true" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['FIELD_VALUE']->value;?>
" /><?php } elseif ($_smarty_tpl->tpl_vars['FIELD_TYPE']->value == 'url') {?><div class="input-group pull-left col-lg-11 col-sm-11 col-xs-11"><input type="text" id="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" class="form-control" data-rule-required="true" readonly="readonly" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['FIELD_VALUE']->value;?>
" /><span class="input-group-addon cursorPointer"><i class="fa fa-clipboard copyToClipboard"></i></span></div><?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('helpText')) {?>&nbsp;<i class="fa fa-info-circle" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('helpText');?>
" style="margin-top: 8px;"></i><?php }
} else { ?><input type="text" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" class="form-control" <?php if ($_smarty_tpl->tpl_vars['FIELD_NAME']->value == 'username') {?> <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['FIELD_VALUE']->value;?>
" /><?php }?></div></div></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
