
jQuery(function($){

    $('div.widget ul').addClass('list-group '); /* add list-group-flush*/
    $('div.widget ul li').addClass('list-group-item');
    $('div.widget ul li a').addClass('card-link');    

    $('#search-toggler').click(function(){
    	// $('#pedamuseSearch').addClass('active'); 
    	$('#pedamuseSearch').slideToggle('slow');
    });
    
});