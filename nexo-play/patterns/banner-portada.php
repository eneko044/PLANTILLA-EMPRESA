<?php
/**
 * Title: Banner principal de la tienda
 * Slug: nexo-play/banner-portada
 * Categories: nexo-play, banner
 * Keywords: banner, portada, destacado
 * Viewport Width: 1400
 * Description: Imagen grande a todo el ancho con el juego del momento y un botón.
 *
 * @package Nexo_Play
 */

?>
<!-- wp:cover {"url":"<?php echo np_asset( 'demo/banner-portada.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>","dimRatio":30,"overlayColor":"fondo-oscuro","isUserOverlayColor":true,"minHeight":430,"metadata":{"name":"<?php esc_attr_e( 'Banner principal', 'nexo-play' ); ?>"},"align":"full","className":"np-banner","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull np-banner" style="margin-top:0;margin-bottom:0;min-height:430px"><img class="wp-block-cover__image-background" alt="" src="<?php echo np_asset( 'demo/banner-portada.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-fondo-oscuro-background-color has-background-dim-30 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","className":"np-banner__titulo","fontSize":"display"} -->
<h2 class="wp-block-heading has-text-align-center np-banner__titulo has-display-font-size"><?php esc_html_e( 'Reinos de Ceniza', 'nexo-play' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"np-banner__sub"} -->
<p class="has-text-align-center np-banner__sub"><?php esc_html_e( 'La corona rota', 'nexo-play' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"np-boton-banner"} -->
<div class="wp-block-button np-boton-banner"><a class="wp-block-button__link wp-element-button" href="<?php echo np_url_juego( 'reinos-de-ceniza' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Resérvalo ya', 'nexo-play' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->
