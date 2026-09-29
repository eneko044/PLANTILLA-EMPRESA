<?php
/**
 * Title: Página «Acerca de»
 * Slug: nexo-play/pagina-acerca-de
 * Categories: nexo-play-paginas
 * Keywords: acerca de, nosotros, presentación
 * Viewport Width: 1400
 * Block Types: core/post-content
 * Post Types: page, wp_template
 * Description: Presentación con cifras de jugadores, botón de instalar y secciones alternas con imagen.
 *
 * @package Nexo_Play
 */

?>
<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Presentación', 'nexo-play' ); ?>"},"align":"full","className":"np-acerca-hero","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|60"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull np-acerca-hero" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|60","left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%"><!-- wp:group {"className":"np-acerca__logo","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group np-acerca__logo"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"np-logo np-logo--grande"} -->
<figure class="wp-block-image size-full np-logo np-logo--grande"><img src="<?php echo np_asset( 'img/logo.svg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:site-title {"level":0,"isLink":false,"className":"np-acerca__marca"} /--></div>
<!-- /wp:group -->

<!-- wp:paragraph {"textColor":"blanco","fontSize":"large"} -->
<p class="has-blanco-color has-text-color has-large-font-size"><?php esc_html_e( 'Nexo Play es el mejor lugar para jugar, hablar sobre juegos y crearlos.', 'nexo-play' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"np-stats","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group np-stats"><!-- wp:paragraph {"className":"np-stat np-stat--linea"} -->
<p class="np-stat np-stat--linea"><span><?php esc_html_e( 'En línea', 'nexo-play' ); ?></span><strong>1.284.391</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"np-stat np-stat--jugando"} -->
<p class="np-stat np-stat--jugando"><span><?php esc_html_e( 'Jugando', 'nexo-play' ); ?></span><strong>402.118</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"np-boton-azul np-boton-grande"} -->
<div class="wp-block-button np-boton-azul np-boton-grande"><a class="wp-block-button__link wp-element-button" href="<?php echo np_url_juegos(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Instalar Nexo Play', 'nexo-play' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"className":"np-acerca__plataformas","fontSize":"x-small"} -->
<p class="np-acerca__plataformas has-x-small-font-size"><?php esc_html_e( 'También disponible en Windows, macOS y Linux', 'nexo-play' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"np-acerca__pantalla"} -->
<figure class="wp-block-image size-full np-acerca__pantalla"><img src="<?php echo np_asset( 'demo/neon-nocturno-cabecera.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="<?php esc_attr_e( 'Juego en una pantalla', 'nexo-play' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Más información', 'nexo-play' ); ?>"},"align":"full","className":"np-acerca-seccion","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull np-acerca-seccion" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10)"><!-- wp:paragraph {"align":"center","className":"np-acerca__mas","fontSize":"x-small"} -->
<p class="has-text-align-center np-acerca__mas has-x-small-font-size"><?php esc_html_e( 'MÁS INFORMACIÓN ⌄', 'nexo-play' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Accede a los juegos', 'nexo-play' ); ?>"},"align":"full","className":"np-acerca-seccion np-acerca-seccion--azul","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull np-acerca-seccion np-acerca-seccion--azul" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:group {"layout":{"type":"constrained","contentSize":"620px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size"><?php esc_html_e( 'Accede a los juegos al instante', 'nexo-play' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"><?php esc_html_e( 'Con cientos de juegos publicados; desde grandes compañías hasta estudios independientes y todo lo que hay entre medias. Disfruta de ofertas exclusivas, actualizaciones automáticas y otras grandes ventajas.', 'nexo-play' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","className":"np-enlace-flecha"} -->
<p class="has-text-align-center np-enlace-flecha"><a href="<?php echo np_url( 'tienda' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Explorar la tienda →', 'nexo-play' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"className":"np-flotantes is-not-stacked-on-mobile","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
<div class="wp-block-columns np-flotantes is-not-stacked-on-mobile"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"np-flotante"} -->
<figure class="wp-block-image size-full np-flotante"><img src="<?php echo np_asset( 'demo/aurora-boreal-cabecera.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"np-flotante"} -->
<figure class="wp-block-image size-full np-flotante"><img src="<?php echo np_asset( 'demo/pabellon-9-cabecera.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"np-flotante"} -->
<figure class="wp-block-image size-full np-flotante"><img src="<?php echo np_asset( 'demo/isla-tranquila-cabecera.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"np-flotante"} -->
<figure class="wp-block-image size-full np-flotante"><img src="<?php echo np_asset( 'demo/dunas-de-kharim-cabecera.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"np-flotante"} -->
<figure class="wp-block-image size-full np-flotante"><img src="<?php echo np_asset( 'demo/pixel-pioneros-cabecera.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Únete a la comunidad', 'nexo-play' ); ?>"},"align":"full","className":"np-acerca-seccion","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull np-acerca-seccion" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|60","left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%"><!-- wp:heading {"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-xx-large-font-size"><?php esc_html_e( 'Únete a la comunidad', 'nexo-play' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size"><?php esc_html_e( '¡Conoce a gente nueva, únete a grupos, forma clanes, chatea mientras juegas y mucho más! Con miles de posibles amigos (o enemigos), la diversión nunca termina.', 'nexo-play' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"np-enlace-flecha"} -->
<p class="np-enlace-flecha"><a href="<?php echo np_url( 'comunidad' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Visita la comunidad →', 'nexo-play' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"np-acerca__imagen"} -->
<figure class="wp-block-image size-full np-acerca__imagen"><img src="<?php echo np_asset( 'demo/tormenta-de-acero-captura-2.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="<?php esc_attr_e( 'Partida multijugador', 'nexo-play' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Juega en cualquier lugar', 'nexo-play' ); ?>"},"align":"full","className":"np-acerca-seccion","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull np-acerca-seccion" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|60","left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"np-acerca__imagen"} -->
<figure class="wp-block-image size-full np-acerca__imagen"><img src="<?php echo np_asset( 'demo/ruta-salvaje-captura-3.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="<?php esc_attr_e( 'Juego en una pantalla grande', 'nexo-play' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%"><!-- wp:heading {"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-xx-large-font-size"><?php esc_html_e( 'Juega donde quieras', 'nexo-play' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size"><?php esc_html_e( 'En tu ordenador, en la tele del salón o en tu portátil. Tu biblioteca y tus partidas guardadas te acompañan a todas partes.', 'nexo-play' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"np-enlace-flecha"} -->
<p class="np-enlace-flecha"><a href="<?php echo np_url( 'soporte' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Descubre cómo →', 'nexo-play' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Publica tu juego', 'nexo-play' ); ?>"},"align":"full","className":"np-acerca-seccion","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull np-acerca-seccion" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|60","left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%"><!-- wp:paragraph {"className":"np-acerca__ante","fontSize":"x-small"} -->
<p class="np-acerca__ante has-x-small-font-size"><?php esc_html_e( 'NEXO WORKS', 'nexo-play' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-xx-large-font-size"><?php esc_html_e( 'Publica tu juego', 'nexo-play' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size"><?php esc_html_e( 'Nexo Works es un conjunto de herramientas y servicios para que desarrolladores y editores saquen el máximo partido a la distribución de sus juegos.', 'nexo-play' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"np-enlace-flecha"} -->
<p class="np-enlace-flecha"><a href="<?php echo np_url( 'soporte' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Más información sobre Nexo Works →', 'nexo-play' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"np-acerca__imagen"} -->
<figure class="wp-block-image size-full np-acerca__imagen"><img src="<?php echo np_asset( 'demo/metropolis-2099-captura-1.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="<?php esc_attr_e( 'Herramientas de desarrollo', 'nexo-play' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
