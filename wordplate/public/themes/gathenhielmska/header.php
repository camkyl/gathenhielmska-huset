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
            <a href="/">
                <img src="../../icons/menulogo.png" alt="logo">
            </a>

            <!--Can't make it work with the echo site_url();, it gives me the adress http://localhost:8000/wordpress >-->
        </div>

        <div class="header__right">

            <img class="header__right__search" src="../../icons/search-icon.svg">
            <img class="header__right__arrow" src="../../icons/downarrow.png">
            <img class="header__right__flag" src="../../icons/swedishflag.png">

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
        </div>
    </header>

    <main class="main">
