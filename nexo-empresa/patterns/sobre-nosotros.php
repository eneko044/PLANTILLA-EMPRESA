<?php
/**
 * Title: Sobre nosotros con imagen
 * Slug: nexo-empresa/sobre-nosotros
 * Categories: nexo-nosotros, about
 * Keywords: nosotros, empresa, historia, equipo
 * Viewport Width: 1400
 * Description: Texto sobre la empresa con lista de puntos fuertes, cifras y una imagen del equipo.
 *
 * @package Nexo_Empresa
 */

?>
<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Sobre nosotros', 'nexo-empresa' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|50"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|70","left":"var:preset|spacing|70"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:paragraph {"className":"is-style-antetitulo nexo-anim-subir"} -->
<p class="is-style-antetitulo nexo-anim-subir"><?php esc_html_e( 'Quiénes somos', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"nexo-anim-subir"} -->
<h2 class="wp-block-heading nexo-anim-subir"><?php esc_html_e( 'Un equipo apasionado por hacer bien las cosas', 'nexo-empresa' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"is-style-destacado nexo-anim-subir"} -->
<p class="is-style-destacado nexo-anim-subir"><?php esc_html_e( 'Nacimos con una idea sencilla: ofrecer a las empresas un servicio profesional y cercano, con la calidad de una gran agencia y el trato de un socio de confianza.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"is-style-check nexo-anim-subir"} -->
<ul class="wp-block-list is-style-check nexo-anim-subir"><!-- wp:list-item -->
<li><?php esc_html_e( 'Más de 10 años de experiencia en el sector', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Proyectos para pymes, autónomos y grandes marcas', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Atención personalizada de principio a fin', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:columns {"className":"is-not-stacked-on-mobile nexo-anim-subir","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns is-not-stacked-on-mobile nexo-anim-subir"><!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column"><!-- wp:paragraph {"className":"nexo-contador","fontSize":"xx-large"} -->
<p class="nexo-contador has-xx-large-font-size"><strong>+250</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"nexo-texto-suave","fontSize":"small"} -->
<p class="nexo-texto-suave has-small-font-size"><?php esc_html_e( 'clientes', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column"><!-- wp:paragraph {"className":"nexo-contador","fontSize":"xx-large"} -->
<p class="nexo-contador has-xx-large-font-size"><strong>98%</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"nexo-texto-suave","fontSize":"small"} -->
<p class="nexo-texto-suave has-small-font-size"><?php esc_html_e( 'repiten con nosotros', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column"><!-- wp:paragraph {"className":"nexo-contador","fontSize":"xx-large"} -->
<p class="nexo-contador has-xx-large-font-size"><strong>12</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"nexo-texto-suave","fontSize":"small"} -->
<p class="nexo-texto-suave has-small-font-size"><?php esc_html_e( 'profesionales', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo nexo_url( 'nosotros' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Conoce al equipo', 'nexo-empresa' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:image {"aspectRatio":"4/5","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-inclinada nexo-anim-derecha"} -->
<figure class="wp-block-image size-large is-style-inclinada nexo-anim-derecha"><img src="<?php echo nexo_img( 'equipo-reunion.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="<?php esc_attr_e( 'Equipo reunido alrededor de una mesa de trabajo', 'nexo-empresa' ); ?>" style="aspect-ratio:4/5;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
