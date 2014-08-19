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


}(jQuery)); 
