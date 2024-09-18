/*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ******************************************************************************/

Vtiger_List_Js("GoogleOffice365Suite_CTGoogleOffice365SuiteSyncOutlookEvents_Js", {}, {

    //Step1
    registerSaveGoogleAPIsSettingEvent : function () {
        jQuery('#saveOutlookEventsAPIsSetting').on('click',function(){
            var clientId = jQuery("#clientId").val();
            var clientSecret = jQuery("#clientSecret").val();
            var tenantId = jQuery("#tanentId").val();
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
                    'action' : 'CTGoogleOffice365SuiteSyncOutlookEventsConfiguration',
                    'mode' : 'OutlookEventsAPIsSettingSave',
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

    //Step 2
    registerGenerateTokenEvent : function() {
        jQuery("#generateTokenForEvents").on('click', function() {
            var eventsGenerateTokenUrl = jQuery("#eventsGenerateTokenUrl").val();
            var tenantId = jQuery("#tenantId").val();
            var clientId = jQuery("[name='clientId']").val();
            var userId = jQuery("#userId").val();
            if (jQuery("#generateTokenForEvents").hasClass('newToken')) {
                window.location = "https://login.microsoftonline.com/"+tenantId+"/oauth2/v2.0/authorize?state="+userId+"&scope=https://graph.microsoft.com/.default offline_access&response_type=code&client_id="+clientId+"&redirect_uri="+eventsGenerateTokenUrl;
            } else if (jQuery("#generateTokenForEvents").hasClass('revokeToken')) {
                window.location = "index.php?module=GoogleOffice365Suite&view=List&viewname=52&app=MARKETING";
            }
        });
        jQuery("#homePage").on('click', function() {
            window.location = "index.php?module=GoogleOffice365Suite&view=List&viewname=52&app=MARKETING";
        });
        jQuery("#help").on('click', function() {
            window.location = "index.php?module=GoogleOffice365Suite&view=CTOffice365SuiteDocument&type=Events";
        });
    },

    registerAddContactGroupEvent: function() {
        jQuery("#addCalendar").on('click', function() {
            var calendarLimit = jQuery('#calendarLimit').val();
            var availListObj = document.getElementById('availableCalendar');
            var selectedEventsGroup = document.getElementById('selectedCalendar');
            var selectLength = selectedEventsGroup.length;
            var availableLength = availListObj.length;
            for (i = 0; i < selectedEventsGroup.length; i++) {
                selectedEventsGroup.options[i].selected = false;
            }
            var isSelected = [];
            if(selectLength < 1){
                for (i = 0; i < availListObj.length; i++) {
                    if (availListObj.options[i].selected == true) {
                        var rowFound = false;
                        var existingObj = null;
                        for (j = 0; j < selectedEventsGroup.length; j++) {
                            if (selectedEventsGroup.options[j].value == availListObj.options[i].value) {
                                rowFound = true;
                                existingObj = selectedEventsGroup.options[j]
                                break
                            }
                        }
                        if (rowFound != true) {
                            isSelected[i] = availListObj.options[i].selected;
                            var newColObj = document.createElement("OPTION")
                            newColObj.value = availListObj.options[i].value
                            newColObj.text = availListObj.options[i].text;
                            selectedEventsGroup.appendChild(newColObj);
                            newColObj.selected = true
                            rowFound = false;
                            jQuery('#calendarLimit').val(1);

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
            }else{
                app.helper.showErrorNotification({"message":app.vtranslate('JS_CALENDAR_LIMIT_IS_REACHED')});
                return;
            }

        });
    },

    registerRemoveContactGroupEvent: function() {
        jQuery("#removeCalendar").on('click', function() {
            var availListObj = document.getElementById('availableCalendar');
            var selectedEventsGroup = document.getElementById('selectedCalendar');
            var selectLength = selectedEventsGroup.length;
            var availableLength = availListObj.length;
            for (i = 0; i < availListObj.length; i++) {
                availListObj.options[i].selected = false;
            }

            var isSelected = [];
            for (i = 0; i < selectedEventsGroup.length; i++) {
                if (selectedEventsGroup.options[i].selected == true) {
                    var rowFound = false;
                    var existingObj = null;

                    for (j = 0; j < availListObj.length; j++) {
                        if (availListObj.options[j].value == selectedEventsGroup.options[i].value) {
                            rowFound = true;
                            existingObj = availListObj.options[j]
                            break
                        }
                    }

                    if (rowFound != true) {
                        isSelected[i] = selectedEventsGroup.options[i].selected;
                        var newColObj = document.createElement("OPTION")
                        newColObj.value = selectedEventsGroup.options[i].value
                        newColObj.text = selectedEventsGroup.options[i].text;
                        availListObj.appendChild(newColObj)
                        newColObj.selected = true
                        rowFound = false
                        jQuery('#calendarLimit').val(0);
                    } else {
                        if (existingObj != null) existingObj.selected = true
                    }
                }
            }
            selectCalendar = selectedEventsGroup.options.length;
            while (selectCalendar--) {
                if (isSelected[selectCalendar]) {
                    selectedEventsGroup.remove(selectCalendar);
                }
            }
        });
    },

    registerEventsForSaveSetting : function(){
        var thisInstance = this;
            jQuery('#saveOutlookEventsConfiguration, #saveOutlookEventsConfiguration2').on('click', function(e){
            var selectedEventsGroup = document.getElementById('selectedUsers');
            var userId = document.getElementById('selectedUsersValue');
            var syncToDate = jQuery("#syncToDate").val();
           
            if(selectedEventsGroup != null){            
            var selectedUser = '';
                for (i = 0; i < selectedEventsGroup.options.length; i++) {
                    selectedUser += selectedEventsGroup.options[i].value + ";";
                }
                userId.value = selectedUser;
            }

            var selectedCalendarColumnsObj = document.getElementById('selectedCalendar');
            var selectedCalendars = document.getElementById('selectedCalendar');
                
            var selectedCalendarsGroup = '';
            for (i = 0; i < selectedCalendarColumnsObj.options.length; i++) {
                selectedCalendarsGroup += selectedCalendarColumnsObj.options[i].value;
            }
            selectedCalendars.value = selectedCalendarsGroup;

            if(syncToDate == "none"){
                var message = app.vtranslate('JS_PLEASE_SELECT_TO_DATE');
                app.helper.showErrorNotification({'message':message}); 
            }else if(selectedCalendarsGroup == ""){
                var message = app.vtranslate('JS_PLEASE_SELECT_CALENDAR_GROUP_TO_SYNCING');
                app.helper.showErrorNotification({'message':message}); 
            }else if(selectedUser == ""){
                var message = app.vtranslate('JS_PLEASE_ADD_USERS_TO_SYNCING');
                app.helper.showErrorNotification({'message':message});
            }else{
                app.helper.showProgress();
                var str = $("form").serialize();
                var params = {
                    'module': app.getModuleName(),
                    'action': 'CTGoogleOffice365SuiteSyncOutlookEventsSaveSetting',
                    'value': str,
                }
                AppConnector.request(params).then(function(data){
                    app.helper.hideProgress();
                    var message = app.vtranslate('JS_OUTLOOK_CALENDAR_SETTING_DATA_SAVED_SUCCESSFULLY');
                    app.helper.showSuccessNotification({'message':message});   
                    window.location.href = "index.php?module=GoogleOffice365Suite&view=CTGoogleOffice365SuiteSyncOutlookData";  
                });
            }   
        });
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

    registerEventsForAddVtigerUsers : function() {
        jQuery("#addVtigerUser").on('click', function() {
            availListObj = document.getElementById('availableUsers')
            selectedColumnsObj = document.getElementById('selectedUsers')
            limitUser = document.getElementById('userLimit').value;
            var selectLength = selectedColumnsObj.length
            var availableLength = availListObj.length

            for (i = 0; i < selectedColumnsObj.length; i++) {
                selectedColumnsObj.options[i].selected = false
            }

            var count = 0;
            var isSelected = [];
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
                        // check limit users
                        count++;
                        if (limitUser != 0) {
                            if (count + selectLength > limitUser) {
                                alert('You have reached ' + limitUser + ' user limit!');
                                return false;
                            }
                        }
                        isSelected[i] = availListObj.options[i].selected;
                        var newColObj = document.createElement("OPTION")
                        newColObj.value = availListObj.options[i].value

                        newColObj.text = availListObj.options[i].text;
                        selectedColumnsObj.appendChild(newColObj)
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

            // jQuery('#availableUsers').attr('unselectable', 'on');
            // availListObj = document.getElementById('availableUsers')
            // selectedEventsGroup = document.getElementById('selectedUsers')
            // limitUser = document.getElementById('userLimit').value;
            // var selectLength = selectedEventsGroup.length
            // var availableLength = availListObj.length

            // for (i = 0; i < selectedEventsGroup.length; i++) {
            //     selectedEventsGroup.options[i].selected = false
            // }

            // var count = 0;
            // var isSelected = [];
            // for (i = 0; i < availListObj.length; i++) {
            //     /*if (availListObj.options[i].selected == true) {
            //         var rowFound = false;
            //         var existingObj = null;
            //         for (j = 0; j < selectedEventsGroup.length; j++) {
            //             if (selectedEventsGroup.options[j].value == availListObj.options[i].value) {
            //                 rowFound = true;
            //                 existingObj = selectedEventsGroup.options[j]
            //                 break
            //             }
            //         }
            //         if (rowFound != true) {
            //             // check limit users
            //             count++;
            //             if (limitUser != 0) {
            //                 if (count + selectLength > limitUser) {
            //                     alert('You have reached ' + limitUser + ' user limit!');
            //                     return false;
            //                 }
            //             }
            //             isSelected[i] = availListObj.options[i].selected;
            //             var newColObj = document.createElement("OPTION")
            //             newColObj.value = availListObj.options[i].value

            //             newColObj.text = availListObj.options[i].text;
            //             selectedEventsGroup.appendChild(newColObj)
            //             newColObj.selected = true
            //             rowFound = false
            //         } else {
            //             if (existingObj != null) existingObj.selected = true
            //         }
            //     }*/
            //     if (availListObj.options[i].selected == true) {
            //         var selectedUserVal = availListObj.options[i].value;
            //         var userSelected = availListObj.options[i].selected;
            //         var selectedUserText = availListObj.options[i].text;
            //         var counter = i;
            //         var params = {
            //                 'module': app.getModuleName(),
            //                 'action': 'CTGoogleOffice365SuiteSyncOutlookCalendarAutoSync',
            //                 'mode' : 'CTGoogleOffice365UsersSave',
            //                 'userId' : selectedUserVal,
            //             }
            //         AppConnector.request(params).then(function(data) {
            //             var userExistOrNot = data.result.userID;
            //             var rowFound = false;
            //             var existingObj = null;
            //             for (j = 0; j < selectedEventsGroup.length; j++) {
            //                 if (selectedEventsGroup.options[j].value == selectedUserVal) {
            //                     rowFound = true;
            //                     existingObj = selectedEventsGroup.options[j]
            //                     break
            //                 }
            //             }
            //             if (rowFound != true) {
            //                 // check limit users
            //                 count++;
            //                 if (limitUser != 0) {
            //                     if (count + selectLength > limitUser) {
            //                         alert('You have reached ' + limitUser + ' user limit!');
            //                         return false;
            //                     }
            //                 }
            //                 isSelected[i] = userSelected;
            //                 var newColObj = document.createElement("OPTION")
            //                 newColObj.value = selectedUserVal;
            //                 newColObj.text = selectedUserText;

            //                 selectedEventsGroup.appendChild(newColObj)
            //                 newColObj.selected = true
            //                 rowFound = false
            //                 document.getElementById('availableUsers').remove(counter);
            //             } else {
            //                 if (existingObj != null) existingObj.selected = true
            //             }
            //         });
            //     }
            // }
        });
    },

    registerEventsForRemoveVtigerUsers : function() {
        jQuery("#removeVtigerUser").live('click', function() {
            availListObj = document.getElementById('availableUsers')
            selectedEventsGroup = document.getElementById('selectedUsers');
            limitUser = document.getElementById('userLimit').value;
            var selectLength = selectedEventsGroup.length
            var availableLength = availListObj.length

            for (i = 0; i < availListObj.length; i++) {
                availListObj.options[i].selected = false
            }

            var count = 0;
            var isSelected = [];
            for (i = 0; i < selectedEventsGroup.length; i++) {
                if (selectedEventsGroup.options[i].selected == true) {
                    var rowFound = false;
                    var existingObj = null;
                    for (j = 0; j < availListObj.length; j++) {
                        if (availListObj.options[j].value == selectedEventsGroup.options[i].value) {
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
                        isSelected[i] = selectedEventsGroup.options[i].selected;
                        var newColObj = document.createElement("OPTION")
                        newColObj.value = selectedEventsGroup.options[i].value

                        newColObj.text = selectedEventsGroup.options[i].text;
                        availListObj.appendChild(newColObj)
                        newColObj.selected = true
                        rowFound = false
                    } else {
                        if (existingObj != null) existingObj.selected = true
                    }
                }
            }

            selectCalendar = selectedEventsGroup.options.length;
            while (selectCalendar--) {
                if (isSelected[selectCalendar]) {
                    selectedEventsGroup.remove(selectCalendar);
                }
            }
        });
    },

    registerEventsForEnableDisableSyncAutomaically : function(){
        jQuery('#enableAutoSync').on('change', function(e){
            var active = jQuery("[name='enableAutoSync']").prop("checked");
            if(active == true){
                var value = 1;
            }else{
                var value = 0;
            }
            var params = {
                'module': app.getModuleName(),
                'action': 'CTGoogleOffice365SuiteSyncOutlookCalendarAutoSync',
                'mode': 'enableAutoSyncOutlookCalendar',
                'value': value,
            }
            app.helper.showProgress();
            AppConnector.request(params).then(function(data){
                app.helper.hideProgress();
                if(value == 1){
                    var message = app.vtranslate('JS_SYNC_OUTLOOK_CALENDAR_ENABLED');
                    app.helper.showSuccessNotification({'message':message});    
                }else{
                    var message = app.vtranslate('JS_SYNC_OUTLOOK_CALENDAR_DISABLE');
                    app.helper.showErrorNotification({'message':message});                            
                }
            });
        });
    },

    registerEventsForOutlookSyncEventsDetails : function(){
        var thisInstance = this;
        jQuery('#saveOutlookSyncEvents').on('click', function(e){
            var batch = jQuery('#batch').val();
            var userId =jQuery('#userId').val();
            var minutes = jQuery('#minutes').val();

            var enableAutoSync = jQuery("[name='enableAutoSync']").prop("checked");
            if(enableAutoSync == true){
                var value = 1;
            }else{
                var value = 0;
            }

            var frequencyElement = jQuery('#frequencyValue');
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
            } else {
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
            }else{
                var params = {
                    'module': 'GoogleOffice365Suite',
                    'action': 'CTGoogleOffice365SuiteSyncOutlookCalendarAutoSync',
                    'mode' : 'saveAutoSyncOutlookEvents',
                    'enableAutoSync' : value,
                    'batch' : batch,
                    'minutes' : minutes,
                    'userId' : userId,
                }
                app.helper.showProgress();
                AppConnector.request(params).then(
                    function(data){
                        app.helper.hideProgress();
                        var message = app.vtranslate('JS_SAVE_CONFIGURATION');
                        app.helper.showSuccessNotification({'message':message}); 
                        location.reload();
                    });
            }
        });
    },

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
    },

    registerDateValidationEvent : function () {
        var dateFormat = jQuery("#dateFormat").val();
        var startDate = new Date();
        var FromEndDate = new Date();
        var ToEndDate = new Date();
        ToEndDate.setDate(ToEndDate.getDate() + 365);

        var fullDate = new Date()
        console.log(fullDate);
        //Thu May 19 2011 17:25:38 GMT+1000 {}
         
        //convert month to 2 digits
        var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
         
        var currentDate = fullDate.getDate() + "-" + twoDigitMonth + "-" + fullDate.getFullYear();
        var currentDates = currentDate.split("-");
        var getcurrentDates = Date.parse(currentDates[2]+","+currentDates[1]+","+currentDates[0]);

        $('#syncFromDate').datepicker({
            startDate: startDate,
            endDate: ToEndDate,
            dateFormat: dateFormat,
            autoclose: true
        })
        .on('changeDate', function (selected) {
            var getfromDates = jQuery("#fromDates").val();

            var fromDates = jQuery("#syncFromDate").val();
            var fromEndDate = new Date(selected.date.valueOf());
            var date = new Date(selected.date.valueOf());
        

            if(dateFormat == 'd-m-Y'){
                var fromDate = fromDates.split("-");
                var syncFromDate = Date.parse(fromDate[2]+","+fromDate[1]+","+fromDate[0]);
                var currentDate = ("0" + date.getDate()).slice(-2)+"-"+("0" + (date.getMonth() + 1)).slice(-2)+"-"+date.getFullYear();
            }else if (dateFormat == 'm-d-Y') {
                var fromDate = fromDates.split("-");
                var syncFromDate = Date.parse(fromDate[2]+","+fromDate[0]+","+fromDate[1]);
                var currentDate = ("0" + (date.getMonth() + 1)).slice(-2)+"-"+("0" + date.getDate()).slice(-2)+"-"+date.getFullYear();
            }else if(dateFormat == 'Y-m-d'){
                var fromDate = fromDates.split("-");
                var syncFromDate = Date.parse(fromDate[0]+","+fromDate[1]+","+fromDate[2]);
                var currentDate = date.getFullYear()+"-"+("0" + (date.getMonth() + 1)).slice(-2)+"-"+("0" + date.getDate()).slice(-2);
            }else if(dateFormat == 'd.m.Y'){
                var fromDate = fromDates.split(".");
                var syncFromDate = Date.parse(fromDate[2]+","+fromDate[1]+","+fromDate[0]);
                var currentDate = ("0" + date.getDate()).slice(-2)+"."+("0" + (date.getMonth() + 1)).slice(-2)+"."+date.getFullYear();
            }else if(dateFormat == 'd/m/Y'){
                var fromDate = fromDates.split("/");
                var syncFromDate = Date.parse(fromDate[2]+","+fromDate[1]+","+fromDate[0]);
                var currentDate = ("0" + date.getDate()).slice(-2)+"/"+("0" + (date.getMonth() + 1)).slice(-2)+"/"+date.getFullYear();
            }

            if(syncFromDate > getcurrentDates){
                $('#syncFromDate').datepicker('setDate',getfromDates);
                 var message = app.vtranslate('Should be Less than Current Date');
                app.helper.showErrorNotification({'message':message}); 
                return false;
            }
        });
    },

    /* global search code start*/
    registerGlobalSearch : function() {
        var thisInstance = this;
        jQuery('.search-link .keyword-input').on('keypress',function(e){
            if(e.which == 13) {

                var element = jQuery(e.currentTarget);
                var searchValue = element.val();
                var data = {};
                data['searchValue'] = searchValue;
                element.trigger(thisInstance._SearchIntiatedEventName,data);
            }
        });
    },

    addSearchListener : function () {
        jQuery('.search-link .keyword-input').on('VT_SEARCH_INTIATED',function(e,args){
            var val = args.searchValue;
            var url = '?module=Vtiger&view=ListAjax&mode=searchAll&value='+encodeURIComponent(val);
            app.helper.showProgress();
            app.request.get({'url': url}).then(function (error, data) {
                if (error == null) {
                    app.helper.hideProgress();
                    app.helper.loadPageOverlay(data).then(function (modal) {
                        modal.find('.keyword-input').val(jQuery('.keyword-input').val());
                        Vtiger_SearchList_Js.intializeListInstances(modal);
                    });
                }
            });
        });
    },

    /**
     * Registered the events for this page
     */
    registerEvents: function(){
        this.registerSaveGoogleAPIsSettingEvent();
        this.registerGenerateTokenEvent();
        this.registerEventsForSaveSetting();
        this.registerAddContactGroupEvent();
        this.registerRemoveContactGroupEvent();
        var view = app.getViewName();
        if(view != 'List'){
            this.registerAppTriggerEvent();
        }
        this.registerEventsForAddVtigerUsers();
        this.registerEventsForRemoveVtigerUsers();
        this.registerEventsForEnableDisableSyncAutomaically();
        this.registerEventsForMaximumBatchSize();
        this.registerEventsForOutlookSyncEventsDetails();
        this.registerGlobalSearch();
        this.addSearchListener();
        this.registerDateValidationEvent();
    }
});

jQuery(document).ready(function() {
    var instance = new GoogleOffice365Suite_CTGoogleOffice365SuiteSyncOutlookEvents_Js();
    instance.registerEvents();
});