/*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ******************************************************************************/

Vtiger_List_Js("GoogleOffice365Suite_CTGoogleOffice365SuiteSyncGoogleCalendar_Js", {}, {

    _SearchIntiatedEventName : 'VT_SEARCH_INTIATED',
    container : jQuery('body'),

    //Step 1
    registerSaveGoogleAPIsSettingEvent : function () {
        jQuery('#saveGoogleAPIsSetting').on('click',function(){
            app.helper.showProgress();
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
                var params = {
                    'module' : app.getModuleName(),
                    'action' : 'CTGoogleOffice365SuiteSyncGoogleCalenderConfiguration',
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
                window.location = "index.php?module="+app.getModuleName()+"&view=CTGoogleOffice365SuiteSyncGoogleCalendarTokenAuthorize&user_id=" + userId;
            } else if (jQuery("#generateToken").hasClass('revokeToken')) {
                window.location = "index.php?module="+app.getModuleName()+"&view=CTGoogleOffice365SuiteSyncGoogleCalendarRevokeToken&user_id=" + userId;
            }
        });
    },

    registerAddUserSettingsEvent: function() {
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

        });
    },

    registerRemoveUserSettingsEvent: function() {
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

            selectCalendar = selectedColumnsObj.options.length;
            while (selectCalendar--) {
                if (isSelected[selectCalendar]) {
                    selectedColumnsObj.remove(selectCalendar);
                }
            }
        });
    },

    registerAddContactGroupEvent: function() {
        jQuery("#addCalendar").on('click', function() {
            var calendarLimit = jQuery('#calendarLimit').val();
            var availListObj = document.getElementById('availableCalendar');
            var selectedColumnsObj = document.getElementById('selectedCalendar');
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
                app.helper.showErrorNotification({"message":app.vtranslate('JS_CALENDAR_LIMIT_IS_REACHED')});
                return;
            }

        });
    },

    registerRemoveContactGroupEvent: function() {
        jQuery("#removeCalendar").on('click', function() {
            var availListObj = document.getElementById('availableCalendar');
            var selectedColumnsObj = document.getElementById('selectedCalendar');
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
                        jQuery('#calendarLimit').val(0);
                    } else {
                        if (existingObj != null) existingObj.selected = true
                    }
                }
            }

            selectCalendar = selectedColumnsObj.options.length;
            while (selectCalendar--) {
                if (isSelected[selectCalendar]) {
                    selectedColumnsObj.remove(selectCalendar);
                }
            }
        });
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

            var isAdmin = $('#isAdmin').val();
            var toDate = $('#syncToDate').val();

            if(toDate == 'none'){
                app.helper.showErrorNotification({"message":app.vtranslate('JS_PLEASE_SELECT_TO_DATE')});
                return false;
            }
        
            var selectedCalColumnsObj = document.getElementById('selectedCalendar');
            var selectCalLength = selectedCalColumnsObj.length;
            
            if(selectCalLength == 0){
                app.helper.showErrorNotification({"message":app.vtranslate('JS_PLEASE_SELECT_CALENDAR')});
                return false;
            }

            if(isAdmin != 'off'){
                var selectedUsersColumnsObj = document.getElementById('selectedUsers');
                var selectUserLength = selectedUsersColumnsObj.length;

                if(selectUserLength == 0){
                    app.helper.showErrorNotification({"message":app.vtranslate('JS_PLEASE_SELECT_VTIGER_USER')});
                    return false;
                }
                var userId = document.getElementById('selectedUsersValue');
                var selectedUser = '';
                for (i = 0; i < selectedUsersColumnsObj.options.length; i++) {
                    selectedUser += selectedUsersColumnsObj.options[i].value + ";";
                }
                userId.value = selectedUser;
            }

            var selectedContactColumnsObj = document.getElementById('selectedCalendar');
            var selectedContacts = document.getElementById('selectCalendar');
            var selectedContactsGroup = '';
            for (i = 0; i < selectedContactColumnsObj.options.length; i++) {
                selectedContactsGroup += selectedContactColumnsObj.options[i].value;
            }
            selectedContacts.value = selectedContactsGroup;

            var str = $("form").serialize();
            var params = {
                'module': app.getModuleName(),
                'action': 'CTGoogleOffice365SuiteSyncGoogleCalendarSaveSetting',
                'value': str,
            }
            app.helper.showProgress();

            AppConnector.request(params).then(function(data){
                app.helper.hideProgress();
                console.log(data);
                if(data.result.status == "autoSyncingRunning"){
                    var message = app.vtranslate('Autosyncing Already Running.');
                    app.helper.showErrorNotification({'message':message});
                    return false;
                }
                var message = app.vtranslate('JS_GOOGLE_CALENDAR_SETTING_DATA_SAVED_SUCCESSFULLY');
                app.helper.showSuccessNotification({'message':message});
                setTimeout(function() {
                    if(data.result.googleContactsConfigURL){
                        window.location.href = data.result.googleContactsConfigURL;
                    }
                }, 1500);
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
    },

    // registerDateValidationEvent : function () {
    //     var dateFormat = jQuery("#dateFormat").val();
    //     var startDate = new Date();
    //     var FromEndDate = new Date();
    //     var ToEndDate = new Date();
    //     ToEndDate.setDate(ToEndDate.getDate() + 365);

    //     $('#syncFromDate').datepicker({
    //         startDate: startDate,
    //         endDate: FromEndDate,
    //         dateFormat: dateFormat,
    //         autoclose: true
    //     })
    //     .on('changeDate', function (selected) {
    //         var fromDates = jQuery("#fromDates").val();
    //         var toDates = jQuery("#toDates").val();

    //         startDate = new Date(selected.date.valueOf());
    //         var date = new Date(selected.date.valueOf());
    //         if(toDates != ''){
    //             if(dateFormat == 'd-m-Y'){
    //                 var toDate = toDates.split("-");
    //                 var syncToDate = Date.parse(toDate[2]+","+toDate[1]+","+toDate[0]);
    //                 var currentDate = ("0" + date.getDate()).slice(-2)+"-"+("0" + (date.getMonth() + 1)).slice(-2)+"-"+date.getFullYear();
    //             }else if (dateFormat == 'm-d-Y') {
    //                 var toDate = toDates.split("-");
    //                 var syncToDate = Date.parse(toDate[2]+","+toDate[0]+","+toDate[1]);
    //                 var currentDate = ("0" + (date.getMonth() + 1)).slice(-2)+"-"+("0" + date.getDate()).slice(-2)+"-"+date.getFullYear();
    //             }else if(dateFormat == 'Y-m-d'){
    //                 var toDate = toDates.split("-");
    //                 var syncToDate = Date.parse(toDate[0]+","+toDate[1]+","+toDate[2]);
    //                 var currentDate = date.getFullYear()+"-"+("0" + (date.getMonth() + 1)).slice(-2)+"-"+("0" + date.getDate()).slice(-2);
    //             }else if(dateFormat == 'd.m.Y'){
    //                 var toDate = toDates.split(".");
    //                 var syncToDate = Date.parse(toDate[2]+","+toDate[1]+","+toDate[0]);
    //                 var currentDate = ("0" + date.getDate()).slice(-2)+"."+("0" + (date.getMonth() + 1)).slice(-2)+"."+date.getFullYear();
    //             }else if(dateFormat == 'd/m/Y'){
    //                 var toDate = toDates.split("/");
    //                 var syncToDate = Date.parse(toDate[2]+","+toDate[1]+","+toDate[0]);
    //                 var currentDate = ("0" + date.getDate()).slice(-2)+"/"+("0" + (date.getMonth() + 1)).slice(-2)+"/"+date.getFullYear();
    //             }
    //             var currentDateWithJSONParse = Date.parse(date.getFullYear()+","+("0" + (date.getMonth() + 1)).slice(-2)+","+("0" + date.getDate()).slice(-2));

    //             if(currentDateWithJSONParse > syncToDate){
    //                 $('#syncFromDate').datepicker('setDate',fromDates);
    //                 app.helper.showErrorNotification({"message":app.vtranslate('JS_FROM_DATE_IS_GREATER_THAN_TO_DATE')});
    //                 return false;
    //             }else{
    //                 $('#fromDates').val(currentDate);
    //                 startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
    //                 $('#syncToDate').datepicker('setStartDate', startDate);
    //             }
    //         }else{
    //             startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
    //             $('#syncToDate').datepicker('setStartDate', startDate);
    //         }
    //     });

    //     $('#syncToDate').datepicker({
    //         startDate: startDate,
    //         endDate: ToEndDate,
    //         dateFormat: dateFormat,
    //         autoclose: true
    //     })
    //     .on('changeDate', function (selected) {
    //         var fromDates = jQuery("#fromDates").val();
    //         var toDates = jQuery("#toDates").val();
    //         var fromEndDate = new Date(selected.date.valueOf());
    //         var date = new Date(selected.date.valueOf());

    //         if(dateFormat == 'd-m-Y'){
    //             var fromDate = fromDates.split("-");
    //             var syncFromDate = Date.parse(fromDate[2]+","+fromDate[1]+","+fromDate[0]);
    //             var currentDate = ("0" + date.getDate()).slice(-2)+"-"+("0" + (date.getMonth() + 1)).slice(-2)+"-"+date.getFullYear();
    //         }else if (dateFormat == 'm-d-Y') {
    //             var fromDate = fromDates.split("-");
    //             var syncFromDate = Date.parse(fromDate[2]+","+fromDate[0]+","+fromDate[1]);
    //             var currentDate = ("0" + (date.getMonth() + 1)).slice(-2)+"-"+("0" + date.getDate()).slice(-2)+"-"+date.getFullYear();
    //         }else if(dateFormat == 'Y-m-d'){
    //             var fromDate = fromDates.split("-");
    //             var syncFromDate = Date.parse(fromDate[0]+","+fromDate[1]+","+fromDate[2]);
    //             var currentDate = date.getFullYear()+"-"+("0" + (date.getMonth() + 1)).slice(-2)+"-"+("0" + date.getDate()).slice(-2);
    //         }else if(dateFormat == 'd.m.Y'){
    //             var fromDate = fromDates.split(".");
    //             var syncFromDate = Date.parse(fromDate[2]+","+fromDate[1]+","+fromDate[0]);
    //             var currentDate = ("0" + date.getDate()).slice(-2)+"."+("0" + (date.getMonth() + 1)).slice(-2)+"."+date.getFullYear();
    //         }else if(dateFormat == 'd/m/Y'){
    //             var fromDate = fromDates.split("/");
    //             var syncFromDate = Date.parse(fromDate[2]+","+fromDate[1]+","+fromDate[0]);
    //             var currentDate = ("0" + date.getDate()).slice(-2)+"/"+("0" + (date.getMonth() + 1)).slice(-2)+"/"+date.getFullYear();
    //         }

    //         var currentDateWithJSONParse = Date.parse(date.getFullYear()+","+("0" + (date.getMonth() + 1)).slice(-2)+","+("0" + date.getDate()).slice(-2));

    //         if(currentDateWithJSONParse < syncFromDate){
    //             $('#syncToDate').datepicker('setDate',toDates);
    //             app.helper.showErrorNotification({"message":app.vtranslate('JS_FROM_DATE_IS_GREATER_THAN_TO_DATE')});
    //             return false;
    //         }else{
    //             $('#toDates').val(currentDate);
    //             fromEndDate.setDate(fromEndDate.getDate(new Date(selected.date.valueOf())));
    //             $('#syncFromDate').datepicker('setEndDate', fromEndDate);
    //         }
    //     });
    // },

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
        this.registerEventsForSaveSetting();
        this.registerEventsForMaximumValueForSync();
        this.registerGlobalSearch();
        this.addSearchListener();
        this.registerDateValidationEvent();
        this.registerAppTriggerEvent();
    }
});

jQuery(document).ready(function() {
    var instance = new GoogleOffice365Suite_CTGoogleOffice365SuiteSyncGoogleCalendar_Js();
    instance.registerEvents();
});