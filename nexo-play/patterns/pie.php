<?php
/**
 * Title: Pie de la tienda
 * Slug: nexo-play/pie
 * Categories: nexo-play-estructura, footer
 * Block Types: core/template-part/footer
 * Description: Logotipo, aviso legal, redes sociales y columnas de enlaces.
 *
 * @package Nexo_Play
 */

?>
<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Pie de página', 'nexo-play' ); ?>"},"className":"np-pie","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|60"},"margin":{"top":"0"}}},"backgroundColor":"fondo-oscuro","textColor":"texto-suave","fontSize":"small","layout":{"type":"constrained"}} -->
<div class="wp-block-group np-pie has-texto-suave-color has-fondo-oscuro-background-color has-text-color has-background has-small-font-size" style="margin-top:0;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"38%"} -->
<div class="wp-block-column" style="flex-basis:38%"><!-- wp:group {"className":"np-pie__marca","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group np-pie__marca"><!-- wp:image {"width":"36px","sizeSlug":"full","linkDestination":"none","className":"np-logo np-logo--pie"} -->
<figure class="wp-block-image size-full is-resized np-logo np-logo--pie"><img src="<?php echo np_asset( 'img/logo.svg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="" style="width:36px"/></figure>
<!-- /wp:image -->

<!-- wp:site-title {"level":0,"isLink":false,"className":"np-pie__nombre"} /--></div>
<!-- /wp:group -->

<!-- wp:paragraph {"fontSize":"x-small"} -->
<p class="has-x-small-font-size">© <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>. <?php esc_html_e( 'Todos los derechos reservados. Todas las marcas registradas pertenecen a sus respectivos dueños. Todos los precios incluyen IVA (donde sea aplicable). Los juegos que aparecen en esta web son ficticios.', 'nexo-play' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"texto-suave","iconColorValue":"#8F98A0","size":"has-normal-icon-size","className":"is-style-logos-only np-pie__redes"} -->
<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only np-pie__redes"><!-- wp:social-link {"url":"#","service":"youtube"} /-->

<!-- wp:social-link {"url":"#","service":"bluesky"} /-->

<!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"x"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":2,"className":"np-pie__titulo"} -->
<h2 class="wp-block-heading np-pie__titulo"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h2>
<!-- /wp:heading -->

<!-- wp:list {"className":"np-pie__lista"} -->
<ul class="wp-block-list np-pie__lista"><!-- wp:list-item -->
<li><a href="<?php echo np_url( 'acerca-de' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Acerca de', 'nexo-play' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo np_url_juegos(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Todos los juegos', 'nexo-play' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo np_url( 'noticias' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Noticias', 'nexo-play' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo np_url( 'comunidad' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Comunidad', 'nexo-play' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="#"><?php esc_html_e( 'Tarjetas regalo', 'nexo-play' ); ?></a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":2,"className":"np-pie__titulo"} -->
<h2 class="wp-block-heading np-pie__titulo"><?php esc_html_e( 'Información legal', 'nexo-play' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:list {"className":"np-pie__lista"} -->
<ul class="wp-block-list np-pie__lista"><!-- wp:list-item -->
<li><a href="<?php echo esc_url( get_privacy_policy_url() ? get_privacy_policy_url() : '#' ); ?>"><?php esc_html_e( 'Privacidad', 'nexo-play' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="#"><?php esc_html_e( 'Aviso legal', 'nexo-play' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="#"><?php esc_html_e( 'Cookies', 'nexo-play' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo np_url( 'soporte' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Reembolsos', 'nexo-play' ); ?></a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":2,"className":"np-pie__titulo"} -->
<h2 class="wp-block-heading np-pie__titulo"><?php esc_html_e( 'Más', 'nexo-play' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:list {"className":"np-pie__lista"} -->
<ul class="wp-block-list np-pie__lista"><!-- wp:list-item -->
<li><a href="<?php echo np_url( 'soporte' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Soporte', 'nexo-play' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo esc_url( wp_login_url() ); ?>"><?php esc_html_e( 'Mi cuenta', 'nexo-play' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo np_url( 'acerca-de' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Descargar la aplicación', 'nexo-play' ); ?></a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
