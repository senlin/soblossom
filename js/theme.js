// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs

(function ($) {

	$(document).foundation()

	/**
	 * Add button to submit button only comment form or to all submit ids
	 *
	 * @source: //github.com/senlin/Code-Snippets/blob/master/Functions/Comments/add-class-to-comment-submit-button.php
	 */
	// Add button class to comment form submit button
	$('#commentform input#submit').addClass('button');
	// Add button class to all submit buttons
	//$('input[type="submit"]').addClass('button');

	/**
	 * Remove the sometimes conflicting f-topbar-fixed class that is added to the body tag by Foundation (only when navigation is fixed)
	 *
	 * @source: //stackoverflow.com/questions/8468996/jquery-to-remove-class-from-body-tag#comment10474602_8468996
	 */
	$(document.body).removeClass('f-topbar-fixed');

	/**
	 * Add scroll to top button
	 * see bottom of footer.php and scss/small.scss (under general)
	 * @source: //foundation.zurb.com/forum/posts/5265-how-to-add-a-back-to-the-top-image
	 */
	$(document).ready(function(){

	  // hide #back-top first
	  $("#back-top").hide();
	
	  // fade in #back-top
	  $(function () {
	    $(window).scroll(function () {
	      if ($(this).scrollTop() > 100) {
	        $('#back-top').fadeIn();
	      } else {
	        $('#back-top').fadeOut();
	      }
	    });
	
	    // scroll body to 0px on click
	    $('#back-top .fa').click(function () {
	      $('body,html').animate({
	        scrollTop: 0
	      }, 800);
	      return false;
	    });
	  });
	
	});

}(jQuery)); 

( function() {
	var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var element = document.getElementById( location.hash.substring( 1 ) );

			if ( element ) {
				if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
					element.tabIndex = -1;

				element.focus();
			}
		}, false );
	}
})();
