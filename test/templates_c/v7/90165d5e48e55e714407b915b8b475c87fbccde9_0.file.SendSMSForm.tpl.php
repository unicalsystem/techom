<?php
/* Smarty version 4.3.4, created on 2024-09-05 10:13:43
  from '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/layouts/v7/modules/Vtiger/SendSMSForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66d98457776660_25972066',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '90165d5e48e55e714407b915b8b475c87fbccde9' => 
    array (
      0 => '/home/u255923749/domains/smartrecruitmentsolution.com/public_html/techom/layouts/v7/modules/Vtiger/SendSMSForm.tpl',
      1 => 1724413015,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66d98457776660_25972066 (Smarty_Internal_Template $_smarty_tpl) {
?> <div id="sendWhatsappContainer" class='modal-xs modal-dialog' style="width: 800px">
    <div class="modal-content">
        <!-- Modal Header -->
        <?php ob_start();
echo vtranslate('Send WhatsApp Broadcast',$_smarty_tpl->tpl_vars['MODULE']->value);
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_assignInScope('TITLE', $_prefixVariable1);?>
        <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('TITLE'=>$_smarty_tpl->tpl_vars['TITLE']->value), 0, true);
?>

        <div class="modal-body">
            <br>
            <!-- Broadcast Name Input with AI Edit button -->
            <div class="form-group" style="position: relative;">
                <label for="broadcastName" style="display: inline-block; margin-right: 10px; margin-bottom: 13px;">
                    <strong><?php echo vtranslate('Broadcast Name',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong>
                </label>
                <button class="btn btn-primary btn-sm" type="button" id="askOpenAIButton" style="position: absolute; right: 0; top: 0;">
                    <strong><?php echo vtranslate('AI Edit',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong>
                </button>
                <input type="text" id="broadcastName" class="form-control" placeholder="Enter Broadcast Name" style="margin-top: 5px;">
            </div>
            <br>
            <!-- Campaign dropdown -->
            <div>
                <span><strong><?php echo vtranslate('Select Template',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></span>
            </div>
            <br>
            <select name="campaign" id="templateSelect" class="form-control">
                <option value="">Select Template</option>
            </select>

            <!-- Preview screen -->
            <div id="templatePreview" class="modal-body" style="display: none;">
                <span><strong><?php echo vtranslate('LBL_PREVIEW_TEMPLATE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></span>
                <div id="previewContent" class="preview-border" style="border: 1px solid #ccc; padding: 10px; margin-top: 10px;"></div>
            </div>
            <!-- Dynamic input fields for placeholders -->
            <div id="inputFields">
                <span><strong><?php echo vtranslate('LBL_PREVIEW_TEMPLATE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></span>
            </div>

            <!-- Phone numbers dropdown -->
            <input type="hidden" id="phone_numbers_json" value='<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['PHONE_NUMBERS']->value);?>
'>

            <!-- Add scheduling option -->
            <div class="form-group" style="margin-top: 15px;">
                <label for="scheduleCheckbox" class="control-label">
                    <input type="checkbox" id="scheduleCheckbox"> Schedule Message
                </label>
                <input type="datetime-local" id="scheduleDateTime" class="form-control" style="display: none; width: 200px; margin-top: 10px;">
            </div>

            <!-- Hidden input field for storing language code -->
            <input type="hidden" id="languageCode" value="" />
        </div>

        <div class="modal-footer">
            <center>
                <!-- Send button -->
                <button class="btn btn-success" type="button" name="sendWhatsappButton" onclick="sendMessage()">
                    <strong><?php echo vtranslate('LBL_SEND_WHATSAPP',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong>
                </button>
                <!-- Cancel button -->
                <a class="cancelLink" type="reset" data-dismiss="modal"><?php echo vtranslate('CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
            </center>
        </div>
    </div>
</div>

<!-- OpenAI Interaction Modal -->
<div id="openAIContainer" class='modal-dialog' style="display: none; position: absolute; top: 33%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); padding: 5px; border-radius: 4px;">
    <div class="modal-content">
        <!-- Modal Header -->
        <?php ob_start();
echo vtranslate('AI Edit',$_smarty_tpl->tpl_vars['MODULE']->value);
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_assignInScope('TITLE', $_prefixVariable2);?>
        <div class="modal-header" style="position: relative;">
            <h5 class="modal-title"><?php echo vtranslate('AI Edit',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h5>
            <!-- Inline CSS to hide the close button -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display: none;">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <div>
                <span><strong><?php echo vtranslate('Enter Text',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></span>
                <textarea id="openAIInput" class="form-control" rows="4" placeholder="<?php echo vtranslate('Enter text you want to change',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"></textarea>
            </div>
            <br>
            <div id="openAIResponse" class="modal-body" style="display: none;">
                <span><strong><?php echo vtranslate('RESPONSE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></span>
                <div id="responseContent" class="preview-border" style="border: 1px solid #ccc; padding: 10px; margin-top: 10px;"></div>
            </div>
        </div>

        <div class="modal-footer">
            <center>
                <!-- Submit to OpenAI button -->
                <button class="btn btn-success" type="button" name="askOpenAIButton" onclick="askOpenAI()">
                    <strong><?php echo vtranslate('Submit',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong>
                </button>
               
                <!-- Cancel button -->
                <a class="cancelLink" type="reset" onclick="closeOpenAIContainer()"><?php echo vtranslate('CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
                
                 <!-- Copy button -->
                <button class="btn btn-info btn-sm" onclick="copyResponse()">
                    <strong><?php echo vtranslate('COPY TEXT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong>
                </button>
            </center>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
 src="layouts/v7/modules/Vtiger/resources/WhatsAppTemplates.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="layouts/v7/modules/Vtiger/resources/openAI.js"><?php echo '</script'; ?>
><?php }
}
