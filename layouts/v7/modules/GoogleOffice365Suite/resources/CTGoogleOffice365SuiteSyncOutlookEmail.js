/*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ******************************************************************************/

Vtiger_List_Js("GoogleOffice365Suite_CTGoogleOffice365SuiteSyncOutlookEmail_Js",{},{

    /**
    * Function to Checke Enable or Disable Outlook Email Module
    **/
    registerEventForEnableDisableModule : function(){
        
        jQuery('.summaryWidgetContainer').find('#enableSyncOutlook').change(function(e){
            app.helper.showProgress();

            var element=e.currentTarget;
            var value=0;
            var text = app.vtranslate('LBL_CTOUTLOOK_DISABLE');

            if(element.checked) {
                value=1; 
                text = app.vtranslate('LBL_CTOUTLOOK_ENABLE');
            }

            var params = {
                'module': 'GoogleOffice365Suite',
                'action': 'CTGoogleOffice365SuiteSyncOutlookEmail',
                'mode': 'enableSyncOutlookEmailModule',
                'value': value,
            }

            AppConnector.request(params).then(
                function(data){
                    app.helper.hideProgress();
                    var params = {};
                    params['text'] = text;
                    if(value == 1){
                        app.helper.showSuccessNotification({'message':app.vtranslate(text)});    
                    }else{
                        app.helper.showErrorNotification({'message':app.vtranslate(text)});                            
                    }
                },
                function(error){
                    app.helper.hideProgress();
                }
            );
        });
    },

    /**
     * Register Events For this page
     */
    registerEvents: function(){
        this.registerEventForEnableDisableModule();
    }
});