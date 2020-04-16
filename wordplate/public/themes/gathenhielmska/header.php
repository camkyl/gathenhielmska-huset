<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
</head>

<body>

    <?php $pages = get_pages(["sort_column" => "menu_order"]); ?>

    <header class="header">
        <div class="header__left">
            <div class="header__left-logo">
                <a href="/">
                    <img src="../../icons/logo-ingela.png" alt="logo">
                </a>
            </div>

            <!--Can't make it work with the echo site_url();, it gives me the adress http://localhost:8000/wordpress >-->
        </div>

        <div class="header__right">

            <div class="header__right__search">
                <img class="search-icon" src="../../icons/search-icon.png">
            </div>
            <div class="search-desktop">
                <form class="search-desktop__form" action="/" method="get">
                    <input class="search-desktop__form__input" placeholder="VAD SÖKER DU?" type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
                </form>
            </div>
            <div class="header__right__flag">
                <img class="languages" src="../../icons/swedishflag.png" alt="language flag">
            </div>
            <div class="header__right__arrow">
                <img src="../../icons/downarrow.png" alt="arrow down">
            </div>

            <div class="hamburger header__right__hamburger">
                <div class="hamburger-line1 header__right__hamburger__line1"></div>
                <div class="hamburger-line2 header__right__hamburger__line2"></div>
                <div class="hamburger-line3 header__right__hamburger__line3"></div>
            </div>

            <nav class="nav">
                <ul class="nav-ul">
                    <?php foreach ($pages as $page) : ?>
                        <li>
                            <a href="<?php echo get_permalink($page); ?>">
                                <?php echo $page->post_title; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <div class="flag-menu">
                <ul class="nav-ul nav-language">
                    <li>Svenska</li>
                    <li>English</li>
                    <li>Español</li>
                    <li>Francais</li>
                    <li>Deutsch</li>
                </ul>
            </div>
        </div>
    </header>

    <div class="search">
        <form class="search__form" action="/" method="get">
            <input class="search__input" placeholder="VAD SÖKER DU?" type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
        </form>
    </div>

    <main class="main">
