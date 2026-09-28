/**
 * Panel «Animación y visibilidad» para cualquier bloque.
 *
 * No añade atributos nuevos: solo pone o quita clases CSS en el campo
 * «Clases CSS adicionales» del bloque. Así el contenido sigue siendo válido
 * aunque se cambie de tema.
 */
( function ( wp ) {
	const { addFilter } = wp.hooks;
	const { createHigherOrderComponent } = wp.compose;
	const { createElement: el, Fragment } = wp.element;
	const { InspectorControls } = wp.blockEditor;
	const { PanelBody, SelectControl, ToggleControl } = wp.components;
	const { hasBlockSupport } = wp.blocks;
	const { __ } = wp.i18n;

	const ANIMACIONES = [
		{ label: __( 'Sin animación', 'nexo-empresa' ), value: '' },
		{ label: __( 'Aparecer', 'nexo-empresa' ), value: 'nexo-anim-aparecer' },
		{ label: __( 'Subir', 'nexo-empresa' ), value: 'nexo-anim-subir' },
		{ label: __( 'Desde la izquierda', 'nexo-empresa' ), value: 'nexo-anim-izquierda' },
		{ label: __( 'Desde la derecha', 'nexo-empresa' ), value: 'nexo-anim-derecha' },
		{ label: __( 'Zoom', 'nexo-empresa' ), value: 'nexo-anim-zoom' },
	];
	const RETRASOS = [
		{ label: __( 'Sin retraso', 'nexo-empresa' ), value: '' },
		{ label: '0,1 s', value: 'nexo-retraso-1' },
		{ label: '0,2 s', value: 'nexo-retraso-2' },
		{ label: '0,3 s', value: 'nexo-retraso-3' },
		{ label: '0,4 s', value: 'nexo-retraso-4' },
	];
	const OCULTAR = [
		{ label: __( 'Ocultar en móvil', 'nexo-empresa' ), value: 'nexo-ocultar-movil' },
		{ label: __( 'Ocultar en tableta', 'nexo-empresa' ), value: 'nexo-ocultar-tableta' },
		{ label: __( 'Ocultar en ordenador', 'nexo-empresa' ), value: 'nexo-ocultar-escritorio' },
	];

	const clases = ( className ) => ( className || '' ).split( /\s+/ ).filter( Boolean );

	function reemplazar( className, grupo, nueva ) {
		const resto = clases( className ).filter( ( c ) => ! grupo.includes( c ) );
		if ( nueva ) {
			resto.push( nueva );
		}
		return resto.length ? resto.join( ' ' ) : undefined;
	}

	const valoresAnim = ANIMACIONES.map( ( a ) => a.value ).filter( Boolean );
	const valoresRetraso = RETRASOS.map( ( a ) => a.value ).filter( Boolean );

	const conPanel = createHigherOrderComponent(
		( BlockEdit ) =>
			function ( props ) {
				if ( ! props.isSelected || ! hasBlockSupport( props.name, 'customClassName', true ) ) {
					return el( BlockEdit, props );
				}
				const actuales = clases( props.attributes.className );
				const anim = valoresAnim.find( ( v ) => actuales.includes( v ) ) || '';
				const retraso = valoresRetraso.find( ( v ) => actuales.includes( v ) ) || '';
				const set = ( className ) => props.setAttributes( { className } );

				return el(
					Fragment,
					null,
					el( BlockEdit, props ),
					el(
						InspectorControls,
						null,
						el(
							PanelBody,
							{ title: __( 'Animación y visibilidad', 'nexo-empresa' ), initialOpen: false },
							el( SelectControl, {
								label: __( 'Animación al aparecer en pantalla', 'nexo-empresa' ),
								value: anim,
								options: ANIMACIONES,
								onChange: ( v ) => set( reemplazar( props.attributes.className, valoresAnim, v ) ),
								__nextHasNoMarginBottom: true,
							} ),
							anim &&
								el( SelectControl, {
									label: __( 'Retraso', 'nexo-empresa' ),
									value: retraso,
									options: RETRASOS,
									onChange: ( v ) => set( reemplazar( props.attributes.className, valoresRetraso, v ) ),
									__nextHasNoMarginBottom: true,
								} ),
							el( 'hr' ),
							OCULTAR.map( ( o ) =>
								el( ToggleControl, {
									key: o.value,
									label: o.label,
									checked: actuales.includes( o.value ),
									onChange: ( on ) =>
										set( reemplazar( props.attributes.className, [ o.value ], on ? o.value : '' ) ),
									__nextHasNoMarginBottom: true,
								} )
							)
						)
					)
				);
			},
		'nexoConPanel'
	);

	addFilter( 'editor.BlockEdit', 'nexo-empresa/animacion-visibilidad', conPanel );
} )( window.wp );
