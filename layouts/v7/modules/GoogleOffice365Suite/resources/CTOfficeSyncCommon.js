/*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ******************************************************************************/

Vtiger_List_Js("GoogleOffice365Suite_CTOfficeSyncCommon_Js", {}, {

    //step 3
    registerSyncCalendarFromOutlook: function() {
        var thisInstance = this;
        jQuery("#syncFromOutlookEvent").on('click', function() {
            var params = {
                'module': app.getModuleName(),
                'action': 'CTGoogleOffice365SuiteSyncOutlookCalendarSyncToVtiger'
            }
            app.helper.showProgress();
            AppConnector.request(params).then(function(data) {
                app.helper.hideProgress();
                var notificationOptions = {
                    position: {
                        my: 'bottom left',
                        at: 'top left',
                        container: jQuery('#body')
                    }
                };
                if (data.result.message) {
                    app.helper.showAlertNotification({
                        'message': data.result.message
                    }, notificationOptions);
                }else if(data.result.syncMessage){
                    app.helper.showErrorNotification({
                        'message': data.result.syncMessage
                    }, notificationOptions);
                }else if(data.result.createRecordIds == 0 && data.result.updateRecordIds == 0 && data.result.deleteRecordIds == 0){
                    var message = app.vtranslate("LBL_NO_DATA_FOR_SYNCING_VTIGER_PROCESS");
                    app.helper.showAlertNotification({
                        'message': message
                    }, notificationOptions);
                }else if(data.result.status == "autoSyncingRunning"){
                    var message = app.vtranslate('JS_AUTO_SYNC_ALREADY_RUNNING_IN_THE_BACKGROUND_PLEASE_TRY_AFTER_SOME_TIME');
                    app.helper.showAlertNotification({'message':message}, notificationOptions);
                    return false;
                }else {
                    var message = app.vtranslate("JS_SYNC_TO_VTIGER_CALENDAR_HAS_COMPLETED_SUCCESSFULLY");
                    app.helper.showSuccessNotification({
                        'message': message + app.vtranslate("JS_TOTAL")+ " " + data.result.createRecordIds + " " + app.vtranslate("JS_RECORD_CREATED")+ " " + data.result.updateRecordIds+ " " + app.vtranslate("JS_RECORD_UPDATED")+ " " + data.result.deleteRecordIds+ " " + app.vtranslate("JS_RECORD_DELETED")
                    }, notificationOptions);
                    thisInstance.registerReloadTable();
                }
            });
        });
    },

    registerSyncCalendarToOutlook : function(){
        var thisInstance = this;
        jQuery("#syncFromVtigerEvent").on('click', function() {
            var params = {
                'module': app.getModuleName(),
                'action': 'CTGoogleOffice365SuiteSyncOutlookCalendarSyncToOutlook'
            }
            app.helper.showProgress();
            AppConnector.request(params).then(function(data) {
                app.helper.hideProgress();
                var notificationOptions = {
                    position: {
                        my: 'bottom left',
                        at: 'top left',
                        container: jQuery('#body')
                    }
                };
                if (data.result.message) {
                    app.helper.showAlertNotification({
                        'message': data.result.message
                    }, notificationOptions);
                }else if(data.result.syncMessage){
                    app.helper.showErrorNotification({
                        'message': data.result.syncMessage
                    }, notificationOptions);
                }else if(data.result.createRecordIds == 0 && data.result.updateRecordIds == 0 && data.result.deleteRecordIds == 0){
                    var message = app.vtranslate("LBL_NO_DATA_FOR_SYNCING_OUTLOOK_PROCESS");
                    app.helper.showAlertNotification({
                        'message': message
                    }, notificationOptions);
                } else if (data.result.status == "autoSyncingRunning") {
                        var message = app.vtranslate("JS_AUTO_SYNC_ALREADY_RUNNING_IN_THE_BACKGROUND_PLEASE_TRY_AFTER_SOME_TIME");
                        app.helper.showAlertNotification({'message':message}, notificationOptions);
                }else {
                    var message = app.vtranslate("SYNC_TO_OUTLOOK_CALENDAR_HAS_COMPLETED_SUCCESSFULLY");
                    app.helper.showSuccessNotification({
                        'message': message + app.vtranslate("JS_TOTAL")+ " " + data.result.createRecordIds + " " + app.vtranslate("JS_RECORD_CREATED")+ " " + data.result.updateRecordIds+ " " + app.vtranslate("JS_RECORD_UPDATED")+ " " + data.result.deleteRecordIds+ " " + app.vtranslate("JS_RECORD_DELETED")
                    }, notificationOptions);
                    thisInstance.registerReloadTable();
                }
            });
        });
    },
    
    /**
    * Function to Sync Contacts Data From Outlook
    */
    registerSyncContactsFromOutlook: function() {
        var thisInstance = this;
        jQuery("#syncFromOutlookContact").on('click', function() {
            var params = {
                'module': app.getModuleName(),
                'action': 'CTGoogleOffice365SuiteSyncOutlookContactsSyncToVtiger'
            }

            app.helper.showProgress();
            AppConnector.request(params).then(function(data) {
                app.helper.hideProgress();
                var notificationOptions = {
                    position: {
                        my: 'bottom left',
                        at: 'top left',
                        container: jQuery('#body')
                    }
                };
                if (data.result.message) {
                    app.helper.showAlertNotification({
                        'message': data.result.message
                    }, notificationOptions);
                }else if(data.result.syncMessage){
                    app.helper.showErrorNotification({
                        'message': data.result.syncMessage
                    }, notificationOptions);
                }else if (data.result.status == 0) {
                        var message = app.vtranslate("JS_AUTO_SYNC_ALREADY_RUNNING_IN_THE_BACKGROUND_PLEASE_TRY_AFTER_SOME_TIME");
                        app.helper.showSuccessNotification({'message':message}, notificationOptions);
                }else if(data.result.createRecordIds == 0 && data.result.updateRecordIds == 0 && data.result.deleteRecordIds == 0){
                    var message = app.vtranslate("LBL_NO_DATA_FOR_SYNCING_VTIGER_PROCESS");
                    app.helper.showAlertNotification({
                        'message': message
                    }, notificationOptions);
                }else if(data.result.status == "autoSyncingRunning"){
                    var message = app.vtranslate('JS_AUTO_SYNC_ALREADY_RUNNING_IN_THE_BACKGROUND_PLEASE_TRY_AFTER_SOME_TIME');
                    app.helper.showAlertNotification({'message':message}, notificationOptions);
                    return false;
                }else {
                    var message = app.vtranslate("JS_SYNC_TO_VTIGER_CONTACTS_HAS_COMPLETED_SUCCESSFULLY");
                    app.helper.showSuccessNotification({
                        'message': message + app.vtranslate("JS_TOTAL")+ " " + data.result.createRecordIds + " " + app.vtranslate("JS_RECORD_CREATED")+ " " + data.result.updateRecordIds+ " " + app.vtranslate("JS_RECORD_UPDATED")+ " " + data.result.deleteRecordIds+ " " + app.vtranslate("JS_RECORD_DELETED")
                    }, notificationOptions);
                    thisInstance.registerReloadTable();
                }
            });
        });
    },

    /**
    * Function to Sync Contacts Data To Outlook
    */
    registerSyncContactToOutlook : function(){
        var thisInstance = this;
        jQuery("#syncFromVtigerContact").on('click', function() {
            var params = {
                'module': app.getModuleName(),
                'action': 'CTGoogleOffice365SuiteSyncOutlookContactsSyncToOutlook'
            }
            app.helper.showProgress();
            AppConnector.request(params).then(function(data) {
                app.helper.hideProgress();
                var notificationOptions = {
                    position: {
                        my: 'bottom left',
                        at: 'top left',
                        container: jQuery('#body')
                    }
                };
                if (data.result.message) {
                    app.helper.showAlertNotification({
                        'message': data.result.message
                    }, notificationOptions);
                } else if(data.result.syncMessage){
                    app.helper.showErrorNotification({
                        'message': data.result.syncMessage
                    }, notificationOptions);
                }else if (data.result.status == "autoSyncingRunning") {
                        var message = app.vtranslate("JS_AUTO_SYNC_ALREADY_RUNNING_IN_THE_BACKGROUND_PLEASE_TRY_AFTER_SOME_TIME");
                        app.helper.showAlertNotification({'message':message}, notificationOptions);
                }else if(data.result.createRecordIds == 0 && data.result.updateRecordIds == 0 && data.result.deleteRecordIds == 0){
                    var message = app.vtranslate("LBL_NO_DATA_FOR_SYNCING_OUTLOOK_PROCESS");
                    app.helper.showAlertNotification({
                        'message': message
                    }, notificationOptions);
                }else {
                    var message = app.vtranslate("JS_SYNC_TO_OUTLOOK_CONTACTS_HAS_COMPLETED_SUCCESSFULLY");
                    app.helper.showSuccessNotification({
                        'message': message + app.vtranslate("JS_TOTAL")+ " " + data.result.createRecordIds + " " + app.vtranslate("JS_RECORD_CREATED")+ " " + data.result.updateRecordIds+ " " + app.vtranslate("JS_RECORD_UPDATED")+ " " + data.result.deleteRecordIds+ " " + app.vtranslate("JS_RECORD_DELETED")
                    }, notificationOptions);
                    thisInstance.registerReloadTable();
                }
            });
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

    // reload table

    registerReloadTable : function(){
        var userId =jQuery('#userid').val();
        var params = {
            'module': 'GoogleOffice365Suite',
            'action': 'CTGoogleOffice365OutlookCronLogTableReload',
            'userId' : userId,
        }

        AppConnector.request(params).then(function(data){
            $('#logTable').html(data.result.tableHtml);
            $('#lastSyncTime').html('last sync '+ data.result.lastSyncTime);
            // var message = app.vtranslate("Log updated successfully");
            // app.helper.showSuccessNotification({'message': message}, this.notifyParams);
        });
    },


    registerRefreshTable : function(){
        var thisInstance = this;
        $('#reloadTable').on('click', function(){
            app.helper.showProgress();
            setTimeout(function(){ 
                thisInstance.registerReloadTable();
                app.helper.hideProgress(); 
            }, 1000);
        })
    },

    registerEnableSettings : function(){
        var thisInstance = this;
        jQuery('[name="enableAutoSyncEvent"],[name="enableAutoSyncContact"]').on('click', function(e){
            var attrId = $(this).attr('id');
            var isChecked = $(this).prop("checked");
            if(attrId == 'enableAutoSyncContact'){
                if(isChecked){
                   $('#contactSettingsEnable').removeClass('hide');                    
                }else{
                   $('#contactSettingsEnable').addClass('hide');
                }
            }else if(attrId == 'enableAutoSyncEvent'){
                if(isChecked){
                   $('#eventSettingsEnable').removeClass('hide');                    
                }else{
                   $('#eventSettingsEnable').addClass('hide');
                }
            }
        });

    },

    /**
     * Registered the events for this page
     */
    registerEvents: function(){
        this.registerSyncCalendarToOutlook();
        this.registerSyncCalendarFromOutlook();
        this.registerSyncContactsFromOutlook();
        this.registerSyncContactToOutlook();
        this.registerAppTriggerEvent();
        this.registerRefreshTable();
        this.registerReloadTable();
        this.registerEnableSettings();
    }
});

jQuery(document).ready(function() {
    var instance = new GoogleOffice365Suite_CTOfficeSyncCommon_Js();
    instance.registerEvents();
});