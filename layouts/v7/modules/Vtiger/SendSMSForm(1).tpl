 {* modules/Vtiger/views/MassActionAjax.php *}
<div id="sendWhatsappContainer" class='modal-xs modal-dialog' style="width: 800px">
    <div class="modal-content">
        <!-- Modal Header -->
        {assign var=TITLE value="{vtranslate('Send WhatsApp Broadcast', $MODULE)}"}
        {include file="ModalHeader.tpl"|vtemplate_path:$MODULE TITLE=$TITLE}

        <div class="modal-body">
            <br>
            <!-- Campaign dropdown -->
            <div>
                <span><strong>{vtranslate('LBL_SELECT_CAMPAIGN', $MODULE)}</strong></span>
                &nbsp;:&nbsp;
                <button class="btn btn-primary" type="button" id="askOpenAIButton" style="float: right;">
                    <strong>{vtranslate('AI Edit', $MODULE)}</strong>
                </button>
            </div>
            <br>
            <select name="campaign" id="templateSelect" class="form-control">
                <option value="">Select Template</option>
            </select>

            <!-- Preview screen -->
            <div id="templatePreview" class="modal-body" style="display: none;">
                <span><strong>{vtranslate('LBL_PREVIEW_TEMPLATE', $MODULE)}</strong></span>
                <div id="previewContent" class="preview-border" style="border: 1px solid #ccc; padding: 10px; margin-top: 10px;"></div>
            </div>
            <!-- Dynamic input fields for placeholders -->
            <div id="inputFields">
                <span><strong>{vtranslate('LBL_PREVIEW_TEMPLATE', $MODULE)}</strong></span>
            </div>

            <!-- Phone numbers dropdown -->
            <input type="hidden" id="phone_numbers_json" value='{ZEND_JSON::encode($PHONE_NUMBERS)}'>

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
                    <strong>{vtranslate('LBL_SEND_WHATSAPP', $MODULE)}</strong>
                </button>
                <!-- Cancel button -->
                <a class="cancelLink" type="reset" data-dismiss="modal">{vtranslate('CANCEL', $MODULE)}</a>
            </center>
        </div>
    </div>
</div>

<!-- OpenAI Interaction Modal -->
<div id="openAIContainer" class='modal-dialog' style="display: none; position: absolute; top: 33%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); padding: 5px; border-radius: 4px;">
    <div class="modal-content">
        <!-- Modal Header -->
        {assign var=TITLE value="{vtranslate('AI Edit', $MODULE)}"}
        <div class="modal-header" style="position: relative;">
            <h5 class="modal-title">{vtranslate('AI Edit', $MODULE)}</h5>
            <!-- Inline CSS to hide the close button -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display: none;">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <div>
                <span><strong>{vtranslate('Enter Text', $MODULE)}</strong></span>
                <textarea id="openAIInput" class="form-control" rows="4" placeholder="{vtranslate('Enter text you want to change', $MODULE)}"></textarea>
            </div>
            <br>
            <div id="openAIResponse" class="modal-body" style="display: none;">
                <span><strong>{vtranslate('RESPONSE', $MODULE)}</strong></span>
                <div id="responseContent" class="preview-border" style="border: 1px solid #ccc; padding: 10px; margin-top: 10px;"></div>
            </div>
        </div>

        <div class="modal-footer">
            <center>
                <!-- Submit to OpenAI button -->
                <button class="btn btn-success" type="button" name="askOpenAIButton" onclick="askOpenAI()">
                    <strong>{vtranslate('Submit', $MODULE)}</strong>
                </button>
               
                <!-- Cancel button -->
                <a class="cancelLink" type="reset" onclick="closeOpenAIContainer()">{vtranslate('CANCEL', $MODULE)}</a>
                
                 <!-- Copy button -->
                <button class="btn btn-info btn-sm" onclick="copyResponse()">
                    <strong>{vtranslate('COPY TEXT', $MODULE)}</strong>
                </button>
            </center>
        </div>
    </div>
</div>

<script src="layouts/v7/modules/Vtiger/resources/WhatsAppTemplates.js"></script>
<script src="layouts/v7/modules/Vtiger/resources/openAI.js"></script>