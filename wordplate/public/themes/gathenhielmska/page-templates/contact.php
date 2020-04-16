<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

<!--The content in the admin page-->

<div class="page-title">
    <div class="heading-wrapper">
        <div class="heading-wrapper__left"></div>
        <h3>Kontakt</h3>
        <div class="heading-wrapper__right"></div>
    </div>
</div>

<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

        <h2 class="contact-title"><?php the_title(); ?></h2>

        <?php the_content(); ?>

    <?php endwhile; ?>

<?php endif; ?>

<div class="page-title">
    <div class="heading-wrapper">
        <div class="heading-wrapper__left"></div>
        <h3>Ansvariga</h3>
        <div class="heading-wrapper__right"></div>
    </div>
</div>

<div class="in-charge-wrapper">
    <div class="in-charge-wrapper__team">
        <div class="in-charge-wrapper__team__left">
            <h3>Joel Heirås</h3>
            <p>Producent och samordnare</p>
            <p>joe.heiras@gmail.com</p>
            <p>0760-983832</p>
        </div>
        <div class="in-charge-wrapper__team__right">
            <img src="<?php echo bloginfo('template_url'); ?>/assets/images/joel.png" alt="Joel" class="team__image">
        </div>
    </div>
    <div class="in-charge-wrapper__team">
        <div class="in-charge-wrapper__team__left">
            <h3>David Sperling Bolander</h3>
            <p>Projektledare</p>
            <p>sperlingbolander@gmail.com</p>
            <p>0707-305134</p>
        </div>
        <div class="in-charge-wrapper__team__right">
            <img src="<?php echo bloginfo('template_url'); ?>/assets/images/david.png" alt="David" class="team__image">
        </div>
    </div>
    <div class="in-charge-wrapper__team">
        <div class="in-charge-wrapper__team__left">
            <h3>Isabel Lagos</h3>
            <p>Projektledare och konstnärlig ledare</p>
            <p>isabel@historieverket.se</p>
            <p>0769-211107</p>
        </div>
        <div class="in-charge-wrapper__team__right">
            <img src="<?php echo bloginfo('template_url'); ?>/assets/images/isabel.png" alt="Isabel" class="team__image">
        </div>
    </div>
</div>

<?php get_footer(); ?>
