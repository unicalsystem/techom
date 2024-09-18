<?php
/* Smarty version 4.3.4, created on 2024-07-17 05:30:59
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Settings/GPTIntegration/OpenAIConfig.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66975713c67a19_54415150',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '23c10d516bc3502aa57f72cfc804ac62f2ae3287' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/Settings/GPTIntegration/OpenAIConfig.tpl',
      1 => 1721194231,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66975713c67a19_54415150 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row"><div class="col-lg-12"><div class="gptintegrationconfiguration" id="gptintegrationconfiguration"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "><div class="clearfix col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="col-sm-8 col-xs-8"><div class="alert alert-info container-fluid"><b><?php echo vtranslate('LBL_NOTE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
:</b>&nbsp;<?php echo vtranslate('OPENAI_INFO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div></div><div class="col-sm-4 col-xs-4"><div class="btn pull-right editbutton-container"><button class="btn btn-default editButton" data-url="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getEditViewUrl();?>
&mode=showpopup&id=<?php echo $_smarty_tpl->tpl_vars['RECORD_MODEL']->value->get('id');?>
" title="<?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"><?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button></div></div></div><hr><br><div class="gptintegrationconfigurationDetail"><div class="contents "><div class="detailViewInfo"><?php $_smarty_tpl->_assignInScope('FIELDS', $_smarty_tpl->tpl_vars['CONFIG_FIELDS']->value);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['FIELDS']->value, 'FIELD_TYPE', false, 'FIELD_NAME');
$_smarty_tpl->tpl_vars['FIELD_TYPE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_NAME']->value => $_smarty_tpl->tpl_vars['FIELD_TYPE']->value) {
$_smarty_tpl->tpl_vars['FIELD_TYPE']->do_else = false;
?><div class="row form-group"><div class="col-lg-3 col-md-3 col-sm-3 fieldLabel"><label><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_NAME']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></div><?php $_smarty_tpl->_assignInScope('FIELD_NAME', ('mask_').($_smarty_tpl->tpl_vars['FIELD_NAME']->value));?><div class="col-lg-9 col-md-9 col-sm-9 fieldValue break-word"><div><?php echo $_smarty_tpl->tpl_vars['RECORD_MODEL']->value->get($_smarty_tpl->tpl_vars['FIELD_NAME']->value);?>
</div></div></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div></div><div class="gptintegrationconfigurationEdit"></div></div></div></div></div>
<?php }
}
