/*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ******************************************************************************/

Vtiger_List_Js("GoogleOffice365Suite_CTGoogleOffice365SuiteSyncOutlookContacts_Js", {}, {

    /**
    * Function to save Outlook API Settings
    */
    registerSaveOutlookAPIsSettingEvent : function () {
        jQuery('#saveOutlookAPIsSetting').on('click',function(){
            var clientId = jQuery("#clientId").val();
            var clientSecret = jQuery("#clientSecret").val();
            var tenantId = jQuery("#tenantId").val();
            var redirectUrl = jQuery("#redirectUrl").val();
            var userName = jQuery("#userName").val();
            var password = jQuery("#password").val();

            if(clientId == "" || clientSecret == "" || tenantId == "" || redirectUrl == "" || userName == "" || password == ""){
                if (clientId == "") {
                    app.helper.showErrorNotification({"message":app.vtranslate('JS_CLIENT_ID_NOT_EMPTY')});
                    return;
                }
                if (clientSecret == "") {
                    app.helper.showErrorNotification({"message":app.vtranslate('JS_CLIENT_SECRET_NOT_EMPTY')});
                    return;
                }
                if (tenantId == "") {
                    app.helper.showErrorNotification({"message":app.vtranslate('JS_TANANT_ID_NOT_EMPTY')});
                    return;
                }
                if (redirectUrl == "") {
                    app.helper.showErrorNotification({"message":app.vtranslate('JS_REDIRECT_URL_NOT_EMPTY')});
                    return;
                }
                if (userName == "") {
                    app.helper.showErrorNotification({"message":app.vtranslate('JS_USERNAME_NOT_EMPTY')});
                    return;
                }
                if (password == "") {
                    app.helper.showErrorNotification({"message":app.vtranslate('JS_PASSWORD_NOT_EMPTY')});
                    return;
                }
            }else {
                var params = {
                    'module' : app.getModuleName(),
                    'action' : 'CTGoogleOffice365SuiteSyncOutlookContactsConfiguration',
                    'mode' : 'OutlookAPIsSettingSave',
                    'clientId' : clientId,
                    'clientSecret' : clientSecret,
                    'tenantId' : tenantId,
                    'redirectUrl' : redirectUrl,
                    'userName' : userName,
                    'password' : password,
                }
                app.helper.showProgress();
                AppConnector.request(params).then( function(data) {
                    app.helper.hideProgress();
                    if(data.result.outgoingConfigurationURL){
                        window.location.href = data.result.outgoingConfigurationURL;
                    }
                });
            }
        });
    },

    /**
    * Function to generate token For Contacts
    **/
    registerGenerateTokenEvent : function() {
        jQuery("#generateToken").on('click', function() {
            var redirectUrl = jQuery("#redirectUrl").val();
            var tenantId = jQuery("#tanentId").val();
            var clientId = jQuery("[name='clientId']").val();
            var userId = jQuery("#userId").val();
            if (jQuery("#generateToken").hasClass('newToken')) {
                window.location = "https://login.microsoftonline.com/"+tenantId+"/oauth2/v2.0/authorize?state="+userId+"&scope=https://graph.microsoft.com/.default offline_access&response_type=code&client_id="+clientId+"&redirect_uri="+redirectUrl;
            }else if (jQuery("#generateToken").hasClass('revokeToken')) {
                window.location = "index.php?module="+app.getModuleName()+"&view=CTGoogleOffice365SuiteRevokeOutlookToken&user_id=" + userId;
            }
        });
        jQuery("#homePage").on('click', function() {
            window.location = "index.php?module=GoogleOffice365Suite&view=List&viewname=52&app=MARKETING";
        });
        jQuery("#help").on('click', function() {
            window.location = "index.php?module=GoogleOffice365Suite&view=CTOffice365SuiteDocument&type=Contacts";
        });
    },

    /**
    * Function to Add Contact Group
    **/
    registerAddContactGroupEvent: function() {
        jQuery("#addContactsGroup").on('click', function() {
            var contactsGroupLimit = jQuery('#contactsGroupLimit').val();
            var availListObj = document.getElementById('availableContactsGroups');
            var selectedColumnsObj = document.getElementById('selectedContactsGroups');
            var selectLength = selectedColumnsObj.length;
            var availableLength = availListObj.length;
            for (i = 0; i < selectedColumnsObj.length; i++) {
                selectedColumnsObj.options[i].selected = false;
            }

            var isSelected = [];
            if(selectLength < 1){
                for (i = 0; i < availListObj.length; i++) {
                    if (availListObj.options[i].selected == true) {
                        var rowFound = false;
                        var existingObj = null;
                        for (j = 0; j < selectedColumnsObj.length; j++) {
                            if (selectedColumnsObj.options[j].value == availListObj.options[i].value) {
                                rowFound = true;
                                existingObj = selectedColumnsObj.options[j]
                                break
                            }
                        }
                        if (rowFound != true) {
                            isSelected[i] = availListObj.options[i].selected;
                            var newColObj = document.createElement("OPTION")
                            newColObj.value = availListObj.options[i].value
                            newColObj.text = availListObj.options[i].text;
                            selectedColumnsObj.appendChild(newColObj);
                            newColObj.selected = true
                            rowFound = false;
                            jQuery('#contactsGroupLimit').val(1);

                        } else {
                            if (existingObj != null) existingObj.selected = true
                        }
                    }
                }

                selectedContactsGroups = availListObj.options.length;
                while (selectedContactsGroups--) {
                    if (isSelected[selectedContactsGroups]) {
                        availListObj.remove(selectedContactsGroups);
                    }
                }
            }else{
                app.helper.showErrorNotification({"message":app.vtranslate('JS_CONTACT_LIMIT_IS_REACHED')});
                return;
            }

        });
    },

    /**
    * Function to register Remove Contacts Group
    **/
    registerRemoveContactGroupEvent: function() {
        jQuery("#removeContactsGroup").on('click', function() {
            var availListObj = document.getElementById('availableContactsGroups');
            var selectedColumnsObj = document.getElementById('selectedContactsGroups');
            var selectLength = selectedColumnsObj.length;
            var availableLength = availListObj.length;
            for (i = 0; i < availListObj.length; i++) {
                availListObj.options[i].selected = false;
            }

            var isSelected = [];
            for (i = 0; i < selectedColumnsObj.length; i++) {
                if (selectedColumnsObj.options[i].selected == true) {
                    var rowFound = false;
                    var existingObj = null;

                    for (j = 0; j < availListObj.length; j++) {
                        if (availListObj.options[j].value == selectedColumnsObj.options[i].value) {
                            rowFound = true;
                            existingObj = availListObj.options[j]
                            break
                        }
                    }

                    if (rowFound != true) {
                        isSelected[i] = selectedColumnsObj.options[i].selected;
                        var newColObj = document.createElement("OPTION")
                        newColObj.value = selectedColumnsObj.options[i].value
                        newColObj.text = selectedColumnsObj.options[i].text;
                        availListObj.appendChild(newColObj)
                        newColObj.selected = true
                        rowFound = false
                        jQuery('#contactsGroupLimit').val(0);
                    } else {
                        if (existingObj != null) existingObj.selected = true
                    }
                }
            }

            selectedContactsGroups = selectedColumnsObj.options.length;
            while (selectedContactsGroups--) {
                if (isSelected[selectedContactsGroups]) {
                    selectedColumnsObj.remove(selectedContactsGroups);
                }
            }
        });
    },

    /**
    * Function to register to save Setting page
    **/
    registerEventsForSaveSetting : function(){
        var thisInstance = this;
        jQuery('#saveOutlookContactConfiguration, #saveOutlookContactConfiguration2').on('click', function(e){
            var sourceModuleName = $('#sourceModuleName :selected').val();
            var isAdminUser = $('#isAdminUsers').val();
            console.log(isAdminUser);   
            var selectedColumnsObj = document.getElementById('selectedUsers');
            var userId = document.getElementById('selectedUsersValue');
            var selectedUser = '';
            if(selectedColumnsObj != null){            
                for (i = 0; i < selectedColumnsObj.options.length; i++) {
                    selectedUser += selectedColumnsObj.options[i].value + ";";
                }
                userId.value = selectedUser;
            }
            
            var selectedContactColumnsObj = document.getElementById('selectedContactsGroups');
            var selectedContacts = document.getElementById('selectedContactsGroups');
            var selectedContactsGroup = '';
            for (i = 0; i < selectedContactColumnsObj.options.length; i++) {
                selectedContactsGroup += selectedContactColumnsObj.options[i].value;
            }

            var googleFieldCount = 0;
            $.each($("select.vtigerColumn"), function() {
                var selectVal = $(this).val();
                var hasClass = $(this).hasClass('newSelect');
                if(selectVal == '' && !hasClass){
                    googleFieldCount++;
                }
            });

            var vtigerFieldCount = 0;
            $.each($("select.outlookColumn"), function() {
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

            selectedContacts.value = selectedContactsGroup;
            if(selectedContactsGroup == ""){
                var message = app.vtranslate('JS_PLEASE_SELECT_CONTACTS_GROUP_TO_SYNCING');
                app.helper.showErrorNotification({'message':message}); 
            }else if(selectedUser == "" && isAdminUser == "on"){
                var message = app.vtranslate('JS_PLEASE_ADD_USERS_TO_SYNCING');
                app.helper.showErrorNotification({'message':message});
            }else if(sourceModuleName == ""){
                var messages = app.vtranslate('JS_PLEASE_MODULE_WHICH_YOU_WANT_TO_SYNCING');
                app.helper.showErrorNotification({'message':messages});
            }else{
                app.helper.showProgress();
                var fieldMapping = thisInstance.packFieldmappingsForSubmit();
                jQuery('#contactsFieldMapping').val(fieldMapping);
                var contactsFormData = $("form").serialize();
                
                var params = {
                    'module': app.getModuleName(),
                    'action': 'CTGoogleOffice365SuiteSyncOutlookContactsSaveSetting',
                    'value': contactsFormData,
                }

                AppConnector.request(params).then(function(data){
                    app.helper.hideProgress();
                    var message = app.vtranslate('JS_OUTLOOK_CONTACT_SETTING_DATA_SAVED_SUCCESSFULLY');
                    app.helper.showSuccessNotification({'message':message});    
                    window.location.href = "index.php?module=GoogleOffice365Suite&view=CTGoogleOffice365SuiteSyncOutlookData";  
                });
            }
        });
    },

    /**
    * Function to get value of Field Mapping
    **/
    packFieldmappingsForSubmit : function() {
        var rows = jQuery('table#convertMapping > tbody > tr.outlookSyncFieldMapping');
        var mapping = {};
        jQuery.each(rows,function(index,row) {
            var tr = jQuery(row);
            var vtigerFieldName = tr.find('.Vtiger').not('.select2-container').val();
            var outlookFieldName = tr.find('.Outlook').not('.select2-container').val();
            var map = {};
            map['vtigerFieldName'] = vtigerFieldName;
            map['outlookFieldName'] = outlookFieldName;
            mapping[index] = map;
        });
        return JSON.stringify(mapping);
    },

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
    * Function to add vTiger Users
    **/
    registerEventsForAddVtigerUsers : function() {
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

    /**
    * Function to Remove vTiger Users
    **/
    registerEventsForRemoveVtigerUsers : function() {
        jQuery("#removeVtigerUser").live('click', function() {
            availListObj = document.getElementById('availableUsers')
            selectedColumnsObj = document.getElementById('selectedUsers');
            limitUser = document.getElementById('userLimit').value;
            var selectLength = selectedColumnsObj.length
            var availableLength = availListObj.length

            for (i = 0; i < availListObj.length; i++) {
                availListObj.options[i].selected = false
            }

            var count = 0;
            var isSelected = [];
            for (i = 0; i < selectedColumnsObj.length; i++) {
                if (selectedColumnsObj.options[i].selected == true) {
                    var rowFound = false;
                    var existingObj = null;
                    for (j = 0; j < availListObj.length; j++) {
                        if (availListObj.options[j].value == selectedColumnsObj.options[i].value) {
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
                                alert('You have reached ' + limitUser + ' user limit!');
                                return false;
                            }
                        }
                        isSelected[i] = selectedColumnsObj.options[i].selected;
                        var newColObj = document.createElement("OPTION")
                        newColObj.value = selectedColumnsObj.options[i].value

                        newColObj.text = selectedColumnsObj.options[i].text;
                        availListObj.appendChild(newColObj)
                        newColObj.selected = true
                        rowFound = false
                    } else {
                        if (existingObj != null) existingObj.selected = true
                    }
                }
            }

            selectedContactsGroups = selectedColumnsObj.options.length;
            while (selectedContactsGroups--) {
                if (isSelected[selectedContactsGroups]) {
                    selectedColumnsObj.remove(selectedContactsGroups);
                }
            }
        });
    },

    /**
    * Function to get Field Mapping
    **/
    registerEventModuleFieldMapping : function(){
        var thisInstance = this;
        jQuery('#sourceModuleName').live('change', function (e){
            var sourceModule = jQuery('#sourceModuleName').val();
          
            var cvId = jQuery('#selectedModuleFilter').val();             
            if(sourceModule != ""){
                var params = {
                    'module' : 'GoogleOffice365Suite',
                    'view' : "CTGoogleOffice365SuiteSyncOutlookContactsMappings",
                    'mode' : 'getMappingConditions',
                    sourceModule : sourceModule,
                    cvId : cvId
                }
                app.helper.showProgress();
                AppConnector.request(params).then(
                    function(data) {
                        console.log(data);
                        app.helper.hideProgress();
                        jQuery('body').find('#mappingCondition').html(data.result);
                        vtUtils.applyFieldElementsView(jQuery('#mappingCondition'));
                        thisInstance.GoogleOffice365Suite = GoogleOffice365Suite_CTGoogleOffice365SuiteSyncOutlookContacts_Js.getInstance(jQuery('.fieldMappingEditPageDiv' ));
                        thisInstance.GoogleOffice365Suite = GoogleOffice365Suite_CTGoogleOffice365SuiteSyncOutlookContacts_Js.getInstance(jQuery('.moduleFilterEditPageDiv' ));
                    }
                );
            }else{
                jQuery('body').find('#mappingCondition').html('');
            }
        });
    },

    /**
    * Function to Adding New Mapping Field
    **/
    registerEventForAddingNewMapping : function(){
        $('body').on('click','#addMapping',function(){
            var addmappingrow = jQuery('#convertMapping');
            var lastSequenceNumber = addmappingrow.find('tr:not(.newMapping):last').attr('sequence-number');
            if(!lastSequenceNumber){
                lastSequenceNumber = 0;
            }
            
            var newSequenceNumber = parseInt(lastSequenceNumber) + 1;
            var newMapping = jQuery('.newMapping').clone(true,true);
            newMapping.attr('sequence-number',newSequenceNumber);
            newMapping.find('.Vtiger.newSelect').attr("name",'vtiger_fields['+newSequenceNumber+']');
            newMapping.find('.Outlook.newSelect').attr("name",'outlookField['+newSequenceNumber+']');

            newMapping.removeClass('hide newMapping');
            newMapping.addClass('outlookSyncFieldMapping');
            newMapping.appendTo(addmappingrow);
            newMapping.find('.newSelect').removeClass('newSelect').addClass('select2');
            var select2Elements = newMapping.find('.select2');
            vtUtils.showSelect2ElementView(select2Elements);
            // jQuery('.Vtiger.select2',newMapping).trigger('change',false);
            // jQuery('.Outlook.select2',newMapping).trigger('change',false);
        })
    },

    /**
    * Function to delete Field Mapping Row
    */
    registerEventToDeleteMapping : function(){
        jQuery('i.deleteMapping').live('click', function (e){
             $(this).closest('tr.listViewEntries').remove();
        });
    },

    /**
    * Function to Sync Contacts Data From Outlook
    */
    registerSyncContactsFromOutlook: function() {
        jQuery("#syncFromOutlookContact").on('click', function() {
            var params = {
                'module': app.getModuleName(),
                'action': 'CTGoogleOffice365SuiteSyncOutlookContactsSyncToVtiger'
            }

            app.helper.showProgress();
            AppConnector.request(params).then(function(data) {
                app.helper.hideProgress();
                if (data.result.message) {
                    app.helper.showAlertNotification({
                        'message': data.result.message
                    });
                }else if(data.result.syncMessage){
                    app.helper.showErrorNotification({
                        'message': data.result.syncMessage
                    });
                }else if (data.result.status == 0) {
                        var message = app.vtranslate("JS_AUTO_SYNC_ALREADY_RUNNING_IN_THE_BACKGROUND_PLEASE_TRY_AFTER_SOME_TIME");
                        app.helper.showSuccessNotification({'message':message});
                }if(data.result.status == "autoSyncingRunning"){
                    var message = app.vtranslate('JS_AUTO_SYNC_ALREADY_RUNNING_IN_THE_BACKGROUND_PLEASE_TRY_AFTER_SOME_TIME');
                    app.helper.showErrorNotification({'message':message});
                    return false;
                }else {
                    var message = app.vtranslate("JS_SYNC_TO_VTIGER_CONTACTS_HAS_COMPLETED_SUCCESSFULLY");
                    app.helper.showSuccessNotification({
                        'message': message + app.vtranslate("JS_TOTAL")+ " " + data.result.createRecordIds + " " + app.vtranslate("JS_RECORD_CREATED")+ " " + data.result.updateRecordIds+ " " + app.vtranslate("JS_RECORD_UPDATED")+ " " + data.result.deleteRecordIds+ " " + app.vtranslate("JS_RECORD_DELETED")
                    });
                }
            });
        });
    },
    
    /**
    * Function to Save Contacts Auto Sync Data
    */
    registerEventsForOutlookSyncContactsDetails : function(){
        var thisInstance = this;
        jQuery('#saveOutlookSyncContact').on('click', function(e){
           
            var enableAutoSync = jQuery('#enableAutoSync').val();
            var batch = jQuery('#batch').val();
            var userId =jQuery('#userId').val();
            var minutes = jQuery('#minutes').val();

            var selectedVal = "";
            var selected = $("input[type='radio'][name='enableAutoSyncContacts']:checked");
            if (selected.length > 0) {
                selectedVal = selected.val();
            }
            
            
            if(selectedVal == 'customContacts'){
                var syncFromDate = jQuery('#syncFromDate').val();
            }else{
                selectedVal;
            }
            var enableAutoSync = jQuery("[name='enableAutoSync']").prop("checked");
            if(enableAutoSync == true){
                var value = 1;
            }else{
                var value = 0;
            }
           
            var frequencyValue = minutes * 60;
            var minimumFrequency = jQuery('#minutes').data('min');
            var maximumFrequency = jQuery('#minutes').data('max');

            if (minutes==0) {
                var message = app.vtranslate('JS_PLEASE_FILL_FIELD');
                vtUtils.showValidationMessage(jQuery('#minutes'), message, {
                    position: {
                        my: 'bottom left',
                        at: 'top left',
                        container: jQuery('#minutes').closest('.form-group')
                    }
                });
                e.preventDefault();
                return;
            }else {
                vtUtils.hideValidationMessage(jQuery('#minutes'));
                jQuery('#frequency').val(frequencyValue);
            }

            var minimumBatch = jQuery('#batch').data('min');
            var maximumBatch = jQuery('#batch').data('max');

            if(batch < minimumBatch){
                var message = app.vtranslate('JS_VALUE_SHOULD_NOT_BE_LESS_GRATER_THEN_0');
                
                vtUtils.showValidationMessage(jQuery('#batch'),message, {
                    position: {
                        my: 'bottom left',
                        at: 'top left',
                        container: jQuery('#batch').closest('.form-group')
                    }
                });
                e.preventDefault();
                return;
            }else if(batch > maximumBatch){
                var message = app.vtranslate('JS_VALUE_SHOULD_NOT_BE_LESS_THAN_100');
                
                vtUtils.showValidationMessage(jQuery('#batch'),message, {
                    position: {
                        my: 'bottom left',
                        at: 'top left',
                        container: jQuery('#batch').closest('.form-group')
                    }
                });
                e.preventDefault();
                return;
            }else{
                vtUtils.hideValidationMessage(jQuery('#batch'));
            }

            if(value == 0){
                var message = app.vtranslate('JS_PLEASE_SELECT_AUTO_SYNC');
                app.helper.showErrorNotification({'message':message}); 
                return;
            }else if(selectedVal == ""){
                var message = app.vtranslate('JS_PLEASE_SELECT_OPTION_FOR_SYNC_PROCESS');
                app.helper.showErrorNotification({'message':message}); 
            }else if(selectedVal == "customContacts" && (syncFromDate == '0000-00-00' || syncFromDate == "")){
                var message = app.vtranslate('JS_PLEASE_SELECT_PROPER_DATE_FORMATE');
                vtUtils.showValidationMessage(jQuery('#syncFromDate'),message, {
                    position: {
                        my: 'bottom left',
                        at: 'top left',
                        container: jQuery('#batch').closest('.form-group')
                    }
                });
                e.preventDefault();
                return;
            }else{ 
                var params = {
                    'module': 'GoogleOffice365Suite',
                    'action': 'CTGoogleOffice365SuiteSyncOutlookContactsAutoSync',
                    'mode' : 'saveAutoSyncOutlookContacts',
                    'syncFromDate': syncFromDate,
                    'enableAutoSync' : value,
                    'batch' : batch,
                    'minutes' : minutes,
                    'userId' : userId,
                    'getSyncContact' : selectedVal,
                }
                AppConnector.request(params).then(
                    function(data){
                        var message = app.vtranslate('JS_SAVE_CONFIGURATION');
                        app.helper.showSuccessNotification({'message':message}); 
                        location.reload();
                    });
            }

        });
    },

    /**
    * Function to register Maximum Batch Size
    */
    registerEventsForMaximumBatchSize : function(){
        $(document).on('keyup keydown', 'input.batch', function(e) {
            vtUtils.hideValidationMessage(jQuery('#batch'));
            var $batchValue = $(this);
            if ($batchValue.val() < 1) {
                //$batchValue.val(1);
            }
            if ($batchValue.val() > 100) {
                $batchValue.val(100);
            }
        });
        $(document).on('keyup keydown', 'input.minutes', function(e) {
            vtUtils.hideValidationMessage(jQuery('#minutes'));
           /* var $minuteValue = $(this);
            if ($minuteValue.val() < 900) {
                $minuteValue.val(900);
            }
            if ($minuteValue.val() > 3600) {
                $minuteValue.val(3600);
            }*/
        });
    },

        /**
    * Function to validate For Same field select in Auto Populate Filed
    **/
    registerEventsForAutoPopulateValidation : function (){
        var thisInstance = this;
        setTimeout(function() {
            $('body').live('change','.vtigerColumn',function(e){
                alert($(this).val())
            });
            /*var filterContainer = jQuery('div.editViewContents');
            
            filterContainer.live('change','select[class="vtigerColumn"]',function(e){
                console.log(e.value)*/
                /*var currentElement = jQuery(e.currentTarget);
                console.log(currentElement);*/
                /*var selectedValue = currentElement.find("option:selected").text();
                var currentSelectedValue = jQuery(this).val();
                console.log(currentSelectedValue);*/
            //});
        }, 1000);
            
            
        
        /*filterContainer.on('change','select[name="columnname"]',function(e,data){
        var currentElement = jQuery(e.currentTarget);
        var selectedValue = currentElement.find("option:selected").text();
        var currentSelectedValue = jQuery(this).val();
                console.log(currentElement.parent().parent());

        
        var currentSequenceNumber = currentElement.parent().parent().attr('sequence_number');
        
        var duplicateOption = false;
        var existingIdElements;
        if(currentSelectedValue == "none"){
            currentSelectedValue = "false";
        }

        existingIdElements = jQuery('.filterContainerForAutoPopupCondition').find(' .conditionList .conditionRow').find('select[name="columnname"]');
        jQuery.each(existingIdElements, function( key, element ) {
            var element = jQuery(element);
            var existingSelectedValue = element.val();
            var existingSequenceNumbers = element.parent().parent().attr('sequence_number');

            if(currentSequenceNumber != existingSequenceNumbers && currentSelectedValue == existingSelectedValue){
                duplicateOption = true;
            }
        });
       if(duplicateOption === true){
            currentElement.find('option[value="none"]').attr('selected','selected');
            previousSelectedValue = currentElement.find('option[value="none"]').text();

            var params = {
                'id' : previousSelectedValue,
                'text' : previousSelectedValue
            }
            var warningMessage = selectedValue+" "+app.vtranslate('JS_IS_ALREADY_BEEN_MAPPED');
            var notificationParams = {
                message: warningMessage,
            };
            app.helper.showAlertNotification(notificationParams);
            currentElement.select2("data",params);
        }
        });*/
    },

    registerEventsForFieldMappingValidation : function(){
        jQuery('body').on('change', 'select.vtigerColumn', function(){
                var selectedElement= $(this);
                var selectedValue = selectedElement.val();
                if(selectedValue != ""){
                    var selectedNameAttr = selectedElement.attr('name');
                    $.each($("select.vtigerColumn"), function() {
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

            jQuery('body').on('change', 'select.outlookColumn', function(){
                var selectedElement= $(this);
                var selectedValue = selectedElement.val();
                if(selectedValue != ""){
                    var selectedNameAttr = $(this).attr('name');
                    $.each($("select.outlookColumn"), function() {
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

         /*jQuery('body').on('change', 'select.outlookColumn', function(){

                var selectedElement= $(this);
                var selectedValue = selectedElement.val();
                var selectedNameAttr = selectedElement.attr('name');
                $.each($("select.outlookColumn"), function() {
                    var nameAttr = $(this).attr('name');
                    var selectVal = $(this).val();

                    if(nameAttr != selectedNameAttr){
                        if(selectVal == selectedValue){
                            app.helper.hideProgress();
                            var message = app.vtranslate('LBL_FIELD_ALREADY_MAPPING');
                            app.helper.showErrorNotification({'message':message});
                            selectedElement.select2('val','');
                            return false;     
                        }s
                    }
                });
            });*/
    },

    registerDateValidationEvent : function () {
        $(function() {
        $("#syncFromDate").datepicker({format: 'mm-dd-yyyy',
                endDate: '+0d',
                autoclose: true });
        });
    },


    /**
     * Registered the events for this page
     */
    registerEvents: function(){
        $(window).load(function(){
            jQuery('select[name="sourceModuleName"]').trigger('change');
        });
        this.registerSaveOutlookAPIsSettingEvent();
        this.registerGenerateTokenEvent();
        this.registerEventsForSaveSetting();
        this.registerAddContactGroupEvent();
        this.registerRemoveContactGroupEvent();
        this.registerAppTriggerEvent();
        this.registerEventsForAddVtigerUsers();
        this.registerEventsForRemoveVtigerUsers();
        this.registerEventModuleFieldMapping();
        this.registerEventForAddingNewMapping();
        this.registerEventToDeleteMapping();
        // this.registerSyncContactsFromOutlook();
        // this.registerSyncContactToOutlook();
        this.registerEventsForOutlookSyncContactsDetails();
        this.registerEventsForMaximumBatchSize();
        this.registerEventsForFieldMappingValidation();
        this.registerDateValidationEvent();
    }
});

jQuery(document).ready(function() {
    var instance = new GoogleOffice365Suite_CTGoogleOffice365SuiteSyncOutlookContacts_Js();
    instance.registerEvents();
});