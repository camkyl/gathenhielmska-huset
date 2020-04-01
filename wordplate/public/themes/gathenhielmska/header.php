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
            <a href="http://localhost:8000/"><img src="#" alt="logo"></a>
            <!--Can't make it work with the echo site_url();, it gives me the adress http://localhost:8000/wordpress >-->
        </div>

        <div class="header__right">
            <div>
                <p>Språk</p>
            </div>
            <nav class="nav">
                <ul>
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
