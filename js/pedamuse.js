
jQuery(function($){

    // adding widget style classes
    $('div.widget ul').addClass('list-group '); /* add list-group-flush*/
    $('div.widget ul li').addClass('list-group-item');
    $('div.widget ul li a').addClass('card-link');   

    // toggling pedamuse serach fucntion on
    $('#search-toggler').click(function(){
    	// $('#pedamuseSearch').addClass('active'); 
    	$('#pedamuseSearch').slideToggle('slow');
    });

    // var byRow = $('body').hasClass('match-height');
	// $('.work-area > .container-fluid > .row').each(function() {
	// 	$(this).children('.col-md-4').matchHeight({
	// 		byRow: byRow
	// 	});
	// });

});