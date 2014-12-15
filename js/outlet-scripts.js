jQuery( function( $ ){
   $('#slides').superslides({
      animation: 'fade',
	  play: 7000
    });

	$('.fade').hover(
		function(){
			$(this).find('.caption').fadeIn(400);
		},
		function(){
			$(this).find('.caption').fadeOut(400);
		}
	);
	
	$("a[href='#outlet']").click(function(){
    $('html, body').animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top-70
    }, 700);
    return false;
	});

	
});

// Set options
        var options = { 
            offset: 650, 
            classes: {
                clone:   'banner--clone',
                stick:   'banner--stick',
                unstick: 'banner--unstick'  
            } 
        };

        // Initialise with options
        var banner = new Headhesive('.site-header', options);

        // Headhesive destroy
        // banner.destroy(); 
		
		
var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				menuRight = document.getElementById( 'cbp-spmenu-s2' ),
				showRightPush = document.getElementById( 'showRightPush' ),
				body = document.body;

			showRightPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toleft' );
				classie.toggle( menuRight, 'cbp-spmenu-open' );
				disableOther( 'showRightPush' );
			};

			function disableOther( button ) {
				if( button !== 'showRightPush' ) {
					classie.toggle( showRightPush, 'disabled' );
				}
			}