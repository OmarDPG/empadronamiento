<div class="container my-4">
    <div class="row mb-3">
        <div class="col">
            <h2 class="fw-bold text-success">Mascotas para adopción</h2>
            <p class="text-muted mb-0">Explora el catálogo y haz clic en una tarjeta para ver más detalles.</p>
        </div>
    </div>

    <?php
    // Estructura esperada: $items = [ ['id'=>1,'titulo'=>'','imagen'=>'','descripcion'=>'','extra'=>['edad'=>'','raza'=>'','sexo'=>'']], ... ]
    // Si el controlador no pasa datos, definimos ejemplo mínimo no invasivo.
    if (!isset($items) || !is_array($items) || empty($items)) {
        $items = [
            [
                'id' => 1,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Padme',
                'imagen' => base_url() . 'img/adopciones/img_21.png',
                'descripcion' => 'Pelo corto, tamaño chico',
                'extra' => [
                    'edad' => '4 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 2,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Winnie',
                'imagen' => base_url() . 'img/adopciones/img_31.png',
                'descripcion' => 'Pelo corto, tamaño mediano',
                'extra' => [
                    'edad' => '2 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            [
                'id' => 3,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Butch',
                'imagen' => base_url() . 'img/adopciones/img_42.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '9 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 4,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Chapulina',
                'imagen' => base_url() . 'img/adopciones/img_51.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '11 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 5,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Choco',
                'imagen' => base_url() . 'img/adopciones/img_52.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '7 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            [
                'id' => 6,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Milky',
                'imagen' => base_url() . 'img/adopciones/img_53.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '11 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 7,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Tiahany',
                'imagen' => base_url() . 'img/adopciones/img_54.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '3 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 8,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Capuchino',
                'imagen' => base_url() . 'img/adopciones/img_55.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '3 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            // [
            //     'id' => 9,
            //     'titulo' => 'Resguardo Temporal',
            //     'nombre' => 'Catrin',
            //     'imagen' => base_url() . 'img/adopciones/img_9.png',
            //     'descripcion' => 'Pelo corto, tamaño grande',
            //     'extra' => [
            //         'edad' => '14 años',
            //         'raza' => 'Mestizo',
            //         'sexo' => 'Macho',
            //     ]
            // ],
            [
                'id' => 10,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Wallace',
                'imagen' => base_url() . 'img/adopciones/img_2.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '',
                    'raza' => 'Mestizo',
                    'sexo' => '',
                ]
            ],
            [
                'id' => 11,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Atenea',
                'imagen' => base_url() . 'img/adopciones/img_3.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '6 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 12,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Ginebra',
                'imagen' => base_url() . 'img/adopciones/img_4.png',
                'descripcion' => 'Pelo corto, tamaño mediano',
                'extra' => [
                    'edad' => '4.5 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 13,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Mazapan',
                'imagen' => base_url() . 'img/adopciones/img_5.png',
                'descripcion' => 'Pelo corto, tamaño mediano',
                'extra' => [
                    'edad' => '6.5 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 14,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Rajah',
                'imagen' => base_url() . 'img/adopciones/img_6.png',
                'descripcion' => 'Pelo corto, tamaño mediano',
                'extra' => [
                    'edad' => '4 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            [
                'id' => 15,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Fila',
                'imagen' => base_url() . 'img/adopciones/img_7.png',
                'descripcion' => 'Pelo corto, tamaño mediano',
                'extra' => [
                    'edad' => '4 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            [
                'id' => 16,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Black',
                'imagen' => base_url() . 'img/adopciones/img_8.png',
                'descripcion' => 'Pelo corto, tamaño mediano',
                'extra' => [
                    'edad' => '6 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 17,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Bill',
                'imagen' => base_url() . 'img/adopciones/img_9.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '6 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            [
                'id' => 18,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Buzz',
                'imagen' => base_url() . 'img/adopciones/img_10.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '8 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            [
                'id' => 19,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Ely',
                'imagen' => base_url() . 'img/adopciones/img_11.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '6 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 20,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Baguira',
                'imagen' => base_url() . 'img/adopciones/img_12.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '6 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 21,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Dina',
                'imagen' => base_url() . 'img/adopciones/img_13.png',
                'descripcion' => 'Pelo corto, tamaño chico',
                'extra' => [
                    'edad' => '12 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 22,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Blacky',
                'imagen' => base_url() . 'img/adopciones/img_14.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '1.5 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            [
                'id' => 23,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Chispa',
                'imagen' => base_url() . 'img/adopciones/img_15.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '3 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            [
                'id' => 24,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Rojo',
                'imagen' => base_url() . 'img/adopciones/img_16.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '4 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            [
                'id' => 25,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Matilda',
                'imagen' => base_url() . 'img/adopciones/img_17.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '',
                    'raza' => 'Mestizo',
                    'sexo' => '',
                ]
            ],
            [
                'id' => 26,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Uva',
                'imagen' => base_url() . 'img/adopciones/img_18.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '3 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 27,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Durazno',
                'imagen' => base_url() . 'img/adopciones/img_19.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '7 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            [
                'id' => 28,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Mordisco',
                'imagen' => base_url() . 'img/adopciones/img_20.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '3 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            [
                'id' => 29,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Golden',
                'imagen' => base_url() . 'img/adopciones/img_22.png',
                'descripcion' => 'Pelo corto, tamaño  mediano',
                'extra' => [
                    'edad' => '',
                    'raza' => 'Mestizo',
                    'sexo' => '',
                ]
            ],
            [
                'id' => 30,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Reptar',
                'imagen' => base_url() . 'img/adopciones/img_23.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '7 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            // [
            //     'id' => 31,
            //     'titulo' => 'Resguardo Temporal',
            //     'nombre' => 'Grey',
            //     'imagen' => base_url() . 'img/adopciones/img_31.png',
            //     'descripcion' => 'Pelo corto, tamaño grande',
            //     'extra' => [
            //         'edad' => '',
            //         'raza' => 'Mestizo',
            //         'sexo' => '',
            //     ]
            // ],
            [
                'id' => 32,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Salmón',
                'imagen' => base_url() . 'img/adopciones/img_24.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '2 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            [
                'id' => 33,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Lucky',
                'imagen' => base_url() . 'img/adopciones/img_25.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '2 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 34,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Nube',
                'imagen' => base_url() . 'img/adopciones/img_26.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '3 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 35,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Fiona',
                'imagen' => base_url() . 'img/adopciones/img_27.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '3 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 36,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Chanel',
                'imagen' => base_url() . 'img/adopciones/img_28.png',
                'descripcion' => 'Pelo largo, tamaño chico',
                'extra' => [
                    'edad' => '10 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 37,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Piwi',
                'imagen' => base_url() . 'img/adopciones/img_29.png',
                'descripcion' => 'Pelo corto, tamaño mediano',
                'extra' => [
                    'edad' => '3 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            [
                'id' => 38,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Ramsés',
                'imagen' => base_url() . 'img/adopciones/img_30.png',
                'descripcion' => 'Pelo corto, tamaño chico',
                'extra' => [
                    'edad' => '',
                    'raza' => 'Mestizo',
                    'sexo' => '',
                ]
            ],
            [
                'id' => 39,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Napoleon',
                'imagen' => base_url() . 'img/adopciones/img_32.png',
                'descripcion' => 'Pelo corto, tamaño chico',
                'extra' => [
                    'edad' => '',
                    'raza' => 'Mestizo',
                    'sexo' => '',
                ]
            ],
            [
                'id' => 40,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Chimuela',
                'imagen' => base_url() . 'img/adopciones/img_33.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '2 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 41,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Loro',
                'imagen' => base_url() . 'img/adopciones/img_34.png',
                'descripcion' => 'Pelo corto, tamaño chico',
                'extra' => [
                    'edad' => '3 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            [
                'id' => 42,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Faisán',
                'imagen' => base_url() . 'img/adopciones/img_35.png',
                'descripcion' => 'Pelo corto, tamaño chico',
                'extra' => [
                    'edad' => '3 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 43,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Ninfa',
                'imagen' => base_url() . 'img/adopciones/img_36.png',
                'descripcion' => 'Pelo corto, tamaño chico',
                'extra' => [
                    'edad' => '1.5 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 44,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Taz',
                'imagen' => base_url() . 'img/adopciones/img_37.png',
                'descripcion' => 'Pelo corto, tamaño mediano',
                'extra' => [
                    'edad' => '1. años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            [
                'id' => 45,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Mandarino',
                'imagen' => base_url() . 'img/adopciones/img_38.png',
                'descripcion' => 'Pelo corto, tamaño chico',
                'extra' => [
                    'edad' => '',
                    'raza' => 'Mestizo',
                    'sexo' => '',
                ]
            ],
            [
                'id' => 46,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Mandarina',
                'imagen' => base_url() . 'img/adopciones/img_39.png',
                'descripcion' => 'Pelo corto, tamaño chico',
                'extra' => [
                    'edad' => '2 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 47,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Mushu',
                'imagen' => base_url() . 'img/adopciones/img_40.png',
                'descripcion' => 'Pelo corto, tamaño mediano',
                'extra' => [
                    'edad' => '4 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            [
                'id' => 48,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Kai',
                'imagen' => base_url() . 'img/adopciones/img_41.png',
                'descripcion' => 'Pelo corto, tamaño mediano',
                'extra' => [
                    'edad' => '5 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            [
                'id' => 49,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Chips',
                'imagen' => base_url() . 'img/adopciones/img_43.png',
                'descripcion' => 'Pelo corto, tamaño mediano',
                'extra' => [
                    'edad' => '4 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            [
                'id' => 50,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Golondrina',
                'imagen' => base_url() . 'img/adopciones/img_44.png',
                'descripcion' => 'Pelo corto, tamaño mediano',
                'extra' => [
                    'edad' => '2 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 51,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Seth',
                'imagen' => base_url() . 'img/adopciones/img_45.png',
                'descripcion' => 'Pelo corto, tamaño mediano',
                'extra' => [
                    'edad' => '2 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            [
                'id' => 52,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Palanqueta',
                'imagen' => base_url() . 'img/adopciones/img_46.png',
                'descripcion' => 'Pelo corto, tamaño mediano',
                'extra' => [
                    'edad' => '4 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Hembra',
                ]
            ],
            [
                'id' => 53,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Premium',
                'imagen' => base_url() . 'img/adopciones/img_47.png',
                'descripcion' => 'Pelo corto, tamaño grande',
                'extra' => [
                    'edad' => '4 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            [
                'id' => 54,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Milo',
                'imagen' => base_url() . 'img/adopciones/img_48.png',
                'descripcion' => 'Pelo corto, tamaño mediano',
                'extra' => [
                    'edad' => '4 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            [
                'id' => 55,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Nugget',
                'imagen' => base_url() . 'img/adopciones/img_49.png',
                'descripcion' => 'Pelo corto, tamaño mediano',
                'extra' => [
                    'edad' => '4 años',
                    'raza' => 'Mestizo',
                    'sexo' => 'Macho',
                ]
            ],
            [
                'id' => 56,
                'titulo' => 'Resguardo Temporal',
                'nombre' => 'Galactea',
                'imagen' => base_url() . 'img/adopciones/img_50.png',
                'descripcion' => 'Pelo corto, tamaño mediano',
                'extra' => [
                    'edad' => '',
                    'raza' => 'Mestizo',
                    'sexo' => '',
                ]
            ]
        ];
    }
    ?>

    <div class="row g-5">
        <?php foreach ($items as $item): ?>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card h-100 shadow-sm catalog-card" role="button"
                    data-bs-toggle="modal"
                    data-bs-target="#itemModal"
                    data-id="<?php echo htmlspecialchars($item['id']); ?>"
                    data-titulo="<?php echo htmlspecialchars($item['titulo']); ?>"
                    data-nombre="<?php echo htmlspecialchars(isset($item['nombre']) ? $item['nombre'] : ''); ?>"
                    data-imagen="<?php echo htmlspecialchars(isset($item['imagen']) ? $item['imagen'] : base_url() . 'img/SEMP_1.png'); ?>"
                    data-descripcion="<?php echo htmlspecialchars($item['descripcion']); ?>"
                    data-extra="<?php echo htmlspecialchars(json_encode($item['extra'], JSON_UNESCAPED_UNICODE)); ?>">
                    <div class="ratio ratio-1x1 overflow-hidden">
                        <img src="<?php echo htmlspecialchars(isset($item['imagen']) ? $item['imagen'] : base_url() . 'img/SEMP_1.png'); ?>"
                            alt="<?php echo htmlspecialchars(isset($item['nombre']) && $item['nombre'] !== '' ? $item['nombre'] : $item['titulo']); ?>"
                            <?php if (!empty($item['width']) && !empty($item['height'])): ?>
                            width="<?php echo (int)$item['width']; ?>" height="<?php echo (int)$item['height']; ?>"
                            <?php endif; ?>
                            loading="lazy" decoding="async"
                            class="card-img-top object-fit-cover catalog-img">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-1 text-success"><?php echo htmlspecialchars(isset($item['nombre']) && $item['nombre'] !== '' ? $item['nombre'] : $item['titulo']); ?></h5>
                        <?php if (isset($item['nombre']) && $item['nombre'] !== '' && isset($item['titulo']) && $item['titulo'] !== ''): ?>
                            <span class="badge bg-success text-white mb-2"><?php echo htmlspecialchars($item['titulo']); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($item['descripcion'])): ?>
                            <p class="card-text text-muted small mb-0"><?php echo htmlspecialchars($item['descripcion']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal PDF -->
<div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemModalLabel">Ficha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body p-0">
                <div class="ratio ratio-4x3">
                    <iframe id="modalPdf" src="" title="Ficha PDF" frameborder="0" allow="fullscreen" style="width:100%; height:100%;"></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>

    <style>
        .catalog-card:hover .catalog-img {
            transform: scale(1.05);
        }

        .catalog-card {
            transition: box-shadow .2s ease-in-out;
        }

        .catalog-card:hover {
            box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, .1);
        }

        .catalog-img {
            transition: transform .3s ease-in-out;
        }

        .object-fit-cover {
            object-fit: cover;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const itemModal = document.getElementById('itemModal');
            if (!itemModal) return;

            itemModal.addEventListener('show.bs.modal', function(event) {
                const card = event.relatedTarget;
                if (!card) return;

                const id = card.getAttribute('data-id') || '';
                const nombre = card.getAttribute('data-nombre') || '';
                const titulo = card.getAttribute('data-titulo') || '';

                const tituloFinal = nombre !== '' ? nombre : titulo;
                document.getElementById('itemModalLabel').textContent = tituloFinal;

                // Construye ruta del PDF pdf_<id>.pdf bajo public/img/adopciones
                const pdfUrl = '<?php echo base_url(); ?>img/adopciones/pdf_' + id + '.pdf';
                const pdfFrame = document.getElementById('modalPdf');
                pdfFrame.src = pdfUrl;
            });

            itemModal.addEventListener('hidden.bs.modal', function() {
                const pdfFrame = document.getElementById('modalPdf');
                // Limpia src para detener carga cuando se cierra
                pdfFrame.src = '';
            });
        });
    </script>
</div>
