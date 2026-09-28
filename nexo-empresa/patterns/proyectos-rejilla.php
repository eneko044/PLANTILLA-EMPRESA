<?php
/**
 * Title: Proyectos en rejilla
 * Slug: nexo-empresa/proyectos-rejilla
 * Categories: nexo-proyectos, portfolio, gallery
 * Keywords: proyectos, portfolio, trabajos, casos de éxito, galería
 * Viewport Width: 1400
 * Description: Seis proyectos con imagen, categoría y título en dos filas.
 *
 * @package Nexo_Empresa
 */

?>
<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Proyectos', 'nexo-empresa' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|50"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","contentSize":"620px","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-antetitulo nexo-anim-subir"} -->
<p class="is-style-antetitulo nexo-anim-subir"><?php esc_html_e( 'Casos de éxito', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"nexo-anim-subir"} -->
<h2 class="wp-block-heading nexo-anim-subir"><?php esc_html_e( 'Proyectos de los que estamos orgullosos', 'nexo-empresa' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"is-style-destacado nexo-anim-subir"} -->
<p class="is-style-destacado nexo-anim-subir"><?php esc_html_e( 'Una selección de trabajos recientes para clientes de distintos sectores.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo nexo_url( 'contacto' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Hablemos de tu proyecto', 'nexo-empresa' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"className":"nexo-anim-subir nexo-retraso-1","style":{"spacing":{"blockGap":"0.4rem"}}} -->
<div class="wp-block-column nexo-anim-subir nexo-retraso-1"><!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"nexo-proyecto"} -->
<figure class="wp-block-image size-large nexo-proyecto"><img src="<?php echo nexo_img( 'proyecto-1.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="<?php esc_attr_e( 'Identidad para estudio creativo', 'nexo-empresa' ); ?>" style="aspect-ratio:4/3;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"is-style-antetitulo","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}}} -->
<p class="is-style-antetitulo" style="margin-top:var(--wp--preset--spacing--20)"><?php esc_html_e( 'Branding', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Identidad para estudio creativo', 'nexo-empresa' ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"nexo-anim-subir nexo-retraso-2","style":{"spacing":{"blockGap":"0.4rem"}}} -->
<div class="wp-block-column nexo-anim-subir nexo-retraso-2"><!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"nexo-proyecto"} -->
<figure class="wp-block-image size-large nexo-proyecto"><img src="<?php echo nexo_img( 'proyecto-2.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="<?php esc_attr_e( 'Tienda online de artesanía', 'nexo-empresa' ); ?>" style="aspect-ratio:4/3;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"is-style-antetitulo","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}}} -->
<p class="is-style-antetitulo" style="margin-top:var(--wp--preset--spacing--20)"><?php esc_html_e( 'Web · Comercio electrónico', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Tienda online de artesanía', 'nexo-empresa' ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"nexo-anim-subir nexo-retraso-3","style":{"spacing":{"blockGap":"0.4rem"}}} -->
<div class="wp-block-column nexo-anim-subir nexo-retraso-3"><!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"nexo-proyecto"} -->
<figure class="wp-block-image size-large nexo-proyecto"><img src="<?php echo nexo_img( 'proyecto-3.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="<?php esc_attr_e( 'Campaña de lanzamiento', 'nexo-empresa' ); ?>" style="aspect-ratio:4/3;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"is-style-antetitulo","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}}} -->
<p class="is-style-antetitulo" style="margin-top:var(--wp--preset--spacing--20)"><?php esc_html_e( 'Marketing', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Campaña de lanzamiento', 'nexo-empresa' ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"className":"nexo-anim-subir nexo-retraso-1","style":{"spacing":{"blockGap":"0.4rem"}}} -->
<div class="wp-block-column nexo-anim-subir nexo-retraso-1"><!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"nexo-proyecto"} -->
<figure class="wp-block-image size-large nexo-proyecto"><img src="<?php echo nexo_img( 'proyecto-4.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="<?php esc_attr_e( 'Rediseño de oficinas', 'nexo-empresa' ); ?>" style="aspect-ratio:4/3;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"is-style-antetitulo","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}}} -->
<p class="is-style-antetitulo" style="margin-top:var(--wp--preset--spacing--20)"><?php esc_html_e( 'Interiorismo', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Rediseño de oficinas', 'nexo-empresa' ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"nexo-anim-subir nexo-retraso-2","style":{"spacing":{"blockGap":"0.4rem"}}} -->
<div class="wp-block-column nexo-anim-subir nexo-retraso-2"><!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"nexo-proyecto"} -->
<figure class="wp-block-image size-large nexo-proyecto"><img src="<?php echo nexo_img( 'proyecto-5.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="<?php esc_attr_e( 'Aplicación de reservas', 'nexo-empresa' ); ?>" style="aspect-ratio:4/3;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"is-style-antetitulo","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}}} -->
<p class="is-style-antetitulo" style="margin-top:var(--wp--preset--spacing--20)"><?php esc_html_e( 'Desarrollo', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Aplicación de reservas', 'nexo-empresa' ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"nexo-anim-subir nexo-retraso-3","style":{"spacing":{"blockGap":"0.4rem"}}} -->
<div class="wp-block-column nexo-anim-subir nexo-retraso-3"><!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"nexo-proyecto"} -->
<figure class="wp-block-image size-large nexo-proyecto"><img src="<?php echo nexo_img( 'proyecto-6.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="<?php esc_attr_e( 'Plan de expansión', 'nexo-empresa' ); ?>" style="aspect-ratio:4/3;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"is-style-antetitulo","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}}} -->
<p class="is-style-antetitulo" style="margin-top:var(--wp--preset--spacing--20)"><?php esc_html_e( 'Consultoría', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Plan de expansión', 'nexo-empresa' ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
