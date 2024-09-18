/************************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * Portions created by Libertus Solutions are Copyright (C) Libertus Solutions.
 * All Rights Reserved.
 *************************************************************************************/
jQuery.Class("LSQuickView_LSQuickView_Js",{

    LSQuickViewInstance: false,
    
    vtigerVersion: false,

    getInstance: function() {
        if( LSQuickView_LSQuickView_Js.LSQuickViewInstance == false ) {
            var instance = new LSQuickView_LSQuickView_Js();
            LSQuickView_LSQuickView_Js.LSQuickViewInstance = instance;
        }
        return LSQuickView_LSQuickView_Js.LSQuickViewInstance;
    },

    init : function() {
        var vtigerVersion = this.getVersion();
        if(vtigerVersion == 7) {
    		var view = app.view();
    	} else {
    		var view = app.getViewName();
    	}
    	console.log(view);
		var module = app.getModuleName();
		var parent = app.getParentModuleName();
		if((view == 'List' || view == 'GeoTools') && module != 'Calendar' && parent != 'Settings') {
            var thisInstance = LSQuickView_LSQuickView_Js.getInstance();
            thisInstance.registerEvents(vtigerVersion);
        }
    },
    
    getVersion : function() {
        var skinPath = jQuery('body').data('skinpath');
        if(skinPath.indexOf('v7') != -1) {
            return 7;
        } else {
            return 6;
        }
    },
	
}, {

	listViewContentContainer : false,

	moduleNameContainer : false,

    registerQuickView6 : function() {
        var thisInstance = this;
		var listViewContentDiv = thisInstance.getListViewContentContainer();
		var tds = jQuery(listViewContentDiv, '.listViewEntryValue');
		var lastPopovers = [];

		function getQuickView() {
			hideAllQuickViews();
			var el = jQuery(this);
			if(jQuery('form#CustomView').length) {
                return;
            }
            if(el.data('field-type') == 'reference' || el.data('field-type') == 'multireference') {
                return;
            }
            var tr = el.parent('tr');
       		var moduleName = thisInstance.getModuleName();
       		var title = app.vtranslate(moduleName);
            var crmid = tr.data('id');

            var params = {
                'module'     : 'LSQuickView',
                'view'       : 'GetQuickView',
                'src_module' : moduleName,
                'recordid'   : crmid
            };

			AppConnector.request(params).then(function(data){
				cachedView = jQuery('<div>').css({display:'none'}).attr('data-url-cached', params);
				cachedView.html(data);
				jQuery('body').append(cachedView);
				showQuickView(el, data, title);
			});
		}

		function get_popover_placement(el) {
            var width = window.innerWidth;
            var left_pos = jQuery(el).offset().left;
            if (width - left_pos > 600) return 'right';
            return 'left';
		}

		function showQuickView(el, data, title) {
			var the_placement = get_popover_placement(el);
			var templateWrapper = '<div class="popover" role="tooltip" data-trigger="focus">' +
        				               '<div class="arrow"></div>' +
		        		               '<div class="popover-inner" style="min-width:500px;">' +
		        		                   '<button name="vtTooltipClose" class="close" style="color:white;opacity:1;font-weight:lighter;position:relative;top:3px;right:3px;">x</button>' +
		        		                   '<h3 class="popover-title"></h3>' +
		        		                   '<div class="popover-content">' +
		        		                       '<div class="data-content"></div>' +
		        		                   '</div>' +
		        		               '</div>' +
		        		           '</div>';

			el.popover({
				title: title,
				trigger: 'manual',
				content: data,
				animation: false,
				placement:  the_placement,
				template: templateWrapper
			});
			lastPopovers.push(el.popover('show'));
			registerQuickViewDestroy();
		}

		function hideAllQuickViews() {
			// Hide all previous popover
			var lastPopover = null;
			while (lastPopover = lastPopovers.pop()) {
				lastPopover.popover('hide');
			}
		}

		function registerQuickViewDestroy() {
			jQuery('button[name="vtTooltipClose"]').on('click', function(e){
				var lastPopover = lastPopovers.pop();
				lastPopover.popover('hide');
			});
		}

        tds.each(function(index, el) {
			jQuery(el).hoverIntent({
                over : getQuickView,
                selector : '.listViewEntryValue',
                timeout : 300,
                interval : 800,
			    out: hideAllQuickViews
			});
        });

    },

    registerQuickView7 : function() {
        var thisInstance = this;
		var tds = jQuery('td.listViewEntryValue');
		tds = tds.not('[data-field-type="multireference"]');

		function getQuickView(ev) {
    		var aDeferred = jQuery.Deferred();

			var el = jQuery(ev.currentTarget);
			var moduleName = thisInstance.getModuleName();
            var tr = el.parent('tr');
            var crmid = tr.data('id');
       		            			       		
			if(el.data('field-type') == 'reference') {
			    var href = el.find('span.value > a').attr('href');
			    var uriParams = thisInstance.splitQueryString(href);
			    if(uriParams.module && uriParams.record) {
			        moduleName = uriParams.module;
			        crmid = uriParams.record;
			    }
			}

            var params = {
                'module'     : 'LSQuickView',
                'view'       : 'GetQuickView',
                'src_module' : moduleName,
                'recordid'   : crmid
            };

			AppConnector.request(params).then(function(data) {
   				aDeferred.resolve(data);
			});
            return aDeferred.promise();
		}
    
        tds.each(function(index, el) {
			jQuery(el).qtip({
				content: {
				    title: 'Quick View',
				    text: function(event, api) {
				        getQuickView(event)
				            .done(function(data) {
				                var html = data.result;
				                api.set('content.text', html);
				            })
				            .fail(function(error) {
                                api.hide()
                            })
           				    return 'Loading...';
                    }
				},
				hide: {
					event:'click mouseleave',
					delay: 1500
				},
				position: {
	                target: 'mouse',
	                adjust: {
	                    mouse: false
	                }
				},
				style: {
					classes: 'qtip-light',
					width:'500px'
				},
				show : {
				    delay: 800
				}
			});
		});
    
    },
    
    splitQueryString : function(queryString) {
        var query = {};
        var pairs = (queryString[0] === '?' ? queryString.substr(1) : queryString).split('&');
        for (var i = 0; i < pairs.length; i++) {
            var pair = pairs[i].split('=');
            query[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1] || '');
        }
        return query;
    },

	getListViewContentContainer : function() {
		if(this.listViewContentContainer == false){
			this.listViewContentContainer = jQuery('.listViewContentDiv');
		}
		return this.listViewContentContainer;
	},

	getModuleName : function () {
		if(this.moduleNameContainer == false){
			this.moduleNameContainer = app.getModuleName();
		}
		return this.moduleNameContainer;	
	},

    registerEvents: function(vtigerVersion) {
        if(vtigerVersion == 7) {
            this.registerQuickView7();
        } else {
            this.registerQuickView6();
        }
    },

});

