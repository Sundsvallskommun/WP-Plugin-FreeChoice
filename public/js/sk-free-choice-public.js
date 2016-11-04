(function( $ ) {
	'use strict';

	$( document ).ready(function() {
	    var options = {
		    getValue: "Address",
			data: freeChoiceSuggestions,
		    list: {
		    	maxNumberOfElements: 10,
		        match: {
		            enabled: true
		        },
		        sort: {
					enabled: true
				},
		        onChooseEvent: onAddressSelect,
		    },
		    theme: "square",
		    highlightPhrase: false,
		};

		$('#freeChoiceInput').easyAutocomplete(options);

		$('#free-choice-button-wrapper .free-choice-area-button').click(function(e){
	          e.preventDefault();
	          highLightAreabutton(this.id);
	          var value = $(this).attr('data-filter');

	          if(value == 'nykoarea-0') {
	              $('.filter').fadeIn('1000');
	          } else {
	              $('.filter').not('.'+value).fadeOut('3000');
	              $('.filter').filter('.'+value).fadeIn('3000');
	          }

	    });
	});


	/**
	 * 
	 * Triggers when user selected a entity in the auto completer list
	 */
	function onAddressSelect() {
		var item = $("#freeChoiceInput").getSelectedItemData();
		var area = item.NYKO.charAt(0);
		highLightAreabutton('free-choice-area-' + area);
		$('#free-choice-area-' + area).click();
	}


	/**
	 * 
	 * Highlights button with provided button id
	 */
	function highLightAreabutton(buttonId) {
		// Try to find any existing button with .btn-info class and remove it
		$('#free-choice-button-wrapper').children('button.btn-info').addClass('btn-secondary').
			removeClass('btn-info');
		$('#' + buttonId).addClass('btn-info').removeClass('btn-secondary');
	}


	

})( jQuery );
