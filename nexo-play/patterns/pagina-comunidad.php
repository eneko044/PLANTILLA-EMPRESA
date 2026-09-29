<?php
/**
 * Title: Página de la comunidad
 * Slug: nexo-play/pagina-comunidad
 * Categories: nexo-play-paginas
 * Keywords: comunidad, guías, noticias
 * Viewport Width: 1400
 * Block Types: core/post-content
 * Post Types: page, wp_template
 * Description: Centros de comunidad, guías destacadas y últimas noticias.
 *
 * @package Nexo_Play
 */

?>
<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Cabecera de la comunidad', 'nexo-play' ); ?>"},"align":"full","className":"np-soporte-cabecera","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull np-soporte-cabecera" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:heading {"level":1,"fontSize":"xx-large"} -->
<h1 class="wp-block-heading has-xx-large-font-size"><?php esc_html_e( 'Actividad de la comunidad', 'nexo-play' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size"><?php esc_html_e( 'La comunidad y el contenido oficial de todos los juegos: noticias, guías, capturas y debates.', 'nexo-play' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Centros de la comunidad', 'nexo-play' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|60"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:nexo-play/estanteria {"titulo":"Centros de comunidad populares","criterio":"ventas","cantidad":8} /-->

<!-- wp:heading {"className":"np-titulo-linea"} -->
<h2 class="wp-block-heading np-titulo-linea"><?php esc_html_e( 'Guías destacadas', 'nexo-play' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:columns {"className":"np-guias","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
<div class="wp-block-columns np-guias"><!-- wp:column {"className":"np-guia"} -->
<div class="wp-block-column np-guia"><!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"np-guia__img"} -->
<figure class="wp-block-image size-full np-guia__img"><img src="<?php echo np_asset( 'demo/reinos-de-ceniza-captura-2.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="" style="aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong><?php esc_html_e( 'Guía para principiantes de Reinos de Ceniza', 'nexo-play' ); ?></strong><br><?php esc_html_e( 'Por Laura_GG · 1.204 valoraciones', 'nexo-play' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"np-guia"} -->
<div class="wp-block-column np-guia"><!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"np-guia__img"} -->
<figure class="wp-block-image size-full np-guia__img"><img src="<?php echo np_asset( 'demo/pabellon-9-captura-3.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="" style="aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong><?php esc_html_e( 'Los 10 mejores escondites de Pabellón 9', 'nexo-play' ); ?></strong><br><?php esc_html_e( 'Por NocheEterna · 877 valoraciones', 'nexo-play' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"np-guia"} -->
<div class="wp-block-column np-guia"><!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"np-guia__img"} -->
<figure class="wp-block-image size-full np-guia__img"><img src="<?php echo np_asset( 'demo/el-cartografo-captura-2.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="" style="aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong><?php esc_html_e( 'Cómo conseguir 3 estrellas en todos los mapas de El Cartógrafo', 'nexo-play' ); ?></strong><br><?php esc_html_e( 'Por MapaMundi · 530 valoraciones', 'nexo-play' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"np-guia"} -->
<div class="wp-block-column np-guia"><!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"np-guia__img"} -->
<figure class="wp-block-image size-full np-guia__img"><img src="<?php echo np_asset( 'demo/neon-nocturno-captura-3.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="" style="aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong><?php esc_html_e( 'Configuración ideal para Neón Nocturno', 'nexo-play' ); ?></strong><br><?php esc_html_e( 'Por Turbo88 · 412 valoraciones', 'nexo-play' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:heading {"className":"np-titulo-linea"} -->
<h2 class="wp-block-heading np-titulo-linea"><?php esc_html_e( 'Últimas noticias', 'nexo-play' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:query {"queryId":21,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"className":"np-noticias"} -->
<div class="wp-block-query np-noticias"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"className":"np-noticia-tarjeta","layout":{"type":"default"}} -->
<div class="wp-block-group np-noticia-tarjeta"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->

<!-- wp:group {"className":"np-noticia-tarjeta__texto","layout":{"type":"default"}} -->
<div class="wp-block-group np-noticia-tarjeta__texto"><!-- wp:post-date {"format":"j M Y"} /-->

<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"medium"} /-->

<!-- wp:post-excerpt {"excerptLength":18,"fontSize":"small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Todavía no hay noticias.', 'nexo-play' ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->
