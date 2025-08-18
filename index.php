<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANDVIC - Arquitectura Passivhaus</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Estilos existentes... */

        /* Promociones Section - Estilos mejorados */
        .promociones {
            padding: 80px 0;
            background: #f8f9fa;
        }

        .promo-lema {
            text-align: center;
            font-size: 1.5rem;
            color: #2c3e50;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.8s ease;
        }

        .promo-lema.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .icono-llave {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }

        /* Promociones Carrusel - Estilos mejorados */
        .promo-carousel-container {
            position: relative;
            margin: 0 auto;
            max-width: 1200px;
            overflow: hidden;
            padding: 20px 0;
        }

        .promo-carousel {
            display: flex;
            transition: transform 0.6s ease;
            gap: 30px;
            padding: 0 60px;
        }

        .promo-card {
            min-width: calc(25% - 23px);
            height: 350px;
            position: relative;
            flex-shrink: 0;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.5s ease;
        }

        .promo-card-content {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 30px;
            color: white;
            background: rgba(39, 174, 96, 0.9);
            transition: all 0.5s ease;
        }

        .promo-card:hover .promo-card-content {
            background: rgba(39, 174, 96, 0.7);
            backdrop-filter: blur(5px);
        }

        .promo-card h3 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 600;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
        }

        .promo-card ul {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 100%;
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transition: all 0.5s ease;
        }

        .promo-card:hover ul {
            max-height: 200px;
            opacity: 1;
        }

        .promo-card li {
            margin: 12px 0;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            color: white;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .promo-card li:hover {
            color: #f1c40f;
            padding-left: 10px;
        }

        /* Controles del carrusel promociones */
        .promo-prev, .promo-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(39, 174, 96, 0.9);
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            border-radius: 50%;
            padding: 10px;
            width: 50px;
            height: 50px;
            z-index: 10;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .promo-prev:hover, .promo-next:hover {
            background: #2c3e50;
            transform: translateY(-50%) scale(1.1);
        }

        .promo-prev {
            left: 0;
        }

        .promo-next {
            right: 0;
        }

        .promo-indicators {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }

        .promo-indicator {
            width: 12px;
            height: 12px;
            background: #ddd;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .promo-indicator.active, .promo-indicator:hover {
            background: #27ae60;
            transform: scale(1.3);
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .promo-card {
                min-width: calc(33.33% - 20px);
                height: 320px;
            }
        }

        @media (max-width: 992px) {
            .promo-card {
                min-width: calc(50% - 15px);
                height: 300px;
            }
            
            .promo-lema {
                font-size: 1.3rem;
            }
            
            .icono-llave {
                width: 35px;
                height: 35px;
            }
        }

        @media (max-width: 768px) {
            .promo-card {
                min-width: 100%;
                height: 280px;
                max-width: 400px;
                margin: 0 auto;
            }
            
            .promo-carousel {
                padding: 0 50px;
            }
            
            .promo-lema {
                font-size: 1.2rem;
                flex-direction: column;
                gap: 8px;
            }
        }

        @media (max-width: 576px) {
            .promo-card {
                height: 250px;
            }
            
            .promo-card h3 {
                font-size: 1.5rem;
            }
            
            .promo-card li {
                font-size: 0.9rem;
            }
            
            .promo-prev, .promo-next {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header y otras secciones... -->

    <!-- Promociones Section -->
    <section class="promociones" id="promociones">
        <div class="container">
            <h2 class="section-title">Nuestras Principales Promociones</h2>
            <p class="promo-lema">
                <img src="./llave.png" alt="Llave" class="icono-llave">
                VIVA DONDE SUEÑA VIVIR
            </p>

            <div class="promo-carousel-container">
                <div class="promo-carousel">
                    <!-- Tarjeta 1 - Barcelona -->
                    <div class="promo-card">
                        <div class="promo-card-content">
                            <h3>Barcelona</h3>
                            <ul>
                                <li>Sitges</li>
                                <li>Vilanova i la Geltrú</li>
                                <li>Badalona</li>
                                <li>Collbató</li>
                                <li>La Llagosta</li>
                                <li>Esparreguera</li>
                                <li>Montgat</li>
                                <li>Sant Andreu de la Barca</li>
                                <li>Santa Coloma Cervelló</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Tarjeta 2 - Tarragona -->
                    <div class="promo-card">
                        <div class="promo-card-content">
                            <h3>Tarragona</h3>
                            <ul>
                                <li>El Vendrell</li>
                                <li>Sant Carles de la Ràpita</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Tarjeta 3 - Girona -->
                    <div class="promo-card">
                        <div class="promo-card-content">
                            <h3>Girona</h3>
                            <ul>
                                <li>Lloret de Mar</li>
                                <li>Llançà</li>
                                <li>Roses</li>
                                <li>Figueres</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Tarjeta 4 - Lleida -->
                    <div class="promo-card">
                        <div class="promo-card-content">
                            <h3>Lleida</h3>
                            <ul>
                                <li>Vielha</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Tarjeta 5 - Otras zonas -->
                    <div class="promo-card">
                        <div class="promo-card-content">
                            <h3>Otras zonas</h3>
                            <ul>
                                <li>Andorra</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Controles del carrusel -->
                <button class="promo-prev">‹</button>
                <button class="promo-next">›</button>
            </div>
            
            <!-- Indicadores -->
            <div class="promo-indicators">
                <span class="promo-indicator active"></span>
                <span class="promo-indicator"></span>
                <span class="promo-indicator"></span>
                <span class="promo-indicator"></span>
                <span class="promo-indicator"></span>
            </div>
        </div>
    </section>

    <!-- Otras secciones... -->

    <script>
        // Carrusel de promociones - Versión mejorada
        let currentPromoSlide = 0;
        const promoCards = document.querySelectorAll('.promo-card');
        const promoIndicators = document.querySelectorAll('.promo-indicator');
        const promoCarousel = document.querySelector('.promo-carousel');
        const cardWidth = promoCards[0].offsetWidth + 30; // Ancho de la tarjeta + gap

        function updatePromoCarousel() {
            const offset = -currentPromoSlide * cardWidth;
            promoCarousel.style.transform = `translateX(${offset}px)`;
            
            promoIndicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === currentPromoSlide);
            });
        }

        function movePromoCarousel(direction) {
            const totalSlides = promoCards.length;
            const visibleSlides = Math.floor(document.querySelector('.promo-carousel-container').offsetWidth / cardWidth);
            
            currentPromoSlide += direction;
            
            if (currentPromoSlide < 0) {
                currentPromoSlide = totalSlides - visibleSlides;
            } else if (currentPromoSlide > totalSlides - visibleSlides) {
                currentPromoSlide = 0;
            }
            
            updatePromoCarousel();
        }

        // Event listeners para los botones
        document.querySelector('.promo-prev').addEventListener('click', () => movePromoCarousel(-1));
        document.querySelector('.promo-next').addEventListener('click', () => movePromoCarousel(1));

        // Event listeners para los indicadores
        promoIndicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                currentPromoSlide = index;
                updatePromoCarousel();
            });
        });

        // Auto-avance del carrusel
        let promoInterval = setInterval(() => {
            movePromoCarousel(1);
        }, 5000);

        // Pausar al pasar el ratón
        const promoContainer = document.querySelector('.promo-carousel-container');
        promoContainer.addEventListener('mouseenter', () => {
            clearInterval(promoInterval);
        });

        promoContainer.addEventListener('mouseleave', () => {
            promoInterval = setInterval(() => {
                movePromoCarousel(1);
            }, 5000);
        });

        // Actualizar en redimensionamiento de pantalla
        window.addEventListener('resize', () => {
            updatePromoCarousel();
        });

        // Inicializar
        updatePromoCarousel();
    </script>
</body>
</html>