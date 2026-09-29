<?php
/**
 * Title: Cabecera de la tienda
 * Slug: nexo-play/cabecera
 * Categories: nexo-play-estructura, header
 * Block Types: core/template-part/header
 * Description: Barra superior con logotipo y menú principal, y debajo la barra de la tienda con menús desplegables y buscador.
 *
 * @package Nexo_Play
 */

?>
<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Cabecera', 'nexo-play' ); ?>"},"className":"np-cabecera","backgroundColor":"fondo-oscuro","layout":{"type":"constrained"}} -->
<div class="wp-block-group np-cabecera has-fondo-oscuro-background-color has-background"><!-- wp:group {"className":"np-cabecera__global","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group np-cabecera__global"><!-- wp:group {"className":"np-cabecera__marca","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group np-cabecera__marca"><!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"custom","className":"np-logo"} -->
<figure class="wp-block-image size-full is-resized np-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo np_asset( 'img/logo.svg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="<?php esc_attr_e( 'Inicio', 'nexo-play' ); ?>" style="width:40px"/></a></figure>
<!-- /wp:image -->

<!-- wp:site-title {"level":0} /-->

<!-- wp:navigation {"className":"np-nav-global","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<?php
echo np_enlace_menu( 'tienda', __( 'Tienda', 'nexo-play' ), 'np-nav-tienda' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
echo np_enlace_menu( 'comunidad', __( 'Comunidad', 'nexo-play' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
echo np_enlace_menu( 'acerca-de', __( 'Acerca de', 'nexo-play' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
echo np_enlace_menu( 'soporte', __( 'Soporte', 'nexo-play' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
?>
<!-- /wp:navigation --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"np-cabecera__acciones","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group np-cabecera__acciones"><!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"np-boton-instalar"} -->
<div class="wp-block-button np-boton-instalar"><a class="wp-block-button__link wp-element-button" href="<?php echo np_url( 'acerca-de' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Instalar Nexo Play', 'nexo-play' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:loginout {"className":"np-cabecera__login"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"np-barra-tienda","gradient":"barra","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group np-barra-tienda has-barra-gradient-background has-background"><!-- wp:navigation {"className":"np-nav-tienda-menu","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<!-- wp:navigation-submenu {"label":"<?php esc_attr_e( 'Explorar', 'nexo-play' ); ?>","url":"<?php echo esc_url( np_url_juegos( array( 'orden' => 'ventas' ) ) ); ?>","kind":"custom"} -->
<?php
echo np_enlace_url( __( 'Lo más vendido', 'nexo-play' ), np_url_juegos( array( 'orden' => 'ventas' ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
echo np_enlace_url( __( 'Novedades', 'nexo-play' ), np_url_juegos( array( 'orden' => 'lanzamiento' ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
echo np_enlace_url( __( 'Próximos lanzamientos', 'nexo-play' ), np_url_juegos( array( 'proximos' => 1 ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
echo np_enlace_url( __( 'Ofertas especiales', 'nexo-play' ), np_url_juegos( array( 'oferta' => 1 ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
echo np_enlace_url( __( 'Gratuitos', 'nexo-play' ), np_url_juegos( array( 'precio' => 0 ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
echo np_enlace_url( __( 'Todos los juegos', 'nexo-play' ), np_url_juegos() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
?>
<!-- /wp:navigation-submenu -->
<?php
echo np_submenu_terminos( __( 'Categorías', 'nexo-play' ), 'genero', 'np-mega' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
echo np_submenu_terminos( __( 'Formas de jugar', 'nexo-play' ), 'modo_juego' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
echo np_enlace_menu( 'noticias', __( 'Noticias', 'nexo-play' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
?>
<!-- /wp:navigation -->

<!-- wp:search {"label":"<?php esc_attr_e( 'Buscar', 'nexo-play' ); ?>","showLabel":false,"placeholder":"<?php esc_attr_e( 'Buscar en la tienda', 'nexo-play' ); ?>","buttonText":"<?php esc_attr_e( 'Buscar', 'nexo-play' ); ?>","buttonPosition":"button-inside","buttonUseIcon":true,"query":{"post_type":"juego"},"className":"np-buscador"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
