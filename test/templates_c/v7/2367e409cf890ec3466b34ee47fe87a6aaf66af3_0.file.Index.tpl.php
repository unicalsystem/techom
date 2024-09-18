<?php
/* Smarty version 4.3.4, created on 2024-08-28 13:52:03
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/layouts/v7/modules/Settings/GPTIntegration/Index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66cf2b83a6a175_39782978',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2367e409cf890ec3466b34ee47fe87a6aaf66af3' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/layouts/v7/modules/Settings/GPTIntegration/Index.tpl',
      1 => 1724413015,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66cf2b83a6a175_39782978 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="col-lg-12 col-md-12 col-sm-12" id="OpenAIContainer"><div class="editViewHeader"><h4><?php echo vtranslate('LBL_GPTIntegration',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h4></div><hr><div class="contents tabbable clearfix"><ul class="nav nav-tabs gptintegrationtabs"><li class="tab-item gptintegrationconfig active" data-tabname='gptintegrationconfig'><a data-toggle="gptintegrationconfig" href="#gptintegrationconfig"><strong><?php echo vtranslate('LBL_GPTIntegration_CONFIG',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></a></li><li class="tab-item gptintegrationconfig " data-tabname='gptintegrationlogs'> <a data-toggle="gptintegrationlogs" href="#gptintegrationlogs"><strong><?php echo vtranslate('LBL_GPTIntegration_Logs',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></a></li></ul><div class="tab-content gptintegrationconfigcontent padding20 overflowVisible"><div class="tab-pane active gptintegrationconfigcontainer" id="gptintegrationconfig"><?php $_smarty_tpl->_subTemplateRender(vtemplate_path("OpenAIConfig.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></div><div class="tab-pane gptintegrationlogscontainer" id="gptintegrationlogs"></div></div></div></div>
<?php }
}
