<?php
/**
 * Title: Servicio destacado con imagen
 * Slug: nexo-empresa/servicios-imagen
 * Categories: nexo-servicios, services
 * Keywords: servicio, imagen, texto, detalle
 * Viewport Width: 1400
 * Description: Imagen a un lado y, al otro, título, texto y tres puntos con icono.
 *
 * @package Nexo_Empresa
 */

?>
<!-- wp:group {"metadata":{"name":"<?php esc_attr_e( 'Servicio destacado', 'nexo-empresa' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|50"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|70","left":"var:preset|spacing|70"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-sombra nexo-anim-izquierda"} -->
<figure class="wp-block-image size-large is-style-sombra nexo-anim-izquierda"><img src="<?php echo nexo_img( 'escritorio.jpg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="<?php esc_attr_e( 'Mesa de trabajo con ordenador y tableta', 'nexo-empresa' ); ?>" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"50%","className":"nexo-anim-derecha"} -->
<div class="wp-block-column is-vertically-aligned-center nexo-anim-derecha" style="flex-basis:50%"><!-- wp:paragraph {"className":"is-style-antetitulo nexo-anim-subir"} -->
<p class="is-style-antetitulo nexo-anim-subir"><?php esc_html_e( 'Servicio destacado', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"nexo-anim-subir"} -->
<h2 class="wp-block-heading nexo-anim-subir"><?php esc_html_e( 'Una web que trabaja por ti las 24 horas', 'nexo-empresa' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"is-style-destacado nexo-anim-subir"} -->
<p class="is-style-destacado nexo-anim-subir"><?php esc_html_e( 'Diseñamos y desarrollamos sitios web a medida que convierten visitas en clientes, con un panel sencillo para que tú mismo actualices el contenido.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:columns {"className":"is-not-stacked-on-mobile","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
<div class="wp-block-columns is-not-stacked-on-mobile"><!-- wp:column {"width":"56px"} -->
<div class="wp-block-column" style="flex-basis:56px"><!-- wp:nexo/icono {"icono":"smartphone","tamano":20} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size"><?php esc_html_e( 'Adaptada a móviles', 'nexo-empresa' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"nexo-texto-suave","fontSize":"small"} -->
<p class="nexo-texto-suave has-small-font-size"><?php esc_html_e( 'Se ve perfecta en cualquier pantalla, desde el teléfono hasta el ordenador.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"className":"is-not-stacked-on-mobile","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
<div class="wp-block-columns is-not-stacked-on-mobile"><!-- wp:column {"width":"56px"} -->
<div class="wp-block-column" style="flex-basis:56px"><!-- wp:nexo/icono {"icono":"search","tamano":20} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size"><?php esc_html_e( 'Preparada para Google', 'nexo-empresa' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"nexo-texto-suave","fontSize":"small"} -->
<p class="nexo-texto-suave has-small-font-size"><?php esc_html_e( 'Estructura optimizada y carga rápida para aparecer en las búsquedas.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"className":"is-not-stacked-on-mobile","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
<div class="wp-block-columns is-not-stacked-on-mobile"><!-- wp:column {"width":"56px"} -->
<div class="wp-block-column" style="flex-basis:56px"><!-- wp:nexo/icono {"icono":"settings","tamano":20} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size"><?php esc_html_e( 'Fácil de gestionar', 'nexo-empresa' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"nexo-texto-suave","fontSize":"small"} -->
<p class="nexo-texto-suave has-small-font-size"><?php esc_html_e( 'Cambia textos, fotos y precios tú mismo, sin depender de nadie.', 'nexo-empresa' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-flecha"} -->
<div class="wp-block-button is-style-flecha"><a class="wp-block-button__link wp-element-button" href="<?php echo nexo_url( 'contacto' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"><?php esc_html_e( 'Solicitar propuesta', 'nexo-empresa' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
