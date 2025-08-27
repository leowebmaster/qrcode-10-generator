<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="wrap qrcode10-admin-page">
    <h1><?php esc_html_e( 'Configurações do QR Code 10', 'qrcode-10-generator' ); ?></h1>
    <p><?php esc_html_e( 'Gerador de QR Code com funcionalidades básicas. As opções marcadas como Premium estão disponíveis na versão PRO.', 'qrcode-10-generator' ); ?></p>

    <hr>
    <form id="qrcode-generator-form">
        <div class="qrcode10-content-grid">
            <div class="qrcode10-form-container">
                <h2><?php esc_html_e( 'Configurações do QR Code', 'qrcode-10-generator' ); ?></h2>
                
                <div class="qrcode10-input-group">
                    <label for="qrcode-url"><?php esc_html_e( 'URL do QR Code', 'qrcode-10-generator' ); ?></label>
                    <input type="url" id="qrcode-url" value="https://google.com" required>
                </div>
                
                <div class="qrcode10-input-group">
                    <label for="qrcode-size"><?php esc_html_e( 'Tamanho (em pixels)', 'qrcode-10-generator' ); ?></label>
                    <input type="number" id="qrcode-size" value="200" min="50" max="1000">
                </div>
                
                <div class="qrcode10-input-group">
                    <label for="qrcode-color"><?php esc_html_e( 'Cor do QR Code', 'qrcode-10-generator' ); ?></label>
                    <input type="color" id="qrcode-color" value="#000000">
                </div>

                <div class="qrcode10-input-group">
                    <label for="qrcode-eyes-color"><?php esc_html_e( 'Cor dos Olhos', 'qrcode-10-generator' ); ?></label>
                    <input type="color" id="qrcode-eyes-color" value="#000000">
                </div>

                <div class="qrcode10-input-group qrcode10-premium-field">
                    <label for="qrcode-dots-type"><?php esc_html_e( 'Formato dos Módulos', 'qrcode-10-generator' ); ?> <span class="premium-label">(<?php esc_html_e( 'Premium', 'qrcode-10-generator' ); ?>)</span></label>
                    <select id="qrcode-dots-type" class="qrcode10-premium-input">
                        <option value="square"><?php esc_html_e( 'Quadrados', 'qrcode-10-generator' ); ?></option>
                        <option value="dots"><?php esc_html_e( 'Pontos', 'qrcode-10-generator' ); ?></option>
                        <option value="rounded"><?php esc_html_e( 'Arredondado', 'qrcode-10-generator' ); ?></option>
                        <option value="classy"><?php esc_html_e( 'Clássico', 'qrcode-10-generator' ); ?></option>
                        <option value="extra-rounded"><?php esc_html_e( 'Extra Arredondado', 'qrcode-10-generator' ); ?></option>
                    </select>
                </div>

                <div class="qrcode10-input-group qrcode10-premium-field">
                    <label>
                        <input type="checkbox" id="qrcode-gradient-checkbox" class="qrcode10-premium-input"> <?php esc_html_e( 'Usar Degradê', 'qrcode-10-generator' ); ?> <span class="premium-label">(<?php esc_html_e( 'Premium', 'qrcode-10-generator' ); ?>)</span>
                    </label>
                </div>

                <div class="qrcode10-input-group qrcode10-premium-field">
                    <label for="qrcode-gradient-color1"><?php esc_html_e( 'Cor do Degradê 1', 'qrcode-10-generator' ); ?> <span class="premium-label">(<?php esc_html_e( 'Premium', 'qrcode-10-generator' ); ?>)</span></label>
                    <input type="color" id="qrcode-gradient-color1" class="qrcode10-premium-input" value="#ff0000">
                </div>

                <div class="qrcode10-input-group qrcode10-premium-field">
                    <label for="qrcode-gradient-color2"><?php esc_html_e( 'Cor do Degradê 2', 'qrcode-10-generator' ); ?> <span class="premium-label">(<?php esc_html_e( 'Premium', 'qrcode-10-generator' ); ?>)</span></label>
                    <input type="color" id="qrcode-gradient-color2" class="qrcode10-premium-input" value="#0000ff">
                </div>
                
                <div class="qrcode10-input-group qrcode10-premium-field">
                    <label for="qrcode-gradient-type"><?php esc_html_e( 'Tipo de Degradê', 'qrcode-10-generator' ); ?> <span class="premium-label">(<?php esc_html_e( 'Premium', 'qrcode-10-generator' ); ?>)</span></label>
                    <select id="qrcode-gradient-type" class="qrcode10-premium-input">
                        <option value="radial"><?php esc_html_e( 'Radial', 'qrcode-10-generator' ); ?></option>
                        <option value="linear"><?php esc_html_e( 'Linear', 'qrcode-10-generator' ); ?></option>
                    </select>
                </div>

                <div class="qrcode10-input-group qrcode10-premium-field">
                    <label for="qrcode-corners-type"><?php esc_html_e( 'Formato dos Cantos dos Olhos', 'qrcode-10-generator' ); ?> <span class="premium-label">(<?php esc_html_e( 'Premium', 'qrcode-10-generator' ); ?>)</span></label>
                    <select id="qrcode-corners-type" class="qrcode10-premium-input">
                        <option value="square"><?php esc_html_e( 'Quadrados', 'qrcode-10-generator' ); ?></option>
                        <option value="extra-rounded"><?php esc_html_e( 'Extra Arredondado', 'qrcode-10-generator' ); ?></option>
                        <option value="dot"><?php esc_html_e( 'Pontos', 'qrcode-10-generator' ); ?></option>
                        <option value="classy"><?php esc_html_e( 'Clássico', 'qrcode-10-generator' ); ?></option>
                        <option value="rounded"><?php esc_html_e( 'Arredondado', 'qrcode-10-generator' ); ?></option>
                    </select>
                </div>
                
                <div class="qrcode10-input-group qrcode10-premium-field">
                    <label for="qrcode-icon"><?php esc_html_e( 'Ícone/Imagem no Centro (upload)', 'qrcode-10-generator' ); ?> <span class="premium-label">(<?php esc_html_e( 'Premium', 'qrcode-10-generator' ); ?>)</span></label>
                    <input type="file" id="qrcode-icon" class="qrcode10-premium-input" accept="image/*">
                    <p style="margin-top: 5px;"><?php esc_html_e( 'Disponível na versão PRO.', 'qrcode-10-generator' ); ?></p>
                </div>
                
                <div class="qrcode10-input-group">
                    <label for="qrcode-bg-color"><?php esc_html_e( 'Cor de Fundo', 'qrcode-10-generator' ); ?></label>
                    <input type="color" id="qrcode-bg-color" value="#FFFFFF">
                </div>
                
                <div class="qrcode10-input-group">
                    <label>
                        <input type="checkbox" id="qrcode-bg-transparent"> <?php esc_html_e( 'Tornar Fundo Transparente', 'qrcode-10-generator' ); ?>
                    </label>
                </div>

                <div class="qrcode10-input-group">
                    <button id="qrcode-generate-btn" class="button button-primary" type="button" style="display: none;"><?php esc_html_e( 'Gerar QR Code', 'qrcode-10-generator' ); ?></button>
                </div>
            </div>
            
            <div class="qrcode10-preview-container">
                <h2><?php esc_html_e( 'Pré-visualização', 'qrcode-10-generator' ); ?></h2>
                <div id="qrcode-preview" class="qrcode10-preview"></div>
                <div id="qrcode-download-options">
                    <button id="download-png-btn" class="button button-primary" type="button"><?php esc_html_e( 'Baixar PNG', 'qrcode-10-generator' ); ?></button>
                    <button id="download-svg-btn" class="button button-secondary qrcode10-premium-input" type="button"><?php esc_html_e( 'Baixar SVG', 'qrcode-10-generator' ); ?> (<?php esc_html_e( 'Premium', 'qrcode-10-generator' ); ?>)</button>
                    
                    <p style="margin-top: 15px; text-align: center;"><?php esc_html_e( 'Download SVG e outros recursos avançados disponíveis na versão PRO.', 'qrcode-10-generator' ); ?></p>
                </div>
            </div>
        </div>
    </form>
</div>