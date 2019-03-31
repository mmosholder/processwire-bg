/*

	RECUR.ME

*/
$(document).ready(function(){
$('[data-recurme-holder="true"]').each(function(){
	
	// get the id & this element - one recurme UI
	var recurmeID 	= $(this).attr('data-recurme-id');
	var TZ			= $(this).attr('data-tz');
	var recurme 	= $('div#'+recurmeID);
	
	var saveObj 			= {};
		saveObj.startDate	= false;
		saveObj.endDate		= false; 
		saveObj.dates 		= []; 
		saveObj.excluded	= [];
		saveObj.active 		= false; // if the repeat field is active or not.
		saveObj.showResults	= false;
	var repeatingDatesData 	= "";
	var recurringRule 		= {};
	
	function readRule( rrule ) {
		
	    rrule = typeof rrule !== 'undefined' ? rrule : '';
		
	    if ( rrule != '') {
		// Break down the rule by semi-colons first
		var items = rrule.split(';');
		var recur = [];
		for(i = 0; i < items.length; i++ ) {
		    if ( items[i] !== '' ) {
			temp = items[i].split('=');
		    }
		    recur[temp[0]] = temp[1];
		}
		
		// remove the default COUNT value that we are using to limit results
		// (so that it seems like forever)
		if(recur.COUNT == 2800){ recur.COUNT = ""; }
	
		// See if the recurring rule has enough valid parts
		if (recur.FREQ && recur.DTSTART) {
		    recurringRule = {
			wkst: recur.WKST,			
			freq: recur.FREQ,
			dtstart: recur.DTSTART,
			interval: recur.INTERVAL,
			byday: recur.BYDAY,
			bysetpos: recur.BYSETPOS,
			bymonthday: recur.BYMONTHDAY,
			bymonth: recur.BYMONTH,
			count: recur.COUNT,
			until: recur.UNTIL
		    };
		    
		    // Set INTERVAL
			recurme.find('input[name="interval"]').val(recur.INTERVAL);
	
		    // Set either NEVER, COUNT or UNTIL
		    if( recur.UNTIL ) {
				recurringRule.until = recur.UNTIL;
				recurme.find('input[id="never-select"]').prop('checked', false);
				recurme.find('input[id="count-select"]').prop('checked', false);
				recurme.find('input[id="until-select"]').prop('checked', true).trigger('change');
			
		    } else if( recur.COUNT ) {
				recurringRule.count = recur.COUNT;
				recurme.find('input[name="count"]').val(recur.COUNT);
				recurme.find('input[id="never-select"]').prop('checked', false);
				recurme.find('input[id="count-select"]').prop('checked', true).trigger('change');
				recurme.find('input[id="until-select"]').prop('checked', false);
		    
		    } else if(!recur.UNTIL && !recur.COUNT){
			    // its the never option
			    recurme.find('input[id="never-select"]').prop('checked', true).trigger('change');
				recurme.find('input[id="count-select"]').prop('checked', false);
				recurme.find('input[id="until-select"]').prop('checked', false);

		    }
		    
	
		    var startDateString = moment(recur.DTSTART).tz(TZ).utc().format("YYYY-MM-DD hh:mm a");
		    //console.log(startDateString);
		    recurme.find('.start-date-field').val(startDateString);
		    recurme.find('.start-date-hidden').val(recur.DTSTART);
		    
		    // Setup start-date picker
		    var startDate = recurme.find('.start-date-field').datetimepicker({
	      		showButtonPanel: false,
	      		showOtherMonths: true,
	      		selectOtherMonths: true,
	      		dateFormat: 'yy-mm-dd',
	      		timeFormat: 'hh:mm tt',
	      		changeMonth: true,
		  		changeYear: true,
	      		onSelect: function(value) {
		      		
			  		fullDateString = moment(value, "YYYY-MM-DD hh:mm a").format('YYYYMMDDTHHmmss[Z]');
				    recurme.find('.start-date-hidden').val(fullDateString);
					recurringRule.dtstart = fullDateString;
					minEndDate = moment(value, "YYYY-MM-DD hh:mm a").tz(TZ).utc().format('YYYY-MM-DD');
				    recurme.find('.end-date').datepicker('option', 'minDate', minEndDate);
				    recurme.find('#rrule').trigger('processRecur');
				}
	    	});
		    
		    
		    // Setup the end-date picker
		    recurme.find('.end-date').datepicker({
	      		showOtherMonths: true,
	      		selectOtherMonths: true,
	      		dateFormat: 'yy-mm-dd',
	      		changeMonth: true,
		  		changeYear: true,
	      		onSelect: function(value) {
				    untilString = moment(value + 'T23:59:00Z').tz(TZ).utc().format('YYYYMMDDTHHmmss[Z]');
				    recurme.find('.end-date-hidden').val(untilString).trigger('change');
				    // Remove the count variable
				    recurringRule.count = '';
				    // Set until variable
				    recurringRule.until = untilString;
				    recurme.find('#rrule').trigger('processRecur');
				}	
	    	}).datepicker('setDate', 'today');
	    	    
	    	recurme.find('.end-date-hidden').val(MyDateString + 'T235900Z').trigger('change');
	
		    if ( recur.UNTIL ) {
			    recurringRule.until = recur.UNTIL;
	    		
	    		existingED = moment(recur.UNTIL);
				recurme.find('.end-date').val(existingED.format('YYYY-MM-DD'));
				recurme.find('.end-date-hidden').val(existingED.format('YYYYMMDD') + 'T235900Z').trigger('change');
	
				// Set ENDDATE radio to yes
				recurme.find('input[data-name="end-select"]').prop('checked', true);
				// remove disabled from end date field.
				recurme.find('input[name="until"]').removeAttr('disabled');
				recurme.find('#rrule').trigger('processRecur');
		    }
	
		    // Show Until Rules
		    recurme.find('#until-rules').show();
		    
		    // if recur.me is active
		    if(saveObj.active == true){
			    showHideRecur();
		    } 
	
		    
		    switch(recur.FREQ) {
	
		    case("DAILY"):
	
			break;
	
		    case("WEEKLY"):
			// Selectbox FREQ = monthly
			recurme.find('select[name="freq"]').val('weekly');
	
			// Hide all DIVS
			recurme.find('#recurring-rules > .section.hide').hide();
	
			// Show selected DIV
			recurme.find('div.' + 'weeks-choice').show();
			//recurme.find('span.freq-selection').text('week(s)');
	
			// Show Until / Count Rules
			recurme.find('#until-rules').show();
			
			if ( recur.BYDAY ) {
			    // Split up the individual bymonthdays
			    bydays = recur.BYDAY.split(',');
	
			    // Loop through the BYDAYs
			    for( v = 0; v < bydays.length; v++ ) {
				// Set select monthday buttons to active
				recurme.find('#weekday-select button[data-value="'+bydays[v]+'"]').addClass('active');
			    }
			    recurringRule.byday = recur.BYDAY;
			    
			    return true;
			}
			
			break;
	
		    case("MONTHLY"):
			// Selectbox FREQ = monthly
			recurme.find('select[name="freq"]').val('monthly');
	
			// Hide all DIVS
			recurme.find('#recurring-rules > .section.hide').hide();
	
			// Show selected DIV
			//$('#weekday-select').show();
			recurme.find('div.' + 'months-choice').show();
			//recurme.find('span.freq-selection').text('month(s)');
	
			// Show Until / Count Rules
			recurme.find('#until-rules').show();
			
			if ( typeof recur.BYMONTHDAY !== 'undefined' ) {
	
			    // Split up the individual bymonthdays
			    bymonthdays = recur.BYMONTHDAY.split(',');
	
			    // Loop through the BYMONTHDAYs
			    for( v = 0; v < bymonthdays.length; v++ ) {
				// Set select monthday buttons to active
				recurme.find('#monthday-select button[data-day-num="'+bymonthdays[v]+'"]').addClass('active')
			    }
			    recurringRule.bymonthday = recur.BYMONTHDAY;
			    
			    return true;
			}
	
			if ( recur.BYSETPOS && recur.BYDAY  ) {
			    // Set Radio Button
			    recurme.find('input#month-byday-pos-selected').prop('checked', true);
			    recurme.find('select[name^="month-byday"]').removeAttr('disabled');
	
			    // Set values
			    recurme.find('select[name="month-byday-pos"]').val(recur.BYSETPOS);
			    recurme.find('select[name="month-byday-pos-name"]').val(recur.BYDAY);
			    recurme.find('input#month-byday-pos-selected').trigger('change');
	
			    //Disable day buttons
			    recurme.find('#monthday-select button').attr('disabled','disabled');
			    
			    recurringRule.bysetpos = recur.BYSETPOS;
			    recurringRule.byday = recur.BYDAY;
	
			    return true;
			}
	
			
			
			break;
	
		    case("YEARLY"):
			// Selectbox FREQ = yearly
			recurme.find('select[name="freq"]').val('yearly');
	
			// Hide all DIVS
			recurme.find('#recurring-rules > .section.hide').hide();
	
			// Show selected DIV
			recurme.find('div.' + 'years-choice').show();
			//recurme.find('span.freq-selection').text('year(s)');
	
			// Show Until / Count Rules
			recurme.find('#until-rules').show();
			
			// BYMONTH and BYMONTHDAY attributes are going to be set
			if ( recur.BYMONTHDAY && recur.BYMONTH && !recur.BYDAY ) {
			    // Set Radio Button
			    recurme.find('input#yearly-one-month').prop('checked', true).trigger('change');
	
			    //				alert(recur.BYDAY);
			    recurme.find('select[name="yearly-bymonth"]').removeAttr('disabled');
			    recurme.find('select[name="yearly-bymonthday"]').removeAttr('disabled');
			    
			    // Set values
			    recurme.find('select[name="yearly-bymonth"]').val(recur.BYMONTH);
			    recurme.find('select[name="yearly-bymonthday"]').val(recur.BYMONTHDAY);
			    
			    recurringRule.bymonth = recur.BYMONTH;
			    recurringRule.bymonthday = recur.BYMONTHDAY;
			    
			    recurme.find('input#yearly-one-month').trigger('change');
			    
			    return true;
			}
	
			// Multiple Month Selection
			if ( recur.BYMONTH && !recur.BYMONTHDAY && !recur.BYDAY) {
			    // Disable yearly select boxes
			    recurme.find('select[name^=yearly-]').attr('disabled','disabled');
			    // Set Radio Button
			    recurme.find('input#yearly-multiple-months').prop('checked', true).trigger('change');
	
			    // Make buttons active
			    recurme.find('.yearly-multiple-months button').removeAttr('disabled');
			    // Split up the individual bymonthdays
			    bymonth = recur.BYMONTH.split(',');
	
			    // Loop through the BYMONTHDAYs
			    for( v = 0; v < bymonth.length; v++ ) {
				// Set select monthday buttons to active
				recurme.find('.yearly-multiple-months button[data-month-num="'+bymonth[v]+'"]').addClass('active')
			    }
			    recurringRule.bymonth = recur.BYMONTH;
	
			    return true;
			}
	
			// Precise Yearly Selection
			if ( recur.BYMONTH && recur.BYDAY && recur.BYSETPOS ) {
			    // Disable yearly select boxes
			    recurme.find('select[name^=yearly-]').attr('disabled','disabled');
	
			    // Enable the right select
			    recurme.find('select[class=yearly-precise]').removeAttr('disabled');
	
			    // Set Radio Button
			    recurme.find('input#yearly-precise').prop('checked', true).trigger('change');
			    
			    // Set select values
			    recurme.find('select[name="yearly-byday"]').val(recur.BYDAY);
			    recurme.find('select[name="yearly-bysetpos"]').val(recur.BYSETPOS);
			    recurme.find('select[name="yearly-bymonth-with-bysetpos-byday"]').val(recur.BYMONTH);
	
			    recurringRule.bymonth 	= recur.BYMONTH;
			    recurringRule.byday 	= recur.BYDAY;
			    recurringRule.bysetpos 	= recur.BYSETPOS;
				
				recurme.find('input#yearly-precise').trigger('change');
				
			    return true;
			}
			
			break;
		    }
			
		}
	    }
	    
	    return false;
	
	}
	
	//readRule = true;
	
	function resetOptions() {
	    
	    
	    // Format the date (http://stackoverflow.com/questions/3605214/javascript-add-leading-zeroes-to-date)
	    today = new Date();
		MyDateString = moment(today).format('YYYYMMDD');
	    // Reset all the selected rules
	    recurringRule = {
		wkst: 'MO',
		freq: "daily",
		dtstart: MyDateString + moment(today).format('THHmmss[Z]'),
		interval: "1",
		byday: "",
		bysetpos: "",
		bymonthday: "",
		bymonth: "",
		count: "",
		until: ""
	
	    };
	
	    // Reset all button states and input values
	    recurme.find('button').removeClass('active');
	
	    // Reset back interval label to 'days'
	    recurme.find('span.freq-selection').text('days');
	
	    // Hide all but the daily options
	    recurme.find('#monthday-select,#bymonth-select,#weekday-select').hide();
	    
	    // Reset Interval back to 1
	    recurme.find('input[name="interval"]').val("1");
	
	    // Reset Count back to 1
	    recurme.find('input[name="count"]').val("");
	    
	
	    // Change back Daily
	    recurme.find('select[name="freq"]').val('daily');
	
	    // Reset Until / Count radio buttons
	    recurme.find('input[id="never-select"]').prop('checked', true).trigger('change');
	    recurme.find('input[id="until-select"]').prop('checked', false);
	    recurme.find('input[id="count-select"]').prop('checked', false);
		 
	}
	
	function rruleGenerate() {
	    // Produce RRULE state to feed to rrule.js
	    var rrule = "";
	
	    // Check to be sure there is a count value or until date selected
	    if ( !recurringRule.count && !recurringRule.until){
			// No end in sight, make it default to 1 occurence
			//recurringRule.count = "2800";
	    }
	    for ( var key in recurringRule ) {
		if ( recurringRule.hasOwnProperty(key) ) {
		    if ( recurringRule[key] != '' && recurringRule[key] != undefined) {
			rrule += key + '=' + recurringRule[key] + ';';
		    }
		}
	    }			
	    // Remove the last semicolon from the end of RRULE
	    rrule = rrule.replace(/;\s*$/, "");
	
	    // Convert to Uppercase and return
	    return rrule.toUpperCase();		
	
	}
	
	// reset recur.me
	resetOptions();
	
	// check for stored data
    repeatingDatesData = $('[data-recurme-id="'+recurmeID+'"]');

    var getObj = repeatingDatesData.val();
    if(getObj){ 
	    getObj = JSON.parse(getObj); 
	    // check if it's active or not
	    if(getObj.active){ saveObj.active = true; }
	    else{ saveObj.active = false; }
		if(getObj.excluded){ saveObj.excluded = getObj.excluded; }
		if(getObj.showResults){ saveObj.showResults = getObj.showResults; }
	}
    
    // if there is no stored rrule/data
    if (!getObj.rrule){
	
		// Setup start-date picker
	    var startDate = recurme.find('.start-date-field').datetimepicker({
	  		showButtonPanel: false,
	  		showOtherMonths: true,
	  		selectOtherMonths: true,
	  		dateFormat: 'yy-mm-dd',
	  		timeFormat: 'hh:mm tt',
	  		changeMonth: true,
	  		changeYear: true,
	  		onSelect: function(value) {
	
		  		dateSelected = new Date(startDate.datetimepicker('getDate'));
		  		fullDateString = moment(value, "YYYY-MM-DD hh:mm a").format('YYYYMMDDTHHmmss[Z]');
			    recurme.find('.start-date-hidden').val(fullDateString);
				recurringRule.dtstart = fullDateString;
		    
				// Set minimum selected date on end-datepicker
			    minEndDate = moment(value, "YYYY-MM-DD hh:mm a").tz(TZ).utc().format('YYYY-MM-DD');
			    recurme.find('.end-date').datepicker('option', 'minDate', minEndDate);
				// Reset the selected enddate
			    recurme.find('#rrule').trigger('processRecur');
			}
		});
		
		recurme.find('.start-date-field').datetimepicker('setDate', new Date());
		dateSelected = new Date(startDate.datetimepicker('getDate'));
		fullDateString = moment(dateSelected, "YYYY-MM-DD hh:mm a").format('YYYYMMDDTHHmmss[Z]');
		recurme.find('.start-date-hidden').val(fullDateString).trigger('change');
		recurringRule.dtstart = fullDateString;
	
		// Setup the end-date picker
		recurme.find('.end-date').datepicker({
	  	    showOtherMonths: true,
	  	    selectOtherMonths: true,
	  	    dateFormat: 'yy-mm-dd',
	  	    changeMonth: true,
	  		changeYear: true,
	  	    onSelect: function(value) {
	  			untilString = moment(value + 'T23:59:00Z').tz(TZ).utc().format('YYYYMMDDTHHmmss[Z]');
	  			recurme.find('.end-date-hidden').val(untilString).trigger('change');
	  			// Remove the count variable
	  			recurringRule.count = '';
				// Set until variable
				recurringRule.until = untilString;
				recurme.find('#rrule').trigger('processRecur');
	    	}
	    }).datepicker('setDate', 'today');
	 
	    recurme.find('.end-date-hidden').val(MyDateString + 'T235900Z').trigger('change');
	    recurme.find('#rrule').trigger('processRecur');
    
    } 
    // else if there is stored rrule/data
    else {
		readRule(getObj.rrule);
    }

    // Setup buttons Don't allow any buttons to submit the form
    recurme.find('button').not('[type="submit"]').click(function(e){
		e.preventDefault();
		return false;
    });	
    
    // add selections to the parent boxes of selected options (sections)
	recurme.find('input[type=radio]').each(function(){
	    if($(this).is(':checked')){ 
		$(this).parents('.section').find('.box').removeClass('selected');
		$(this).parents('.box').addClass('selected'); 
	    }
	}).on('change', function(){
	    if($(this).is(':checked')){ 
		$(this).parents('.section').find('.box').removeClass('selected');
		$(this).parents('.box').addClass('selected');
	    }
	});
	
	
	// FREQ Selection
	$(recurme).on('change','select[name="freq"]', function(){
		
		// get the startdate so we can set some smart default selections
		// example Sat Apr 01 2017 15:21:00 GMT-0600 (CST)
		var startDate = recurme.find('.start-date-field');
		startDate = new Date(startDate.datetimepicker('getDate'));
		var month = startDate.getMonth()+1;
		var day   = startDate.getDate();
	    
	    selectedFrequency = recurme.find('select[name="freq"] option:selected').attr('class');
	
	    // Hide all DIVS
	    recurme.find('#recurring-rules > .section.hide').hide();
	
	    // Show selected DIV
	    recurme.find('div.' + selectedFrequency +'-choice').show();
	    recurme.find('span.freq-selection').text(selectedFrequency);
	
	    // Show Until / Count Rules
	    recurme.find('#until-rules').show();
	    
	    // reset all buttons
	    recurme.find('#recurring-rules button').removeClass('active');
	    
	    // remove checked from all radio options in month and year
	    // if monthly
	    if(selectedFrequency == 'months'){
		    recurme.find('radio[data-name="monthday-pos-select"]').prop('checked', false);
		    recurme.find('input#monthday-selected').prop('checked', true).trigger('change');
		    recurme.find('.monthday-select [data-day-num="'+day+'"]').trigger('click');
	    }else if(selectedFrequency == 'years'){
		    recurme.find('radio[data-name="yearly-options"]').prop('checked', false);
		    recurme.find('input#yearly-one-month').prop('checked', true).click();
		    recurme.find('select#yearly-bymonth').val(month);
		    recurme.find('select#yearly-bymonthday').val(day);
		    recurme.find('select#yearly-bymonth-with-bysetpos-byday').val(month);
	    }
	
	    // check if until is selected
	    var until = '';
	    if(recurme.find('input#until-select:checked').length){ until = recurme.find('input[name=end-date-formatted]').val(); }
	
	    // Reset all the selected rules
	    recurringRule = {
		wkst: 'MO',
		freq: "",
		dtstart: recurme.find('.start-date-hidden').val(),
		interval: recurme.find('input[name=interval]').val(),
		byday: "",
		bysetpos: "",
		bymonthday: "",
		bymonth: "",
		count: recurme.find('input[name=count]').val(),
		until: until
	    };
	    
	    // Set frequency
	    recurringRule.freq = recurme.find('select[name="freq"] option:selected').val();
	    recurme.find('#rrule').trigger('processRecur');
	
	});
	
	// Interval Selection
	$(recurme).on('change blur keyup', 'input[name="interval"]', function(){
	    recurringRule.interval = $(this).val();
	    recurme.find('#rrule').trigger('processRecur');
	});
	
	// BYDAY - FREQ: WEEKLY Selection
	recurme.find('.weekday-select button').on('click', function(){
	    $(this).toggleClass('active');
	    var byday = []; // Array to Store 'byday' in. Reset it to '' to store new days in below
	
	    // Store Selected Days in the BYDAY rule
	    recurme.find('.weekday-select button').each(function(){
		
		// Active class is the selected day, store the ID of active days which contains the short day name for the rrule (ex. MO, TU, WE, etc)
		if ( $(this).hasClass('active') ) {
		    byday.push($(this).attr('data-value'));
		}
	
	    });
	    recurringRule.byday = byday;
	    
	});
	
	
	// BYMONTHDAY Selection
	recurme.find('.monthday-select button').on('click', function(){
	    $(this).toggleClass('active');
	    var bymonthday = []; // Array to Store 'bymonthday' in. Reset it to '' to store new days in below
	
	    // Store Selected Days in the BYDAY rule
	    recurme.find('.monthday-select button').each(function(){
		
		// Active class is the selected day, store the ID of active days which contains the short day name for the rrule (ex. MO, TU, WE, etc)
		if ( $(this).hasClass('active') ) {
		    bymonthday.push($(this).attr('data-day-num'));
		}
	
	    });
	    recurringRule.bymonthday = bymonthday;
	    
	    // Reset BYDAY Option
	    //recurringRule.byday = "";
	
	    // Reset BySetPos
	    recurringRule.bysetpos = "";
	});
	
	// BYMONTH Selection
	recurme.find('#bymonth-select button').on('click', function(){
	    $(this).toggleClass('active');
	    var bymonth = []; // Array to Store 'byday' in. Reset it to '' to store new days in below
	
	    // Store Selected Days in the BYDAY rule
	    recurme.find('#bymonth-select button').each(function(){
		
		// Active class is the selected day, store the ID of active days which contains the short day name for the rrule (ex. MO, TU, WE, etc)
		if ( $(this).hasClass('active') ) {
		    bymonth.push($(this).attr('data-month-num'));
		}
	
	    });
	    recurringRule.bymonth = bymonth;
	});
	
	
	// FREQ=MONTHLY - RADIO BUTTONS
	recurme.find('input[data-name="monthday-pos-select"]').change( function(){
	
	    // Selected Radio Button
	    var selectedRadio = $(this).val();
	
	    // A Radio was changed.  Grab all the radio buttons to see which one.
	    recurme.find('input[data-name="monthday-pos-select"]').each(function(){
		
		if ( $(this).val() == selectedRadio ) {
		    
		    switch ( $(this).val() ) {
		    case "month-byday-pos-selected":
			// ByDay Select Boxes are being used instead of the Month Day
			
			// Disable all the monthday buttons
			recurme.find('#monthday-select button').attr('disabled','disabled').removeClass('active');
			recurme.find('select[name^="month-byday"]').removeAttr('disabled');
	
			// Generate the BYDAY variable from selected dropdowns by firing 'change' event
			recurme.find('select[name^="month-byday"]').change();
			// Mark recurring object bymonthday back to nothing
			recurringRule.bymonthday = "";
	
			break; 
	
		    case "monthday-selected":
	
			// Month Day Buttons are being used instead of the ByDay select boxes
			recurme.find('#monthday-select button').removeAttr('disabled');
			recurme.find('#monthday-select button').removeClass('active');
	
			recurme.find('select[name^="month-byday"]').attr('disabled','disabled');
			recurringRule.byday = "";
			recurringRule.bysetpos = "";
			
	
			break; 
	
		    }
		}
	
	    });
	});
	
	// FREQ=YEARLY - RADIO BUTTONS
	recurme.find('input[data-name="yearly-options"]').change( function(){
	
	    // Selected Radio Button ID
	    var selectedRadio = $(this).attr('id');
	
	    // A Radio was changed.  Check all the radio buttons' ids to see which one.
	    recurme.find('input[data-name="yearly-options"]').each(function(){
		
		if (  $(this).attr('id') == selectedRadio ) {
		    
		    switch ( $(this).attr('id') ) {
		    case "yearly-one-month":
			// Example Pattern
			// FREQ=YEARLY;BYMONTH=1;BYMONTHDAY=1;UNTIL=20150818;
			
			// BYMONTH and BYMONTHDAY attributes are going to be set
			// Reset BYSETPOS, BYDAY, 
			recurringRule.bysetpos = "";
			recurringRule.byday = "";
	
			// Disable all the yearly select boxes 
			recurme.find('select[class^="yearly"]').attr('disabled','disabled');
			
			// Disable all the yearly multiple month buttons
			recurme.find('.yearly-multiple-months button').attr('disabled','disabled');
			recurme.find('.yearly-multiple-months button').removeClass('active');
	
			// Enable Yearly One Month Options
			recurme.find('select[class="yearly-one-month"]').removeAttr('disabled');
	
			// Fire change to select default values
			recurme.find('select[name="yearly-bymonth"]').change();
	
			break; 
	
		    case "yearly-multiple-months":
			// Example Pattern 
			// FREQ=YEARLY;INTERVAL=1;BYMONTH=1,3,4,10;COUNT=1
			
			// BYMONTH attribute is going to be set
			// Reset BYMONTHDAY, BYDAY, BYSETPOS
			recurringRule.bymonthday = "";	
			recurringRule.byday = "";
			recurringRule.bysetpos = "";
	
			// Disable all the monthday buttons
			recurme.find('select[class^="yearly"]').attr('disabled','disabled');
			
			// Enable the buttons
			recurme.find('.yearly-multiple-months button').removeAttr('disabled');
			
	
			break; 
	
		    case "yearly-precise":
			// Example Pattern
			// FREQ=YEARLY;BYDAY=SU;BYSETPOS=1;BYMONTH=1;UNTIL=20150818;
	
			// BYDAY, BYSETPOS, and BYMONTH are going to be set
			// Reset BYMONTHDAY
			recurringRule.bymonthday = "";
	
			// Disable all the yearly select boxes 
			recurme.find('select[class^="yearly"]').attr('disabled','disabled');
			
			// Disable all the yearly multiple month buttons
			recurme.find('.yearly-multiple-months button').attr('disabled','disabled');
			recurme.find('.yearly-multiple-months button').removeClass('active');
	
			// Enable Yearly One Month Options
			recurme.find('select[class="yearly-precise"]').removeAttr('disabled');
	
			// Fire change to select default values
			recurme.find('select[name="yearly-bysetpos"]').change();
			break; 
		    }
		}
	
	    });
	    //$('#rrule').submit();
	});
	
	// FREQ=YEARLY - Yearly One Month selection
	// Example Pattern
	// FREQ=YEARLY;BYMONTH=1;BYMONTHDAY=1;UNTIL=20150818;
	
	// BYMONTH and BYMONTHDAY attributes are going to be set
	
	$(recurme).on('change', 'select[name^="yearly-bymonth"]', function(){
	    // Example Pattern
	    // FREQ=MONTHLY;INTERVAL=1;BYDAY=SU,SA;BYSETPOS=1;COUNT=1
	
	    // First, Second, Third, Fourth or Last Days
	    var bymonth = recurme.find('select[name="yearly-bymonth"]').val();
	
	    // Make array of selected days.
	    var bymonthday = recurme.find('select[name="yearly-bymonthday"]').val();
	
	    recurringRule.bymonth = bymonth;
	    recurringRule.bymonthday = bymonthday;
	    recurme.find('#rrule').trigger('processRecur');
	});
	
	// FREQ=YEARLY - Yearly Multiple Month selection
	// Example Pattern
	// FREQ=YEARLY;INTERVAL=1;BYMONTH=1,3,4,10;COUNT=1
	$(recurme).on('click', '.yearly-multiple-months button', function(){
	    $(this).toggleClass('active');
	    var bymonth = []; // Array to Store 'bymonth' in. Reset it to '' to store new days in below
	
	    // Store Selected Days in the BYDAY rule
	    recurme.find('.yearly-multiple-months button').each(function(){
		
		// Active class is the selected day, store the ID of active days which contains the short day name for the rrule (ex. MO, TU, WE, etc)
		if ( $(this).hasClass('active') ) {
		    bymonth.push($(this).attr('data-month-num'));
		}
	
	    });
	    recurringRule.bymonth = bymonth;
	    recurme.find('#rrule').trigger('processRecur');
	});
	
	// FREQ=YEARLY - Yearly Precise Selection
	// Example PAttern
	// FREQ=YEARLY;BYDAY=SU;BYSETPOS=1;BYMONTH=1;UNTIL=20150818;
	
	// BYDAY, BYSETPOS, and BYMONTH are going to be set
	
	$(recurme).on('change', 'select[name="yearly-bysetpos"], select[name="yearly-byday"], select[name="yearly-bymonth-with-bysetpos-byday"]', function(){
	    // Example Pattern
	    // FREQ=MONTHLY;INTERVAL=1;BYDAY=SU,SA;BYSETPOS=1;COUNT=1
	
	    // First, Second, Third, Fourth or Last Days
	    var bysetpos = recurme.find('select[name="yearly-bysetpos"]').val();
	
	    // Make array of selected days.
	    var byday = recurme.find('select[name="yearly-byday"]').val().split(',');
	
	    // First, Second, Third, Fourth or Last Days
	    var bymonth = recurme.find('select[name="yearly-bymonth-with-bysetpos-byday"]').val();
	    //alert($('select[name="yearly-bymonth-with-bysetpos-byday"]').val());
	
	    recurringRule.bymonthday = "";
	
	    recurringRule.bymonth = bymonth;
	    recurringRule.byday = byday;
	    recurringRule.bysetpos = bysetpos;
	    recurme.find('#rrule').trigger('processRecur');
	});
	
	
	// FREQ=MONTHLY
	// BYDAY and BYSETPOS MONTHLY Setting
	
	$(recurme).on('change', 'select[name^="month-byday"]', function(){
	    // Example Pattern
	    // FREQ=MONTHLY;INTERVAL=1;BYDAY=SU,SA;BYSETPOS=1;COUNT=1
	
	    // First, Second, Third, Fourth or Last Days
	    var bySetPos = recurme.find('select[name="month-byday-pos"]').val();
	
	    // Make array of selected days.
	    var daysSelected = recurme.find('select[name="month-byday-pos-name"]').val().split(',');
	
	    recurringRule.bysetpos = bySetPos;
	    recurringRule.byday = daysSelected;
	    recurme.find('#rrule').trigger('processRecur');
	});
	
	// Set the count variable
	$(recurme).on('input change', 'input[name="count"]', function() {
	    recurringRule.count = $(this).val();
	});
	
	
	
	// Handle Until / Count Radio Buttons
	recurme.find('input[data-name="end-select"]').on('change',function(){

	    // Selected Radio Button
	    var selectedRadio = $(this).val();
	
	    // A Radio was changed.  Grab all the radio buttons to see which one.
	    recurme.find('input[data-name="end-select"]').each(function(){
		// enable the input next to the selected radio button
		if( $(this).val() == selectedRadio ){
		    recurme.find('input[name="'+selectedRadio+'"]').removeAttr('disabled');
		    if ( $(this).val() == 'until' ) {
				// Set the date in the until textbox as the until date
				// Remove the count variable
				recurringRule.count = '';
				// Set until variable
				recurringRule.until = recurme.find('.end-date-hidden').val();
		    }
		    // set the initial value at 1
		    if( $(this).val() == 'count'){
				if(!recurme.find('input[name="'+selectedRadio+'"]').val()){
					recurme.find('input[name="'+selectedRadio+'"]').val(1).change();
				}
		    }
		    
		} else {
		    //disable the inputs not selected.
		    $(this).next('input').not('.end-date').attr('disabled','disabled').val('');
		    
		    //reset the stored value in the recurringRule object
		    var not_selected = $(this).next('input').attr('name');
		    
		    recurringRule[not_selected] = '';
	
		}
	
	    });
	});
	
	function showHideRecur(){
		
		recurme.find('.repeat-toggle').toggleClass('checked');
		saveObj.active = true;
		
		if(recurme.find('.repeat-toggle').hasClass('checked')){ 
			saveObj.active = true; 
			recurme.find('#recurring-rules').addClass('open').stop(true,true).slideDown('fast', function(){
				recurme.find('#until-rules').show();
				recurme.find('#rrule').trigger('processRecur');
			});
		}
	    else{ 
		    saveObj.active = false; 
		    //disable the inputs not selected.
			recurme.find('#recurring-rules').removeClass('open').stop(true,true).slideUp('fast', function(){
				recurme.find('#rrule').trigger('processRecur');
			});
	    }
		
	}
	
	// toggle repeating event.
	/*recurme.find('.start-date-field').on('click', function(){
		if(!recurme.find('.repeat-toggle').hasClass('checked')){
			recurme.find('.repeat-toggle').click();
		}
	});*/
	recurme.find('.repeat-toggle').on('click', function(e){
	    e.preventDefault();
	    e.stopPropagation();
	    showHideRecur();	    
	});
	
	// submit the form when a value changes
	recurme.find('#recurring-rules').find('input, select, .end-date-hidden').on('change', function(){
	    if($(this).parents('#recurring-rules').hasClass('open')){
		recurme.find('#rrule').trigger('processRecur');
	    }
	});
	recurme.find('#recurring-rules button').on('click', function(){
	    recurme.find('#rrule').trigger('processRecur');
	});
	
	// results table collapse
	recurme.find('#repeat-results').on('click',' #action-collapse', function(e){
	    e.preventDefault();
	    
	    $(this).toggleClass('active');
	    if($(this).hasClass('active')){ updateResults(); saveObj.showResults = true;}
	    else{ saveObj.showResults = false; }
	    
	    showResults();
	});
	
	// results table exclude
	recurme.find('#repeat-results').on('click',' #action-exclude', function(e){
	    e.preventDefault();
	    var row = $(this).parents('tr');
	    var date = row.attr('data-date');
	    if(row.hasClass('exclude')){
		    $(saveObj.excluded).each(function(i){
			   // console.log(date+"|"+saveObj.excluded[i]);
				if(saveObj.excluded[i] == date){ saveObj.excluded.splice(i,1); }
			});
	    }
	    row.toggleClass('exclude');
	    updateResults();
	    recurme.find('#rrule').trigger('processRecur');
	});
	
	function showResults(){
		var results = recurme.find('#repeat-results');
		var resultsTable = results.find('.inner').scrollTop(0);
		
		// show/hide results table
		if(saveObj.showResults == true){ updateResults(); resultsTable.stop(true,true).slideDown('fast'); }
		else{ resultsTable.stop(true,true).slideUp('fast'); }
		
		// update results;
	}
	
	function updateResults(){
		var results = recurme.find('#repeat-results');
		
		// update the results count
	    if(saveObj.dates.length > 999){
			results.find('.head .count').html('First '+saveObj.dates.length+'~ ');
	    }else{
			results.find('.head .count').html(saveObj.dates.length);
	    }
	    // update the excluded list
		updateExcludes();
		
		if(results.find('#action-collapse').hasClass('active')){
			
			// empty the table rows if any exist
		    results.find('tbody').empty();
		    
		    // remove exclude count
		    //recurme.find('#repeat-results .head .excluded').empty();
		    
		    var resultsHTML = '';
		    
		    // ie. W14/06/Thu/Apr/2017
		    for(var i in saveObj.dates){
			    
				var el 		= saveObj.dates[i];
				var el 		= el.toString().split("/");
				var count 	= parseInt(i)+1;
				var dayName = el[2];
				var month 	= el[3];
				var dayNum 	= el[1];
				var year 	= el[4];
		    
			    // add row to table
				var cl = '';
				if(saveObj.excluded.indexOf(saveObj.dates[i]) > -1){ cl = 'class="exclude"'; }
				resultsHTML += '<tr '+cl+' data-date="'+ saveObj.dates[i] +'"><td class="count">'+count+'</td><td class="dayname">'+dayName+'</td><td class="month">'+month+'</td><td class="daynum">'+dayNum+'</td><td class="year">'+year+'</td><td class="recur-actions"><a id="action-exclude" href="#" title="exclude"><i class="fa fa-minus-circle"></i></a></td></tr>';
				
			}
		    
		    // append the results
		    results.find('.inner').scrollTop(0);
		    results.find('tbody').append(resultsHTML);

	    }
	 
	}
	
	function updateExcludes(){
	    var excludedItems	= recurme.find('#repeat-results tr.exclude');
	    var excludeCount 	= excludedItems.length;
	    var excludeText		= recurme.find('#repeat-results .head .excluded');

	    // reset the list
	    // saveObj.excluded = [];
	    excludedItems.each(function(){
		    if(saveObj.excluded.indexOf($(this).attr('data-date')) < 0){
		    	saveObj.excluded.push($(this).attr('data-date'));
		    }
	    });
	    
	    // remove any object from the array that doesn't exist in the table.
		/*$(saveObj.excluded).each(function(i){
			var exists = excludedItems.filter('[data-date="'+saveObj.excluded[i]+'"]');
			if(exists.length < 1){ saveObj.excluded.splice(i,1); }
		});*/
	    
	    if(saveObj.excluded.length){
		excludeText.html(saveObj.excluded.length+' Excluded');
	    }else if(excludeText.hasClass('active')){
		excludeText.html('0 Excluded');
	    }else{
		excludeText.empty();
	    }
	    
	}
	
	// results table show only excluded results
	recurme.find('#repeat-results').on('click','.excluded', function(e){
		e.preventDefault();
	    var excludeText	= recurme.find('#repeat-results .head .excluded');
	    var includeRows = recurme.find('#repeat-results tr').not('.exclude');
	    var excludeRows = recurme.find('#repeat-results tr.exclude');
	    
	    if(!$(this).hasClass('active')){
		includeRows.hide();
	    }else{
		if(excludeRows.length == 0){ excludeText.empty(); }
		includeRows.show();
		excludeRows.show();
	    }
	    
	    recurme.find('#repeat-results .inner').scrollTop(0);
	    $(this).toggleClass('active');
	});
	
	// initially hide repeat results
	recurme.find('#repeat-results .inner').hide();
	
	// Handle Form Submission
	recurme.find('#rrule').on('processRecur',function(e){
	    e.preventDefault();
	
	    var rule 				= RRule.fromString(rruleGenerate(), {noCache:true});
	    var ruleText 			= rule.toText();
	    var resultsHTML 		= '';
	    var resultsCountText 	= '0';
	    
	    // check if there is a limit if not, set it.
	    if (!recurringRule.count && !recurringRule.until){
			rule.options.count = 2800;
	    }
	    
	    // set startDate & endDate
	    saveObj.startDate 	= moment(recurme.find('.start-date-hidden').val().replace('Z','')).unix();
	    // if there is an end date
	    if(recurringRule.until){
	    	saveObj.endDate 	= moment(recurme.find('.end-date-hidden').val().replace('Z','')).unix();
		}
	    
	    // expand the rrule
	    var repeatDates = rule.all();
	    // console.log(repeatDates);
	    
	    saveObj.dates = [];
	    // for each repeat date, fill in table rows
	    for(var i in repeatDates){
		    
			var el 		= repeatDates[i];
			var elDate	= new Date(el);
			var el 		= el.toString().split(" ");
			var count 	= parseInt(i)+1;
			var dayName = el[0];
			var month 	= el[1];
			var dayNum 	= el[2];
			var year 	= el[3];
			var weekNum = elDate.getWeek();
		
			var formattedDate = "W"+weekNum+"/"+dayNum + "/" +dayName + "/" +  month + "/" +  year;
			saveObj.dates.push(formattedDate);
	    
	    }
	    
	    updateResults();
	    
	    // update the repeat text
	    // check if repeat is open or closed.
	    // closed = no repeat
	    // open = repeat
	    if(!recurme.find('.repeat-toggle').hasClass('checked')){ recurme.find('.repeat-rule-text span').html('Never'); }
	    else{recurme.find('.repeat-rule-text span').html(ruleText);	}
	    
	    // update rrule code
	    saveObj.rrule = rruleGenerate();
	    
	    recurme.find('#action-code').attr('title','RRule: '+ rruleGenerate());
	    
	    repeatingDatesData.val(JSON.stringify(saveObj));
	    
	    return false;
	    
	});
	
	// inintial trigger of results on first load
	recurme.find('#rrule').trigger('processRecur');

});});

/**
 * Get the ISO week date week number
 */
Date.prototype.getWeek = function () {
	// Create a copy of this date object
	var target = new Date(this.valueOf());
	
	// ISO week date weeks start on Monday, so correct the day number
	var dayNr = (this.getDay() + 6) % 7;
	
	// ISO 8601 states that week 1 is the week with the first Thursday of that year
	// Set the target date to the Thursday in the target week
	target.setDate(target.getDate() - dayNr + 3);
	
	// Store the millisecond value of the target date
	var firstThursday = target.valueOf();
	
	// Set the target to the first Thursday of the year
	// First, set the target to January 1st
	target.setMonth(0, 1);
	
	// Not a Thursday? Correct the date to the next Thursday
	if (target.getDay() !== 4) {
	target.setMonth(0, 1 + ((4 - target.getDay()) + 7) % 7);
	}
	
	// The week number is the number of weeks between the first Thursday of the year
	// and the Thursday in the target week (604800000 = 7 * 24 * 3600 * 1000)
	return 1 + Math.ceil((firstThursday - target) / 604800000);
}

Number.prototype.pad = function(size) {
	var s = String(this);
	while (s.length < (size || 2)) {s = "0" + s;}
	return s;
}