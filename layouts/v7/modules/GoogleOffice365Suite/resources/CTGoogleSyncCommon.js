/*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ******************************************************************************/

Vtiger_List_Js("GoogleOffice365Suite_CTGoogleSyncCommon_Js", {}, {

    container : jQuery('body'),
    notifyParams: {
                'timer': 1000,
                'position': 'absolute', 
                'element': $('body') , 
                'placement': {
                    from: "top",
                    align: "right"
                }},
    /* global search code end*/

    registerSyncCalendarFromVtiger : function() {
        var thisInstance = this;
        jQuery("#syncFromVtigerEvent").on('click', function() {
            var params = {
                'module': app.getModuleName(),
                'action': 'CTGoogleOffice365SuiteSyncGoogleCalendarSyncToGoogle',
            }
            app.helper.showProgress();
            AppConnector.request(params).then(function(data) {
                app.helper.hideProgress();
                if(data.result.enablesync == 0){
                    app.helper.showErrorNotification({
                        'message': 'Please Enable Autosync.'
                    }, this.notifyParams);
                    return false;
                }else if(data.result.status == "autoSyncingRunning"){
                    app.helper.showErrorNotification({
                        'message': app.vtranslate("JS_CRON_RUNNING_STATUS")
                    }, this.notifyParams);
                    return false;
                }
                if (data.result.message) {
                    app.helper.showErrorNotification({
                        'message': data.result.message
                    }, this.notifyParams);
                } else {
                    var totalRecords = data.result.totalsyncedrecord;
                    if(data.result.recordStatus == 0 || totalRecords == 0){
                         var message = app.vtranslate("JS_NO_DATA_FOR_SYNCING_TO_GOOGLE");
                         app.helper.showAlertNotification({'message': message }, this.notifyParams);
                    }else{
                        var message = app.vtranslate("JS_SYNC_TO_GOOGLE_CALENDAR_HAS_COMPLETED_SUCCESSFULLY");
                    app.helper.showSuccessNotification({
                        'message': message + app.vtranslate("JS_TOTAL")+ " " + data.result.createRecordIds + " " + app.vtranslate("JS_RECORD_CREATED")+ " " + data.result.updateRecordIds+ " " + app.vtranslate("JS_RECORD_UPDATED")+ " " + data.result.deleteRecordIds+ " " + app.vtranslate("JS_RECORD_DELETED")
                    }, this.notifyParams);
                    thisInstance.registerReloadTable();
                    }
                }
            });
        });
    },

    registerSyncCalendarFromGoogle: function() { 
        var thisInstance = this;
        jQuery("#syncFromGoogleEvent").on('click', function() {
            var params = {
                'module': app.getModuleName(),
                'action': 'CTGoogleOffice365SuiteSyncGoogleCalendarSyncToVtiger'
            }

            app.helper.showProgress();
            AppConnector.request(params).then(function(data) {
                app.helper.hideProgress();
                if(data.result.enablesync == 0){
                    app.helper.showErrorNotification({
                        'message': 'Please Enable Autosync.'
                    }, this.notifyParams);
                    return false;
                }else if(data.result.status == "autoSyncingRunning"){
                    app.helper.showErrorNotification({
                        'message': app.vtranslate("JS_CRON_RUNNING_STATUS")
                    }, this.notifyParams);
                    return false;
                }
                if (data.result.message) {
                    app.helper.showErrorNotification({
                        'message': data.result.message
                    }, this.notifyParams);
                } else {
                   var totalRecords = data.result.totalsyncedrecord;
                   if(data.result.recordStatus == 0 || totalRecords == 0){
                        var message = app.vtranslate("JS_NO_DATA_FOR_SYNCING_TO_VTIGER");
                        app.helper.showAlertNotification({'message': message }, this.notifyParams);
                   }else{
                        var message = app.vtranslate("JS_SYNC_FROM_GOOGLE_CALENDAR_HAS_COMPLETED_SUCCESSFULLY");
                        app.helper.showSuccessNotification({
                            'message': message + app.vtranslate("JS_TOTAL")+ " " + data.result.createRecordIds + " " + app.vtranslate("JS_RECORD_CREATED")+ " " + data.result.updateRecordIds+ " " + app.vtranslate("JS_RECORD_UPDATED")+ " " + data.result.deleteRecordIds+ " " + app.vtranslate("JS_RECORD_DELETED")
                        }, this.notifyParams);
                        thisInstance.registerReloadTable();
                   }
                }
            });
        });
    },

    registerSyncContactsFromVtiger : function() {
        var thisInstance = this;
        jQuery("#syncFromVtigerContact").on('click', function() {
            var params = {
                'module': app.getModuleName(),
                'action': 'CTGoogleOffice365SuiteSyncGoogleContactsSyncToGoogle',
            }
            app.helper.showProgress();
            AppConnector.request(params).then(function(data) {
                app.helper.hideProgress();

                if(data.result.status == "autoSyncingRunning"){
                    app.helper.showErrorNotification({
                        'message': app.vtranslate("JS_CRON_RUNNING_STATUS")
                    }, this.notifyParams);
                    return false;
                }
                if (data.result.message || data.result.message !== undefined) {
                    app.helper.showErrorNotification({
                        'message': data.result.message
                    });
                } else {
                    var totalRecords = data.result.totalsyncedrecord;
                    if(data.result.recordStatus == 0 || totalRecords == 0){
                         var message = app.vtranslate("JS_NO_DATA_FOR_SYNCING_TO_GOOGLE");
                         app.helper.showAlertNotification({'message': message }, this.notifyParams);
                    }else{
                        var message = app.vtranslate("JS_SYNC_TO_GOOGLE_CONTACTS_HAS_COMPLETED_SUCCESSFULLY");
                    app.helper.showSuccessNotification({
                        'message': message + app.vtranslate("JS_TOTAL")+ " " + data.result.createRecordIds + " " + app.vtranslate("JS_RECORD_CREATED")+ " " + data.result.updateRecordIds+ " " + app.vtranslate("JS_RECORD_UPDATED")+ " " + data.result.deleteRecordIds+ " " + app.vtranslate("JS_RECORD_DELETED")
                    }, this.notifyParams);
                    thisInstance.registerReloadTable();
                    }
                }
            });
        });
    },

    registerSyncContactsFromGoogle: function() {
        var thisInstance = this;
        jQuery("#syncFromGoogleContact").on('click', function() {
            var params = {
                'module': app.getModuleName(),
                'action': 'CTGoogleOffice365SuiteSyncGoogleContactsSyncToVtiger'
            }

            app.helper.showProgress();
            AppConnector.request(params).then(function(data) {
                app.helper.hideProgress();
                if(data.result.enablesync == 0){
                    app.helper.showErrorNotification({
                        'message': 'Please Enable Autosync.'
                    }, this.notifyParams);
                    return false;
                }else if(data.result.status == "autoSyncingRunning"){
                    app.helper.showErrorNotification({
                        'message': app.vtranslate("JS_CRON_RUNNING_STATUS")
                    }, this.notifyParams);
                    return false;
                }
                
                if (data.result.message) {
                    app.helper.showErrorNotification({
                        'message': data.result.message
                    }, this.notifyParams);
                } else {
                    var totalRecords = data.result.totalsyncedrecord;
                    if(data.result.recordStatus == 0 || totalRecords == 0){
                         var message = app.vtranslate("JS_NO_DATA_FOR_SYNCING_TO_VTIGER");
                         app.helper.showAlertNotification({'message': message }, this.notifyParams);
                    }else{
                        var message = app.vtranslate("JS_SYNC_TO_GOOGLE_CONTACTS_HAS_COMPLETED_SUCCESSFULLY");
                        app.helper.showSuccessNotification({
                            'message': message + app.vtranslate("JS_TOTAL")+ " " + data.result.createRecordIds + " " + app.vtranslate("JS_RECORD_CREATED")+ " " + data.result.updateRecordIds+ " " + app.vtranslate("JS_RECORD_UPDATED")+ " " + data.result.deleteRecordIds+ " " + app.vtranslate("JS_RECORD_DELETED")
                        }, this.notifyParams);
                        thisInstance.registerReloadTable();
                    }
                }
            });
        });
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

    registerEventsForGoogleSyncCalendarDetails : function(){
        var thisInstance = this;
        jQuery('#saveGoogleAutoSettings').on('click', function(e){ 
            app.helper.showProgress();
            var batchEvent = jQuery('#batchEvent').val();
            var minutesEvent = jQuery('#minutesEvent').val();
            var enableAutoSyncEvent = jQuery("[name='enableAutoSyncEvent']").prop("checked");
            var batchContact = jQuery('#batchContact').val();
            var minutesContact = jQuery('#minutesContact').val();
            var enableAutoSyncContact = jQuery("[name='enableAutoSyncContact']").prop("checked");
            var userId =jQuery('#userid').val();

            var valueEvent = valueContact = 0;
            if(enableAutoSyncEvent){
                valueEvent = 1;
            }else{
                batchEvent = 0;
            }

            if(enableAutoSyncContact){
                valueContact = 1;
            }else{
                batchContact = 0;
            }

            var params = {
                'module': 'GoogleOffice365Suite',
                'action': 'CTGoogleOffice365SuiteSyncGoogleAutoSync',
                'mode' : 'enableAutoSyncGoogle',
                'enableAutoSyncEvent' : valueEvent,
                'batchEvent' : batchEvent,
                'minutesEvent' : minutesEvent,
                'enableAutoSyncContact' : valueContact,
                'batchContact' : batchContact,
                'minutesContact' : minutesContact,
                'userId' : userId,
            }
           
            AppConnector.request(params).then(function(data){
                app.helper.hideProgress();
                var message = app.vtranslate('JS_SAVE_CONFIGURATION');
                app.helper.showSuccessNotification({'message':message}, thisInstance.notifyParams);  
                if(!enableAutoSyncContact){
                    jQuery('#batchContact').select2("val", "0");
                }
                if(!enableAutoSyncEvent){
                    jQuery('#batchEvent').select2("val", "0");
                }
            });
        });
    },

    // reload table

    registerReloadTable : function(){
        var userId =jQuery('#userid').val();
        var params = {
            'module': 'GoogleOffice365Suite',
            'action': 'CTGoogleOffice365CronLogTableReload',
            'userId' : userId,
        }

        AppConnector.request(params).then(function(data){
            $('#logTable').html(data.result.tableHtml);
            
            if(data.result.lastSyncTime != ''){
               $('#refreshLogBtn').removeClass('hide');
               $('#lastSyncTime').html('last sync '+ data.result.lastSyncTime);
            }
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
        this.registerSyncCalendarFromGoogle();
        this.registerSyncCalendarFromVtiger();
        this.registerSyncContactsFromVtiger();
        this.registerSyncContactsFromGoogle();
        this.registerRefreshTable();
        this.registerReloadTable();
        this.registerEventsForGoogleSyncCalendarDetails();
        this.registerEnableSettings();
        this.registerAppTriggerEvent();
    }
});

jQuery(document).ready(function() {
    var instance = new GoogleOffice365Suite_CTGoogleSyncCommon_Js();
    instance.registerEvents();
});