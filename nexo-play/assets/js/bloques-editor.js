/**
 * Editor de los bloques de la tienda: vista previa real (ServerSideRender) y
 * controles en la barra lateral generados a partir de inc/bloques.php.
 */
( function ( wp ) {
	const { registerBlockType, getBlockType } = wp.blocks;
	const { useBlockProps, InspectorControls } = wp.blockEditor;
	const { PanelBody, TextControl, RangeControl, SelectControl, ToggleControl, Disabled } = wp.components;
	const { createElement: el } = wp.element;
	const ServerSideRender = wp.serverSideRender;
	const { __ } = wp.i18n;
	const datos = window.npBloques || { controles: {}, generos: {} };

	const opciones = ( obj ) => Object.keys( obj ).map( ( value ) => ( { value, label: obj[ value ] } ) );

	function control( attr, def, props ) {
		const [ tipo, label, extra ] = def;
		const value = props.attributes[ attr ];
		const set = ( v ) => props.setAttributes( { [ attr ]: v } );
		const comun = { key: attr, label, __nextHasNoMarginBottom: true };
		switch ( tipo ) {
			case 'range':
				return el( RangeControl, { ...comun, value, min: extra[ 0 ], max: extra[ 1 ], onChange: set } );
			case 'select':
				return el( SelectControl, { ...comun, value, options: opciones( extra ), onChange: set } );
			case 'genero':
				return el( SelectControl, { ...comun, value, options: opciones( datos.generos ), onChange: set } );
			case 'toggle':
				return el( ToggleControl, { ...comun, checked: !! value, onChange: set } );
			default:
				return el( TextControl, { ...comun, value: value || '', onChange: set } );
		}
	}

	const nombres = [
		'nexo-play/destacados',
		'nexo-play/ofertas',
		'nexo-play/estanteria',
		'nexo-play/pestanas',
		'nexo-play/categorias',
		'nexo-play/busqueda',
		'nexo-play/juego-cabecera',
		'nexo-play/juego-compra',
		'nexo-play/juego-lateral',
		'nexo-play/juego-requisitos',
	];

	nombres.forEach( ( nombre ) => {
		if ( getBlockType( nombre ) && getBlockType( nombre ).edit ) {
			return;
		}
		const controles = datos.controles[ nombre ] || {};
		registerBlockType( nombre, {
			edit( props ) {
				const blockProps = useBlockProps();
				const lista = Object.keys( controles );
				return el(
					'div',
					blockProps,
					lista.length > 0 &&
						el(
							InspectorControls,
							null,
							el(
								PanelBody,
								{ title: __( 'Ajustes', 'nexo-play' ) },
								lista.map( ( attr ) => control( attr, controles[ attr ], props ) )
							)
						),
					el( Disabled, null, el( ServerSideRender, { block: nombre, attributes: props.attributes } ) )
				);
			},
			save: () => null,
		} );
	} );
} )( window.wp );
