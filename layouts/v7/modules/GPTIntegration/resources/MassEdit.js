/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

Emails_MassEdit_Js("GPTIntegration_MassEdit_Js", {}, {
    registerEventForOpenAIMailContent: function () {
        var thisInstance = this;
        var openaiAction = jQuery('#composeEmailContainer');
        openaiAction.off("click", "#openAIContent");
        openaiAction.on("click", "#openAIContent", function (e) {
            var params = {
                'module': 'GPTIntegration',
                'view': 'AskOpenAI',
                'mode': 'AskOpenAIView',
                'type': 'MailBody',
            }
            app.helper.showProgress();
            app.request.post({"data": params}).then(function (err, data) {
                if (err == null) {
                    jQuery('.popupModal').remove();
                    var ele = jQuery('<div class="modal popupModal"></div>');
                    ele.append(data);
                    jQuery('body').append(ele);
                    var emailEditInstance = new Emails_MassEdit_Js();
                    emailEditInstance.showpopupModal();
                    app.helper.hideProgress();
                    thisInstance.registerSendOpenAIRequest();
                } else {
                    app.helper.showErrorNotification({message: err.message});
                    app.helper.hideProgress();
                }
            });
        });
    },

    getDefaultParameters: function () {
        return {
            'module': 'GPTIntegration',
            'view': 'AskOpenAI',
            'mode': 'requestOpenAI'
        }
    },

    registerSendOpenAIRequest: function () {
        var thisInstance = this;
        var openaiModal = jQuery('.mailopenaicontainer');
        openaiModal.off("click", "#getMailOpenAIResponse");
        openaiModal.on("click", "#getMailOpenAIResponse", function (e) {
            e.preventDefault();
            var query = openaiModal.find("#AskOpenAIInputMail").val();
            var params = thisInstance.getDefaultParameters();
            params['type'] = 'formal';
            params['query'] = query;

            app.helper.showProgress();
            app.request.post({"data": params}).then(function (err, data) {
                app.helper.hideProgress();
                if (err == null) {
                    var openaipromptcontainer = jQuery('#openaipromptcontainer');
                    openaipromptcontainer.find('#openai-mail-container-response').append(data)
                    thisInstance.triggerCopyContent(openaipromptcontainer);
                } else {
                    app.helper.showErrorNotification({message: err.message});
                }
            });
        });
    },

    triggerCopyContent: function (openaipromptcontainer) {
        var thisInstance = this;
        openaipromptcontainer.find('.copy-container .copy-icon').off('click').on('click', function () {
            var $copyContainer = jQuery(this).closest('.copy-container');
            var contentToCopy = $copyContainer.find('.bot-message').html();
            var editor = CKEDITOR.instances['description'];
            var editorData = editor.getData();

            // Split the content into lines
            // Remove the first line if it starts with "Subject:"
            var lines = contentToCopy.split('<br>');
            if (lines.length > 0 && lines[0].trim().startsWith('Subject:')) {
                lines.shift(); // Remove the first line
            }

            // Join the remaining lines
            var cleanedContentToCopy = lines.join('<br>');

            // Remove &nbsp; globally
            cleanedContentToCopy = cleanedContentToCopy.replace(/&nbsp;/g, '');

            // Replace the content in the CKEditor instance
            var replaced_text = editorData.replace(editorData, cleanedContentToCopy);
            editor.setData(replaced_text);
            jQuery('.mailopenaicontainer').find('.close').click();
        });
    },

    registerEventToShowSubjectSuggestionEvent: function () {
        jQuery('#composeEmailContainer').find('.aisuggestion').hide();
        jQuery('#composeEmailContainer').find('#subject').on('input', function () {
            var subject = jQuery(this).val();
            if (subject.trim() !== '') {
                jQuery('#composeEmailContainer').find('.aisuggestion').show();
            } else {
                jQuery('#composeEmailContainer').find('.aisuggestion').hide();
            }
        });
    },

    triggerEventToGetSuggestions: function () {
        var thisInstance = this;
        var composeEmailContainer = jQuery('#composeEmailContainer');
        var aisuggestion = composeEmailContainer.find('.aisuggestion');
        var subjectInput = composeEmailContainer.find('#subject');
        aisuggestion.on('click', function (e) {
            var currentElement = jQuery(e.currentTarget);
            var subject = subjectInput.val().trim();
            var params = thisInstance.getDefaultParameters();
            params['type'] = 'suggestion';
            params['query'] = subject;
            app.helper.showProgress();
            app.request.post({"data": params}).then(function (err, data) {
                app.helper.hideProgress();
                if(err == null && data != null) {
                    currentElement.popover({
                        content: jQuery(data).html(),
                        html: true,
                        placement: 'bottom'
                    });
                    currentElement.popover('show');
                    thisInstance.copySuggestion();
                    thisInstance.copyAndAddtoSubject();
                } else {
                    if(err)
                        app.helper.showErrorNotification({message: err.message});
                    else if(data == null){
                        app.helper.showErrorNotification({message: 'The server is currently experiencing high activity; please attempt your request again later'});
                    }
                }
            });
        });
    },

    copySuggestion: function () {
        jQuery('.copysuggestion').off('click').on('click', function () {
            var contentToCopy = jQuery(this).parent().text();
            var tempTextarea = jQuery('<textarea>');
            jQuery('body').append(tempTextarea);
            tempTextarea.val(contentToCopy).select();
            document.execCommand('copy');
            tempTextarea.remove();
            jQuery('#composeEmailContainer').find('.aisuggestion').popover('destroy');
        });
    },

    copyAndAddtoSubject: function () {
        jQuery('.copyandclose').off('click').on('click', function () {
            jQuery('#composeEmailContainer').find('#subject').val(jQuery(this).parent().text());
            jQuery('#composeEmailContainer').find('.aisuggestion').popover('destroy');
        });
    },

    triggerEventToClosePopover: function() {
        var $button = jQuery('.your-button-selector');
        var $popover = jQuery('.your-popover-selector');

        // Show popover on button click
        $button.on('click', function () {
          $popover.show();
        });

        // Close popover on outside click
        jQuery(document).on('click', function (event) {
          if (!$popover.is(event.target) && $popover.has(event.target).length === 0 && !$button.is(event.target)) {
            // Clicked outside the popover and not on the button
            $popover.hide();
          }
        });
    },
   
    checkPermissionAndShowAIButtons : function() {
        var thisInstance=this;
        var params = thisInstance.getDefaultParameters();
        params['mode']='checkUserAIPromptPermission';
        app.helper.showProgress();
        app.request.post({"data": params}).then(function(err,data){
            app.helper.hideProgress();
            if(err == null){
                if (data.hasOwnProperty("openAIPromptEnabled") && data.openAIPromptEnabled == true){
                    thisInstance.showOpenAIButtons();
                    thisInstance.registerEventForOpenAIMailContent();
                    thisInstance.registerEventToShowSubjectSuggestionEvent();
                    thisInstance.triggerEventToGetSuggestions();
                    thisInstance.triggerEventToClosePopover();
                }
            }  

        })
    },
   
    showOpenAIButtons:function(){
        var thisInstance = this;
        var emailContainer = jQuery('#composeEmailContainer');
        var subjectBlock = emailContainer.find(".subjectField>div:first");
        var child = jQuery('<div class="col-lg-2"><button style="border-color: blue;" class="btn btn-default aisuggestion">' + app.vtranslate("Suggestions") + '</button></div><div class="col-lg-2 openai"><button id="openAIContent" style="border-color: blue;" class="btn btn-default pull-right"> ' + app.vtranslate("Ask OpenAI") + ' </button></div>');
        subjectBlock.append(child);
    },
   
    registerEvents: function () {
        var thisInstance = this;
        jQuery(".myModal").live("shown.bs.modal", function() { 
            if (jQuery("#composeEmailContainer").length) {
                thisInstance.checkPermissionAndShowAIButtons();
                
            } 
        });
    }
});

//On Page Load register OpenAI Js Events
jQuery(document).ready(function () {
    var openAIMasseditInstance = new GPTIntegration_MassEdit_Js();
    openAIMasseditInstance.registerEvents();
});
