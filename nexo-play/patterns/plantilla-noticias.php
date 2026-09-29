<?php
/**
 * Title: Plantilla: noticias
 * Slug: nexo-play/plantilla-noticias
 * Categories: nexo-play-paginas
 * Keywords: noticias
 * Viewport Width: 1400
 * Inserter: no
 * Description: Listado de noticias.
 *
 * @package Nexo_Play
 */

?>
<!-- wp:group {"tagName":"main","className":"np-main","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group np-main" style="margin-top:0;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:heading {"level":1,"className":"np-titulo-pagina"} -->
<h1 class="wp-block-heading np-titulo-pagina"><?php esc_html_e( 'Noticias', 'nexo-play' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:query {"queryId":1,"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"className":"np-noticias"} -->
<div class="wp-block-query np-noticias"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"className":"np-noticia-tarjeta","layout":{"type":"default"}} -->
<div class="wp-block-group np-noticia-tarjeta"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->

<!-- wp:group {"className":"np-noticia-tarjeta__texto","layout":{"type":"default"}} -->
<div class="wp-block-group np-noticia-tarjeta__texto"><!-- wp:post-date {"format":"j M Y"} /-->

<!-- wp:post-title {"level":2,"isLink":true,"fontSize":"medium"} /-->

<!-- wp:post-excerpt {"excerptLength":22,"fontSize":"small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Todavía no hay noticias.', 'nexo-play' ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></main>
<!-- /wp:group -->
