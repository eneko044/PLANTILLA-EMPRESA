<?php
/**
 * Title: Preguntas frecuentes
 * Slug: nexo-empresa/preguntas-frecuentes
 * Categories: nexo-precios, nexo-contacto, text
 * Keywords: preguntas, faq, dudas, acordeón
 * Viewport Width: 1400
 * Description: Título y botón a la izquierda; preguntas desplegables tipo acordeón a la derecha.
 *
 * @package Nexo_Empresa
 */

?>
<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Preguntas frecuentes', 'nexo-empresa' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|50"}},"backgroundColor":"base-2","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-2-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|70","left":"var:preset|spacing|70"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"38%"} -->
<div class="wp-block-column" style="flex-basis:38%"><!-- wp:paragraph {"className":"is-style-antetitulo nexo-anim-subir"} -->
<p class="is-style-antetitulo nexo-anim-subir"><?php esc_html_e( 'Preguntas frecuentes', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"nexo-anim-subir"} -->
<h2 class="wp-block-heading nexo-anim-subir"><?php esc_html_e( 'Resolvemos tus dudas', 'nexo-empresa' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"is-style-destacado nexo-anim-subir"} -->
<p class="is-style-destacado nexo-anim-subir"><?php esc_html_e( '¿No encuentras lo que buscas? Escríbenos y te contestamos en menos de 24 horas.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-flecha"} -->
<div class="wp-block-button is-style-flecha"><a class="wp-block-button__link wp-element-button" href="<?php echo nexo_url( 'contacto' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Contactar', 'nexo-empresa' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"62%"} -->
<div class="wp-block-column" style="flex-basis:62%"><!-- wp:group {"className":"nexo-anim-subir","style":{"spacing":{"blockGap":"0.75rem"}}} -->
<div class="wp-block-group nexo-anim-subir"><!-- wp:details {"className":"is-style-acordeon","showContent":true} -->
<details class="wp-block-details is-style-acordeon" open><summary><?php esc_html_e( '¿Cuánto tarda un proyecto?', 'nexo-empresa' ); ?></summary><!-- wp:paragraph -->
<p><?php esc_html_e( 'Depende del alcance, pero la mayoría de proyectos se entregan en un plazo de 3 a 6 semanas desde la aprobación de la propuesta.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"className":"is-style-acordeon"} -->
<details class="wp-block-details is-style-acordeon"><summary><?php esc_html_e( '¿Cómo son los pagos?', 'nexo-empresa' ); ?></summary><!-- wp:paragraph -->
<p><?php esc_html_e( 'Normalmente un 50 % al empezar y el 50 % restante en la entrega. Para proyectos grandes podemos acordar pagos por fases.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"className":"is-style-acordeon"} -->
<details class="wp-block-details is-style-acordeon"><summary><?php esc_html_e( '¿Podré hacer cambios yo mismo?', 'nexo-empresa' ); ?></summary><!-- wp:paragraph -->
<p><?php esc_html_e( 'Sí. Te entregamos todo preparado para que puedas actualizar textos, imágenes y precios sin conocimientos técnicos, y te damos una formación.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"className":"is-style-acordeon"} -->
<details class="wp-block-details is-style-acordeon"><summary><?php esc_html_e( '¿Trabajáis con empresas de fuera de mi ciudad?', 'nexo-empresa' ); ?></summary><!-- wp:paragraph -->
<p><?php esc_html_e( 'Por supuesto. Trabajamos en remoto con clientes de toda España y del extranjero mediante videollamadas y herramientas colaborativas.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"className":"is-style-acordeon"} -->
<details class="wp-block-details is-style-acordeon"><summary><?php esc_html_e( '¿Qué pasa cuando termina el proyecto?', 'nexo-empresa' ); ?></summary><!-- wp:paragraph -->
<p><?php esc_html_e( 'Seguimos a tu lado: ofrecemos planes de mantenimiento y soporte para que todo funcione siempre perfectamente.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
