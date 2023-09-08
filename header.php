<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class();?>>
    <?php 
        $siteLogo = get_field('site_logo', 'option');
    ?>

    <header>
        <div class="navigation container">
            <div class="navigation__logo">
                <a href="<?= home_url(); ?>"><img src="<?= $siteLogo['url'] ?>" alt="<?= $siteLogo['alt'] ?>"
                        width="126" height="32"></a>
            </div>
            <button type="button" class="navigation__hamburger" aria-label="Otwórz menu" aria-expanded="false">
                <span></span>
            </button>
            <div class="navigation__nav-wrapper">
                <div class="navigation__pseudo-element"></div>
                <?php wp_nav_menu(array(
                    'menu'              => 'header_menu',
                    'theme_location'    => 'header_menu',
                    'depth'             => 2,
                    'menu_class'        => 'navigation__nav',
                    'container'         => 'nav',
                )); ?>
                <a href="#" class="navigation__button">Menu button</a>
                <div class="navigation__search-wrapper">
                    <input type="text" class="navigation__search" placeholder="Search">
                    <button type="button" class="navigation__search-button">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="Search">
                                <path id="Union" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10 3.5999C6.4654 3.5999 3.60002 6.46528 3.60002 9.9999C3.60002 13.5345 6.4654 16.3999 10 16.3999C13.5346 16.3999 16.4 13.5345 16.4 9.9999C16.4 6.46528 13.5346 3.5999 10 3.5999ZM2.40002 9.9999C2.40002 5.80254 5.80266 2.3999 10 2.3999C14.1974 2.3999 17.6 5.80254 17.6 9.9999C17.6 11.8826 16.9154 13.6054 15.7816 14.933L21.4243 20.5756C21.6586 20.81 21.6586 21.1899 21.4243 21.4242C21.19 21.6585 20.8101 21.6585 20.5758 21.4242L14.9331 15.7815C13.6055 16.9153 11.8827 17.5999 10 17.5999C5.80266 17.5999 2.40002 14.1973 2.40002 9.9999Z"
                                    fill="white" />
                            </g>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>