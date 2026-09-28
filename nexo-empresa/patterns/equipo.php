<?php
/**
 * Title: Equipo
 * Slug: nexo-empresa/equipo
 * Categories: nexo-nosotros, team
 * Keywords: equipo, personas, miembros, staff
 * Viewport Width: 1400
 * Description: Cuatro personas del equipo con foto, nombre, cargo y redes.
 *
 * @package Nexo_Empresa
 */

?>
<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Equipo', 'nexo-empresa' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|50"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","contentSize":"680px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","className":"is-style-antetitulo nexo-anim-subir"} -->
<p class="has-text-align-center is-style-antetitulo nexo-anim-subir"><?php esc_html_e( 'Nuestro equipo', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","className":"nexo-anim-subir"} -->
<h2 class="wp-block-heading has-text-align-center nexo-anim-subir"><?php esc_html_e( 'Las personas detrás de cada proyecto', 'nexo-empresa' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"is-style-destacado nexo-anim-subir"} -->
<p class="has-text-align-center is-style-destacado nexo-anim-subir"><?php esc_html_e( 'Sustituye estas imágenes por fotos reales de tu equipo: generan mucha más confianza.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"className":"nexo-anim-subir nexo-retraso-1","style":{"spacing":{"blockGap":"0.35rem"}}} -->
<div class="wp-block-column nexo-anim-subir nexo-retraso-1"><!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"nexo-avatar"} -->
<figure class="wp-block-image size-full nexo-avatar"><img src="<?php echo nexo_img( 'avatar-1.svg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size" style="margin-top:var(--wp--preset--spacing--20)">Laura García</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"nexo-texto-suave","fontSize":"small"} -->
<p class="nexo-texto-suave has-small-font-size"><?php esc_html_e( 'Directora general', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"contrast-2","iconColorValue":"#566178","size":"has-small-icon-size","className":"is-style-logos-only"} -->
<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"linkedin"} /-->

<!-- wp:social-link {"url":"#","service":"x"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"nexo-anim-subir nexo-retraso-2","style":{"spacing":{"blockGap":"0.35rem"}}} -->
<div class="wp-block-column nexo-anim-subir nexo-retraso-2"><!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"nexo-avatar"} -->
<figure class="wp-block-image size-full nexo-avatar"><img src="<?php echo nexo_img( 'avatar-2.svg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size" style="margin-top:var(--wp--preset--spacing--20)">Marcos Ruiz</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"nexo-texto-suave","fontSize":"small"} -->
<p class="nexo-texto-suave has-small-font-size"><?php esc_html_e( 'Director creativo', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"contrast-2","iconColorValue":"#566178","size":"has-small-icon-size","className":"is-style-logos-only"} -->
<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"linkedin"} /-->

<!-- wp:social-link {"url":"#","service":"x"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"nexo-anim-subir nexo-retraso-3","style":{"spacing":{"blockGap":"0.35rem"}}} -->
<div class="wp-block-column nexo-anim-subir nexo-retraso-3"><!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"nexo-avatar"} -->
<figure class="wp-block-image size-full nexo-avatar"><img src="<?php echo nexo_img( 'avatar-3.svg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size" style="margin-top:var(--wp--preset--spacing--20)">Ana Sánchez</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"nexo-texto-suave","fontSize":"small"} -->
<p class="nexo-texto-suave has-small-font-size"><?php esc_html_e( 'Responsable de proyectos', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"contrast-2","iconColorValue":"#566178","size":"has-small-icon-size","className":"is-style-logos-only"} -->
<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"linkedin"} /-->

<!-- wp:social-link {"url":"#","service":"x"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"nexo-anim-subir nexo-retraso-4","style":{"spacing":{"blockGap":"0.35rem"}}} -->
<div class="wp-block-column nexo-anim-subir nexo-retraso-4"><!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"nexo-avatar"} -->
<figure class="wp-block-image size-full nexo-avatar"><img src="<?php echo nexo_img( 'avatar-4.svg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size" style="margin-top:var(--wp--preset--spacing--20)">Pablo Castro</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"nexo-texto-suave","fontSize":"small"} -->
<p class="nexo-texto-suave has-small-font-size"><?php esc_html_e( 'Desarrollo y tecnología', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"contrast-2","iconColorValue":"#566178","size":"has-small-icon-size","className":"is-style-logos-only"} -->
<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"linkedin"} /-->

<!-- wp:social-link {"url":"#","service":"x"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
