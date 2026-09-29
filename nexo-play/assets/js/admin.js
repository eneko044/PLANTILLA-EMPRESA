/**
 * Selector de imágenes de la caja «Datos del juego».
 */
( function ( $ ) {
	$( document ).on( 'click', '[data-np-elegir]', function ( e ) {
		e.preventDefault();
		const campo = $( this ).data( 'np-elegir' );
		const multiple = campo === 'capturas';
		const marco = wp.media( {
			title: multiple ? 'Elegir capturas' : 'Elegir portada vertical',
			button: { text: 'Usar' },
			library: { type: 'image' },
			multiple: multiple ? 'add' : false,
		} );
		marco.on( 'open', function () {
			const ids = ( $( '#np-' + campo ).val() || '' ).split( ',' ).filter( Boolean );
			const sel = marco.state().get( 'selection' );
			ids.forEach( ( id ) => sel.add( wp.media.attachment( id ) ) );
		} );
		marco.on( 'select', function () {
			const sel = marco.state().get( 'selection' ).toJSON();
			$( '#np-' + campo ).val( sel.map( ( a ) => a.id ).join( ',' ) );
			const vista = $( '#np-' + campo + '-vista' ).empty();
			sel.forEach( ( a ) => {
				const url = ( a.sizes && a.sizes.thumbnail ? a.sizes.thumbnail.url : a.url );
				vista.append( $( '<img>' ).attr( 'src', url ) );
			} );
		} );
		marco.open();
	} );
} )( jQuery );
