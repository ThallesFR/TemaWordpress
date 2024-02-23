<?php
////////////////////////////////////// Scripts do tema ////////

require_once(get_template_directory() . '/includes/class-nav-bootstrap-walker.php'); // adaptação do nav do menu com o nav do bootstrap

add_action('wp_enqueue_scripts', 'scripts_do_tema');
function scripts_do_tema()
{
    //bootstrap
    wp_enqueue_style('meu-tema-bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
    wp_enqueue_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js', '1', array('jquery'), true);
    wp_enqueue_script('meu-tema-bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array('popper'), '1.0', true);

    // personalizado do tema 
    wp_enqueue_style('template', get_template_directory_uri() . '/assets/css/template.css');  
    wp_enqueue_style('font-face', get_template_directory_uri() . '/assets/fonts/font_face.css');
}


////////////////////////////////////////// Configurações gerais //////

add_action('after_setup_theme', 'configs_do_tema');
function configs_do_tema()
{

    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');

    add_theme_support('editor-styles'); // Suporte para estilos do editor
    add_theme_support('wp-block-styles'); // Suporte para estilos de blocos
    add_theme_support('align-wide'); // Suporte para alinhamento amplo de blocos
    add_theme_support('responsive-embeds'); // Suporte para vídeos e outros conteúdos incorporados responsivos


    register_nav_menus(
        array(
            'menu-nav' => 'Menu Navbar',
            'menu-one' => 'Menu 1',
            'menu-two' => 'Menu 2'
        )
    );

    add_theme_support(
        'custom-header',
        array(
            'height' => 225,
            'width'  => 1920
        )
    );

    add_theme_support('custom-logo', array(
        'height'      => 50,
        'width'       => 150,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    ));

    add_theme_support('custom-background',  array(
        'default-image'          => '',
        'default-preset'         => 'default', // 'default', 'fill', 'fit', 'repeat', 'custom'
        'default-position-x'     => 'left',    // 'left', 'center', 'right'
        'default-position-y'     => 'top',     // 'top', 'center', 'bottom'
        'default-size'           => 'auto',    // 'auto', 'contain', 'cover'
        'default-repeat'         => 'repeat',  // 'repeat-x', 'repeat-y', 'repeat', 'no-repeat'
        'default-attachment'     => 'scroll',  // 'scroll', 'fixed'
        'default-color'          => '',
        'wp-head-callback'       => '_custom_background_cb',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
    ));
}

////////////////////////////// Customização de fonte /////////////////////////////
function registrar_personalizacao_fonte($wp_customize)
{
    // Adicione seção para a personalização da fonte
    $wp_customize->add_section('secao_fonte', array(
        'title' => 'Fonte do Site',
        'priority' => 40,
    ));


    // Adicione configuração para a fonte do site
    $wp_customize->add_setting('fonte_site', array(
        'default' => 'Tahoma',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Adicione controle para a fonte do site
    $wp_customize->add_control('fonte_site', array(
        'type' => 'select',
        'label' => 'Selecione a Fonte Geral do Site',
        'section' => 'secao_fonte',
        'choices' => array(
            'Tahoma' => 'Tahoma',
            'Uni Sans' => 'Uni Sans',
            "'Ubuntu'" => 'Ubuntu',
            "'Eurostile'" => 'Eurostile'
            // Adicione mais opções conforme necessário
        ),
    ));
}
add_action('customize_register', 'registrar_personalizacao_fonte');



////////////////////////////// Customização Navbar /////////////////////////////
function registrar_personalizacao_cores_nav_bar($wp_customize)
{
    // Adicione seção para a personalização das cores do NavBar
    $wp_customize->add_section('secao_cores_nav_bar', array(
        'title' => 'NavBar',
        'priority' => 30,
    ));

    // Adicione configuração para a cor de fundo do NavBar
    $wp_customize->add_setting('cor_fundo_nav', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Adicione controle para a cor de fundo do NavBar
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cor_fundo_nav', array(
        'label' => 'Cor de Fundo do NavBar',
        'section' => 'secao_cores_nav_bar',
    )));

    // Adicione configuração para a cor do texto do NavBar
    $wp_customize->add_setting('cor_texto_nav', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Adicione controle para a cor do texto do NavBar
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cor_texto_nav', array(
        'label' => 'Cor do Texto do NavBar',
        'section' => 'secao_cores_nav_bar',
    )));
}
add_action('customize_register', 'registrar_personalizacao_cores_nav_bar');


////////////////////////////// Customização footer /////////////////////////////
function registrar_personalizacao_cores_footer($wp_customize)
{
    // Adicione seção para a personalização das cores do Footer
    $wp_customize->add_section('secao_cores_footer', array(
        'title' => 'Footer',
        'priority' => 30,
    ));

    // Adicione configuração para a cor de fundo do Footer
    $wp_customize->add_setting('cor_fundo_footer', array(
        'default' => '#808080',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Adicione controle para a cor de fundo do Footer
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cor_fundo_footer', array(
        'label' => 'Cor de Fundo do Footer',
        'section' => 'secao_cores_footer',
    )));

    // Adicione configuração para a cor do texto do Footer
    $wp_customize->add_setting('cor_texto_footer', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Adicione controle para a cor do texto do Footer
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cor_texto_footer', array(
        'label' => 'Cor do Texto do Footer',
        'section' => 'secao_cores_footer',
    )));
}
add_action('customize_register', 'registrar_personalizacao_cores_footer');



/////////////////////// Customização do logo /////////////////////////////

function registrar_personalizacao_tamanho_logo($wp_customize)
{
    // Adicione seção para a personalização do logotipo
    $wp_customize->add_section('secao_tamanho_logo', array(
        'title' => 'Tamanho do logotipo',
        'priority' => 35,
    ));

    // Adicione configuração para a largura padrão do logotipo
    $wp_customize->add_setting('largura_logo', array(
        'default' => '150',
        'sanitize_callback' => 'absint',
    ));

    // Adicione controle para a largura do logotipo
    $wp_customize->add_control('largura_logo', array(
        'type' => 'number',
        'label' => 'Largura do Logotipo (px)',
        'section' => 'secao_tamanho_logo',
    ));

    // Adicione configuração para a altura padrão do logotipo
    $wp_customize->add_setting('altura_logo', array(
        'default' => '100',
        'sanitize_callback' => 'absint',
    ));

    // Adicione controle para a altura do logotipo
    $wp_customize->add_control('altura_logo', array(
        'type' => 'number',
        'label' => 'Altura do Logotipo (px)',
        'section' => 'secao_tamanho_logo',
    ));
}
add_action('customize_register', 'registrar_personalizacao_tamanho_logo');


/////////////////////////////////////////// Widgets ////////

add_action('widgets_init', 'meu_tema_sidebars');
function  meu_tema_sidebars()
{

    register_sidebar(array(
        'id' => 'left-sidebar',
        'name' => 'Left Sidebar',
        'description' => 'sidebar da esquerda',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'id' => 'right-sidebar',
        'name' => 'Right Sidebar',
        'description' => 'sidebar da direita',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
}

///////////////////////////////// Customização de banner //////////////

function registrar_personalizacao_banner($wp_customize)
{
    // Adicione uma seção para a personalização da imagem do banner
    $wp_customize->add_section('secao_banner', array(
        'title' => 'Banner',
        'priority' => 40,
    ));

    $imagem_banner_padrão =   get_template_directory_uri() .'/assets/img/banner1.jpg'; // Caminho relativo para a imagem padrão

    // Adicione uma configuração para a imagem do banner
    $wp_customize->add_setting('imagem_banner_1', array(
        'default' =>  $imagem_banner_padrão ,
        'sanitize_callback' => 'esc_url_raw', // Use 'esc_url_raw' para URLs de imagem
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'imagem_banner_1', array(
        'label' => 'Imagem 1 do Banner',
        'section' => 'secao_banner',
    )));

     $wp_customize->add_setting('imagem_banner_2', array(
        'default' => $imagem_banner_padrão ,
        'sanitize_callback' => 'esc_url_raw', // Use 'esc_url_raw' para URLs de imagem
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'imagem_banner_2', array(
        'label' => 'Imagem 2 do Banner',
        'section' => 'secao_banner',
    )));

     $wp_customize->add_setting('imagem_banner_3', array(
        'default' => $imagem_banner_padrão,
        'sanitize_callback' =>  'esc_url_raw', // Use 'esc_url_raw' para URLs de imagem
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'imagem_banner_3', array(
        'label' => 'Imagem 3 do Banner',
        'section' => 'secao_banner',
    )));
}
add_action('customize_register', 'registrar_personalizacao_banner');
