<?php
/* Smarty version 4.3.4, created on 2024-09-03 10:09:30
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/layouts/v7/modules/Vtiger/ContactsSummaryWidgetContents.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66d6e05a180700_50914182',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6f11b402983ffba5f1834c43f7d0de437e102ac5' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/layouts/v7/modules/Vtiger/ContactsSummaryWidgetContents.tpl',
      1 => 1724413015,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66d6e05a180700_50914182 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="relatedContacts container-fluid"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RELATED_RECORDS']->value, 'RELATED_RECORD');
$_smarty_tpl->tpl_vars['RELATED_RECORD']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['RELATED_RECORD']->value) {
$_smarty_tpl->tpl_vars['RELATED_RECORD']->do_else = false;
?><div class="recentActivitiesContainer row"><ul class="unstyled"><li><div class=""><div class="textOverflowEllipsis"><a href="<?php echo $_smarty_tpl->tpl_vars['RELATED_RECORD']->value->getDetailViewUrl();?>
" id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['RELATED_MODULE']->value;?>
_Related_Record_<?php echo $_smarty_tpl->tpl_vars['RELATED_RECORD']->value->get('id');?>
" title="<?php echo Vtiger_Util_Helper::getRecordName($_smarty_tpl->tpl_vars['RELATED_RECORD']->value->get('id'));?>
"><?php echo Vtiger_Util_Helper::getRecordName($_smarty_tpl->tpl_vars['RELATED_RECORD']->value->get('id'));?>
</a></div><div><?php echo $_smarty_tpl->tpl_vars['RELATED_RECORD']->value->getDisplayValue('email');?>
</div><div class="textOverflowEllipsis" title="<?php echo $_smarty_tpl->tpl_vars['RELATED_RECORD']->value->getDisplayValue('phone');?>
"><?php echo $_smarty_tpl->tpl_vars['RELATED_RECORD']->value->getDisplayValue('phone');?>
</div></div></li></ul></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_smarty_tpl->_assignInScope('NUMBER_OF_RECORDS', php7_count($_smarty_tpl->tpl_vars['RELATED_RECORDS']->value));
if ($_smarty_tpl->tpl_vars['NUMBER_OF_RECORDS']->value == 5) {?><div class="row"><div class="pull-right"><a href="javascript:void(0)" class="moreRecentContacts cursorPointer"><?php echo vtranslate('LBL_MORE',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a></div></div><?php }?></div>
<?php }
}
