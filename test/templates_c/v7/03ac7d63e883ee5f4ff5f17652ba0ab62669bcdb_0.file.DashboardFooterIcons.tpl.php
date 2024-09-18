<?php
/* Smarty version 4.3.4, created on 2024-04-02 13:17:46
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Vtiger/dashboards/DashboardFooterIcons.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_660c057a07a200_90210873',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03ac7d63e883ee5f4ff5f17652ba0ab62669bcdb' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Vtiger/dashboards/DashboardFooterIcons.tpl',
      1 => 1712062367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660c057a07a200_90210873 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['SETTING_EXIST']->value) {?>
<a name="dfilter">
	<i class='fa fa-cog' border='0' align="absmiddle" title="<?php echo vtranslate('LBL_FILTER');?>
" alt="<?php echo vtranslate('LBL_FILTER');?>
"/>
</a>
<?php }
if (!empty($_smarty_tpl->tpl_vars['CHART_TYPE']->value)) {?>
    <?php $_smarty_tpl->_assignInScope('CHART_DATA', ZEND_JSON::decode($_smarty_tpl->tpl_vars['DATA']->value));?>
    <?php $_smarty_tpl->_assignInScope('CHART_VALUES', $_smarty_tpl->tpl_vars['CHART_DATA']->value['values']);
}
if ((!empty($_smarty_tpl->tpl_vars['DATA']->value) && empty($_smarty_tpl->tpl_vars['CHART_TYPE']->value)) || !empty($_smarty_tpl->tpl_vars['CHART_VALUES']->value)) {?>
<a href="javascript:void(0);" name="widgetFullScreen">
	<i class="fa fa-arrows-alt" hspace="2" border="0" align="absmiddle" title="<?php echo vtranslate('LBL_FULLSCREEN');?>
" alt="<?php echo vtranslate('LBL_FULLSCREEN');?>
"></i>
</a>
<?php }
if (!empty($_smarty_tpl->tpl_vars['CHART_TYPE']->value) && $_smarty_tpl->tpl_vars['REPORT_MODEL']->value->isEditable() == true) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['REPORT_MODEL']->value->getEditViewUrl();?>
" name="customizeChartReportWidget">
	<i class="fa fa-edit" hspace="2" border="0" align="absmiddle" title="<?php echo vtranslate('LBL_CUSTOMIZE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" alt="<?php echo vtranslate('LBL_CUSTOMIZE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"></i>
</a>
<?php }?>
<a href="javascript:void(0);" name="drefresh" data-url="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getUrl();?>
&linkid=<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->get('linkid');?>
&content=data">
	<i class="fa fa-refresh" hspace="2" border="0" align="absmiddle" title="<?php echo vtranslate('LBL_REFRESH');?>
" alt="<?php echo vtranslate('LBL_REFRESH');?>
"></i>
</a>
<?php if (!$_smarty_tpl->tpl_vars['WIDGET']->value->isDefault()) {?>
	<a name="dclose" class="widget" data-url="<?php echo $_smarty_tpl->tpl_vars['WIDGET']->value->getDeleteUrl();?>
">
		<i class="fa fa-remove" hspace="2" border="0" align="absmiddle" title="<?php echo vtranslate('LBL_REMOVE');?>
" alt="<?php echo vtranslate('LBL_REMOVE');?>
"></i>
	</a>
<?php }
}
}
