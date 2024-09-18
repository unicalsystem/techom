<?php
/* Smarty version 4.3.4, created on 2024-04-02 09:45:36
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/EmailTemplates/PreviewEmailTemplate.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_660bd3c0af3807_43020324',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'abfc4a65a73eaabbe068c3ded0e613fb10b4e39e' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/EmailTemplates/PreviewEmailTemplate.tpl',
      1 => 1711370908,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660bd3c0af3807_43020324 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="templateContainer" class="fc-overlay-modal modal-content" style="max-height: 550px;"><div class="overlayHeader"><div class="modal-header"><div class="clearfix"><div class="pull-right " ><button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true" class='fa fa-close'></span></button></div></div><?php $_smarty_tpl->_assignInScope('TEMPLATE_NAME', ((string)$_smarty_tpl->tpl_vars['RECORD_MODEL']->value->get('templatename')));
$_smarty_tpl->_assignInScope('TEMPLATE_ID', ((string)$_smarty_tpl->tpl_vars['RECORD_MODEL']->value->get('templateid')));?><div class="clearfix marginTop10px"><div class="col-lg-6"><h4><?php echo $_smarty_tpl->tpl_vars['TEMPLATE_NAME']->value;?>
</h4></div></div></div></div><div class='modal-body' style="margin-bottom:60px;"><div class='datacontent container-fluid ' id='previewTemplateContainer'><iframe id="TemplateIFrame" class='overflowScrollBlock' style="height:450px;width: 100%;overflow-y: auto"></iframe></div></div></div>
<?php }
}
