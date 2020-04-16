</main>

<footer class="footer">
    <?php wp_footer(); ?>

    <div class="footer__links_wrapper">
        <div class="footer__links_wrapper__left">
            <h3>Meny</h3>
            <?php $pages = get_pages(["sort_column" => "menu_order"]); ?>
            <?php foreach ($pages as $page) : ?>
                <a href="<?php echo get_permalink($page); ?>">
                    <?php echo $page->post_title; ?>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="footer__links_wrapper__right">
            <h3>Hitta hit</h3>
            <p>Stigbergstorget 7</p>
            <p>414 63 Göteborg</p>

            <h3 class="footer__links_wrapper__right__space">Följ oss</h3>
            <a href="">Facebook</a>
            <a href="">Instagram</a>
            <a href="">Youtube</a>
        </div>
    </div>

    <div class="footer__straight-line"></div>

    <div class="sponsors">
        <div class="sponsors__text">
            <p>Copyright &copy; 2020</p>
            <p>Gathenhielmska Huset</p>
        </div>

        <div class="sponsors__images">
            <div class="sponsors__images-wrapper">
                <img src="../../icons/studieframjandet.png">
            </div>
            <div class="sponsors__images-wrapper">
                <img src="../../icons/higab.svg">
            </div>
            <div class="sponsors__images-wrapper">
                <img src="../../icons/goteborgsstad.png">
            </div>
        </div>
    </div>

</footer>

</body>

</html>
