<?php
/**
 * Title: Dos paneles de etiquetas destacadas
 * Slug: nexo-play/dos-paneles
 * Categories: nexo-play
 * Keywords: géneros, etiquetas, paneles
 * Viewport Width: 1400
 * Description: Dos géneros destacados, cada uno con cuatro juegos. Cambia el género en la barra lateral.
 *
 * @package Nexo_Play
 */

?>
<!-- wp:columns {"className":"np-dos-paneles","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns np-dos-paneles"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:nexo-play/estanteria {"titulo":"Juegos de estrategia","subtitulo":"Etiqueta destacada","diseno":"panel","genero":"estrategia","cantidad":4} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:nexo-play/estanteria {"titulo":"Juegos de terror","subtitulo":"Etiqueta destacada","diseno":"panel","genero":"terror","cantidad":4} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
