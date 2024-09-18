<?php
/* Smarty version 4.3.4, created on 2024-04-02 05:20:09
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Vtiger/TagCloudResults.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_660b958955de31_48237946',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a74c980d6bd08ea178cd67c01623d849d6d062ed' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/demo/layouts/v7/modules/Vtiger/TagCloudResults.tpl',
      1 => 1706189738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660b958955de31_48237946 (Smarty_Internal_Template $_smarty_tpl) {
?>
-->*}
<div id="TagCloudResults" class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header contentsBackground"><button data-dismiss="modal" class="close" title="<?php echo vtranslate('LBL_CLOSE');?>
">&times;</button><div class="row"><h3 class="col-lg-8"><?php echo vtranslate('LBL_RESULT_FOR_THE_TAG',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 - <?php echo $_smarty_tpl->tpl_vars['TAG_NAME']->value;?>
</h3><?php if ($_smarty_tpl->tpl_vars['TAGGED_RECORDS']->value) {?><select id="tagSearchModulesList" class="select2 col-lg-3" style="color:#000"><option value="all"><?php echo vtranslate('LBL_ALL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['TAGGED_RECORDS']->value, 'TAGGED_RECORD_MODELS', false, 'MODULE_NAME');
$_smarty_tpl->tpl_vars['TAGGED_RECORD_MODELS']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['MODULE_NAME']->value => $_smarty_tpl->tpl_vars['TAGGED_RECORD_MODELS']->value) {
$_smarty_tpl->tpl_vars['TAGGED_RECORD_MODELS']->do_else = false;
?><option value="tagSearch_<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select><?php }?></div></div><div class="modal-body tabbable"><?php if ($_smarty_tpl->tpl_vars['TAGGED_RECORDS']->value) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['TAGGED_RECORDS']->value, 'TAGGED_RECORD_MODELS', false, 'MODULE_NAME');
$_smarty_tpl->tpl_vars['TAGGED_RECORD_MODELS']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['MODULE_NAME']->value => $_smarty_tpl->tpl_vars['TAGGED_RECORD_MODELS']->value) {
$_smarty_tpl->tpl_vars['TAGGED_RECORD_MODELS']->do_else = false;
?><div name="tagSearchModuleResults" id="tagSearch_<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
"><h5><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
 (<?php echo php7_count($_smarty_tpl->tpl_vars['TAGGED_RECORD_MODELS']->value);?>
)</h5><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['TAGGED_RECORD_MODELS']->value, 'TAGGED_RECORD_MODEL');
$_smarty_tpl->tpl_vars['TAGGED_RECORD_MODEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['TAGGED_RECORD_MODEL']->value) {
$_smarty_tpl->tpl_vars['TAGGED_RECORD_MODEL']->do_else = false;
?><div><a href="<?php echo $_smarty_tpl->tpl_vars['TAGGED_RECORD_MODEL']->value->getDetailViewUrl();?>
"><?php echo $_smarty_tpl->tpl_vars['TAGGED_RECORD_MODEL']->value->getName();?>
</a></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?><br></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else { ?><div class="alert alert-block"><strong><?php echo vtranslate('LBL_NO_RECORDS_FOUND',$_smarty_tpl->tpl_vars['MODULE']->value);?>
.</strong></div><?php }?></div></div></div>	
<?php }
}
