
	 var selectElement = document.getElementById('select2-drop');
	 var selectElement2 = document.getElementById('select2-result-label-36');
	 var selectElement3 = document.getElementById('s2id_autogen4');
	 
	 console.log(selectElement );
	 console.log(selectElement2);
	 console.log(selectElement3);
	 
	 $('#cf_875').change(function(){
    //alert($(this).val());
})
$('#select2-result-label-36').change(function(){
   // alert($(this).val());
})
$('#s2id_autogen4').change(function(){
    //alert($(this).val());
})
	 

    // Add change event listener
    selectElement.addEventListener('change', function() {
        // Get the selected value
        var selectedValue = this.value;

        // Print the selected value
        console.log("Selected value:", selectedValue);
        alet("intothe loop")
    });
$(document).ready(function() {
    

	// on change of your SELECT ELEMENT
	$( document ).on( 'change', 'select[select2-drop-mask"]', function( e ) {
	    
	    //alert("Selected item")
	
		// get the value of your target SELECT ELEMENT
		selectElement = $('select[select2-drop-mask"]').val();

	    // uncomment this for to see SELECT ELEMENT value
	    //alert('Select element value: ' + selectElement);

	    // put some condition here ...
	    if ( (selectElement == 'Job Order') ||
	    	(selectElement == 'Rush Order') ||
	    	(selectElement == 'Repeat Order') ) {

	    	// target all INPUT ELEMENTs to hide
	    	inputElementsToHide = [
    			$("input[id='SalesOrder_editView_fieldName_cf_880']"),
    			$("input[id='SalesOrder_editView_fieldName_cf_884']")
	    	];
	    	
	    	// hide all targetted INPUT ELEMENT
    		$.each(inputElementsToHide, function (index, value) {
    			
    			// check if ELEMENT is an INPUT or TEXTAREA
    	 		if(value.is('input') || value.is('textarea')) {

    	 			// hide the element container 
	    	 		value.closest('td').prev().hide();
	    	 		value.closest('td').hide();

	    	 		// only disable the INPUT element
	    	 		/*value.prev().prop('disabled', true);
	    	 		value.prop('disabled', true);*/
    	 		}

		    });

			// hide BLOCK 
	    	$("div[data-block='Sample Block']").hide();
    		
	    } else if (selectElement == 'MTO') {
			
	    	// target all INPUT ELEMENTs to show
	    	inputElementsToShow = [
    			$("input[id='SalesOrder_editView_fieldName_cf_880']"),
    			$("input[id='SalesOrder_editView_fieldName_cf_884']")
	    	]

	    	// show all targetted INPUT ELEMENT
    		$.each(inputElementsToShow, function (index, value) {

    			// is input
    	 		if(value.is('input') || value.is('textarea')) {
    	 			
    	 			// show the element container 
	    	 		value.closest('td').prev().show();
	    	 		value.closest('td').show();

	    	 		// enable the INPUT element
	    	 		/*value.prev().prop('disabled', false);
	    	 		value.prop('disabled', false);*/
    	 		}

		    });

	    	// show BLOCK 
	    	$("div[data-block='Sample Block']").show();

	    }

	});

});