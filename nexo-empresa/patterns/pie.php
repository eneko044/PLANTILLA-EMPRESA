<?php
/**
 * Title: Pie de página completo
 * Slug: nexo-empresa/pie
 * Categories: nexo-estructura, footer
 * Block Types: core/template-part/footer
 * Description: Pie oscuro con descripción de la empresa, redes sociales, enlaces, datos de contacto y avisos legales.
 *
 * @package Nexo_Empresa
 */

?>
<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Pie de página', 'nexo-empresa' ); ?>"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|30"},"margin":{"top":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"contrast","textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-color has-contrast-background-color has-text-color has-background has-link-color" style="margin-top:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"36%"} -->
<div class="wp-block-column" style="flex-basis:36%"><!-- wp:group {"style":{"spacing":{"blockGap":"0.7rem"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:site-logo {"width":40,"shouldSyncIcon":false} /-->

<!-- wp:site-title {"level":0} /--></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"nexo-texto-suave","fontSize":"small"} -->
<p class="nexo-texto-suave has-small-font-size"><?php esc_html_e( 'Ayudamos a empresas y profesionales a crecer con soluciones creativas, cercanas y a medida. Cuéntanos tu proyecto y lo hacemos realidad.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"base","iconColorValue":"#FFFFFF","iconBackgroundColor":"primary","iconBackgroundColorValue":"#2F5BEA","size":"has-normal-icon-size","style":{"spacing":{"blockGap":{"left":"0.5rem"}}}} -->
<ul class="wp-block-social-links has-normal-icon-size has-icon-color has-icon-background-color"><!-- wp:social-link {"url":"#","service":"linkedin"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"x"} /-->

<!-- wp:social-link {"url":"#","service":"youtube"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":2,"fontSize":"small","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}}} -->
<h2 class="wp-block-heading has-small-font-size" style="letter-spacing:0.1em;text-transform:uppercase"><?php esc_html_e( 'Empresa', 'nexo-empresa' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:list {"className":"is-style-sin-vinetas","fontSize":"small"} -->
<ul class="wp-block-list is-style-sin-vinetas has-small-font-size"><!-- wp:list-item -->
<li><a href="<?php echo nexo_url( 'nosotros' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Sobre nosotros', 'nexo-empresa' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo nexo_url( 'servicios' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Servicios', 'nexo-empresa' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo nexo_url( 'precios' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Precios', 'nexo-empresa' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo nexo_url( 'blog' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Blog', 'nexo-empresa' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo nexo_url( 'contacto' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Contacto', 'nexo-empresa' ); ?></a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":2,"fontSize":"small","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}}} -->
<h2 class="wp-block-heading has-small-font-size" style="letter-spacing:0.1em;text-transform:uppercase"><?php esc_html_e( 'Servicios', 'nexo-empresa' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:list {"className":"is-style-sin-vinetas nexo-texto-suave","fontSize":"small"} -->
<ul class="wp-block-list is-style-sin-vinetas nexo-texto-suave has-small-font-size"><!-- wp:list-item -->
<li><?php esc_html_e( 'Consultoría y estrategia', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Diseño y branding', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Desarrollo web', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Marketing digital', 'nexo-empresa' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"26%"} -->
<div class="wp-block-column" style="flex-basis:26%"><!-- wp:heading {"level":2,"fontSize":"small","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}}} -->
<h2 class="wp-block-heading has-small-font-size" style="letter-spacing:0.1em;text-transform:uppercase"><?php esc_html_e( 'Contacto', 'nexo-empresa' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"nexo-texto-suave","fontSize":"small"} -->
<p class="nexo-texto-suave has-small-font-size"><?php esc_html_e( 'Calle Mayor, 1 · 28013 Madrid', 'nexo-empresa' ); ?><br>+34 900 000 000<br>hola@tuempresa.com<br><?php esc_html_e( 'Lun–Vie de 9:00 a 18:00', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:separator {"align":"wide","className":"is-style-wide nexo-separador-suave","style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|30"}}}} -->
<hr class="wp-block-separator alignwide has-alpha-channel-opacity is-style-wide nexo-separador-suave" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--30)"/>
<!-- /wp:separator -->

<!-- wp:group {"align":"wide","className":"nexo-texto-suave","fontSize":"x-small","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide nexo-texto-suave has-x-small-font-size"><!-- wp:paragraph -->
<p>© <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>. <?php esc_html_e( 'Todos los derechos reservados.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><a href="#"><?php esc_html_e( 'Aviso legal', 'nexo-empresa' ); ?></a> · <a href="<?php echo esc_url( get_privacy_policy_url() ? get_privacy_policy_url() : '#' ); ?>"><?php esc_html_e( 'Privacidad', 'nexo-empresa' ); ?></a> · <a href="#"><?php esc_html_e( 'Cookies', 'nexo-empresa' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
