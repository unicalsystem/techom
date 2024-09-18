{*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************}

{strip}
    <div class="mailopenaicontainer">
        <div class="modal-lg modal-dialog  modelContainer">
            <div class="modal-header">
                <div class="clearfix">
                    <div class="pull-right " >
                        <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                            <span aria-hidden="true" class='fa fa-close'></span>
                        </button>
                    </div>
                    <h4 class="pull-left" id="openaiHeaderLabel">
                        {vtranslate('LBL_ASK_GPTIntegration', $MODULE)} &nbsp; 
                        <i title="Do not send confidential details such as email and phone.Also, please note that CRM administrators can view the submitted prompts to track usage." class="fa fa-info-circle pl-2"></i>
                    </h4>
                </div>
            </div>
            <div class="modal-content">
                <form id="openaipromptcontainer" autocomplete="off">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="openai-mail-container">
                                <textarea rows="5" id="AskOpenAIInputMail" class="inputElement textAreaElement col-lg-12 " data-rule-required="true" aria-required="true" placeholder="{vtranslate('LBL_GPTIntegration_PLACEHOLDER', $MODULE)}" style="resize: none; max-width:90%;height: 60px;"></textarea>
                                <button id="getMailOpenAIResponse" class="btn-mini btn-success" style="margin: 10px;">{vtranslate('LBL_SUBMIT', $MODULE)}</button>
                            </div>
                        </div><br><br>
                        <div id="openai-mail-container-response">
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <center>
                            <a class="cancelLink" type="reset" data-dismiss="modal">{vtranslate('LBL_CANCEL', $MODULE)}</a>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>

        .openairesponse-container {
            padding-bottom: 5px;
            padding-top: 5px;
        }
        .user-message {
            padding: 10px;
            border-radius: 16px;
            background-color: darkslategray !important;
            border-bottom-left-radius: 0 !important;
            color: #FFFFFF !important;
            overflow: hidden; /* Add overflow property */
            max-width: 98%; /* Set a maximum width for the text */
            display: inline-block;
        }
        .message {
            padding: 10px;
            overflow: auto;
        }

        .bot-message {
            border-radius: 16px;
            border-top-right-radius: 0 !important;
            margin-bottom: 3px; /* Add margin to bottom */
            overflow: hidden; /* Add overflow property */
            max-width: 90%; /* Set a maximum width for the text */
            display: inline-block;
        }
        .modal-body{
            max-height: calc(100vh - 200px);
            overflow-y: auto;
        }

    </style>    
{/strip}
