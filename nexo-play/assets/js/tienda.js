/**
 * Nexo Play — interacción de la tienda (sin dependencias).
 */
( function () {
	const reducir = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

	/* Carruseles ----------------------------------------------------------- */
	document.querySelectorAll( '[data-np-carrusel]' ).forEach( ( carrusel ) => {
		const pista = carrusel.querySelector( '.np-carrusel__pista' );
		const paginas = Array.from( pista.children );
		const puntos = carrusel.querySelector( '.np-carrusel__puntos' );
		const prev = carrusel.querySelector( '.np-carrusel__flecha--prev' );
		const next = carrusel.querySelector( '.np-carrusel__flecha--next' );
		let actual = 0;
		let temporizador = null;

		if ( paginas.length < 2 ) {
			carrusel.classList.add( 'is-unica' );
			return;
		}
		const botones = paginas.map( ( _, i ) => {
			const b = document.createElement( 'button' );
			b.type = 'button';
			b.setAttribute( 'aria-label', 'Página ' + ( i + 1 ) );
			b.addEventListener( 'click', () => ir( i, true ) );
			puntos.appendChild( b );
			return b;
		} );

		function ir( i, manual ) {
			actual = ( i + paginas.length ) % paginas.length;
			pista.style.transform = 'translateX(' + -100 * actual + '%)';
			botones.forEach( ( b, n ) => b.classList.toggle( 'is-activo', n === actual ) );
			paginas.forEach( ( p, n ) => p.setAttribute( 'aria-hidden', n === actual ? 'false' : 'true' ) );
			if ( manual ) {
				reiniciar();
			}
		}
		function reiniciar() {
			const ms = parseInt( carrusel.dataset.npAuto || '0', 10 );
			clearInterval( temporizador );
			if ( ms && ! reducir ) {
				temporizador = setInterval( () => ir( actual + 1 ), ms );
			}
		}
		prev.addEventListener( 'click', () => ir( actual - 1, true ) );
		next.addEventListener( 'click', () => ir( actual + 1, true ) );
		carrusel.addEventListener( 'mouseenter', () => clearInterval( temporizador ) );
		carrusel.addEventListener( 'mouseleave', reiniciar );

		// Deslizar con el dedo.
		let inicioX = null;
		pista.addEventListener( 'touchstart', ( e ) => ( inicioX = e.touches[ 0 ].clientX ), { passive: true } );
		pista.addEventListener( 'touchend', ( e ) => {
			if ( inicioX === null ) {
				return;
			}
			const dx = e.changedTouches[ 0 ].clientX - inicioX;
			if ( Math.abs( dx ) > 40 ) {
				ir( actual + ( dx < 0 ? 1 : -1 ), true );
			}
			inicioX = null;
		} );

		ir( 0 );
		reiniciar();
	} );

	/* Destacados: al pasar por una captura se ve en grande ------------------ */
	document.querySelectorAll( '.np-dest' ).forEach( ( dest ) => {
		const principal = dest.querySelector( '.np-dest__principal img' );
		dest.querySelectorAll( '[data-np-grande]' ).forEach( ( mini ) => {
			mini.addEventListener( 'mouseenter', () => ( principal.src = mini.dataset.npGrande ) );
			mini.addEventListener( 'click', () => ( window.location = dest.querySelector( '.np-dest__principal' ).href ) );
		} );
		dest.querySelector( '.np-dest__capturas' ) &&
			dest.querySelector( '.np-dest__capturas' ).addEventListener( 'mouseleave', () => ( principal.src = principal.dataset.npOriginal ) );
	} );

	/* Pestañas con vista previa -------------------------------------------- */
	document.querySelectorAll( '[data-np-pestanas]' ).forEach( ( bloque ) => {
		const tabs = bloque.querySelectorAll( '[role="tab"]' );
		const vista = bloque.querySelector( '.np-pestanas__vista' );

		function mostrar( fila ) {
			if ( ! fila || ! vista ) {
				return;
			}
			const plantilla = fila.nextElementSibling;
			if ( plantilla && plantilla.tagName === 'TEMPLATE' ) {
				vista.replaceChildren( plantilla.content.cloneNode( true ) );
			}
			bloque.querySelectorAll( '.np-fila.is-activa' ).forEach( ( f ) => f.classList.remove( 'is-activa' ) );
			fila.classList.add( 'is-activa' );
		}
		function activar( tab ) {
			tabs.forEach( ( t ) => {
				const sel = t === tab;
				t.setAttribute( 'aria-selected', sel ? 'true' : 'false' );
				t.tabIndex = sel ? 0 : -1;
				document.getElementById( t.getAttribute( 'aria-controls' ) ).hidden = ! sel;
			} );
			mostrar( document.getElementById( tab.getAttribute( 'aria-controls' ) ).querySelector( '.np-fila' ) );
		}
		tabs.forEach( ( tab, i ) => {
			tab.addEventListener( 'click', () => activar( tab ) );
			tab.addEventListener( 'keydown', ( e ) => {
				if ( e.key === 'ArrowRight' || e.key === 'ArrowLeft' ) {
					const n = tabs[ ( i + ( e.key === 'ArrowRight' ? 1 : -1 ) + tabs.length ) % tabs.length ];
					n.focus();
					activar( n );
				}
			} );
		} );
		bloque.querySelectorAll( '.np-fila' ).forEach( ( fila ) => {
			fila.addEventListener( 'mouseenter', () => mostrar( fila ) );
			fila.addEventListener( 'focus', () => mostrar( fila ) );
		} );
		if ( tabs.length ) {
			activar( tabs[ 0 ] );
		}
	} );

	/* Galería de la ficha --------------------------------------------------- */
	document.querySelectorAll( '[data-np-galeria]' ).forEach( ( galeria ) => {
		const grande = galeria.querySelector( '.np-galeria__principal img' );
		const minis = Array.from( galeria.querySelectorAll( '.np-galeria__mini' ) );
		let actual = 0;
		function ver( i ) {
			actual = ( i + minis.length ) % minis.length;
			grande.src = minis[ actual ].dataset.npGrande;
			minis.forEach( ( m, n ) => m.classList.toggle( 'is-activa', n === actual ) );
		}
		minis.forEach( ( m, i ) => m.addEventListener( 'click', () => ver( i ) ) );
		grande.addEventListener( 'click', () => ver( actual + 1 ) );
		grande.style.cursor = minis.length > 1 ? 'pointer' : '';
	} );

	/* Filtros del buscador: se aplican solos ------------------------------- */
	document.querySelectorAll( '[data-np-filtros]' ).forEach( ( form ) => {
		const rango = form.querySelector( '[data-np-rango]' );
		const oculto = form.querySelector( '[data-np-precio]' );
		const texto = form.querySelector( '[data-np-rango-texto]' );
		const moneda = ( texto && texto.textContent.match( /[^\d\s.,]+$/ ) ) || [ '€' ];
		if ( rango ) {
			const pinta = () => {
				const v = parseInt( rango.value, 10 );
				if ( v >= parseInt( rango.max, 10 ) ) {
					texto.textContent = 'Cualquier precio';
					oculto.value = '';
				} else if ( v === 0 ) {
					texto.textContent = 'Gratuito';
					oculto.value = '0';
				} else {
					texto.textContent = 'Menos de ' + v + ',00' + moneda[ 0 ];
					oculto.value = v;
				}
			};
			rango.addEventListener( 'input', pinta );
			rango.addEventListener( 'change', () => {
				pinta();
				( form.requestSubmit ? form.requestSubmit() : form.submit() );
			} );
		}
		form.querySelectorAll( 'input[type="checkbox"], select' ).forEach( ( campo ) => {
			campo.addEventListener( 'change', () => ( form.requestSubmit ? form.requestSubmit() : form.submit() ) );
		} );
		// Quitar parámetros vacíos para que la URL quede limpia.
		form.addEventListener( 'submit', () => {
			form.querySelectorAll( 'input[name], select[name]' ).forEach( ( c ) => {
				if ( ( c.type !== 'checkbox' && c.value === '' ) || ( c.name === 'orden' && c.value === 'relevancia' ) ) {
					c.disabled = true;
				}
			} );
		} );
	} );
} )();
