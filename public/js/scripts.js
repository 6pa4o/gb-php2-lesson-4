document.addEventListener("DOMContentLoaded", function(event) { 
	//do work
	document.querySelector( ".hamburger" )
		.addEventListener( "click", function() {
			this.classList.toggle( "is-active" );
			document.querySelector( ".menu" )
				.classList.toggle( "active" );
		});
	//load goods per click
	var startFrom = 9;

    $( '#loadmore' ).click( function() {
        $.ajax({
            // url: 'test.json',
            url: 'LoadMore.php',
            type: 'POST',
			dataType: 'html',
            data: {"startFrom": startFrom},
            success: function(data){
                if(data.length > 0){
                $('#loadmore').before(data);
                startFrom += 9;
                console.log(data.length)
                } else {
                    $('#loadmore').hide();
                }
            }
		});
    });
});