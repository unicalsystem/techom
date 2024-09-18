/*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ******************************************************************************/

Vtiger_List_Js("GoogleOffice365Suite_CTGoogleOffice365SuiteSyncGoogleEmail_Js",{},{

    /**
    * Function to Checke Enable or Disable Google Email Module
    **/
    registerEventForEnableDisableModule : function(){
        jQuery('#enableSyncGoogle').on('change', function(e){
            app.helper.showProgress();
            var active = jQuery("[name='enableSyncGoogle']").prop("checked"); 

            if(active == true){
                var value = 1;
            }else{
                var value = 0;
            }

            var params = {
                'module': app.getModuleName(),
                'action': 'CTGoogleOffice365SuiteSyncGoogleEmail',
                'mode': 'enableSyncGoogleEmailModule',
                'value': value,
            }
            AppConnector.request(params).then(function(data){
                app.helper.hideProgress();
                if(value == 1){
                    var message = app.vtranslate('JS_SYNC_GOOGLE_ENABLED');
                    app.helper.showSuccessNotification({'message':message});    
                }else{
                    var message = app.vtranslate('JS_SYNC_GOOGLE_DISABLED');
                    app.helper.showErrorNotification({'message':message});                            
                }
            });
        });
    },

    /**
     * Registered the events for this page
     */
    registerEvents: function(){
        this.registerEventForEnableDisableModule();
    }
});
