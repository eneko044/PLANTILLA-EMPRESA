/**
 * Editor del bloque Nexo › Icono.
 * Sin paso de compilación: usa directamente las librerías globales de WordPress.
 * Los atributos y los «supports» vienen de block.json (registrado en PHP).
 */
( function ( wp ) {
	const { registerBlockType } = wp.blocks;
	const { useBlockProps, InspectorControls, BlockControls, AlignmentToolbar } = wp.blockEditor;
	const { PanelBody, RangeControl, SelectControl, TextControl, Button } = wp.components;
	const { createElement: el, Fragment, useState } = wp.element;
	const { __ } = wp.i18n;

	const iconos = window.nexoIconos || {};

	function Svg( { nombre } ) {
		const icono = iconos[ nombre ] || iconos.sparkles || { svg: '' };
		return el( 'svg', {
			xmlns: 'http://www.w3.org/2000/svg',
			viewBox: '0 0 24 24',
			fill: 'none',
			stroke: 'currentColor',
			strokeWidth: 1.75,
			strokeLinecap: 'round',
			strokeLinejoin: 'round',
			'aria-hidden': true,
			dangerouslySetInnerHTML: { __html: icono.svg },
		} );
	}

	function Selector( { valor, onChange } ) {
		const [ filtro, setFiltro ] = useState( '' );
		const f = filtro.trim().toLowerCase();
		const lista = Object.keys( iconos ).filter(
			( k ) => ! f || k.includes( f ) || iconos[ k ].label.toLowerCase().includes( f )
		);
		return el(
			Fragment,
			null,
			el( TextControl, {
				label: __( 'Buscar icono', 'nexo-empresa' ),
				value: filtro,
				onChange: setFiltro,
				__nextHasNoMarginBottom: true,
			} ),
			el(
				'div',
				{ className: 'nexo-selector-iconos' },
				lista.map( ( k ) =>
					el(
						Button,
						{
							key: k,
							label: iconos[ k ].label,
							showTooltip: true,
							isPressed: k === valor,
							onClick: () => onChange( k ),
						},
						el( Svg, { nombre: k } )
					)
				)
			)
		);
	}

	registerBlockType( 'nexo/icono', {
		edit( { attributes, setAttributes } ) {
			const { icono, tamano, forma, alineacion } = attributes;
			const blockProps = useBlockProps( {
				className: 'nexo-forma-' + forma + ' nexo-alinear-' + alineacion,
				style: { '--nexo-icono-tamano': tamano + 'px' },
			} );
			return el(
				Fragment,
				null,
				el(
					BlockControls,
					{ group: 'block' },
					el( AlignmentToolbar, {
						value: alineacion,
						onChange: ( v ) => setAttributes( { alineacion: v || 'left' } ),
					} )
				),
				el(
					InspectorControls,
					null,
					el(
						PanelBody,
						{ title: __( 'Icono', 'nexo-empresa' ) },
						el( Selector, { valor: icono, onChange: ( v ) => setAttributes( { icono: v } ) } ),
						el( RangeControl, {
							label: __( 'Tamaño (px)', 'nexo-empresa' ),
							value: tamano,
							min: 12,
							max: 160,
							onChange: ( v ) => setAttributes( { tamano: v || 26 } ),
							__nextHasNoMarginBottom: true,
						} ),
						el( SelectControl, {
							label: __( 'Forma del fondo', 'nexo-empresa' ),
							value: forma,
							options: [
								{ label: __( 'Cuadrado redondeado', 'nexo-empresa' ), value: 'cuadrado' },
								{ label: __( 'Círculo', 'nexo-empresa' ), value: 'circulo' },
								{ label: __( 'Sin fondo', 'nexo-empresa' ), value: 'ninguna' },
							],
							onChange: ( v ) => setAttributes( { forma: v } ),
							__nextHasNoMarginBottom: true,
						} )
					)
				),
				el( 'div', blockProps, el( Svg, { nombre: icono } ) )
			);
		},
		save: () => null,
	} );
} )( window.wp );
