// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function() {
	scrollFunction();
};

function scrollFunction() {
	if ( document.body.scrollTop > 160 || document.documentElement.scrollTop > 160 ) {
		//document.getElementById( 'masthead' ).style.padding = '1rem';
		document.getElementById( 'masthead' ).classList.add( 'masthead--fixed' );
	} else {
		//document.getElementById( 'masthead' ).style.padding = '2rem';
		document.getElementById( 'masthead' ).classList.remove( 'masthead--fixed' );
	}
}
