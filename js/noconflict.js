jQuery.noConflict();jQuery(document).foundation();

/**
 * Add a class="button" to the WordPress comment submit button
 *
 * @source: //github.com/senlin/Code-Snippets/blob/master/Functions/Comments/add-class-to-comment-submit-button.php
 */
jQuery(document).ready(function($) { //noconflict wrapper
    $('#commentform input#submit').addClass('button');
});//end noconflict
