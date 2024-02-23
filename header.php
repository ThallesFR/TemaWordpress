<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>

</head>

<body style="font-family: <?php echo esc_attr(get_theme_mod('fonte_site')); ?>;">
    <nav class="navbar navbar-expand-lg" style="background-color: <?php echo esc_attr(get_theme_mod('cor_fundo_nav')); ?>; color: <?php echo esc_attr(get_theme_mod('cor_texto_nav')); ?>">
        <div class="container-fluid">

            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php
                            $custom_logo_id = get_theme_mod('custom_logo');
                            $largura_logo = get_theme_mod('largura_logo'); // Largura do logotipo personalizada ou use 150 como padrão
                            $altura_logo = get_theme_mod('altura_logo'); // Altura do logotipo personalizada ou use 100 como padrão
                            $image = wp_get_attachment_image_src($custom_logo_id, 'full');
                            echo esc_url($image[0]);
                            ?>" style="max-width: <?php echo esc_attr($largura_logo); ?>px; height: <?php echo esc_attr($altura_logo); ?>px;">
            </a>
            <div class="collapse navbar-collapse menu" id="navbarSupportedContent" style=" color: white">

                <?php
                $cor_texto_nav = get_theme_mod('cor_texto_nav'); // Obtém a cor personalizada do texto do menu

                wp_nav_menu(array(
                    'theme_location' => 'menu-nav',
                    'container' => false,
                    'menu_class' => 'navbar-nav me-auto mb-2 mb-md-0', // Removi a classe específica do menu, pois a estilização será feita inline
                    'fallback_cb' => '__return_false',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', // Removi o estilo inline do elemento ul
                    'depth' => 2,
                    'walker' => new bootstrap_5_wp_nav_menu_walker(),
                    'link_before' => '<span style="color: ' . esc_attr($cor_texto_nav) . ';">', // Adiciona o estilo inline para a tag <a> antes do texto do link
                    'link_after' => '</span>' // Fecha a tag <span> após o texto do link
                ));
                ?>


            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>
    </nav>
    <main style="min-height: 100vh;">