/*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ******************************************************************************/

Vtiger_List_Js("GoogleOffice365Suite_CTGoogleOffice365SuiteSyncGoogleContacts_Js", {}, {

    //Step 1
    registerSaveGoogleAPIsSettingEvent : function () {
        jQuery('#saveGoogleAPIsSetting').on('click',function(){
            var clientId = jQuery("#clientId").val();
            var clientSecret = jQuery("#clientSecret").val();
            var domainUrl = jQuery("#domainUrl").val();

            if(clientId == "" || clientSecret == "" || domainUrl == "") {
                if (clientId == "") {
                    app.helper.showErrorNotification({"message":app.vtranslate('JS_CLIENT_ID_NOT_EMPTY')});
                    return;
                }
                if (clientSecret == "") {
                    app.helper.showErrorNotification({"message":app.vtranslate('JS_CLIENT_SECRET_NOT_EMPTY')});
                    return;
                }
                if (domainUrl == "") {
                    app.helper.showErrorNotification({"message":app.vtranslate('JS_DOMAIN_URL_NOT_EMPTY')});
                    return;
                }
            }else {
                app.helper.showProgress();

                var params = {
                    'module' : app.getModuleName(),
                    'action' : 'CTGoogleOffice365SuiteSyncGoogleContactsConfiguration',
                    'mode' : 'GoogleAPIsSettingSave',
                    'clientId' : clientId,
                    'clientSecret' : clientSecret,
                    'domainUrl' : domainUrl
                }
                AppConnector.request(params).then( function(data) {
                    app.helper.hideProgress();
                    if(data.result.googleContactsConfigURL){
                        window.location.href = data.result.googleContactsConfigURL;
                    }
                });
            }
        });
    },
    
    //Step 2
    registerGenerateTokenEvent : function() {
        jQuery("#generateToken").on('click', function() {
            var userId = jQuery("#userId").val();
            if (jQuery("#generateToken").hasClass('newToken')) {
                window.location = "index.php?module="+app.getModuleName()+"&view=CTGoogleOffice365SuiteSyncGoogleContactsTokenAuthorize&user_id=" + userId;
            } else if (jQuery("#generateToken").hasClass('revokeToken')) {
                window.location = "index.php?module="+app.getModuleName()+"&view=CTGoogleOffice365SuiteRevokeToken&user_id=" + userId;
            }
        });
    },

    registerAddUserSettingsEvent: function() {
        jQuery("#addVtigerUser").on('click', function() {
            availListObj = document.getElementById('availableUsers')
            selectedUsers = document.getElementById('selectedUsers')
            limitUser = document.getElementById('userLimit').value;
            var selectLength = selectedUsers.length
            var availableLength = availListObj.length

            for (i = 0; i < selectedUsers.length; i++) {
                selectedUsers.options[i].selected = false
            }

            var count = 0;
            var isSelected = [];
            for (i = 0; i < availListObj.length; i++) {
                if (availListObj.options[i].selected == true) {
                    var rowFound = false;
                    var existingObj = null;
                    for (j = 0; j < selectedUsers.length; j++) {
                        if (selectedUsers.options[j].value == availListObj.options[i].value) {
                            rowFound = true;
                            existingObj = selectedUsers.options[j]
                            break
                        }
                    }
                    if (rowFound != true) {
                        // check limit users
                        count++;
                        if (limitUser != 0) {
                            if (count + selectLength > limitUser) {
                                var message = app.vtranslate('JS_YOU_HAVE_REACHED');
                                var usersmessage = app.vtranslate('JS_USER_LIMIT');
                                alert(message + limitUser + usersmessage);
                                return false;
                            }
                        }
                        isSelected[i] = availListObj.options[i].selected;
                        lblOptions = app.vtranslate("JS_OPTION");
                        var newColObj = document.createElement(lblOptions);
                        newColObj.value = availListObj.options[i].value

                        newColObj.text = availListObj.options[i].text;
                        selectedUsers.appendChild(newColObj)
                        newColObj.selected = true
                        rowFound = false
                    } else {
                        if (existingObj != null) existingObj.selected = true
                    }
                }
            }

            selectCalendar = availListObj.options.length;
            while (selectCalendar--) {
                if (isSelected[selectCalendar]) {
                    availListObj.remove(selectCalendar);
                }
            }

        });
    },

    registerRemoveUserSettingsEvent: function() {
        jQuery("#removeVtigerUser").live('click', function() {
            availListObj = document.getElementById('availableUsers')
            selectedUsers = document.getElementById('selectedUsers');
            limitUser = document.getElementById('userLimit').value;
            var selectLength = selectedUsers.length
            var availableLength = availListObj.length

            for (i = 0; i < availListObj.length; i++) {
                availListObj.options[i].selected = false
            }

            var count = 0;
            var isSelected = [];
            for (i = 0; i < selectedUsers.length; i++) {
                if (selectedUsers.options[i].selected == true) {
                    var rowFound = false;
                    var existingObj = null;
                    for (j = 0; j < availListObj.length; j++) {
                        if (availListObj.options[j].value == selectedUsers.options[i].value) {
                            rowFound = true;
                            existingObj = availListObj.options[j]
                            break
                        }
                    }

                    if (rowFound != true) {
                        // check limit users
                        count++;
                        if (limitUser != 0) {
                            if (count + availableLength > limitUser) {
                                var message = app.vtranslate('JS_YOU_HAVE_REACHED');
                                var usersmessage = app.vtranslate('JS_USER_LIMIT');
                                alert(message + limitUser + usersmessage);
                                return false;
                            }
                        }
                        isSelected[i] = selectedUsers.options[i].selected;
                        lblOptions = app.vtranslate("JS_OPTION");
                        var newColObj = document.createElement(lblOptions);
                        newColObj.value = selectedUsers.options[i].value

                        newColObj.text = selectedUsers.options[i].text;
                        availListObj.appendChild(newColObj)
                        newColObj.selected = true
                        rowFound = false
                    } else {
                        if (existingObj != null) existingObj.selected = true
                    }
                }
            }

            selectCalendar = selectedUsers.options.length;
            while (selectCalendar--) {
                if (isSelected[selectCalendar]) {
                    selectedUsers.remove(selectCalendar);
                }
            }
        });
    },

    registerAddContactGroupEvent: function() {
        jQuery("#addCalendar").on('click', function() {
            var calendarLimit = jQuery('#calendarLimit').val();
            var availListObj = document.getElementById('availableCalendar');
            var selectedCalendars = document.getElementById('selectedCalendar');
            var selectLength = selectedCalendars.length;
            var availableLength = availListObj.length;
            for (i = 0; i < selectedCalendars.length; i++) {
                selectedCalendars.options[i].selected = false;
            }
            // alert(selectLength+' - '+calendarLimit);
            var isSelected = [];
            if(selectLength < 1){
                for (i = 0; i < availListObj.length; i++) {
                    if (availListObj.options[i].selected == true) {
                        var rowFound = false;
                        var existingObj = null;
                        for (j = 0; j < selectedCalendars.length; j++) {
                            if (selectedCalendars.options[j].value == availListObj.options[i].value) {
                                rowFound = true;
                                existingObj = selectedCalendars.options[j]
                                break
                            }
                        }
                        if (rowFound != true) {
                            isSelected[i] = availListObj.options[i].selected;
                            lblOptions = app.vtranslate("JS_OPTION");
                            var newColObj = document.createElement(lblOptions);
                            newColObj.value = availListObj.options[i].value
                            newColObj.text = availListObj.options[i].text;
                            selectedCalendars.appendChild(newColObj);
                            newColObj.selected = true
                            rowFound = false;
                            jQuery('#calendarLimit').val(1);

                        } else {
                            if (existingObj != null) existingObj.selected = true
                        }
                    }
                    // Remove selected items.
                }

                selectCalendar = availListObj.options.length;
                while (selectCalendar--) {
                    if (isSelected[selectCalendar]) {
                        availListObj.remove(selectCalendar);
                    }
                }
            }else{
                app.helper.showErrorNotification({"message":app.vtranslate('JS_CONTACT_LIMIT_IS_REACHED')});
                return;
            }

        });
    },

    registerRemoveContactGroupEvent: function() {
        jQuery("#removeCalendar").on('click', function() {
            var availListObj = document.getElementById('availableCalendar');
            var selectedCalendars = document.getElementById('selectedCalendar');
            var selectLength = selectedCalendars.length;
            var availableLength = availListObj.length;
            for (i = 0; i < availListObj.length; i++) {
                availListObj.options[i].selected = false;
            }

            var isSelected = [];
            for (i = 0; i < selectedCalendars.length; i++) {
                if (selectedCalendars.options[i].selected == true) {
                    var rowFound = false;
                    var existingObj = null;

                    for (j = 0; j < availListObj.length; j++) {
                        if (availListObj.options[j].value == selectedCalendars.options[i].value) {
                            rowFound = true;
                            existingObj = availListObj.options[j]
                            break
                        }
                    }

                    if (rowFound != true) {
                        isSelected[i] = selectedCalendars.options[i].selected;
                        lblOptions = app.vtranslate("JS_OPTION");
                        var newColObj = document.createElement(lblOptions)
                        newColObj.value = selectedCalendars.options[i].value
                        newColObj.text = selectedCalendars.options[i].text;
                        availListObj.appendChild(newColObj)
                        newColObj.selected = true
                        rowFound = false
                        // jQuery('#calendarLimit').val(0);
                    } else {
                        if (existingObj != null) existingObj.selected = true
                    }
                }
            }

            selectCalendar = selectedCalendars.options.length;
            while (selectCalendar--) {
                if (isSelected[selectCalendar]) {
                    selectedCalendars.remove(selectCalendar);
                }
            }
        });
    },

    packFieldmappingsForSubmit : function() {
        var rows = jQuery('table#convertMapping > tbody > tr.googlesyncfieldmapping');
        
        var mapping = {};
        jQuery.each(rows,function(index,row) {
            var tr = jQuery(row);
            var vtiger_field_name = tr.find('.Vtiger').not('.select2-container').val();
            var google_field_name = tr.find('.Google').not('.select2-container').val();
            
            var google_field_type = '';
            if(google_field_name.indexOf("_") != -1){
                var type = google_field_name.split('_');
                google_field_name = type[0];
                google_field_type = type[1];
            }
            
            var google_custom_label = '';
            var customLabelElement = tr.find('.customFields');
            if(google_field_type == 'custom' && customLabelElement.length) {
                google_custom_label = customLabelElement.val();
            }
            
            var map = {};
            map['vtiger_field_name'] = vtiger_field_name;
            map['google_field_name'] = google_field_name;
            map['google_field_type'] = google_field_type;
            map['google_custom_label'] = google_custom_label;
            mapping[index] = map;
        })
        return JSON.stringify(mapping);
    },

    registerEventForCustomField : function () {
        $('body').ajaxComplete(function() {
            jQuery('.Google').on('change', function (e) {
                var googleFields = JSON.parse(jQuery('.fieldMappingEditPageDiv').find('input#google_fields').val());
                var target = jQuery(e.currentTarget);
                var googleField = jQuery(target).val();
                if(googleField.indexOf("_custom") != -1){
                    var inputData = jQuery(this).siblings('input[id="customFields"]').removeClass('hide');
                }else{
                    var type = googleField.split('_');
                    googleTypeSelectElement = '<input type="hidden" class="google_field_name" value="'+googleField+'" />';
                    var inputData = jQuery(this).siblings('input[id="customFields"]').addClass('hide');
                }
            });
        });
    },

    registerEventsForSaveSetting : function(){
        var thisInstance = this;
        jQuery('#saveGoogleCalendarConfiguration, #saveGoogleCalendarConfiguration2').on('click', function(e){
            var selectedUsersObject = document.getElementById('selectedUsers');
            var selectedUsersDetails = document.getElementById('selectedUsersValue');
            var isAdmin = $('#isAdmin').val();

            var selectedContactColumnsObj = document.getElementById('selectedCalendar');
            var selectedContacts = document.getElementById('selectCalendar');
            var selectedContactsGroup = '';

            if(selectedContactColumnsObj.options.length == 0){
                app.helper.showErrorNotification({"message":app.vtranslate('JS_PLEASE_SELECT_CONTACT_GROUP')});
                return false;
            }
            
            if(isAdmin == 'on'){
                var selectedUser = '';

                for (i = 0; i < selectedUsersObject.options.length; i++) {
                    selectedUser += selectedUsersObject.options[i].value + ";";
                }
                selectedUsersDetails.value = selectedUser;

                if(selectedUsersObject.options.length == 0){
                    app.helper.showErrorNotification({"message":app.vtranslate('JS_PLEASE_SELECT_VTIGER_USER')});
                    return false;
                }
            }

            for (i = 0; i < selectedContactColumnsObj.options.length; i++) {
                selectedContactsGroup += selectedContactColumnsObj.options[i].value;
            }
            selectedContacts.value = selectedContactsGroup;

            var googleFieldCount = 0;
            $.each($("select.googleField"), function() {
                var selectVal = $(this).val();
                var hasClass = $(this).hasClass('newSelect');
                if(selectVal == '' && !hasClass){
                    googleFieldCount++;
                }
            });

            var vtigerFieldCount = 0;
            $.each($("select.moduleField"), function() {
                var selectVal = $(this).val();
                var hasClass = $(this).hasClass('newSelect');
                if(selectVal == '' && !hasClass){
                    vtigerFieldCount++;
                }
            });

            if(googleFieldCount > 0 || vtigerFieldCount > 0){
                app.helper.hideProgress();
                var message = app.vtranslate('JS_PLEASE_FILL_FIELD');
                app.helper.showErrorNotification({'message':message});
                return false;
            }

            var fieldMapping = thisInstance.packFieldmappingsForSubmit();
            jQuery('#user_field_mapping').val(fieldMapping);
            var selectedModuleName = jQuery('#sourceModuleName').val();
            var formData = $("form").serialize();
            app.helper.showProgress();
            if(selectedModuleName != 'none'){
                var params = {
                    'module': app.getModuleName(),
                    'action': 'CTGoogleOffice365SuiteSyncGoogleContactsSaveSetting',
                    'value': formData,
                }

                AppConnector.request(params).then(function(data){

                    app.helper.hideProgress();
                    var message = app.vtranslate('JS_GOOGLE_CONTACT_SETTING_DATA_SAVED_SUCCESSFULLY');
                    app.helper.showSuccessNotification({'message':message});
                    setTimeout(function() {
                        if(data.result.googleContactsConfigURL){
                            window.location.href = data.result.googleContactsConfigURL;
                        }
                    }, 1500);
                });
            } else{
                app.helper.hideProgress();
                var message = app.vtranslate('JS_SELECT_MODULE');
                app.helper.showErrorNotification({'message':message});
            }

        });
    },

    registerEventModuleFieldMapping : function(){
        var thisInstance = this;
        jQuery('#sourceModuleName').live('change', function (e){
            var hasLoader = jQuery('body').find('#mappingCondition').hasClass('customLoader');
            if(hasLoader == false){
                jQuery('body').find('#mappingCondition').html(`<div class="customLoader" style="opacity: 0.5;
                background-color: white;
                z-index: 100000;
                top: 0px;
                width: 100%;
                height: 100%;
                margin-top: 5%;"><div style="text-align:center;top:50%;left:40%;"><img src="layouts/v7/skins/images/loading.gif"></div></div>`);
            } 
            var sourceModule = jQuery('#sourceModuleName').val();
            if(sourceModule == 'none'){
                jQuery('body').find('#mappingCondition').html('');
            }else{

                var cvId = jQuery('#selectedModuleFilter').val(); 
                var params = {
                    'module' : 'GoogleOffice365Suite',
                    'view' : "CTGoogleOffice365SuiteSyncGoogleContactsMappings",
                    'mode' : 'getMappingConditions',
                    sourceModule : sourceModule,
                    'cvId' : cvId
                }

                AppConnector.request(params).then(function(data) {
                    jQuery('body').find('#mappingCondition').html(data.result);
                    vtUtils.applyFieldElementsView(jQuery('#mappingCondition'));
                });

            }
        });
    },

    registerEventForAddingNewMapping : function(){
        // $('body').ajaxComplete(function() {
            $('body').on('click', "#addMapping", function(){
                // alert('test');
                var addmappingrow = jQuery('#convertMapping');
                var lastSequenceNumber = addmappingrow.find('tr:not(.newMapping):last').attr('sequence-number');
                if(!lastSequenceNumber){
                    lastSequenceNumber = 0;
                }
                
                var newSequenceNumber = parseInt(lastSequenceNumber) + 1;
                var newMapping = jQuery('.newMapping').clone(true,true);
                newMapping.attr('sequence-number',newSequenceNumber);
                
                newMapping.find('.Vtiger.newSelect').attr("name",'vtiger_fields['+newSequenceNumber+']');
                newMapping.find('.Google.newSelect').attr("name",'Google['+newSequenceNumber+']');
                newMapping.find('.customFields').attr("name",'custom_fields['+newSequenceNumber+']');
                newMapping.removeClass('hide newMapping');
                newMapping.addClass('googlesyncfieldmapping');
                newMapping.appendTo(addmappingrow);
                newMapping.find('.newSelect').removeClass('newSelect').addClass('select2');
                var select2Elements = newMapping.find('.select2');
                vtUtils.showSelect2ElementView(select2Elements);
                // jQuery('.Vtiger.select2',newMapping).trigger('change',false);
                // jQuery('.Google.select2',newMapping).trigger('change',false);
            });

        // })
    },

    registerMultiDropDownValidationEvent: function(){
        jQuery('body').on('change', 'select.moduleField', function(){
            var selectedElement= $(this);
            var selectedValue = selectedElement.val();
            var selectedNameAttr = selectedElement.attr('name');
            if(selectedValue != ''){
                $.each($("select.moduleField"), function() {
                var nameAttr = $(this).attr('name');
                var selectVal = $(this).val();
                if(nameAttr != selectedNameAttr){
                    if(selectVal == selectedValue){
                        app.helper.hideProgress();
                        var message = app.vtranslate('LBL_FIELD_ALREADY_MAPPING');
                        app.helper.showErrorNotification({'message':message});
                        selectedElement.select2('val','');
                        return false;     
                    }
                }
            });
            }
        });

        jQuery('body').on('change', 'select.googleField', function(){
            var selectedElement= $(this);
            var selectedValue = selectedElement.val();
            var selectedNameAttr = selectedElement.attr('name');
            if(selectedValue != ''){
                $.each($("select.googleField"), function() {
                var nameAttr = $(this).attr('name');
                var selectVal = $(this).val();
                if(nameAttr != selectedNameAttr){
                    if(selectVal == selectedValue){
                        app.helper.hideProgress();
                        var message = app.vtranslate('LBL_FIELD_ALREADY_MAPPING');
                        app.helper.showErrorNotification({'message':message});
                        selectedElement.select2('val','');
                        return false;     
                    }
                }
            });
            }
        });
    },

    registerEventToDeleteMapping : function(){
        jQuery('i.deleteMapping').live('click', function (e){
             $(this).closest('tr.listViewEntries').remove();
        });
    },
    
    //Step 3
    registerEventsForEnableAutoSync : function(){
        jQuery('#enableAutoSync').live('change', function(e){
            app.helper.showProgress();
            var active = jQuery("[name='enableAutoSync']").prop("checked");
            if(active == true){
                var value = 1;
            }else{
                var value = 0;
            }
            var params = {
                'module': app.getModuleName(),
                'action': 'CTGoogleOffice365SuiteSyncGoogleContactsAutoSync',
                'mode': 'enableAutoSyncGoogleContacts',
                'value': value,
            }
            AppConnector.request(params).then(function(data){
                app.helper.hideProgress();
                if(value == 1){
                    var message = app.vtranslate('JS_AUTO_SYNC_FOR_GOOGLE_CALENDAR_IS_ENABLED');
                    app.helper.showSuccessNotification({'message':message});    
                }else{

                    var message = app.vtranslate('JS_SYNC_GOOGLE_DISABLED');
                    app.helper.showErrorNotification({'message':message});                            
                }
            });
        });
    },

    registerEventsForMaximumValueForSync : function(){
        $(document).on('keyup keydown', 'input.batch', function(e) {
            var $myInput = $(this);
            if ($myInput.val() < 1) {
                // $myInput.val(1);
            }
            if ($myInput.val() > 100) {
                $myInput.val(100);
            }
        });
        /*$(document).on('keyup keydown', 'input.minutes', function(e) {
            var $myInput = $(this);
            console.log($myInput.val());return false;
            if ($myInput.val() < 900) {
                $myInput.val(900);
            }
            if ($myInput.val() > 3600) {
                $myInput.val(3600);
            }
        });*/
    },

        /* global search code end*/
            /**
    * Function to return Click On Menu Button
    **/
    registerAppTriggerEvent : function() {
        jQuery('.app-menu').removeClass('hide');
        var toggleAppMenu = function(type) {
            var appMenu = jQuery('.app-menu');
            var appNav = jQuery('.app-nav');
            appMenu.appendTo('#page');
            appMenu.css({
                'top' : appNav.offset().top + appNav.height(),
                'left' : 0,
                'width' : '50%',
                'max-width' : '230px'
            });
            if(typeof type === 'undefined') {
                type = appMenu.is(':hidden') ? 'show' : 'hide';
            }
            if(type == 'show') {
                appMenu.show(200, function() {});
            } else {
                appMenu.hide(200, function() {});
            }
        };

        jQuery('.app-trigger, .app-icon, .app-navigator').on('click',function(e){
            e.stopPropagation();
            toggleAppMenu();
        });

        jQuery('html').on('click', function() {
            toggleAppMenu('hide');
        });

        jQuery(document).keyup(function (e) {
            if (e.keyCode == 27) {
                if(!jQuery('.app-menu').is(':hidden')) {
                    toggleAppMenu('hide');
                }
            }
        });

        jQuery('.app-modules-dropdown-container').hover(function(e) {
            var dropdownContainer = jQuery(e.currentTarget);
            jQuery('.dropdown').removeClass('open');
            if(dropdownContainer.length) {
                //Fix for Responsive layout Sub Menu in mobile devices
                var appModulesDropdown = dropdownContainer.find('.app-modules-dropdown');
                if(dropdownContainer.hasClass('dropdown-compact')) {
                    appModulesDropdown.css('top', dropdownContainer.position().top - 8);
                } else {
                    appModulesDropdown.css('top', '');
                }
                appModulesDropdown.css('left', appModulesDropdown.parent().width() - 8);
                dropdownContainer.addClass('open').find('.app-item').addClass('active-app-item');
            }
        }, function(e) {
            var dropdownContainer = jQuery(e.currentTarget);
            dropdownContainer.find('.app-item').removeClass('active-app-item');
            setTimeout(function() {
                if(dropdownContainer.find('.app-modules-dropdown').length && !dropdownContainer.find('.app-modules-dropdown').is(':hover') && !dropdownContainer.is(':hover')) {
                    dropdownContainer.removeClass('open');
                }
            }, 500);

        });

        //Fix for Responsive layout Sub Menu in mobile devices
        jQuery('.app-item').on('click', function(e) {
            var url = jQuery(this).data('defaultUrl');
            if(url && url!=='#') {
                window.location.href = url;
            } else {
                e.stopPropagation();
            }
        });

        jQuery(window).resize(function() {
            jQuery(".app-modules-dropdown").mCustomScrollbar("destroy");
            app.helper.showVerticalScroll(jQuery(".app-modules-dropdown").not('.dropdown-modules-compact'), {
                setHeight: $(window).height(),
                autoExpandScrollbar: true
            });
            jQuery('.dropdown-modules-compact').each(function() {
                var element = jQuery(this);
                var heightPer = parseFloat(element.data('height'));
                app.helper.showVerticalScroll(element, {
                    setHeight: $(window).height()*heightPer - 3,
                    autoExpandScrollbar: true,
                    scrollbarPosition: 'outside'
                });
            });
        });
        app.helper.showVerticalScroll(jQuery(".app-modules-dropdown").not('.dropdown-modules-compact'), {
            setHeight: $(window).height(),
            autoExpandScrollbar: true,
            scrollbarPosition: 'outside'
        });
        jQuery('.dropdown-modules-compact').each(function() {
            var element = jQuery(this);
            var heightPer = parseFloat(element.data('height'));
            app.helper.showVerticalScroll(element, {
                setHeight: $(window).height()*heightPer - 3,
                autoExpandScrollbar: true,
                scrollbarPosition: 'outside'
            });
        });
    },
    
    /**
     * Registered the events for this page
     */
    registerEvents: function(){
        this.registerSaveGoogleAPIsSettingEvent();
        this.registerGenerateTokenEvent();
        this.registerAddUserSettingsEvent();
        this.registerRemoveUserSettingsEvent();
        this.registerAddContactGroupEvent();
        this.registerRemoveContactGroupEvent();
        this.registerEventForCustomField();
        this.registerEventsForSaveSetting();
        this.registerEventModuleFieldMapping();
        this.registerEventForAddingNewMapping();
        this.registerEventToDeleteMapping();
        this.registerEventsForMaximumValueForSync();
        this.registerMultiDropDownValidationEvent();
        this.registerAppTriggerEvent();

        // trigger sourceModuleName If Selected
        if($('#selectedSourceModule').val() != ''){
          $('#sourceModuleName').select2().trigger('change');    
        }
        
    }
});

jQuery(document).ready(function() {
    var instance = new GoogleOffice365Suite_CTGoogleOffice365SuiteSyncGoogleContacts_Js();
    instance.registerEvents();
});