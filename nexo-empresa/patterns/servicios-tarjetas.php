<?php
/**
 * Title: Servicios en tarjetas
 * Slug: nexo-empresa/servicios-tarjetas
 * Categories: nexo-servicios, services
 * Keywords: servicios, tarjetas, iconos, características
 * Viewport Width: 1400
 * Description: Título centrado y tres tarjetas con icono, texto y enlace.
 *
 * @package Nexo_Empresa
 */

?>
<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Servicios', 'nexo-empresa' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|50"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","contentSize":"680px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","className":"is-style-antetitulo nexo-anim-subir"} -->
<p class="has-text-align-center is-style-antetitulo nexo-anim-subir"><?php esc_html_e( 'Qué hacemos', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","className":"nexo-anim-subir"} -->
<h2 class="wp-block-heading has-text-align-center nexo-anim-subir"><?php esc_html_e( 'Servicios pensados para que tu empresa crezca', 'nexo-empresa' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"is-style-destacado nexo-anim-subir"} -->
<p class="has-text-align-center is-style-destacado nexo-anim-subir"><?php esc_html_e( 'Elige solo lo que necesitas. Todos nuestros servicios se adaptan al tamaño y a los objetivos de tu negocio.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"className":"is-style-tarjeta nexo-anim-subir nexo-retraso-1"} -->
<div class="wp-block-column is-style-tarjeta nexo-anim-subir nexo-retraso-1"><!-- wp:nexo/icono {"icono":"target"} /-->

<!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Consultoría y estrategia', 'nexo-empresa' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"nexo-texto-suave"} -->
<p class="nexo-texto-suave"><?php esc_html_e( 'Analizamos tu negocio y tu competencia para definir un plan claro, con objetivos medibles y prioridades.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-enlace"} -->
<div class="wp-block-button is-style-enlace"><a class="wp-block-button__link wp-element-button" href="<?php echo nexo_url( 'servicios' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Saber más', 'nexo-empresa' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"is-style-tarjeta nexo-anim-subir nexo-retraso-2"} -->
<div class="wp-block-column is-style-tarjeta nexo-anim-subir nexo-retraso-2"><!-- wp:nexo/icono {"icono":"palette"} /-->

<!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Diseño y marca', 'nexo-empresa' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"nexo-texto-suave"} -->
<p class="nexo-texto-suave"><?php esc_html_e( 'Creamos una identidad visual coherente y memorable: logotipo, colores, tipografías y materiales.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-enlace"} -->
<div class="wp-block-button is-style-enlace"><a class="wp-block-button__link wp-element-button" href="<?php echo nexo_url( 'servicios' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Saber más', 'nexo-empresa' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"is-style-tarjeta nexo-anim-subir nexo-retraso-3"} -->
<div class="wp-block-column is-style-tarjeta nexo-anim-subir nexo-retraso-3"><!-- wp:nexo/icono {"icono":"code"} /-->

<!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Web y tecnología', 'nexo-empresa' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"nexo-texto-suave"} -->
<p class="nexo-texto-suave"><?php esc_html_e( 'Desarrollamos webs rápidas, seguras y fáciles de gestionar, preparadas para vender y posicionar.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-enlace"} -->
<div class="wp-block-button is-style-enlace"><a class="wp-block-button__link wp-element-button" href="<?php echo nexo_url( 'servicios' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Saber más', 'nexo-empresa' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
