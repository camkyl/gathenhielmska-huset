<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

<!--The content in the admin page-->

<div class="page-title contact-page">
    <div class="heading-wrapper">
        <div class="heading-wrapper__left"></div>
        <h3>Boka rum</h3>
        <div class="heading-wrapper__right"></div>
    </div>
</div>

<div class="contact-para">
    <p>Det finns möljighet att boka våra rum för egen verksamhet. I huset får max 30 personer vistas samtidigt. I hyra ingår tillgång till lokal, kök, bord och stolar. Beroende på hyresnivå ingår även hjälp med iordningställande, och teknisk utrustning. Boka genom att skicka ett meddelande via formuläret längre ner på sidan.</p>
</div>

<div class="contact-rooms">
    <div class="contact-rooms__single">
        <img class="contact-rooms__single__img" src="../../uploads/italia.png" alt="Italia room">
        <h3 class="contact-rooms__single__title">
            Italiarummet
        </h3>
        <p class="contact-rooms__single__text">
            Italiarummet passar bra för möten och mindre samlingar. Max 10 personer får plats här inne.
        </p>
    </div>
    <div class="contact-rooms__single">
        <img class="contact-rooms__single__img" src="../../uploads/salongen.png" alt="Italia room">
        <h3 class="contact-rooms__single__title">
            Salongen
        </h3>
        <p class="contact-rooms__single__text">
            I salongen passar det att ha repetitioner, workshops och föreställningar och middagar. Max 30 personer får plats här inne.
        </p>
    </div>
    <div class="contact-rooms__single">
        <img class="contact-rooms__single__img" src="../../uploads/kungsalen.png" alt="Italia room">
        <h3 class="contact-rooms__single__title">
            Kungsalen
        </h3>
        <p class="contact-rooms__single__text">
            Lämpar sig för möten, konferens, sammankomster och middagar för mindre sällskap. Max 10 personer.
        </p>
    </div>
    <div class="contact-rooms__single">
        <img class="contact-rooms__single__img" src="../../uploads/galleriet.png" alt="Italia room">
        <h3 class="contact-rooms__single__title">
            Galleriet
        </h3>
        <p class="contact-rooms__single__text">
            Galleriutrymmena lämpar sig väl för galleriverksamhet, konserter och föreställningar.
        </p>
    </div>
    <div class="contact-rooms__single">
        <img class="contact-rooms__single__img" src="../../uploads/versailles.png" alt="Italia room">
        <h3 class="contact-rooms__single__title">
            Versailles
        </h3>
        <p class="contact-rooms__single__text">
            Italiarummet passar bra för möten och mindre samlingar. Max 10 personer får plats här inne.
        </p>
    </div>
    <div class="contact-rooms__single">
        <img class="contact-rooms__single__img" src="../../uploads/hyrindig.png" alt="Italia room">
        <h3 class="contact-rooms__single__title">
            Hyr in dig
        </h3>
        <p class="contact-rooms__single__text">
            Möjlighet finns generellt att tillfälligt hyra in sig för att arbeta i huset, under en dag, lite då och då eller under kortare perioder.
        </p>
    </div>
</div>

<div class="contact-form-wrapper">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <h2 class="contact-title"><?php the_title(); ?></h2>
            <p class="contact-form-text">Om du vill boka våra rum eller komma i kontakt med oss av annan anledning, skriv gärna ett meddelande i formuläret nedan.</p>
            <?php the_content(); ?>

        <?php endwhile; ?>
    <?php endif; ?>
</div>

<div class="page-title contact-page">
    <div class="heading-wrapper">
        <div class="heading-wrapper__left"></div>
        <h3>Vi jobbar här</h3>
        <div class="heading-wrapper__right"></div>
    </div>
</div>

<div class="in-charge-wrapper">
    <div class="in-charge-wrapper__team">
        <div class="in-charge-wrapper__team__left">
            <img src="<?php echo bloginfo('template_url'); ?>/assets/images/joel.png" alt="Joel" class="team__image">
            <h3>Joel Heirås</h3>
            <p>Producent och samordnare</p>
            <p>joe.heiras@gmail.com</p>
            <p>0760-983832</p>
        </div>

    </div>
    <div class="in-charge-wrapper__team">
        <div class="in-charge-wrapper__team__left">
            <img src="<?php echo bloginfo('template_url'); ?>/assets/images/david.png" alt="David" class="team__image">
            <h3>David Sperling Bolander</h3>
            <p>Projektledare</p>
            <p>sperlingbolander@gmail.com</p>
            <p>0707-305134</p>
        </div>

    </div>
    <div class="in-charge-wrapper__team">
        <div class="in-charge-wrapper__team__left">
            <img src="<?php echo bloginfo('template_url'); ?>/assets/images/isabel.png" alt="Isabel" class="team__image">
            <h3>Isabel Lagos</h3>
            <p>Projektledare och konstnärlig ledare</p>
            <p>isabel@historieverket.se</p>
            <p>0769-211107</p>
        </div>

    </div>
</div>

<?php get_footer(); ?>
