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

    <header>
        <nav>
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
    </header>

    <main>
