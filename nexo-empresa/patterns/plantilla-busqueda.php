<?php
/**
 * Title: Plantilla: resultados de búsqueda
 * Slug: nexo-empresa/plantilla-busqueda
 * Categories: nexo-blog
 * Keywords: búsqueda
 * Viewport Width: 1400
 * Inserter: no
 * Description: Resultados de búsqueda.
 *
 * @package Nexo_Empresa
 */

?>
<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0"}}},"layout":{"type":"default"}} -->
<main class="wp-block-group" style="margin-top:0"><!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|60"},"margin":{"top":"0","bottom":"0"}}},"gradient":"suave","layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group alignfull has-suave-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:query-title {"type":"search","textAlign":"center"} /-->

<!-- wp:search {"label":"<?php esc_attr_e( 'Buscar', 'nexo-empresa' ); ?>","showLabel":false,"placeholder":"<?php esc_attr_e( 'Buscar en la web…', 'nexo-empresa' ); ?>","buttonText":"<?php esc_attr_e( 'Buscar', 'nexo-empresa' ); ?>"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Resultados', 'nexo-empresa' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|50"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:query {"queryId":3,"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-query alignwide"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"className":"is-style-tarjeta nexo-tarjeta-entrada","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group is-style-tarjeta nexo-tarjeta-entrada" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/10","className":"is-style-zoom"} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"blockGap":"0.6rem"}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:post-terms {"term":"category","className":"is-style-antetitulo"} /-->

<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"large"} /-->

<!-- wp:post-excerpt {"excerptLength":22,"className":"nexo-texto-suave","fontSize":"small"} /-->

<!-- wp:post-date /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php esc_html_e( 'Todavía no hay entradas publicadas.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results -->

<!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->
</main>
<!-- /wp:group -->
