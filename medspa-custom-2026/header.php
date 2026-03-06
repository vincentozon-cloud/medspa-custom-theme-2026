<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" style="padding: 20px; background: #f8f9fa; border-bottom: 1px solid #ddd;">
    <div class="container">
        <div class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="font-size: 24px; font-weight: bold; text-decoration: none; color: #333;">
                MEDSPA <span style="color: #bc9c22;">2026</span>
            </a>
        </div>
        <nav class="main-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
            ) );
            ?>
        </nav>
    </div>
</header>