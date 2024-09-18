/*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ******************************************************************************/

Vtiger_List_Js("GoogleOffice365Suite_CTGoogleOffice365Common_Js", {}, {

    _SearchIntiatedEventName : 'VT_SEARCH_INTIATED',
    container : jQuery('body'),
    /* global search code end*/

    registerEventsForOutlookSyncCalendarDetails : function(){
        var thisInstance = this;
        jQuery('#saveOutlookAutoSettings').on('click', function(e){ 
            app.helper.showProgress();
            var batchEvent = jQuery('#batchEvent').val();
            var minutesEvent = jQuery('#minutesEvent').val();
            var enableAutoSyncEvent = jQuery("[name='enableAutoSyncEvent']").prop("checked");
            var batchContact = jQuery('#batchContact').val();
            var minutesContact = jQuery('#minutesContact').val();
            var enableAutoSyncContact = jQuery("[name='enableAutoSyncContact']").prop("checked");
            var userId =jQuery('#userid').val();

            var valueEvent = valueContact = 0;
            if(enableAutoSyncEvent == true){
                valueEvent = 1;
            } 
            if(enableAutoSyncContact){
                valueContact = 1;
            }

            var params = {
                'module': 'GoogleOffice365Suite',
                'action': 'CTGoogleOffice365SuiteSyncOutlookAutoSync',
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
                app.helper.showSuccessNotification({'message':message});  
            });
        });
    },

    registerGoogleCalendarLogout : function(){

        jQuery('#saveGoogleCalendarLogout').on('click', function(){
            var userId = jQuery("#userId").val();
            var message = app.vtranslate('JS_CONFIRM');
            app.helper.showConfirmationBox({'message':message}).then(function(e){
                window.location = "index.php?module="+app.getModuleName()+"&view=CTGoogleOffice365SuiteGoogleRevokeData&user_id=" + userId;
            });
        });

    },
    registerEventsForLogout : function(){
        jQuery("#outlook365Logout").on('click', function() {
            var userId = jQuery("#userId").val();
            var message = app.vtranslate('JS_CONFIRM');
            app.helper.showConfirmationBox({'message':message}).then(function(e){
                window.location = "index.php?module="+app.getModuleName()+"&view=CTGoogleOffice365SuiteRevokeOutlookToken&user_id=" + userId;
            });
        });
        jQuery("#homePage").on('click', function() {
            window.location = "index.php?module=GoogleOffice365Suite&view=List&viewname=52&app=MARKETING";
        });
        jQuery("#help").on('click', function() {
            window.location = "index.php?module=GoogleOffice365Suite&view=CTOffice365SuiteDocument&type=Events";
        });
    },

    registerEventsForLicense : function(){
        jQuery('#sendlience').on('click',function(e){
            var moduleName = app.getModuleName();
            
            var key = $('#licence').val();
            if(key == ''){
                text = 'Please Enter License Key';
                app.helper.showErrorNotification({message: text});
                return false;
            }
            var params = {
                'module' : moduleName,
                'view' : 'License',
                'licensekey' : key,
                'mode' : 'ActivateLicense'
            }
            var progressIndicatorElement = jQuery.progressIndicator({
               'position' : 'html',
               'blockInfo' : {
                    'enabled' : true
                }
            });
            AppConnector.request(params).then(
                function(data) {
                    progressIndicatorElement.progressIndicator({
                        'mode' : 'hide'
                    });
                    if(data.result == 1){
                        location.reload();
                    }else{
                        text = 'Please Enter Valid License Key';
                        app.helper.showErrorNotification({message: text});
                    }
               },
               function(error,err){
            
               }
              );
        });  
        jQuery('#deactive').on('click',function(e){
            var moduleName = app.getModuleName();
            var params = {
                'module' : moduleName,
                'view' : 'License',
                'mode' : 'deactivateLicense'
            }
            var progressIndicatorElement = jQuery.progressIndicator({
                'position' : 'html',
                'blockInfo' : {
                'enabled' : true
                }
            });
            AppConnector.request(params).then(
                function(data) {
                    progressIndicatorElement.progressIndicator({
                        'mode' : 'hide'
                    });
                    if(data.result == 1){
                        location.reload();
                    }
                },
                function(error,err){
                }
            );
        });     
    },

    registerClickEvents: function(){

        $('.googleDashborad').on('click', function(){
            window.location = "index.php?module=GoogleOffice365Suite&view=CTGoogleDashboard";
        });

        $('.officeDashboard').on('click', function(){
            window.location = "index.php?module=GoogleOffice365Suite&view=CTOffice365Dashboard";
        });

    },
    

    /**
     * Registered the events for this page
     */
    registerEvents: function(){
        this.registerEventsForOutlookSyncCalendarDetails();
        this.registerGoogleCalendarLogout();
        this.registerEventsForLogout();
        this.registerEventsForLicense();
        this.registerClickEvents();
    }
});

jQuery(document).ready(function() {
    var instance = new GoogleOffice365Suite_CTGoogleOffice365Common_Js();
    instance.registerEvents();
});