/**
 * Nexo Empresa — pequeños detalles de interacción en la parte pública.
 *  - Animaciones de entrada (clases nexo-anim-*).
 *  - Contadores que suben hasta su cifra (clase nexo-contador).
 *  - Sombra en la cabecera fija al hacer scroll.
 */
( function () {
	const reducirMovimiento = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

	/* Animaciones de entrada ------------------------------------------- */
	const animados = document.querySelectorAll( '[class*="nexo-anim-"]' );
	if ( reducirMovimiento || ! ( 'IntersectionObserver' in window ) ) {
		animados.forEach( ( n ) => n.classList.add( 'is-visible' ) );
	} else {
		const obs = new IntersectionObserver(
			( entradas ) => {
				entradas.forEach( ( e ) => {
					if ( e.isIntersecting ) {
						e.target.classList.add( 'is-visible' );
						obs.unobserve( e.target );
					}
				} );
			},
			{ rootMargin: '0px 0px -8% 0px', threshold: 0.08 }
		);
		animados.forEach( ( n ) => obs.observe( n ) );
	}

	/* Contadores --------------------------------------------------------- */
	const contadores = document.querySelectorAll( '.nexo-contador' );
	const animarContador = ( nodo ) => {
		const texto = nodo.textContent;
		const m = texto.match( /(\d[\d.,]*)/ );
		if ( ! m ) {
			return;
		}
		const original = m[ 1 ];
		const decimales = ( original.split( ',' )[ 1 ] || '' ).length;
		const objetivo = parseFloat( original.replace( /\./g, '' ).replace( ',', '.' ) );
		if ( ! isFinite( objetivo ) ) {
			return;
		}
		const formato = new Intl.NumberFormat( 'es-ES', {
			minimumFractionDigits: decimales,
			maximumFractionDigits: decimales,
		} );
		const duracion = 1400;
		const inicio = performance.now();
		const paso = ( ahora ) => {
			const t = Math.min( 1, ( ahora - inicio ) / duracion );
			const suave = 1 - Math.pow( 1 - t, 3 );
			nodo.textContent = texto.replace( original, formato.format( objetivo * suave ) );
			if ( t < 1 ) {
				requestAnimationFrame( paso );
			} else {
				nodo.textContent = texto;
			}
		};
		requestAnimationFrame( paso );
	};
	if ( contadores.length && ! reducirMovimiento && 'IntersectionObserver' in window ) {
		const obsC = new IntersectionObserver(
			( entradas ) => {
				entradas.forEach( ( e ) => {
					if ( e.isIntersecting ) {
						animarContador( e.target );
						obsC.unobserve( e.target );
					}
				} );
			},
			{ threshold: 0.5 }
		);
		contadores.forEach( ( n ) => obsC.observe( n ) );
	}

	/* Cabecera con sombra al hacer scroll ------------------------------- */
	const cabecera = document.querySelector( '.nexo-cabecera-fija' );
	if ( cabecera ) {
		const actualizar = () => cabecera.classList.toggle( 'is-scrolled', window.scrollY > 8 );
		actualizar();
		window.addEventListener( 'scroll', actualizar, { passive: true } );
	}
} )();
