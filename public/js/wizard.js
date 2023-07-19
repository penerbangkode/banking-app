"use strict";

// Class definition
var KTWizard4 = function () {
	// Base elements
	var wizardEl;
	var formEl;
	// var validator;
	var wizard;

	// Private functions
	var initWizard = function () {
		// Initialize form wizard
		wizard = new KTWizard('kt_wizard_v4', {
			startStep: 1, // initial active step number
			clickableSteps: true  // allow step clicking
		});


		// Change event
		wizard.on('change', function(wizard) {
			KTUtil.scrollTop();
		});
	}


	return {
		// public functions
		init: function() {
			wizardEl = KTUtil.get('kt_wizard_v4');
			formEl = $('#kt_form');

			initWizard();
			// initValidation();
			// initSubmit();
		}
	};
}();

jQuery(document).ready(function() {
	KTWizard4.init();
});
