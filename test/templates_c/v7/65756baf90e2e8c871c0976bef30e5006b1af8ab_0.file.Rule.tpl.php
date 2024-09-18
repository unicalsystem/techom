<?php
/* Smarty version 4.3.4, created on 2024-04-02 13:55:34
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Settings/MailConverter/Rule.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_660c0e56bad375_42027868',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '65756baf90e2e8c871c0976bef30e5006b1af8ab' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Settings/MailConverter/Rule.tpl',
      1 => 1712062368,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660c0e56bad375_42027868 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="mailConverterRuleBlock"><div class="details border1px"><div class="ruleHead modal-header" style="cursor: move; min-height: 30px; padding: 10px 0px;"><strong><img class="alignMiddle" src="<?php echo vimage_path('white-drag.png');?>
" style="margin-left: 10px;" />&nbsp;&nbsp;<?php echo vtranslate('LBL_RULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
&nbsp;<span class="sequenceNumber"><?php echo $_smarty_tpl->tpl_vars['RULE_COUNT']->value;?>
</span>&nbsp;:&nbsp;<?php echo vtranslate($_smarty_tpl->tpl_vars['RULE_MODEL']->value->get('action'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<div class="pull-right" style="padding-right: 10px;"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RULE_MODEL']->value->getRecordLinks(), 'ACTION_LINK');
$_smarty_tpl->tpl_vars['ACTION_LINK']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ACTION_LINK']->value) {
$_smarty_tpl->tpl_vars['ACTION_LINK']->do_else = false;
?><span <?php if (stripos($_smarty_tpl->tpl_vars['ACTION_LINK']->value->getUrl(),'javascript:') === 0) {?>onclick='<?php echo substr($_smarty_tpl->tpl_vars['ACTION_LINK']->value->getUrl(),strlen("javascript:"));?>
'<?php } else { ?>onclick='window.location.href = "<?php echo $_smarty_tpl->tpl_vars['ACTION_LINK']->value->getUrl();?>
"'<?php }?>><i title="<?php echo vtranslate($_smarty_tpl->tpl_vars['ACTION_LINK']->value->get('linklabel'),$_smarty_tpl->tpl_vars['MODULE']->value);?>
" class="<?php echo $_smarty_tpl->tpl_vars['ACTION_LINK']->value->get('linkicon');?>
 alignMiddle cursorPointer"></i></span>&nbsp;&nbsp;<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></strong></div><fieldset class="marginTop10px"><strong class="marginLeft10px"><?php echo vtranslate('LBL_CONDITIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong><hr><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['FIELDS']->value, 'FIELD_MODEL', false, 'FIELD_NAME');
$_smarty_tpl->tpl_vars['FIELD_MODEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_NAME']->value => $_smarty_tpl->tpl_vars['FIELD_MODEL']->value) {
$_smarty_tpl->tpl_vars['FIELD_MODEL']->do_else = false;
?><div class="col-lg-12 padding10"><div class="col-lg-1"></div><div class="col-lg-3 fieldLabel"><label><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('label'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></div><div class="col-lg-7 fieldValue"><?php if ($_smarty_tpl->tpl_vars['FIELD_NAME']->value != 'action' && $_smarty_tpl->tpl_vars['FIELD_NAME']->value != 'assigned_to') {
$_smarty_tpl->_assignInScope('FIELD_VALUE', $_smarty_tpl->tpl_vars['RULE_MODEL']->value->get($_smarty_tpl->tpl_vars['FIELD_NAME']->value));
if ($_smarty_tpl->tpl_vars['FIELD_NAME']->value == 'matchusing') {
$_smarty_tpl->_assignInScope('FIELD_VALUE', vtranslate('LBL_ANY_CONDITIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value));
if ($_smarty_tpl->tpl_vars['RULE_MODEL']->value->get('matchusing') == 'AND') {
$_smarty_tpl->_assignInScope('FIELD_VALUE', vtranslate('LBL_ALL_CONDITIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value));
}
} elseif ($_smarty_tpl->tpl_vars['FIELD_NAME']->value == 'subject') {
echo vtranslate($_smarty_tpl->tpl_vars['RULE_MODEL']->value->get('subjectop'));?>
&nbsp;&nbsp;&nbsp;<?php } elseif ($_smarty_tpl->tpl_vars['FIELD_NAME']->value == 'body') {
echo vtranslate($_smarty_tpl->tpl_vars['RULE_MODEL']->value->get('bodyop'));?>
&nbsp;&nbsp;&nbsp;<?php }
echo $_smarty_tpl->tpl_vars['FIELD_VALUE']->value;
}?></div></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_smarty_tpl->_assignInScope('ASSIGNED_TO_RULES_ARRAY', array('CREATE_HelpDesk_FROM','CREATE_Leads_SUBJECT','CREATE_Contacts_SUBJECT','CREATE_Accounts_SUBJECT'));
if (in_array($_smarty_tpl->tpl_vars['RULE_MODEL']->value->get('action'),$_smarty_tpl->tpl_vars['ASSIGNED_TO_RULES_ARRAY']->value)) {?><div class="col-lg-12 padding10"><div class="col-lg-1"></div><div class="col-lg-3 fieldLabel"><label><?php echo vtranslate('Assigned To');?>
</label></div><div class="col-lg-7 fieldValue"><?php echo $_smarty_tpl->tpl_vars['RULE_MODEL']->value->get('assigned_to');?>
</div></div><?php }?></fieldset><hr><fieldset class="marginTop10px"><strong class="marginLeft10px"><?php echo vtranslate('LBL_ACTIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong><hr><div class="col-lg-12 padding10" style="padding-bottom: 10px;"><div class="col-lg-1"></div><div class="col-lg-3 fieldLabel"><label><?php echo vtranslate('action',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></div><div class="col-lg-7 fieldValue"><?php echo vtranslate($_smarty_tpl->tpl_vars['RULE_MODEL']->value->get('action'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</small></div></div></fieldset></div></div><br>
<?php }
}
