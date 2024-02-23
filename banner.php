<?php
// Recupera as URLs das imagens do banner do personalizador
$imagem_banner_1 = get_theme_mod('imagem_banner_1');
$imagem_banner_2 = get_theme_mod('imagem_banner_2');
$imagem_banner_3 = get_theme_mod('imagem_banner_3');
?>
<div class="container">
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo esc_url($imagem_banner_1) ?>;" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?php echo esc_url($imagem_banner_2) ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?php echo esc_url($imagem_banner_3) ?>" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<br>