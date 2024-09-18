<?php
/* Smarty version 4.3.4, created on 2024-07-17 05:42:48
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/GPTIntegration/AskOpenAI.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_669759d8e1b157_01516233',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b8b394e114b6bbc44c682fc8bce1db4c2a9918fd' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/unical/layouts/v7/modules/GPTIntegration/AskOpenAI.tpl',
      1 => 1721194231,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_669759d8e1b157_01516233 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="mailopenaicontainer"><div class="modal-lg modal-dialog  modelContainer"><div class="modal-header"><div class="clearfix"><div class="pull-right " ><button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true" class='fa fa-close'></span></button></div><h4 class="pull-left" id="openaiHeaderLabel"><?php echo vtranslate('LBL_ASK_GPTIntegration',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 &nbsp;<i title="Do not send confidential details such as email and phone.Also, please note that CRM administrators can view the submitted prompts to track usage." class="fa fa-info-circle pl-2"></i></h4></div></div><div class="modal-content"><form id="openaipromptcontainer" autocomplete="off"><div class="modal-body"><div class="form-group"><div class="openai-mail-container"><textarea rows="5" id="AskOpenAIInputMail" class="inputElement textAreaElement col-lg-12 " data-rule-required="true" aria-required="true" placeholder="<?php echo vtranslate('LBL_GPTIntegration_PLACEHOLDER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" style="resize: none; max-width:90%;height: 60px;"></textarea><button id="getMailOpenAIResponse" class="btn-mini btn-success" style="margin: 10px;"><?php echo vtranslate('LBL_SUBMIT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button></div></div><br><br><div id="openai-mail-container-response"></div></div><div class="modal-footer "><center><a class="cancelLink" type="reset" data-dismiss="modal"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></center></div></form></div></div></div><style>.openairesponse-container {padding-bottom: 5px;padding-top: 5px;}.user-message {padding: 10px;border-radius: 16px;background-color: darkslategray !important;border-bottom-left-radius: 0 !important;color: #FFFFFF !important;overflow: hidden; /* Add overflow property */max-width: 98%; /* Set a maximum width for the text */display: inline-block;}.message {padding: 10px;overflow: auto;}.bot-message {border-radius: 16px;border-top-right-radius: 0 !important;margin-bottom: 3px; /* Add margin to bottom */overflow: hidden; /* Add overflow property */max-width: 90%; /* Set a maximum width for the text */display: inline-block;}.modal-body{max-height: calc(100vh - 200px);overflow-y: auto;}</style>
<?php }
}
