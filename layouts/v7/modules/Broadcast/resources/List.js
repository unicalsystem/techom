Vtiger_List_Js("YourCustomModule_List_Js",{},{
    
    registerEvents : function() {
        this._super();
        this.registerViewDetailsClickEvent();
    },
    
    registerViewDetailsClickEvent : function() {
        var thisInstance = this;
        jQuery('body').on('click', '.view-details', function(e) {
            var broadcastId = jQuery(this).data('id');
          
            alert('Viewing details for broadcast ID: ' + broadcastId);
        });
    }
});