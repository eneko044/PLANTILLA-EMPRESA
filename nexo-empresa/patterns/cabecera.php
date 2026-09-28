<?php
/**
 * Title: Cabecera clásica
 * Slug: nexo-empresa/cabecera
 * Categories: nexo-estructura, header
 * Block Types: core/template-part/header
 * Description: Logotipo a la izquierda, menú y botón a la derecha. Se queda fija al hacer scroll.
 *
 * @package Nexo_Empresa
 */

?>
<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Cabecera', 'nexo-empresa' ); ?>"},"className":"nexo-cabecera-fija","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}},"border":{"bottom":{"color":"var:preset|color|border","width":"1px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group nexo-cabecera-fija" style="border-bottom-color:var(--wp--preset--color--border);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"style":{"spacing":{"blockGap":"0.7rem"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:site-logo {"width":40,"shouldSyncIcon":false} /-->

<!-- wp:site-title {"level":0} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:navigation {"overlayBackgroundColor":"base","overlayTextColor":"contrast","layout":{"type":"flex","justifyContent":"right"}} /-->

<!-- wp:buttons {"className":"nexo-ocultar-movil"} -->
<div class="wp-block-buttons nexo-ocultar-movil"><!-- wp:button {"className":"is-style-flecha"} -->
<div class="wp-block-button is-style-flecha"><a class="wp-block-button__link wp-element-button" href="<?php echo nexo_url( 'contacto' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Hablemos', 'nexo-empresa' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
