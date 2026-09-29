<?php
/**
 * Title: Página de soporte
 * Slug: nexo-play/pagina-soporte
 * Categories: nexo-play-paginas
 * Keywords: soporte, ayuda, preguntas
 * Viewport Width: 1400
 * Block Types: core/post-content
 * Post Types: page, wp_template
 * Description: Temas de ayuda, preguntas frecuentes y contacto.
 *
 * @package Nexo_Play
 */

?>
<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Cabecera de soporte', 'nexo-play' ); ?>"},"align":"full","className":"np-soporte-cabecera","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull np-soporte-cabecera" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:heading {"level":1,"fontSize":"xx-large"} -->
<h1 class="wp-block-heading has-xx-large-font-size"><?php esc_html_e( 'Soporte de Nexo Play', 'nexo-play' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size"><?php esc_html_e( '¿En qué podemos ayudarte? Elige un tema o busca una respuesta en las preguntas frecuentes.', 'nexo-play' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Temas de ayuda', 'nexo-play' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|60"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:columns {"className":"np-soporte__temas","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
<div class="wp-block-columns np-soporte__temas"><!-- wp:column {"className":"np-soporte__tema"} -->
<div class="wp-block-column np-soporte__tema"><!-- wp:paragraph -->
<p><strong><?php esc_html_e( 'Compras', 'nexo-play' ); ?></strong><br><?php esc_html_e( 'Pagos, facturas, códigos y tarjetas regalo', 'nexo-play' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"np-soporte__tema"} -->
<div class="wp-block-column np-soporte__tema"><!-- wp:paragraph -->
<p><strong><?php esc_html_e( 'Mi cuenta', 'nexo-play' ); ?></strong><br><?php esc_html_e( 'Contraseña, correo y seguridad de la cuenta', 'nexo-play' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"np-soporte__tema"} -->
<div class="wp-block-column np-soporte__tema"><!-- wp:paragraph -->
<p><strong><?php esc_html_e( 'Problemas técnicos', 'nexo-play' ); ?></strong><br><?php esc_html_e( 'El juego no arranca, se cierra o va lento', 'nexo-play' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"className":"np-soporte__temas","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
<div class="wp-block-columns np-soporte__temas"><!-- wp:column {"className":"np-soporte__tema"} -->
<div class="wp-block-column np-soporte__tema"><!-- wp:paragraph -->
<p><strong><?php esc_html_e( 'Reembolsos', 'nexo-play' ); ?></strong><br><?php esc_html_e( 'Cómo solicitar la devolución de un juego', 'nexo-play' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"np-soporte__tema"} -->
<div class="wp-block-column np-soporte__tema"><!-- wp:paragraph -->
<p><strong><?php esc_html_e( 'Juegos y contenido', 'nexo-play' ); ?></strong><br><?php esc_html_e( 'Descargas, actualizaciones y contenido adicional', 'nexo-play' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"np-soporte__tema"} -->
<div class="wp-block-column np-soporte__tema"><!-- wp:paragraph -->
<p><strong><?php esc_html_e( 'Comunidad', 'nexo-play' ); ?></strong><br><?php esc_html_e( 'Normas, reportes y moderación', 'nexo-play' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:heading {"className":"np-titulo-linea","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<h2 class="wp-block-heading np-titulo-linea" style="margin-top:var(--wp--preset--spacing--50)"><?php esc_html_e( 'Preguntas frecuentes', 'nexo-play' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:details {"className":"np-faq"} -->
<details class="wp-block-details np-faq"><summary><?php esc_html_e( '¿Cómo puedo pedir un reembolso?', 'nexo-play' ); ?></summary><!-- wp:paragraph -->
<p><?php esc_html_e( 'Puedes solicitar el reembolso de cualquier juego durante los 14 días siguientes a la compra si lo has jugado menos de 2 horas.', 'nexo-play' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"className":"np-faq"} -->
<details class="wp-block-details np-faq"><summary><?php esc_html_e( 'He olvidado mi contraseña', 'nexo-play' ); ?></summary><!-- wp:paragraph -->
<p><?php esc_html_e( 'Usa el enlace «¿Has olvidado tu contraseña?» en la pantalla de inicio de sesión y sigue las instrucciones del correo.', 'nexo-play' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"className":"np-faq"} -->
<details class="wp-block-details np-faq"><summary><?php esc_html_e( 'El juego no se inicia', 'nexo-play' ); ?></summary><!-- wp:paragraph -->
<p><?php esc_html_e( 'Comprueba que tu equipo cumple los requisitos mínimos, actualiza los controladores de la tarjeta gráfica y verifica los archivos del juego.', 'nexo-play' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details {"className":"np-faq"} -->
<details class="wp-block-details np-faq"><summary><?php esc_html_e( '¿Qué métodos de pago aceptáis?', 'nexo-play' ); ?></summary><!-- wp:paragraph -->
<p><?php esc_html_e( 'Tarjeta de crédito o débito, PayPal, transferencia y tarjetas regalo de Nexo Play.', 'nexo-play' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:group {"className":"np-soporte__contacto"} -->
<div class="wp-block-group np-soporte__contacto"><!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( '¿Sigues necesitando ayuda?', 'nexo-play' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Nuestro equipo de soporte responde en menos de 24 horas, todos los días del año.', 'nexo-play' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"np-boton-azul"} -->
<div class="wp-block-button np-boton-azul"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( 'mailto:' . get_option( 'admin_email' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Contactar con soporte', 'nexo-play' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
