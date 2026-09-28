<?php
/**
 * Title: Testimonios en tarjetas
 * Slug: nexo-empresa/testimonios
 * Categories: nexo-confianza, testimonials
 * Keywords: testimonios, opiniones, reseñas, clientes
 * Viewport Width: 1400
 * Description: Tres opiniones de clientes con valoración, texto, foto y cargo.
 *
 * @package Nexo_Empresa
 */

?>
<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Testimonios', 'nexo-empresa' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|50"}},"backgroundColor":"base-2","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-2-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","contentSize":"680px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","className":"is-style-antetitulo nexo-anim-subir"} -->
<p class="has-text-align-center is-style-antetitulo nexo-anim-subir"><?php esc_html_e( 'Opiniones', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","className":"nexo-anim-subir"} -->
<h2 class="wp-block-heading has-text-align-center nexo-anim-subir"><?php esc_html_e( 'Lo que dicen nuestros clientes', 'nexo-empresa' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"is-style-destacado nexo-anim-subir"} -->
<p class="has-text-align-center is-style-destacado nexo-anim-subir"><?php esc_html_e( 'La mejor carta de presentación es el trabajo bien hecho. Estas son algunas de las opiniones que más nos enorgullecen.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"className":"is-style-tarjeta nexo-anim-subir nexo-retraso-1"} -->
<div class="wp-block-column is-style-tarjeta nexo-anim-subir nexo-retraso-1"><!-- wp:paragraph {"textColor":"accent"} -->
<p class="has-accent-color has-text-color">★★★★★</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size"><?php esc_html_e( 'Desde que trabajamos con ellos, las reservas por la web se han duplicado. Son rápidos, claros y siempre proponen mejoras.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:columns {"verticalAlignment":"center","className":"is-not-stacked-on-mobile","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile"><!-- wp:column {"verticalAlignment":"center","width":"52px"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:52px"><!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"nexo-avatar"} -->
<figure class="wp-block-image size-full nexo-avatar"><img src="<?php echo nexo_img( 'avatar-5.svg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong>Julia Martín</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"nexo-texto-suave","fontSize":"x-small"} -->
<p class="nexo-texto-suave has-x-small-font-size"><?php esc_html_e( 'Gerente de Café Aroma', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"is-style-tarjeta nexo-anim-subir nexo-retraso-2"} -->
<div class="wp-block-column is-style-tarjeta nexo-anim-subir nexo-retraso-2"><!-- wp:paragraph {"textColor":"accent"} -->
<p class="has-accent-color has-text-color">★★★★★</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size"><?php esc_html_e( 'Entendieron nuestro negocio desde la primera reunión. La nueva imagen de marca nos ha abierto puertas con clientes grandes.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:columns {"verticalAlignment":"center","className":"is-not-stacked-on-mobile","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile"><!-- wp:column {"verticalAlignment":"center","width":"52px"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:52px"><!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"nexo-avatar"} -->
<figure class="wp-block-image size-full nexo-avatar"><img src="<?php echo nexo_img( 'avatar-6.svg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong>Eduardo Navarro</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"nexo-texto-suave","fontSize":"x-small"} -->
<p class="nexo-texto-suave has-x-small-font-size"><?php esc_html_e( 'Fundador de Navarro Logística', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"is-style-tarjeta nexo-anim-subir nexo-retraso-3"} -->
<div class="wp-block-column is-style-tarjeta nexo-anim-subir nexo-retraso-3"><!-- wp:paragraph {"textColor":"accent"} -->
<p class="has-accent-color has-text-color">★★★★★</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size"><?php esc_html_e( 'Profesionales de principio a fin. Cumplieron cada plazo y el resultado superó lo que esperábamos. Totalmente recomendables.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:columns {"verticalAlignment":"center","className":"is-not-stacked-on-mobile","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile"><!-- wp:column {"verticalAlignment":"center","width":"52px"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:52px"><!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"nexo-avatar"} -->
<figure class="wp-block-image size-full nexo-avatar"><img src="<?php echo nexo_img( 'avatar-3.svg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong>Alicia Soto</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"nexo-texto-suave","fontSize":"x-small"} -->
<p class="nexo-texto-suave has-x-small-font-size"><?php esc_html_e( 'Directora de Clínica Soto', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
