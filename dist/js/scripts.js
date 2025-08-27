document.addEventListener('DOMContentLoaded', (event) => {
    (function($) {
        'use strict';

        // OBRIGATÓRIO: Variáveis PHP recebidas via wp_localize_script
        const qrcode10_vars = window.qrcode10_vars || {};
        const isPremiumActive = qrcode10_vars.isPremiumActive;
        
        // --- LÓGICA DE HABILITAÇÃO/DESABILITAÇÃO (UI) ---
        // Essencial para desabilitar visualmente os campos e botões PREMIUM (congelar).
        if (typeof isPremiumActive !== 'undefined') {
            const premiumFields = $('.qrcode10-premium-field');
            const premiumInputs = $('.qrcode10-premium-input');
            if (!isPremiumActive) {
                // Versão FREE: Desabilita visualmente e funcionalmente
                premiumFields.addClass('disabled-field');
                premiumInputs.prop('disabled', true);
            } else {
                // Versão PREMIUM: Habilita
                premiumFields.removeClass('disabled-field');
                premiumInputs.prop('disabled', false);
            }
        }
        
        // --- LÓGICA DO GERADOR DE QR CODE ---
        const qrcodeContainer = document.getElementById('qrcode-preview');
        if (qrcodeContainer) {
            const qrcodeInstance = new QRCodeStyling({
                width: 200,
                height: 200,
                type: "svg",
                data: document.getElementById('qrcode-url').value,
                image: "", 
                dotsOptions: {
                    color: "#000000",
                    type: "square" 
                },
                backgroundOptions: {
                    color: "#ffffff",
                },
                cornersSquareOptions: {
                    color: "#000000",
                    type: "square" 
                },
                cornersDotOptions: {
                    color: "#000000"
                }
            });

            qrcodeInstance.append(qrcodeContainer);

            function updateQRCode() {
                const url = $('#qrcode-url').val() || 'https://google.com';
                const size = parseInt($('#qrcode-size').val()) || 200;
                const dotsColor = $('#qrcode-color').val() || '#000000';
                const cornersSquareColor = $('#qrcode-eyes-color').val() || '#000000';
                const backgroundColor = $('#qrcode-bg-color').val() || '#ffffff';
                const transparentBg = $('#qrcode-bg-transparent').is(':checked');
                
                // FORÇANDO PADRÕES FREE (MÓDULOS E CANTOS)
                let modulesFormat = 'square';
                let cornersFormat = 'square';
                let dotsColorOptions = { color: dotsColor };

                // Se o cliente tem PREMIUM, use os valores do input desabilitado
                if (isPremiumActive) {
                    modulesFormat = $('#qrcode-dots-type').val() || 'square';
                    cornersFormat = $('#qrcode-corners-type').val() || 'square';
                    
                    const useGradient = $('#qrcode-gradient-checkbox').is(':checked');
                    if (useGradient) {
                        const color1 = $('#qrcode-gradient-color1').val() || '#ff0000';
                        const color2 = $('#qrcode-gradient-color2').val() || '#0000ff';
                        const gradientType = $('#qrcode-gradient-type').val() || 'radial';
                        dotsColorOptions = {
                            type: 'gradient',
                            gradient: {
                                type: gradientType,
                                colorStops: [
                                    { offset: 0, color: color1 },
                                    { offset: 1, color: color2 }
                                ]
                            }
                        };
                    } else {
                        dotsColorOptions = { color: dotsColor };
                    }
                }

                qrcodeInstance.update({
                    data: url,
                    width: size,
                    height: size,
                    dotsOptions: {
                        ...dotsColorOptions,
                        type: modulesFormat
                    },
                    cornersSquareOptions: {
                        color: cornersSquareColor,
                        type: cornersFormat
                    },
                    cornersDotOptions: {
                        color: cornersSquareColor
                    },
                    backgroundOptions: {
                        color: transparentBg ? 'rgba(0,0,0,0)' : backgroundColor
                    }
                });
            }

            // --- LÓGICA DO ÍCONE (Upload) ---
            // É Premium, mas o campo está desabilitado na FREE.
            $('#qrcode-icon').on('change', function(e) {
                if (isPremiumActive) { 
                    const file = e.target.files[0];
                    if (file) {
                        const imageUrl = URL.createObjectURL(file);
                        qrcodeInstance.update({
                            image: imageUrl
                        });
                    }
                }
            });

            $('#qrcode-generator-form input, #qrcode-generator-form select').on('input change', updateQRCode);
            
            // --- LÓGICA DE DOWNLOAD ---
            const downloadPngBtn = $('#download-png-btn');
            const downloadSvgBtn = $('#download-svg-btn');
            
            downloadPngBtn.on('click', function() {
                const transparentBg = $('#qrcode-bg-transparent').is(':checked');
                qrcodeInstance.download({ 
                    name: 'qrcode', 
                    extension: 'png',
                    skipBackground: transparentBg
                });
            });

            downloadSvgBtn.on('click', function() {
                // CHECK DE SEGURANÇA: Só permite download SVG se for Premium
                if (isPremiumActive) {
                    qrcodeInstance.download({ name: 'qrcode', extension: 'svg' });
                } else {
                    alert('Este recurso é exclusivo da Versão Premium.');
                }
            });

            updateQRCode();
        }

    })(jQuery);
});