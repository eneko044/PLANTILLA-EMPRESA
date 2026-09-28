<?php
/**
 * Formulario de contacto sencillo: [nexo_contacto]
 *
 * Envía los mensajes al correo del administrador (Ajustes › Generales) o al
 * que indiques con [nexo_contacto correo="info@tuempresa.com"].
 * Incluye protección contra spam (campo trampa + nonce + tiempo mínimo).
 *
 * Si prefieres algo más completo, puedes sustituirlo por Contact Form 7,
 * WPForms o el widget de formulario de Elementor Pro.
 *
 * @package Nexo_Empresa
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Procesa el envío (se ejecuta antes de pintar la página).
 */
function nexo_contacto_procesar() {
	if ( 'POST' !== ( $_SERVER['REQUEST_METHOD'] ?? '' ) || ! isset( $_POST['nexo_contacto'] ) ) {
		return;
	}

	$volver = isset( $_POST['nexo_volver'] ) ? esc_url_raw( wp_unslash( $_POST['nexo_volver'] ) ) : '';
	$volver = wp_validate_redirect( $volver, home_url( '/' ) );
	$volver = remove_query_arg( 'nexo_contacto', $volver );

	$nonce = isset( $_POST['_nexo_nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['_nexo_nonce'] ) ) : '';
	if ( ! wp_verify_nonce( $nonce, 'nexo_contacto' ) ) {
		wp_safe_redirect( add_query_arg( 'nexo_contacto', 'error', $volver ) . '#contacto' );
		exit;
	}

	// Campo trampa: los humanos no lo ven, los robots lo rellenan.
	$trampa = isset( $_POST['nexo_web'] ) ? sanitize_text_field( wp_unslash( $_POST['nexo_web'] ) ) : '';
	// Tiempo mínimo para rellenar (los robots envían al instante).
	$inicio = isset( $_POST['nexo_t'] ) ? absint( $_POST['nexo_t'] ) : 0;
	if ( '' !== $trampa || ( time() - $inicio ) < 3 ) {
		wp_safe_redirect( add_query_arg( 'nexo_contacto', 'ok', $volver ) . '#contacto' );
		exit;
	}

	$nombre   = isset( $_POST['nexo_nombre'] ) ? sanitize_text_field( wp_unslash( $_POST['nexo_nombre'] ) ) : '';
	$email    = isset( $_POST['nexo_email'] ) ? sanitize_email( wp_unslash( $_POST['nexo_email'] ) ) : '';
	$telefono = isset( $_POST['nexo_telefono'] ) ? sanitize_text_field( wp_unslash( $_POST['nexo_telefono'] ) ) : '';
	$asunto   = isset( $_POST['nexo_asunto'] ) ? sanitize_text_field( wp_unslash( $_POST['nexo_asunto'] ) ) : '';
	$mensaje  = isset( $_POST['nexo_mensaje'] ) ? sanitize_textarea_field( wp_unslash( $_POST['nexo_mensaje'] ) ) : '';
	$acepta   = ! empty( $_POST['nexo_acepto'] );
	$destino  = isset( $_POST['nexo_destino'] ) ? sanitize_text_field( wp_unslash( $_POST['nexo_destino'] ) ) : '';

	if ( '' === $nombre || ! is_email( $email ) || '' === $mensaje || ! $acepta ) {
		wp_safe_redirect( add_query_arg( 'nexo_contacto', 'faltan', $volver ) . '#contacto' );
		exit;
	}

	// El destinatario va firmado para que nadie pueda cambiarlo desde el navegador.
	$para = get_option( 'admin_email' );
	if ( $destino ) {
		$partes = explode( '|', $destino );
		if ( 2 === count( $partes ) && hash_equals( wp_hash( $partes[0] ), $partes[1] ) && is_email( $partes[0] ) ) {
			$para = $partes[0];
		}
	}

	$titulo = sprintf(
		/* translators: 1: nombre del sitio, 2: asunto o nombre. */
		__( '[%1$s] Nuevo mensaje: %2$s', 'nexo-empresa' ),
		wp_specialchars_decode( get_bloginfo( 'name' ), ENT_QUOTES ),
		$asunto ? $asunto : $nombre
	);
	$cuerpo  = sprintf( "%s: %s\n", __( 'Nombre', 'nexo-empresa' ), $nombre );
	$cuerpo .= sprintf( "%s: %s\n", __( 'Correo', 'nexo-empresa' ), $email );
	if ( $telefono ) {
		$cuerpo .= sprintf( "%s: %s\n", __( 'Teléfono', 'nexo-empresa' ), $telefono );
	}
	$cuerpo .= "\n" . $mensaje . "\n";

	$enviado = wp_mail( $para, $titulo, $cuerpo, array( 'Reply-To: ' . $nombre . ' <' . $email . '>' ) );

	wp_safe_redirect( add_query_arg( 'nexo_contacto', $enviado ? 'ok' : 'error', $volver ) . '#contacto' );
	exit;
}
add_action( 'template_redirect', 'nexo_contacto_procesar' );

/**
 * Pinta el formulario.
 *
 * @param array $atts Atributos del shortcode.
 * @return string
 */
function nexo_contacto_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'correo'   => '',
			'boton'    => __( 'Enviar mensaje', 'nexo-empresa' ),
			'privacidad' => get_privacy_policy_url(),
		),
		$atts,
		'nexo_contacto'
	);

	$estado = isset( $_GET['nexo_contacto'] ) ? sanitize_key( wp_unslash( $_GET['nexo_contacto'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$avisos = array(
		'ok'     => array( 'ok', __( '¡Gracias! Hemos recibido tu mensaje y te responderemos muy pronto.', 'nexo-empresa' ) ),
		'faltan' => array( 'error', __( 'Revisa el formulario: nombre, correo válido, mensaje y la casilla de privacidad son obligatorios.', 'nexo-empresa' ) ),
		'error'  => array( 'error', __( 'No se ha podido enviar el mensaje. Inténtalo de nuevo o escríbenos por correo.', 'nexo-empresa' ) ),
	);

	$destino = '';
	if ( $atts['correo'] && is_email( $atts['correo'] ) ) {
		$destino = $atts['correo'] . '|' . wp_hash( $atts['correo'] );
	}

	$privacidad = $atts['privacidad']
		? sprintf( '<a href="%s" target="_blank" rel="noopener">%s</a>', esc_url( $atts['privacidad'] ), esc_html__( 'política de privacidad', 'nexo-empresa' ) )
		: esc_html__( 'política de privacidad', 'nexo-empresa' );

	ob_start();
	$pagina = get_permalink() ? get_permalink() : home_url( '/' );
	?>
	<form class="nexo-form" method="post" action="<?php echo esc_url( $pagina ); ?>#contacto">
		<?php if ( isset( $avisos[ $estado ] ) ) : ?>
			<p class="nexo-form__aviso nexo-form__aviso--<?php echo esc_attr( $avisos[ $estado ][0] ); ?>" role="status"><?php echo esc_html( $avisos[ $estado ][1] ); ?></p>
		<?php endif; ?>
		<div class="nexo-form__fila">
			<p><label for="nexo-nombre"><?php esc_html_e( 'Nombre *', 'nexo-empresa' ); ?></label><input id="nexo-nombre" name="nexo_nombre" type="text" autocomplete="name" required></p>
			<p><label for="nexo-email"><?php esc_html_e( 'Correo electrónico *', 'nexo-empresa' ); ?></label><input id="nexo-email" name="nexo_email" type="email" autocomplete="email" required></p>
		</div>
		<div class="nexo-form__fila">
			<p><label for="nexo-telefono"><?php esc_html_e( 'Teléfono', 'nexo-empresa' ); ?></label><input id="nexo-telefono" name="nexo_telefono" type="tel" autocomplete="tel"></p>
			<p><label for="nexo-asunto"><?php esc_html_e( 'Asunto', 'nexo-empresa' ); ?></label><input id="nexo-asunto" name="nexo_asunto" type="text"></p>
		</div>
		<p><label for="nexo-mensaje"><?php esc_html_e( 'Mensaje *', 'nexo-empresa' ); ?></label><textarea id="nexo-mensaje" name="nexo_mensaje" required></textarea></p>
		<p class="nexo-form__trampa" aria-hidden="true"><label for="nexo-web">Web</label><input id="nexo-web" name="nexo_web" type="text" tabindex="-1" autocomplete="off"></p>
		<p class="nexo-form__legal">
			<input id="nexo-acepto" name="nexo_acepto" type="checkbox" value="1" required>
			<label for="nexo-acepto">
				<?php
				/* translators: %s: enlace a la política de privacidad. */
				printf( esc_html__( 'He leído y acepto la %s.', 'nexo-empresa' ), $privacidad ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escapado arriba.
				?>
			</label>
		</p>
		<input type="hidden" name="nexo_contacto" value="1">
		<input type="hidden" name="nexo_volver" value="<?php echo esc_url( $pagina ); ?>">
		<input type="hidden" name="nexo_t" value="<?php echo esc_attr( time() ); ?>">
		<input type="hidden" name="nexo_destino" value="<?php echo esc_attr( $destino ); ?>">
		<?php wp_nonce_field( 'nexo_contacto', '_nexo_nonce', false ); ?>
		<div class="wp-block-button is-style-flecha"><button type="submit" class="wp-block-button__link wp-element-button"><?php echo esc_html( $atts['boton'] ); ?></button></div>
	</form>
	<?php
	return ob_get_clean();
}
add_shortcode( 'nexo_contacto', 'nexo_contacto_shortcode' );
