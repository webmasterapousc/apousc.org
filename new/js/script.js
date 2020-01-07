(function( $ ) {
    "use strict";

    var isMobile = false;
    if( /android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()) ) { isMobile = true; }
    
    
    /***********************************************
     * INIT FOUNDATION
     ***********************************************/
    $(document).foundation();
    
    
    /***********************************************
     * ON WINDOWS LOAD
     ***********************************************/
    $(window).load(function(){
    
        // Parallax on desktop only
        if( !isMobile ) {
            
            // Set parallax background
            $( '.parallax' ).each(function() {
                $(this).attr({
                    'data-bottom-top'   :   'transform:translate3d(0, -20%, 0)',
                    'data-top-bottom'   :   'transform:translate3d(0, 20%, 0)'
                });
            });
            
            // Set parallax text
            $( '.parallax-text' ).each(function() {
                $(this).attr({
                    'data-top'          :   'opacity: 1;transform:translate3d(0, 0%, 0)',
                    'data-top-bottom'   :   'opacity: .25;transform:translate3d(0, 50%,0)'
                });
            });
            
            // Main image parallax .featured-image
            $( '.featured-image > img' ).attr({
                'data-top'          :   'transform:translate3d(0, 0%, 0)',
                'data-top-bottom'   :   'transform:translate3d(0, 30%,0)'
            });
            
            // Init skrollr
            skrollr.init({
                forceHeight: false
            });
        }
		
		// makes sure all images are loaded
		$('body').imagesLoaded( function() {
			setTimeout(function() {
				$('.spinner').fadeOut(); // Will first fade out the loading animation
				$('#preloader').delay(350).fadeOut('slow'); // Will fade out the white DIV that covers the website.
				$('body').delay(450).removeClass('preload'); // Animate CSS after page load
				setFullHeight();
				setFooter();
			}, 800);
		});
    });
    
    
    /***********************************************
     * INIT ON DOCUMENT READY
     ***********************************************/
    $(function() {  
        setFullHeight();
        setFooter();
    });
    
    
    /***********************************************
     * ON WINDOWS RESIZE
     ***********************************************/
    $(window).on('resize', function () {
        setFullHeight();
        setFooter();        
    });
    
    
    /***********************************************
     * SMOOTH PAGE SCROLL
     ***********************************************/
    $(function() {
        
        // Only anchor with data-scroll and not only hash
        $('a[data-scroll][href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 600, 'easeInOutExpo');
                    return false;
                }
            }
        });

    });
    
    
    /***********************************************
     * SET ACTIVE NAVIGATION INDICATOR
     ***********************************************/
    $(function() {      
        $("section").waypoint({
            handler: function(direction) {
                var active_section = $(this);
                if (direction === "up") {
                    active_section = active_section.prev();
                }
                $(".navigation").find("li").removeClass("active");  // remove 'active' class
                $(".navigation").find('a[href="#' + active_section.attr("id") + '"]').parents("li").addClass("active");  // add 'active' class
            },
            offset: '10%'
        });
    });

    
    /***********************************************
     *  ANIMATE ON SCROLL
     ***********************************************/
    $(function() {

        // Only on desktop
        if(!isMobile){
            $('.animate').waypoint(function(direction){
                var animation = $(this).data('animation');
                if (direction === "down") {
                    $(this).removeClass('animate').addClass( 'animated ' + animation ); // animate and show all elements
                }
            },{offset: '100%', triggerOnce: true});
        }else{
            $('.animate').removeClass("animate");
        }
     
    });

    
    /***********************************************
     *  FITTEXT
     ***********************************************/
    $(function() {

        // Set font size with fitText
        $(".fittext").fitText(1.2, { minFontSize: '28px', maxFontSize: '80px' });    
    });

    
    /***********************************************
     *  BXSLIDER
     ***********************************************/
    $(function() {
        
        // Rotating text
        $(".rotating-text").bxSlider({
            adaptiveHeight: true,
            mode: "fade",
            pager: false,
            controls: false,
            auto: true,
            speed: 600,
            pause: 6000
        });
        
        // hero slider image
        $("#hero-slider").bxSlider({
            adaptiveHeight: true,
            mode: "horizontal",
            pager: true,
            controls: true,
            auto: true,
            easing: "easeInOutExpo",
            speed: 600,
            pause: 6000,
            useCSS: false
        });  
        
        // slider image
        $(".slider").bxSlider({
            adaptiveHeight: true,
            mode: "fade",
            pager: true,
            controls: true,
            auto: false,
            easing: "easeInOutExpo",
            speed: 600,
            pause: 6000,
            useCSS: false
        });  
    });

    
    /***********************************************
     *  YOUTUBE BACKGROUND VIDEO
     ***********************************************/
    $(function() {
    
        // Only on desktop and has .player class on element
        if( $('.player').length && !isMobile ){
        
            var s = document.createElement("script");
            s.src = "js/vendor/jquery.mb.YTPlayer.js";
            
            // insert YTPlayer script
            $('script[src*="jquery"]').first().after(s);
        
            // Not mobile, use video background
            $('.player').mb_YTPlayer();
            
        }
     
    });

    
    /***********************************************
     *  SELF HOSTED BACKGROUND VIDEO
     ***********************************************/
    $(function() {
		
		$('[data-video]').each(function() {
			var vid_data = $(this).data('video');
			
			$(this).parent().css('background-color','transparent');
			
			$(this).append('</div>').vide({
				mp4: 'video/' + vid_data,
				webm: 'video/' + vid_data,
				ogv: 'video/' + vid_data,
				poster: 'video/' + vid_data
			}, {
				muted: true,
				loop: true,
				autoplay: true,
				position: "50% 50%", // Similar to the CSS `background-position` property.
				posterType: "jpg"
			});
		});
		
    });
    
    
    /***********************************************
     *  TEAM MEMBER BIO SLIDE-OUT
     ***********************************************/
    $(function() {
    
        // Define var
        var is_firefox = navigator.userAgent.indexOf('Firefox') > -1,
            team_length = $('.team-person').length,
            current_team;
        
        // Append element for overlay
        $('#main').append('<div class="cd-overlay"></div>');
        
        // For each element with .team-person
        $('.team-person').each(function(i){
            
            // Define var and execute function
            var person = $(this),
                member_bio = person.find('.team-bio'),
                member_name = person.find('.name').text(),
                member_bio_name = member_bio.find('.team-bio-content').prepend('<h1>' + member_name + '</h1>'),
                member_bio_index = member_bio.addClass('member-' + i),
                member_bio_clone = $('#main').after(member_bio_index.clone()),
                member_bio_remove = member_bio.remove();
            
            // Set data-type attr
            person.find('a:first').attr('data-type','member-'+i);
            
            // Create close button
            if( i === team_length - 1 ) $('#main').after('<a href="#" class="team-bio-close">Close</a>');
        });

        // Open team-member bio
        $('.team-person > a').on('click', function(event){
            event.preventDefault();
            var selected_member = $(this).data('type');
            current_team = $(this);
            $('.team-bio.'+selected_member+'').addClass('slide-in');
            $('.team-bio-close').addClass('is-visible');

            // Firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
            if( is_firefox ) {
                $('#main').addClass('slide-out').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
                    $('body').addClass('overflow-hidden');
                });
            } else {
                $('#main').addClass('slide-out');
                $('body').addClass('overflow-hidden');
            }
        });

        //Close team-member bio
        $(document).on('click', '.cd-overlay, .team-bio-close', function(event){
            event.preventDefault();
            
            // Reset scroll
            $('html,body').animate({
                  scrollTop: current_team.offset().top - 80
            }, 600, 'easeInOutExpo', function(){
                $('.team-bio').animate({ scrollTop: $(".team-bio-pict").position().top });              
            });         
            $('.team-bio').removeClass('slide-in');
            $('.team-bio-close').removeClass('is-visible');

            // Wait transitionend on firefox
            if( is_firefox ) {
                $('#main').removeClass('slide-out').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
                    $('body').removeClass('overflow-hidden');
                });
            } else {
                $('#main').removeClass('slide-out');
                $('body').removeClass('overflow-hidden');
            }
        });
    });

    
    /***********************************************
     *  OWL CAROUSEL
     ***********************************************/
    $(function() {
    
        // Full width carousel  
        $(".full-width-carousel").owlCarousel({
            items : 3,
            pagination: true
        });
    
        // Full width carousel  
        $(".full-width-nav-carousel").owlCarousel({
            items : 3,
            pagination: false,
            navigation: true,
            navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
        });
        
        // Single item carousel with navigation
        $(".single-carousel").owlCarousel({
            autoPlay: 12000, //Set AutoPlay
            singleItem:true,
            transitionStyle : "goDown",
            pagination: false,
            navigation: true,
            navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
        });
     
        // Single item carousel with pagination
        $(".single-carousel-2").owlCarousel({
            autoPlay: 12000, //Set AutoPlay
            singleItem:true,
            transitionStyle : "goDown",
            pagination: true,
            navigation: false
        });  
    });

    
    /***********************************************
     *  SKILL BAR ANIMATIONS
     ***********************************************/
    $(function() {
        
        // Only on desktop
        if( !isMobile ){
        
            // Do animation on scroll view
            $('.skills-bar li').each(function(i){           
                $(this).waypoint(function(){
                    var percent = $(this).find('span').attr('data-width');
                    $(this).find('span').animate({
                        'width' : percent + '%'
                    },4000, 'easeOutCirc',function(){
                    });
                    $(this).find('span strong').animate({
                        'opacity' : 1
                    },4000);
                    if(percent == '100'){
                        $(this).find('span strong').addClass('full');
                    }   
                },{offset: '75%',triggerOnce: true});
            });         
        }else{
        
            // No animation
            $('.skills-bar li').each(function(i){               
                var percent = $(this).find('span').attr('data-width');
                $(this).find('span').css('width', percent + '%').find('strong').css('opacity',1);
                if(percent == '100'){
                    $(this).find('span strong').addClass('full');
                }
            });
        }
    });

    
    /***********************************************
     *  STATISTIC ANIMATION
     ***********************************************/
    $(function() {
    
        // Only on desktop
        if( !isMobile ){
        
            // Set zero value
            $('.odometer').text("0");

            // Perform animation on scroll view
            $('.odometer').waypoint(function() {            
                var $this = $(this);
                $this.html($this.data('odometer'));             
            },{offset: '75%',triggerOnce: true});
        }else{
        
            // Set text value without animation
            $('.odometer').text( $(this).data('odometer') );
        }
    });

    
    /***********************************************
     *  MIXITUP
     ***********************************************/
    $(function() {	
	
		var i, gap_length = 2; // how many 'gap'

		for(i=0; i < gap_length; i++) {
			$('.work-grid').append('<li class="gap" />'); // append 'gap' to .work-grid.
		}
		// Apply mixitup on .work-grid
		$('.work-grid').mixitup({
            effects: ['fade','scale', 'rotateX', 'rotateY']
		});
    });

    
    /***********************************************
     *  MAGNIFIC POPUP
     ***********************************************/
    $(function() {
    
        // Magnific popup image
        $('.popup-image').magnificPopup({
            type: 'image',
            mainClass: 'mfp-with-zoom',
            zoom: {
                enabled: true,
                duration: 300, // Duration of the effect, in milliseconds
                easing: 'ease-in-out' // CSS transition easing function
            }
        });
        
        // Magnific popup video
        $('.popup-video').magnificPopup({
            type: 'iframe'
        });
        
        // Magnific popup iframe
        $('.popup-iframe').magnificPopup({
            type: 'iframe'
        });
    });

    
    /***********************************************
     *  TWITTER FEED
     ***********************************************/
    $(function() {
        
        // Set twitter username to display an how many twitter feed
        var twitter_widget_id    =    '521845120623079424',
            twitter_count        =    5;
		
		// Fetch if #twitter-feed exist
		if ( $('#twitter-feed').length ) twitterFetcher.fetch({ 'id': twitter_widget_id, 'domId': '', 'maxTweets': twitter_count, 'enableLinks': true, 'showUser': true, 'showTime': true, 'dateFunction': '', 'showRetweet': false, 'customCallback': handleTweets, 'showInteraction': false });
    });

    
    /***********************************************
     *  CONTACT FORM
     ***********************************************/
    $(function() {
        
        // Contact form validation
        $('#contact-form')
        .on('valid.fndtn.abide', function() { // If valid data submitted 			
			var url = "sendmail.php"; // the script where you handle the form input.
			$.ajax({
				type: "POST",
				url: url,
				data: $("#contact-form").serialize(), // serializes the form's elements.
				beforeSend : function (){
					$('#contact-form').find('input[type="submit"]').prop('disabled', true);					
				},
				success: function(data)
				{     
					$('#contact-form').prepend(data);
					$('#contact-form')[0].reset();
					$('#contact-form').blur();
					$('#contact-form').find('input[type="submit"]').prop('disabled', false);
				}
			});
            return false;			
        }).on('click', '.close', function(){ // Close alert notification  		
            $(this).closest('.alert-box').remove();			
            return false;           
        });
    });

    
    /***********************************************
     *  GOOGLE MAPS
     ***********************************************/
    $(function() {

        // Init Google Maps
        function initialize(){

            var map_canvas = document.getElementById('map');
            var myLatlng = new google.maps.LatLng(59.32,18.06); // set your location here
            var map_options = {
                center: myLatlng,
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false,
                panControl: false,
                zoomControl: true,
                zoomControlOptions: { style : google.maps.ZoomControlStyle.SMALL }
            };

            var map = new google.maps.Map(map_canvas, map_options);
            map.set('styles', [
            {
                stylers: [
                    { hue: "#333333" },
                    { saturation: -200 }
                ]
            }
            ]);

            // Set content inside info window if marker clicked
            var infowindow = new google.maps.InfoWindow({
                content: '<div class="map-info"><div class="map-address"><strong>Address: </strong>86-90 Awesome Street, Plaza Ave Pluto, 9415 AIT</div> <div class="map-tel"><strong>Phone: </strong>+123.456.789</div> <div class="map-mail"><strong>Email: </strong>mail@domain.com</div></div>'
            });

            // Init Google Maps
            var myIcon = new google.maps.MarkerImage("img/map-icon.png", null, null, null, new google.maps.Size(48,48));
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                icon: myIcon
            });
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map,marker);
            });
        }
        
        // Only init if #map element exist
        if( $('#map').length ) google.maps.event.addDomListener(window, 'load', initialize);
        
        // Maximize map
        $('.map-open').on('click', function(event) {        
            event.preventDefault();         
            $(this).animate({'opacity':0}, 1000, 'easeInOutExpo', function() {
                $( this ).css('visibility', 'hidden');
            });         
            $('#map-block').animate({'height':300}, 1000, 'easeInOutExpo');
            $('html, body').delay(600).animate({ scrollTop: $('#map').offset().top - 60 }, 1000, 'easeInOutExpo', function(){
                $('.map-close').show().animate({'bottom':0}, 300, 'easeOutExpo' );
            });
        });
        
        // Minimize map
        $('.map-close').on('click', function(event) {       
            event.preventDefault();         
            $(this).animate({'bottom':-32}, 600, 'easeInOutExpo', function(){
                $(this).hide();
                $('#map-block').delay(600).animate({'height':100}, 600, function(){
                    $('.map-open').css('visibility', 'visible').animate({'opacity':100}, 600, 'easeInOutExpo');
                });
            });
        });

    });

    /**
    * callback to handle tweets
    */
	function handleTweets(tweets){
		var x = tweets.length;
		var n = 0;
		var element = $('#twitter-feed');
		var html = '';
		while(n < x) {
		  html += '<div class="item">' + tweets[n] + '</div>';
		  n++;
		}
		$('#twitter-feed').html(html)
		.owlCarousel({
			autoPlay: 12000, //Set AutoPlay
			singleItem:true,
			transitionStyle : "goDown",
			pagination: false,
			navigation: true,
			navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
		})
	}

    /**
    * function set element equal windows height
    */
    function setFullHeight() {
        
        // Set var
        var win_height = $(window).height(),
            offset = 0;     
        $('.full-height').css({
            'height': win_height - offset
        });
    }

    /**
    * Function set slide out footer
    */
    function setFooter() {
        
        // Only on desktop
        if( !isMobile ) {
            if( !$('.dummy-footer').length ) {
                $('footer').addClass('slide-out').before( $( '<div class="dummy-footer"></div>' ).css( 'height', $('footer').outerHeight() - 1 + 'px' ) );
            }else{
                $('.dummy-footer').css( 'height', $('footer').outerHeight() - 1 + 'px' );
            }
        }
    }
    
})( jQuery );
