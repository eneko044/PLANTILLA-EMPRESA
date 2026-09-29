/**
 * Panel «Datos del juego» en la barra lateral del editor de bloques.
 * Guarda los campos del juego (precio, descuento, fecha, capturas…) como
 * metadatos del contenido, igual que la caja clásica.
 */
( function ( wp ) {
	const { registerPlugin } = wp.plugins;
	const PluginDocumentSettingPanel = ( wp.editor && wp.editor.PluginDocumentSettingPanel ) || ( wp.editPost && wp.editPost.PluginDocumentSettingPanel );
	const { useSelect } = wp.data;
	const { useEntityProp } = wp.coreData;
	const { MediaUpload, MediaUploadCheck } = wp.blockEditor;
	const { TextControl, TextareaControl, SelectControl, ToggleControl, RangeControl, CheckboxControl, Button, BaseControl } = wp.components;
	const { createElement: el, Fragment, useEffect } = wp.element;
	const { __ } = wp.i18n;

	const VALORACIONES = [ '', 'Extremadamente positivas', 'Muy positivas', 'Positivas', 'Mayormente positivas', 'Variadas', 'Mayormente negativas', 'Negativas' ];
	const PLATAFORMAS = [ [ 'windows', 'Windows' ], [ 'mac', 'macOS' ], [ 'linux', 'Linux' ] ];

	function Miniaturas( { ids } ) {
		const urls = useSelect(
			( select ) =>
				ids.map( ( id ) => {
					const m = select( 'core' ).getMedia( id );
					return m ? ( m.media_details && m.media_details.sizes && m.media_details.sizes.thumbnail ? m.media_details.sizes.thumbnail.source_url : m.source_url ) : null;
				} ),
			[ ids.join( ',' ) ]
		);
		return el(
			'div',
			{ style: { display: 'flex', flexWrap: 'wrap', gap: '4px', margin: '6px 0' } },
			urls.map( ( u, i ) => ( u ? el( 'img', { key: i, src: u, style: { width: '62px', height: '40px', objectFit: 'cover', borderRadius: '2px' } } ) : null ) )
		);
	}

	function Panel() {
		const tipo = useSelect( ( select ) => select( 'core/editor' ).getCurrentPostType(), [] );
		const [ meta, setMeta ] = useEntityProp( 'postType', 'juego', 'meta' );

		// La primera vez, el panel se abre solo para que se vea.
		useEffect( () => {
			const nombre = 'plugin-document-setting-panel/np-datos-juego/np-datos-juego';
			try {
				if ( tipo === 'juego' && ! window.localStorage.getItem( 'np-panel-visto' ) ) {
					window.localStorage.setItem( 'np-panel-visto', '1' );
					const abiertos = ( wp.data.select( 'core/preferences' ) && wp.data.select( 'core/preferences' ).get( 'core', 'openPanels' ) ) || [];
					if ( ! abiertos.includes( nombre ) ) {
						wp.data.dispatch( 'core/editor' ).toggleEditorPanelOpened( nombre );
					}
				}
			} catch ( e ) {}
		}, [ tipo ] );

		if ( tipo !== 'juego' || ! meta ) {
			return null;
		}
		const v = ( k ) => ( meta[ '_np_' + k ] === undefined || meta[ '_np_' + k ] === null ? '' : meta[ '_np_' + k ] );
		const set = ( k, valor ) => setMeta( { ...meta, [ '_np_' + k ]: valor } );
		const campo = ( k, label, extra = {} ) =>
			el( TextControl, { label, value: String( v( k ) ), onChange: ( x ) => set( k, extra.type === 'number' && extra.entero ? parseInt( x || '0', 10 ) : x ), __nextHasNoMarginBottom: true, __next40pxDefaultSize: true, ...extra } );
		const plataformas = String( v( 'plataformas' ) ).split( ',' ).map( ( s ) => s.trim() ).filter( Boolean );
		const capturas = String( v( 'capturas' ) ).split( ',' ).map( Number ).filter( Boolean );
		const vertical = parseInt( v( 'vertical' ) || '0', 10 );

		return el(
			PluginDocumentSettingPanel,
			{ name: 'np-datos-juego', title: __( 'Datos del juego (precio, fecha, capturas…)', 'nexo-play' ) },
			el(
				'div',
				{ style: { display: 'flex', flexDirection: 'column', gap: '14px' } },
				campo( 'precio', __( 'Precio (€) — 0 = gratuito, vacío = sin precio', 'nexo-play' ), { type: 'number', min: 0, step: '0.01' } ),
				el( RangeControl, {
					label: __( 'Descuento (%)', 'nexo-play' ),
					value: parseInt( v( 'descuento' ) || '0', 10 ),
					min: 0,
					max: 95,
					step: 5,
					onChange: ( x ) => set( 'descuento', x || 0 ),
					__nextHasNoMarginBottom: true,
				} ),
				campo( 'oferta', __( 'Etiqueta de la oferta (ej.: OFERTA DE HOY)', 'nexo-play' ) ),
				campo( 'fecha', __( 'Fecha de lanzamiento', 'nexo-play' ), { type: 'date' } ),
				el( ToggleControl, {
					label: __( 'Destacado en la portada', 'nexo-play' ),
					checked: !! v( 'destacado' ),
					onChange: ( x ) => set( 'destacado', x ),
					__nextHasNoMarginBottom: true,
				} ),
				campo( 'desarrollador', __( 'Desarrollador', 'nexo-play' ) ),
				campo( 'editor', __( 'Editor', 'nexo-play' ) ),
				el( SelectControl, {
					label: __( 'Valoración de los usuarios', 'nexo-play' ),
					value: v( 'valoracion' ),
					options: VALORACIONES.map( ( x ) => ( { value: x, label: x || __( 'Sin reseñas', 'nexo-play' ) } ) ),
					onChange: ( x ) => set( 'valoracion', x ),
					__nextHasNoMarginBottom: true,
					__next40pxDefaultSize: true,
				} ),
				campo( 'resenas', __( 'Número de reseñas', 'nexo-play' ), { type: 'number', min: 0, entero: true } ),
				campo( 'ventas', __( 'Popularidad (más alto = antes en «Lo más vendido»)', 'nexo-play' ), { type: 'number', min: 0, entero: true } ),
				el(
					BaseControl,
					{ label: __( 'Plataformas', 'nexo-play' ), __nextHasNoMarginBottom: true },
					PLATAFORMAS.map( ( [ clave, nombre ] ) =>
						el( CheckboxControl, {
							key: clave,
							label: nombre,
							checked: plataformas.includes( clave ),
							onChange: ( on ) => set( 'plataformas', ( on ? [ ...plataformas, clave ] : plataformas.filter( ( p ) => p !== clave ) ).join( ',' ) ),
							__nextHasNoMarginBottom: true,
						} )
					)
				),
				el(
					MediaUploadCheck,
					null,
					el(
						BaseControl,
						{ label: __( 'Capturas de pantalla', 'nexo-play' ), __nextHasNoMarginBottom: true },
						capturas.length ? el( Miniaturas, { ids: capturas } ) : null,
						el( MediaUpload, {
							allowedTypes: [ 'image' ],
							multiple: true,
							gallery: false,
							value: capturas,
							onSelect: ( items ) => set( 'capturas', items.map( ( i ) => i.id ).join( ',' ) ),
							render: ( { open } ) => el( Button, { variant: 'secondary', onClick: open }, capturas.length ? __( 'Cambiar capturas', 'nexo-play' ) : __( 'Elegir capturas', 'nexo-play' ) ),
						} )
					),
					el(
						BaseControl,
						{ label: __( 'Portada vertical (600 × 900)', 'nexo-play' ), __nextHasNoMarginBottom: true },
						vertical ? el( Miniaturas, { ids: [ vertical ] } ) : null,
						el( MediaUpload, {
							allowedTypes: [ 'image' ],
							value: vertical,
							onSelect: ( item ) => set( 'vertical', item.id ),
							render: ( { open } ) =>
								el(
									Fragment,
									null,
									el( Button, { variant: 'secondary', onClick: open }, vertical ? __( 'Cambiar', 'nexo-play' ) : __( 'Elegir imagen', 'nexo-play' ) ),
									vertical ? el( Button, { variant: 'link', isDestructive: true, onClick: () => set( 'vertical', 0 ), style: { marginLeft: '8px' } }, __( 'Quitar', 'nexo-play' ) ) : null
								),
						} )
					)
				),
				campo( 'enlace', __( 'Enlace del botón «Añadir al carro»', 'nexo-play' ), { type: 'url' } ),
				el( TextareaControl, {
					label: __( 'Requisitos mínimos (una línea por requisito)', 'nexo-play' ),
					value: v( 'requisitos_min' ),
					rows: 5,
					onChange: ( x ) => set( 'requisitos_min', x ),
					__nextHasNoMarginBottom: true,
				} ),
				el( TextareaControl, {
					label: __( 'Requisitos recomendados', 'nexo-play' ),
					value: v( 'requisitos_rec' ),
					rows: 5,
					onChange: ( x ) => set( 'requisitos_rec', x ),
					__nextHasNoMarginBottom: true,
				} )
			)
		);
	}

	registerPlugin( 'np-datos-juego', { render: Panel } );
} )( window.wp );
