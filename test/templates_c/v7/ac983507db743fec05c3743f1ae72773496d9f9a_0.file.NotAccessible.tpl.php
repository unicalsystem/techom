<?php
/* Smarty version 4.3.4, created on 2024-03-26 10:10:23
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Vtiger/NotAccessible.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66029f0fbb2526_96672776',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac983507db743fec05c3743f1ae72773496d9f9a' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Vtiger/NotAccessible.tpl',
      1 => 1706189738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66029f0fbb2526_96672776 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="sendSmsContainer" class='modal-xs modal-dialog'>
    <div class = "modal-content">
        <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('TITLE'=>$_smarty_tpl->tpl_vars['TITLE']->value), 0, true);
?>

        <div class="modal-body">
        	<?php echo $_smarty_tpl->tpl_vars['BODY']->value;?>

    	</div>

    	<div class="modal-footer">
    	</div>
    </div>
</div><?php }
}
