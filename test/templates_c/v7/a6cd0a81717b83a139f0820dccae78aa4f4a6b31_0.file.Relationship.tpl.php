<?php
/* Smarty version 4.3.4, created on 2024-07-24 12:42:48
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/MailManager/Relationship.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66a0f6c8976db7_91194370',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6cd0a81717b83a139f0820dccae78aa4f4a6b31' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/MailManager/Relationship.tpl',
      1 => 1712062367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66a0f6c8976db7_91194370 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/vendor/smarty/smarty/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
if ($_smarty_tpl->tpl_vars['LINKEDTO']->value) {?><div class='col-lg-12 padding0px'><div class="col-lg-7 padding0px recordScroll" ><span class="col-lg-12 padding0px"><span class="col-lg-1 padding0px"><input type="radio" name="_mlinkto" value="<?php echo $_smarty_tpl->tpl_vars['LINKEDTO']->value['record'];?>
"></span><span class="col-lg-11 padding0px mmRelatedRecordDesc textOverflowEllipsis" title="<?php echo $_smarty_tpl->tpl_vars['LINKEDTO']->value['detailviewlink'];?>
">&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['LINKEDTO']->value['detailviewlink'];?>
&nbsp;&nbsp;(<?php echo vtranslate($_smarty_tpl->tpl_vars['LINKEDTO']->value['module'],$_smarty_tpl->tpl_vars['moduleName']->value);?>
)</span></span></div><div class="pull-left col-lg-5 "><?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['LINK_TO_AVAILABLE_ACTIONS']->value) != 0) {?><select name="_mlinktotype" id="_mlinktotype" data-action='associate' style="background: #FFFFFF url('layouts/v7/skins/images/arrowdown.png') no-repeat 95% 40%;"><option value=""><?php echo vtranslate('LBL_ACTIONS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LINK_TO_AVAILABLE_ACTIONS']->value, 'moduleName');
$_smarty_tpl->tpl_vars['moduleName']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['moduleName']->value) {
$_smarty_tpl->tpl_vars['moduleName']->do_else = false;
if ($_smarty_tpl->tpl_vars['moduleName']->value == 'Calendar') {?><option value="<?php echo $_smarty_tpl->tpl_vars['moduleName']->value;?>
"><?php echo vtranslate("LBL_ADD_CALENDAR",'MailManager');?>
</option><option value="Events"><?php echo vtranslate("LBL_ADD_EVENTS",'MailManager');?>
</option><?php } else { ?><option value="<?php echo $_smarty_tpl->tpl_vars['moduleName']->value;?>
"><?php echo vtranslate("LBL_MAILMANAGER_ADD_".((string)$_smarty_tpl->tpl_vars['moduleName']->value),'MailManager');?>
</option><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select><?php }?></div></div><?php }
if ($_smarty_tpl->tpl_vars['LOOKUPS']->value) {
$_smarty_tpl->_assignInScope('LOOKRECATLEASTONE', false);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LOOKUPS']->value, 'RECORDS', false, 'MODULE');
$_smarty_tpl->tpl_vars['RECORDS']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['MODULE']->value => $_smarty_tpl->tpl_vars['RECORDS']->value) {
$_smarty_tpl->tpl_vars['RECORDS']->do_else = false;
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RECORDS']->value, 'RECORD');
$_smarty_tpl->tpl_vars['RECORD']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['RECORD']->value) {
$_smarty_tpl->tpl_vars['RECORD']->do_else = false;
$_smarty_tpl->_assignInScope('LOOKRECATLEASTONE', true);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?><div class="col-lg-12 padding0px"><div class="col-lg-7 padding0px recordScroll" ><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LOOKUPS']->value, 'RECORDS', false, 'MODULE');
$_smarty_tpl->tpl_vars['RECORDS']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['MODULE']->value => $_smarty_tpl->tpl_vars['RECORDS']->value) {
$_smarty_tpl->tpl_vars['RECORDS']->do_else = false;
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RECORDS']->value, 'RECORD');
$_smarty_tpl->tpl_vars['RECORD']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['RECORD']->value) {
$_smarty_tpl->tpl_vars['RECORD']->do_else = false;
?><span class="col-lg-12 padding0px"><span class="col-lg-1 padding0px"><input type="radio" name="_mlinkto" value="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value['id'];?>
"></span><span class="textOverflowEllipsis col-lg-11 padding0px mmRelatedRecordDesc ">&nbsp;&nbsp;<a target="_blank" href='index.php?module=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
&view=Detail&record=<?php echo $_smarty_tpl->tpl_vars['RECORD']->value['id'];?>
' title="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value['label'];?>
"><?php echo textlength_check($_smarty_tpl->tpl_vars['RECORD']->value['label']);?>
</a>&nbsp;&nbsp;<?php $_smarty_tpl->_assignInScope('SINGLE_MODLABEL', "SINGLE_".((string)$_smarty_tpl->tpl_vars['MODULE']->value));?>(<?php echo vtranslate($_smarty_tpl->tpl_vars['SINGLE_MODLABEL']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
)</span></span><br><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div><div class="pull-left col-lg-5 "><?php if ($_smarty_tpl->tpl_vars['LOOKRECATLEASTONE']->value) {
if (smarty_modifier_count($_smarty_tpl->tpl_vars['LINK_TO_AVAILABLE_ACTIONS']->value) != 0) {?><select name="_mlinktotype" id="_mlinktotype" data-action='associate' style="background: #FFFFFF url('layouts/v7/skins/images/arrowdown.png') no-repeat 95% 40%;"><option value=""><?php echo vtranslate('LBL_ACTIONS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LINK_TO_AVAILABLE_ACTIONS']->value, 'moduleName');
$_smarty_tpl->tpl_vars['moduleName']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['moduleName']->value) {
$_smarty_tpl->tpl_vars['moduleName']->do_else = false;
if ($_smarty_tpl->tpl_vars['moduleName']->value == 'Calendar') {?><option value="<?php echo $_smarty_tpl->tpl_vars['moduleName']->value;?>
"><?php echo vtranslate("LBL_ADD_CALENDAR",'MailManager');?>
</option><option value="Events"><?php echo vtranslate("LBL_ADD_EVENTS",'MailManager');?>
</option><?php } else { ?><option value="<?php echo $_smarty_tpl->tpl_vars['moduleName']->value;?>
"><?php echo vtranslate("LBL_MAILMANAGER_ADD_".((string)$_smarty_tpl->tpl_vars['moduleName']->value),'MailManager');?>
</option><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select><?php }
} else {
if (smarty_modifier_count($_smarty_tpl->tpl_vars['ALLOWED_MODULES']->value) != 0) {?><select name="_mlinktotype" id="_mlinktotype" data-action='create' style="background: #FFFFFF url('layouts/v7/skins/images/arrowdown.png') no-repeat 95% 40%;"><option value=""><?php echo vtranslate('LBL_ACTIONS','MailManager');?>
</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALLOWED_MODULES']->value, 'moduleName');
$_smarty_tpl->tpl_vars['moduleName']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['moduleName']->value) {
$_smarty_tpl->tpl_vars['moduleName']->do_else = false;
if ($_smarty_tpl->tpl_vars['moduleName']->value == 'Calendar') {?><option value="<?php echo $_smarty_tpl->tpl_vars['moduleName']->value;?>
"><?php echo vtranslate("LBL_ADD_CALENDAR",'MailManager');?>
</option><option value="Events"><?php echo vtranslate("LBL_ADD_EVENTS",'MailManager');?>
</option><?php } else { ?><option value="<?php echo $_smarty_tpl->tpl_vars['moduleName']->value;?>
"><?php echo vtranslate("LBL_MAILMANAGER_ADD_".((string)$_smarty_tpl->tpl_vars['moduleName']->value),'MailManager');?>
</option><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select><?php }
}?></div></div><?php } else {
if ($_smarty_tpl->tpl_vars['LINKEDTO']->value == '') {?><div class="col-lg-12 padding0px"><div class="col-lg-7 padding0px recordScroll" >&nbsp;</div><div class="pull-left col-lg-5"><?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['ALLOWED_MODULES']->value) != 0) {?><select name="_mlinktotype" id="_mlinktotype" data-action='create' style="background: #FFFFFF url('layouts/v7/skins/images/arrowdown.png') no-repeat 95% 40%;"><option value=""><?php echo vtranslate('LBL_ACTIONS','MailManager');?>
</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ALLOWED_MODULES']->value, 'moduleName');
$_smarty_tpl->tpl_vars['moduleName']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['moduleName']->value) {
$_smarty_tpl->tpl_vars['moduleName']->do_else = false;
if ($_smarty_tpl->tpl_vars['moduleName']->value == 'Calendar') {?><option value="<?php echo $_smarty_tpl->tpl_vars['moduleName']->value;?>
"><?php echo vtranslate("LBL_ADD_CALENDAR",'MailManager');?>
</option><option value="Events"><?php echo vtranslate("LBL_ADD_EVENTS",'MailManager');?>
</option><?php } else { ?><option value="<?php echo $_smarty_tpl->tpl_vars['moduleName']->value;?>
"><?php echo vtranslate("LBL_MAILMANAGER_ADD_".((string)$_smarty_tpl->tpl_vars['moduleName']->value),'MailManager');?>
</option><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select><?php }?></div></div><?php }
}
}
}
