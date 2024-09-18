/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/
Settings_Vtiger_Index_Js('Settings_GPTIntegration_Index_Js', {}, {

    saveOpenAIServerDetails: function (form) {
        var thisInstance = this;
        var data = form.serializeFormData();

        app.helper.showProgress();
        if (typeof data == 'undefined') {
            data = {};
        }
        data.module = app.getModuleName();
        data.parent = app.getParentModuleName();
        data.action = 'SaveAjax';

        app.request.post({data: data}).then(function (err, data) {
            app.helper.hideProgress();
            if (err == null) {
                window.location.reload();
            } else {
                app.helper.showErrorNotification({'message': err.message});
            }
        });
    },

    /*
     * function to register the events in editView
     */
    registerEditViewEvents: function () {
        var thisInstance = this;
        var form = jQuery('#gptintegrationconfiguration').find('.confEditForm');
        var cancelLink = jQuery('.cancelLink', form);

        var params = {
            submitHandler: function (form) {
                var form = jQuery(form);
                form.find('[name="saveButton"]').attr('disabled', 'disabled');
                thisInstance.saveOpenAIServerDetails(form);
            }
        }
        form.vtValidate(params);

        cancelLink.click(function (e) {
            window.location.reload();
        });
    },

    loadContents: function (url) {
        var aDeferred = jQuery.Deferred();
        app.request.get({url: url}).then(
                function (err, data) {
                    jQuery('.gptintegrationconfigurationDetail').hide();
                    jQuery('.editButton').hide();
                    jQuery('.gptintegrationconfigurationEdit').show().html(data);
                    aDeferred.resolve(data);
                },
                function (error, err) {
                    aDeferred.reject();
                }
        );
        return aDeferred.promise();
    },

    registerDetailViewEvents: function () {
        var thisInstance = this;
        //Detail view container
        var container = jQuery('#gptintegrationconfiguration');
        var editButton = jQuery('.editButton', container);

        editButton.click(function (e) {
            var url = jQuery(e.currentTarget).data('url');

            app.helper.showProgress();
            thisInstance.loadContents(url).then(
                    function (err, data) {
                        thisInstance.registerEditViewEvents();
                        app.helper.hideProgress();
                    },
                    function (error, err) {
                        app.helper.hideProgress();
                    }
            );
        });
    },

    registerTabClickEvent: function () {
        var thisInstance = this;
        jQuery('.gptintegrationtabs').on('click', '.tab-item', function (e) {
            var currentTarget = jQuery(e.currentTarget);
            var tabname = currentTarget.data('tabname');
            jQuery('.gptintegrationtabs').find('.tab-item').removeClass('active');
            jQuery('.gptintegrationconfigcontent').find('.tab-pane').removeClass('active');
            var params = {
                module: 'GPTIntegration',
                parent: 'Settings',
                view: 'Index',
                mode: tabname
            }
            app.request.post({data: params}).then(function (err, res) {
                if (err == null) {
                    currentTarget.addClass('active');
                    var activeTabContents = jQuery("#" + tabname);
                    activeTabContents.addClass('active');
                    activeTabContents.html(res)

                    var fn = 'post' + tabname + 'TabClick';
                    if (typeof thisInstance[fn] == 'function') {
                        thisInstance[fn]();
                    }
                } else {
                    app.helper.showErrorNotification({message: err.message});
                }
            });
        })
    },

    postgptintegrationconfigTabClick: function() {
        this.registerDetailViewEvents();
    },
    
    registerEvents: function () {
        this._super();
        this.registerTabClickEvent();
        this.registerDetailViewEvents();
    }
})
