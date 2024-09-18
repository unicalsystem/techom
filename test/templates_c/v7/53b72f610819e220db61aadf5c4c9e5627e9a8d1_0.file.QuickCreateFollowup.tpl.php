<?php
/* Smarty version 4.3.4, created on 2024-07-19 04:32:14
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Calendar/QuickCreateFollowup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6699ec4eeb5034_45605653',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '53b72f610819e220db61aadf5c4c9e5627e9a8d1' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Calendar/QuickCreateFollowup.tpl',
      1 => 1712062367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6699ec4eeb5034_45605653 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="modal-dialog modelContainer modal-content"><?php ob_start();
echo vtranslate('LBL_CREATE_FOLLOWUP_EVENT',"Events");
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('HEADER_TITLE', $_prefixVariable1);
$_smarty_tpl->_subTemplateRender(vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('TITLE'=>$_smarty_tpl->tpl_vars['HEADER_TITLE']->value), 0, true);
?><form class="form-horizontal followupCreateView" id="followupQuickCreate" name="followupQuickCreate" method="post" action="index.php"><div class="modal-body"><?php $_smarty_tpl->_assignInScope('RECORD_ID', ((string)$_smarty_tpl->tpl_vars['RECORD_MODEL']->value->get('id')));
$_smarty_tpl->_assignInScope('dateFormat', $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('date_format'));
$_smarty_tpl->_assignInScope('timeformat', $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('hour_format'));
$_smarty_tpl->_assignInScope('currentDate', Vtiger_Date_UIType::getDisplayDateValue(''));
$_smarty_tpl->_assignInScope('time', Vtiger_Time_UIType::getDisplayTimeValue(null));
$_smarty_tpl->_assignInScope('currentTimeInVtigerFormat', Vtiger_Time_UIType::getDisplayValueUserFormat($_smarty_tpl->tpl_vars['time']->value));
ob_start();
echo vtranslate('LBL_HOLD_FOLLOWUP_ON',"Events");
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('FOLLOW_UP_LABEL', $_prefixVariable2);?><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
"><input type="hidden" name="action" value="SaveFollowupAjax" /><input type="hidden" name="mode" value="createFollowupEvent"><input type="hidden" name="record" value="<?php echo $_smarty_tpl->tpl_vars['RECORD_ID']->value;?>
" /><input type="hidden" name="defaultCallDuration" value="<?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('callduration');?>
" /><input type="hidden" name="defaultOtherEventDuration" value="<?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('othereventduration');?>
" /><input class="dateField" type="hidden" name="date_start" value="<?php echo $_smarty_tpl->tpl_vars['STARTDATE']->value;?>
" data-date-format="<?php echo $_smarty_tpl->tpl_vars['dateFormat']->value;?>
" data-fieldinfo="<?php echo Vtiger_Util_Helper::toSafeHTML(ZEND_JSON::encode($_smarty_tpl->tpl_vars['STARTDATEFIELDMODEL']->value));?>
"/><?php ob_start();
echo $_smarty_tpl->tpl_vars['FOLLOW_UP_LABEL']->value;
$_prefixVariable3 = ob_get_clean();
$_tmp_array = isset($_smarty_tpl->tpl_vars['FIELD_INFO']) ? $_smarty_tpl->tpl_vars['FIELD_INFO']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array['label'] = $_prefixVariable3;
$_smarty_tpl->_assignInScope('FIELD_INFO', $_tmp_array);?><div class="row"><div class="col-sm-12"><div class="col-sm-4 fieldLabel" style="padding-top:1%"><label class="muted pull-right"><?php echo $_smarty_tpl->tpl_vars['FOLLOW_UP_LABEL']->value;?>
</label></div><div class="col-sm-6 fieldValue"><div><div class="input-group inputElement" style="margin-bottom: 3px"><input type="text" class="dateField form-control" data-fieldname="followup_date_start" data-fieldtype="date" name="followup_date_start" data-date-format="<?php echo $_smarty_tpl->tpl_vars['dateFormat']->value;?>
"value="<?php echo $_smarty_tpl->tpl_vars['currentDate']->value;?>
" data-rule-required="true" data-rule-greaterThanOrEqualToToday="true"/><span class="input-group-addon"><i class="fa fa-calendar "></i></span></div></div><div><div class="input-group inputElement time" ><input type="text" data-format="<?php echo $_smarty_tpl->tpl_vars['timeformat']->value;?>
" class="timepicker-default form-control" value="<?php echo $_smarty_tpl->tpl_vars['currentTimeInVtigerFormat']->value;?>
" name="followup_time_start" data-rule-required="true" /><span class="input-group-addon"><i class="fa fa-clock-o"></i></span></div></div></div></div></div></div><?php ob_start();
echo vtranslate('LBL_CREATE',$_smarty_tpl->tpl_vars['MODULE']->value);
$_prefixVariable4 = ob_get_clean();
$_smarty_tpl->_assignInScope('BUTTON_NAME', $_prefixVariable4);
$_smarty_tpl->_subTemplateRender(vtemplate_path("ModalFooter.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></form></div>
<?php }
}
