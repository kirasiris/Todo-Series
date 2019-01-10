// Carousel Index Sidebar
	jQuery(document).ready(function($) {

	// Carousel sidebar blof
	  var owl = $('.owl-carousel');
	  

	   $('.owl-carousel').owlCarousel({
	 
	      //autoPlay: 2000, //Set AutoPlay to 1 second
	 
	      items : [1],
	      itemsDesktop : [1199,3],
	      itemsDesktopSmall : [979,3]
	 
	  })	 
	});


;jQuery(document).ready(function($){
    // browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 300,
        //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
        offset_opacity = 1200,
        //duration of the top scrolling animation (in ms)
        scroll_top_duration = 700,
        //grab the "back to top" link
        $back_to_top = $('.cd-top');

        //grab the "back to bottom" link
        $back_to_bottom = $('.cd-bottom');      

    //hide or show the "back to top" link
    $(window).scroll(function(){
        ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if( $(this).scrollTop() > offset_opacity ) {
            $back_to_top.addClass('cd-fade-out');
        }
    });

    //smooth scroll to top
    $back_to_top.on('click', function(event){
        event.preventDefault();
        $('body,html').animate({
            scrollTop: 0 ,
            }, scroll_top_duration
        );
    });

    //hide or show the "back to bottom" link
    $(window).scroll(function(){
        ( $(this).scrollTop() > offset ) ? $back_to_bottom.addClass('cd-is-visible') : $back_to_bottom.removeClass('cd-is-visible cd-fade-out');
        if( $(this).scrollTop() > offset_opacity ) {
            $back_to_bottom.addClass('cd-fade-out');
        }
    });

    //smooth scroll to bottom
    $back_to_bottom.on('click', function(event){
        event.preventDefault();
        $('body,html').animate({
            scrollTop: document.body.scrollHeight ,
            }, scroll_top_duration
        );
    });

});