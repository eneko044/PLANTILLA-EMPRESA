<?php
/**
 * Title: Cabecera de página interior
 * Slug: nexo-empresa/cabecera-pagina
 * Categories: nexo-portadas
 * Keywords: título, cabecera, página
 * Viewport Width: 1400
 * Description: Banda con antetítulo, título y entradilla centrados para empezar cualquier página interior.
 *
 * @package Nexo_Empresa
 */

echo nexo_banda_titulo( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- la función escapa cada texto.
	__( 'Tu sección', 'nexo-empresa' ),
	__( 'Título de la página', 'nexo-empresa' ),
	__( 'Una frase breve que explique qué va a encontrar el visitante en esta página.', 'nexo-empresa' )
);
