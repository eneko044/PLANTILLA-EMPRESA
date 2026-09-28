<?php
/**
 * Title: Cabecera con barra de contacto
 * Slug: nexo-empresa/cabecera-con-barra
 * Categories: nexo-estructura, header
 * Block Types: core/template-part/header
 * Description: Barra superior oscura con teléfono, correo y redes sociales, y debajo la cabecera clásica.
 *
 * @package Nexo_Empresa
 */

?>
<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Cabecera con barra', 'nexo-empresa' ); ?>"},"className":"nexo-cabecera-fija","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group nexo-cabecera-fija"><!-- wp:group {"className":"nexo-ocultar-movil","style":{"spacing":{"padding":{"top":"0.55rem","bottom":"0.55rem"}}},"backgroundColor":"contrast","textColor":"base","fontSize":"x-small","layout":{"type":"constrained"}} -->
<div class="wp-block-group nexo-ocultar-movil has-base-color has-contrast-background-color has-text-color has-background has-x-small-font-size" style="padding-top:0.55rem;padding-bottom:0.55rem"><!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide"><!-- wp:paragraph -->
<p>☎ +34 900 000 000 &nbsp;·&nbsp; ✉ hola@tuempresa.com &nbsp;·&nbsp; <?php esc_html_e( 'Lun–Vie de 9:00 a 18:00', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"base","iconColorValue":"#FFFFFF","size":"has-small-icon-size","className":"is-style-logos-only"} -->
<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"linkedin"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"x"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"nexo-empresa/cabecera"} /--></div>
<!-- /wp:group -->
