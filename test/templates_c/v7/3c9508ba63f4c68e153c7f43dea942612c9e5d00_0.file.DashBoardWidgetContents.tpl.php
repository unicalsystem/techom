<?php
/* Smarty version 4.3.4, created on 2024-08-14 17:01:53
  from 'C:\xampp\htdocs\unical\layouts\v7\modules\Vtiger\dashboards\DashBoardWidgetContents.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66bce3017388b4_43063637',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c9508ba63f4c68e153c7f43dea942612c9e5d00' => 
    array (
      0 => 'C:\\xampp\\htdocs\\unical\\layouts\\v7\\modules\\Vtiger\\dashboards\\DashBoardWidgetContents.tpl',
      1 => 1723653971,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66bce3017388b4_43063637 (Smarty_Internal_Template $_smarty_tpl) {
if (php7_count($_smarty_tpl->tpl_vars['DATA']->value) > 0) {?><input class="widgetData" type=hidden value='<?php echo Vtiger_Util_Helper::toSafeHTML(ZEND_JSON::encode($_smarty_tpl->tpl_vars['DATA']->value));?>
' /><input class="yAxisFieldType" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['YAXIS_FIELD_TYPE']->value;?>
" /><div class="row" style="margin:0px 10px;"><div class="col-lg-11"><div class="widgetChartContainer" name='chartcontent' style="height:220px;min-width:300px; margin: 0 auto"></div><br></div><div class="col-lg-1"></div></div><?php } else { ?><span class="noDataMsg"><?php echo vtranslate('LBL_NO');?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
 <?php echo vtranslate('LBL_MATCHED_THIS_CRITERIA');?>
</span><?php }
}
}
