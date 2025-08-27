<?php
/**
 * Plugin Name:       QRCODE 10 Generator
 * Plugin URI:        https://qrcode.prositesbrasil.com.br/
 * Description:       Gerador de QR Code moderno com múltiplas opções de personalização.
 * Version:           1.0
 * Author:            leowebmaster
 * Author URI:        https://prositesbrasil.com.br/
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain:       qrcode-10-generator
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'QRCODE10_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'QRCODE10_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

class QRCODE10_Generator {

    public function __construct() {
        add_action( 'admin_menu', [ $this, 'add_admin_menu_page' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_scripts' ] );
        
        add_shortcode( 'qrcode10', [ $this, 'render_qrcode_shortcode' ] );
    }

    public function add_admin_menu_page() {
        add_menu_page(
            // String do título da página, traduzível
            esc_html__( 'QRCODE 10 Generator', 'qrcode-10-generator' ),
            // String do texto do menu, traduzível
            esc_html__( 'QRCODE 10', 'qrcode-10-generator' ), 
            'manage_options',
            'qrcode-10-generator',
            [ $this, 'render_admin_page' ],
            'dashicons-camera-alt'
        );
    }
    
    public function render_admin_page() {
        require_once QRCODE10_PLUGIN_PATH . 'includes/admin-page.php';
    }
    
    public function enqueue_admin_scripts( $hook_suffix ) {
        if ( strpos($hook_suffix, 'qrcode-10-generator') !== false ) {
            wp_enqueue_style( 'qrcode10-styles', QRCODE10_PLUGIN_URL . 'dist/css/styles.css', [], '1.0.0' );
            wp_enqueue_script( 'qrcode10-scripts', QRCODE10_PLUGIN_URL . 'dist/js/scripts.js', [ 'jquery' ], '1.0.0', true );

            $qrcode10_vars = [
                'isPremiumActive' => false,  
            ];
            
            wp_localize_script( 
                'qrcode10-scripts', 
                'qrcode10_vars', 
                $qrcode10_vars 
            );
            
            if ( $hook_suffix === 'toplevel_page_qrcode-10-generator' ) {
                wp_enqueue_script( 'qrcode-styling-lib', QRCODE10_PLUGIN_URL . 'dist/js/libs/qr-code-styling.min.js', [], '1.9.4', true );
            }
        }
    }

    public function render_qrcode_shortcode( $atts ) {
        return '<p>' . esc_html__( 'QR Code Generator (Free Version) - Configure no painel de administração.', 'qrcode-10-generator' ) . '</p>';
    }
}

new QRCODE10_Generator();