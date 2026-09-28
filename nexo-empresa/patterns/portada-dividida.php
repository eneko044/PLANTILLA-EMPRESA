<?php
/**
 * Title: Portada dividida (texto e imagen)
 * Slug: nexo-empresa/portada-dividida
 * Categories: nexo-portadas, featured, banner
 * Keywords: portada, hero, inicio, imagen
 * Viewport Width: 1400
 * Description: Titular, texto, botones y lista de ventajas a la izquierda; imagen con marco a la derecha.
 *
 * @package Nexo_Empresa
 */

?>
<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Portada dividida', 'nexo-empresa' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"gradient":"suave","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-suave-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|60","left":"var:preset|spacing|70"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"52%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:52%"><!-- wp:paragraph {"className":"is-style-etiqueta nexo-anim-subir"} -->
<p class="is-style-etiqueta nexo-anim-subir">✦ <?php esc_html_e( 'Nuevo: consultoría gratuita de 30 minutos', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"className":"nexo-anim-subir nexo-retraso-1","fontSize":"xxx-large"} -->
<h1 class="wp-block-heading nexo-anim-subir nexo-retraso-1 has-xxx-large-font-size"><?php esc_html_e( 'Hacemos que tu empresa destaque', 'nexo-empresa' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"is-style-destacado nexo-anim-subir nexo-retraso-2"} -->
<p class="is-style-destacado nexo-anim-subir nexo-retraso-2"><?php esc_html_e( 'Un equipo cercano que se encarga de todo: desde la idea hasta los resultados. Tú te centras en tu negocio; nosotros, en que crezca.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"is-style-check nexo-anim-subir nexo-retraso-2"} -->
<ul class="wp-block-list is-style-check nexo-anim-subir nexo-retraso-2"><!-- wp:list-item -->
<li><?php esc_html_e( 'Propuesta personalizada en 48 horas', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Sin permanencia ni letra pequeña', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Un responsable dedicado a tu proyecto', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons {"className":"nexo-anim-subir nexo-retraso-3","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<div class="wp-block-buttons nexo-anim-subir nexo-retraso-3" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:button {"className":"is-style-flecha"} -->
<div class="wp-block-button is-style-flecha"><a class="wp-block-button__link wp-element-button" href="<?php echo nexo_url( 'contacto' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Empezar ahora', 'nexo-empresa' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo nexo_url( 'nosotros' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Conócenos', 'nexo-empresa' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"48%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:48%"><!-- wp:image {"aspectRatio":"4/5","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-inclinada nexo-anim-derecha nexo-retraso-2"} -->
<figure class="wp-block-image size-large is-style-inclinada nexo-anim-derecha nexo-retraso-2"><img src="<?php echo nexo_img( 'trabajo-portatil.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="<?php esc_attr_e( 'Persona trabajando con un ordenador portátil', 'nexo-empresa' ); ?>" style="aspect-ratio:4/5;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
