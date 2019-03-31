/*
	
	recurme.js file. 
	by Joshua Gatcke http://www.99lime.com
	
	Optional. For:
	- debugger
	- ajax calendar loading
	
*/

rmReady = function(){ 
	
	// calendar ajax
	$('[id^="rm-calendar-"][data-ajax="true"]').each(function(){
		
		var cal 	= $(this);
		var data 	= {};
		
		cal.on('click','a[class^="rm-arrow-"]', function(e){
			
			// update the url
			window.history.pushState(null, null, $(this).attr('href'));
			
			e.preventDefault();
			var inner 		= cal.find('.rm-inner');
			var urlAjax 	= cal.find('script[type="application/json"]').attr('data-url');
			data.options	= cal.find('script[type="application/json"]').html();
			
			var url 		= $(this).attr('href').split('?');
				url 		= urlAjax+url[1];
				
			//console.log(JSON.parse(data['options'])); // works
			// remove error class
			cal.removeClass('rm-calendar-error');
			    
			// loading animation class
			cal.addClass('rm-loading');
			
			// fade out day lists
			cal.find('.rm-day-inner').removeClass('animateInBefore animateIn');
			cal.find('.rm-day-inner').each(function(i){
				//$(this).delay(20*i).animate({opacity: 0});
				$(this).delay(20*i).queue(function(){
					$(this).addClass('animateOut');
					$.dequeue( this );
				});
			});

			// make ajax request
			$.ajax({
			type: "POST",
			url: url,
			data: data,
			success: replaceCalendar,
			error: calError,
			timeout: 10000
			//dataType: 'html'
			});	
			
		});
		
		function replaceCalendar(data){
			var d = $(data);
			var dInner = d.find('.rm-inner');
			cal.removeClass('rm-loading');
			d.find('.rm-day-inner').addClass('animateInBefore');
			cal.empty().append(d.html());
			cal.find('.rm-day-inner').each(function(i){
				$(this).delay(20*i).queue(function(){
					$(this).addClass('animateIn');
					$.dequeue( this );
				});
			});
		}
		
		function calError(){
			cal.addClass('rm-calendar-error');
			cal.removeClass('rm-loading');
			cal.find('.rm-day-inner').each(function(i){
				$(this).delay(20*i).queue(function(){
					$(this).addClass('animateOutBefore');
					$.dequeue( this );
				});
			});
		}
		
	});
	
	
	$("body").on("click", ".rm-debugger h3", function(){
		$(this).parents('.rm-debugger').toggleClass("debug-open");
	}); 
}

window.onload = function(){
					
	if(window.jQuery){
		rmReady();
	}else{ 
		var script = document.createElement("script");
		document.head.appendChild(script); 
		script.type = "text/javascript";
		script.src = "//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"; 
		script.onload = rmReady(); 
	}
	
}