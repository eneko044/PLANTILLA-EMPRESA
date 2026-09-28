<?php
/**
 * Title: Plantilla: entrada
 * Slug: nexo-empresa/plantilla-entrada
 * Categories: nexo-blog
 * Keywords: entrada
 * Viewport Width: 1400
 * Inserter: no
 * Description: Entrada individual del blog.
 *
 * @package Nexo_Empresa
 */

?>
<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0"}}},"layout":{"type":"default"}} -->
<main class="wp-block-group" style="margin-top:0"><!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|30"}},"gradient":"suave","layout":{"type":"constrained","contentSize":"820px"}} -->
<div class="wp-block-group alignfull has-suave-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:post-terms {"term":"category","textAlign":"center","className":"is-style-antetitulo"} /-->

<!-- wp:post-title {"textAlign":"center","level":1,"fontSize":"xxx-large"} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"0.5rem"}},"fontSize":"small","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group has-small-font-size"><!-- wp:post-author-name /-->

<!-- wp:paragraph -->
<p>·</p>
<!-- /wp:paragraph -->

<!-- wp:post-date /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:post-featured-image {"aspectRatio":"16/9","align":"wide"} /-->

<!-- wp:post-content {"layout":{"type":"constrained"}} /-->

<!-- wp:post-terms {"term":"post_tag","prefix":"<?php esc_attr_e( 'Etiquetas: ', 'nexo-empresa' ); ?>","fontSize":"small"} /-->

<!-- wp:separator {"className":"is-style-wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|40"}}}} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--40)"/>
<!-- /wp:separator -->

<!-- wp:post-navigation-link {"type":"previous","label":"<?php esc_attr_e( 'Anterior', 'nexo-empresa' ); ?>","showTitle":true,"arrow":"arrow"} /-->

<!-- wp:post-navigation-link {"label":"<?php esc_attr_e( 'Siguiente', 'nexo-empresa' ); ?>","showTitle":true,"arrow":"arrow"} /-->

<!-- wp:comments -->
<div class="wp-block-comments"><!-- wp:comments-title /-->

<!-- wp:comment-template -->
<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--30)"><!-- wp:group {"style":{"spacing":{"blockGap":"0.6rem"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:avatar {"size":40,"style":{"border":{"radius":"999px"}}} /-->

<!-- wp:comment-author-name {"fontSize":"small"} /-->

<!-- wp:comment-date {"fontSize":"x-small"} /--></div>
<!-- /wp:group -->

<!-- wp:comment-content /-->

<!-- wp:comment-reply-link {"fontSize":"x-small"} /--></div>
<!-- /wp:group -->
<!-- /wp:comment-template -->

<!-- wp:comments-pagination -->
<!-- wp:comments-pagination-previous /-->

<!-- wp:comments-pagination-numbers /-->

<!-- wp:comments-pagination-next /-->
<!-- /wp:comments-pagination -->

<!-- wp:post-comments-form /--></div>
<!-- /wp:comments --></div>
<!-- /wp:group --></main>
<!-- /wp:group -->
