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
	 * Enable closing clearing (lightbox) by clicking anywhere on the mask
	 *
	 * @source: //github.com/zurb/foundation/issues/4119 answer of @javierarques
	 */
	$(document).on('click', '.clearing-blackout', function () {
		var container = $('.clearing-container');
		var visible_image = container.find('.visible-img');
		container.find('ul[data-clearing]')
		.attr('style', '').closest('.clearing-blackout')
		.removeClass('clearing-blackout');
		container.removeClass('clearing-container');
		visible_image.fadeOut();
	});	


}(jQuery)); 
