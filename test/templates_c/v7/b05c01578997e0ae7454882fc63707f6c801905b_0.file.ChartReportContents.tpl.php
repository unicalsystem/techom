<?php
/* Smarty version 4.3.4, created on 2024-04-25 06:31:25
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Reports/ChartReportContents.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6629f8bdc44342_90090127',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b05c01578997e0ae7454882fc63707f6c801905b' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Reports/ChartReportContents.tpl',
      1 => 1712062367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6629f8bdc44342_90090127 (Smarty_Internal_Template $_smarty_tpl) {
?>
<input type='hidden' name='charttype' value="<?php echo $_smarty_tpl->tpl_vars['CHART_TYPE']->value;?>
" />
<input type='hidden' name='data' value='<?php echo Vtiger_Functions::jsonEncode($_smarty_tpl->tpl_vars['DATA']->value);?>
' />
<input type='hidden' name='clickthrough' value="<?php echo $_smarty_tpl->tpl_vars['CLICK_THROUGH']->value;?>
" />

<br>
<div class="dashboardWidgetContent">
    <input type="hidden" class="yAxisFieldType" value="<?php echo $_smarty_tpl->tpl_vars['YAXIS_FIELD_TYPE']->value;?>
" />
    <div class='border1px filterConditionContainer' style="padding:30px;">
        <div id='chartcontent' name='chartcontent' style="min-height:400px;" data-mode='Reports'></div>
        <br>
        <?php if ($_smarty_tpl->tpl_vars['CLICK_THROUGH']->value != 'true') {?>
            <div class='row-fluid alert-info'>
                <span class='col-lg-4 offset4'> &nbsp;</span>
                <span class='span alert-info'>
                    <i class="icon-info-sign"></i>
                    <?php echo vtranslate('LBL_CLICK_THROUGH_NOT_AVAILABLE',$_smarty_tpl->tpl_vars['MODULE']->value);?>

                </span>
            </div>
            <br>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['REPORT_MODEL']->value->isInventoryModuleSelected()) {?>
            <div class="alert alert-info">
                <?php $_smarty_tpl->_assignInScope('BASE_CURRENCY_INFO', Vtiger_Util_Helper::getUserCurrencyInfo());?>
                <i class="icon-info-sign" style="margin-top: 1px;"></i>&nbsp;&nbsp;
                <?php echo vtranslate('LBL_CALCULATION_CONVERSION_MESSAGE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 - <?php echo $_smarty_tpl->tpl_vars['BASE_CURRENCY_INFO']->value['currency_name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['BASE_CURRENCY_INFO']->value['currency_code'];?>
)
            </div>
        <?php }?>
    </div>
</div>
<br>

<?php }
}
