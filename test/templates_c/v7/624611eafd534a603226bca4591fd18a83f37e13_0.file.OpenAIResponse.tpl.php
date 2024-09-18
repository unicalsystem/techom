<?php
/* Smarty version 4.3.4, created on 2024-07-17 05:43:10
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/GPTIntegration/OpenAIResponse.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_669759ee6d21e3_41661445',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '624611eafd534a603226bca4591fd18a83f37e13' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/GPTIntegration/OpenAIResponse.tpl',
      1 => 1721194231,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_669759ee6d21e3_41661445 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['TYPE']->value == 'formal') {?><div class="openairesponse-container" ><div class="message"><span class="user-message"><?php echo $_smarty_tpl->tpl_vars['QUERY']->value;?>
</span></div><div class="message copy-container"><span class="bot-message pull-right" style="padding: 2px;"> <?php echo $_smarty_tpl->tpl_vars['RESPONSE']->value;?>
</span><i title='Use as Mail Body' class="fa fa-arrow-left copy-icon" style="font-size: large;font-weight: bolder;"></i></div><div class="message pull-right"><b> <?php echo $_smarty_tpl->tpl_vars['CREATEDON']->value;?>
</b></div></div><?php } elseif ($_smarty_tpl->tpl_vars['TYPE']->value == 'suggestion') {
if (!empty($_smarty_tpl->tpl_vars['RESPONSE']->value)) {?><div class='popover-body' style="max-width: 250px;"><div class='suggestions'><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RESPONSE']->value, 'SUGGESTION');
$_smarty_tpl->tpl_vars['SUGGESTION']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['SUGGESTION']->value) {
$_smarty_tpl->tpl_vars['SUGGESTION']->do_else = false;
?><span style='background: #ebf5f7;padding: 5px;overflow: hidden;  max-width: 98%; display: inline-block;'><span id="sub_suggestion"><?php echo $_smarty_tpl->tpl_vars['SUGGESTION']->value;?>
</span><i title='Use as subject' class='fa fa-arrow-right copyandclose' style="padding-left: 10px;font-weight: bolder;"></i><i title='Copy to clipboard' class='fa fa-copy copysuggestion' style="padding-left: 10px;font-weight: bolder;"></i></span><br><br><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div><?php }
}
}
}
