<?php
/**
 * Title: Cabecera centrada
 * Slug: nexo-empresa/cabecera-centrada
 * Categories: nexo-estructura, header
 * Block Types: core/template-part/header
 * Description: Logotipo y nombre centrados con el menú debajo. Ideal para estudios y marcas personales.
 *
 * @package Nexo_Empresa
 */

?>
<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Cabecera centrada', 'nexo-empresa' ); ?>"},"className":"nexo-cabecera-fija","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|20"},"border":{"bottom":{"color":"var:preset|color|border","width":"1px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group nexo-cabecera-fija" style="border-bottom-color:var(--wp--preset--color--border);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:group {"style":{"spacing":{"blockGap":"0.7rem"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:site-logo {"width":44,"shouldSyncIcon":false} /-->

<!-- wp:site-title {"level":0,"textAlign":"center","fontSize":"x-large"} /--></div>
<!-- /wp:group -->

<!-- wp:navigation {"overlayBackgroundColor":"base","overlayTextColor":"contrast","layout":{"type":"flex","justifyContent":"center"}} /--></div>
<!-- /wp:group -->
