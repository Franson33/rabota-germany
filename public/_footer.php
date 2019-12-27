</div>
</div>
</main>
<footer class="footer">
    <div class="wrapper">
        <div class="footer-container">
            <div class="footer-container__footer-item">
                <div class="footer-item__logo drop-shadow-filter">
                    <img src="<?php echo ASSETS_URL; ?>images/logo/logo_mgm_rgb_weiss2-01.svg" alt="MGM логотип" draggable="false">
                </div>
                <div class="footer-item__footer-copyright">
                    <p class="footer-copyright">&copy; MGM Handels- und Vermittlungs GmbH <?php echo date('Y'); ?></p>
                </div>
                <div class="footer-item__footer-profile-button">
                    <button class="footer-profile-button__profile-button orange--button button--clear drop-shadow-filter" type="button" name="profile-button">
                        <a class="profile-button__profile-link link" href="<?php echo PROJECT_URL; ?>profile.php">
                            <p class="profile-link__text drop-shadow-filter orange-button--text">Заполнить анкету</p>
                        </a>
                    </button>
                </div>
            </div>
            <div class="footer-container__footer-item">
                <div class="footer-item__footer-sitemap">
                    <a class="footer-sitemap__sitemap-link link" href="<?php echo PROJECT_URL; ?>"><p class="sitemap-link__text">Главная</p></a>
                    <a class="footer-sitemap__sitemap-link link" href="<?php echo PROJECT_URL; ?>conditions.php"><p class="sitemap-link__text">Условия работы</p></a>
                    <a class="footer-sitemap__sitemap-link link" href="<?php echo PROJECT_URL; ?>aboutus.php"><p class="sitemap-link__text">О компании</p></a>
                    <a class="footer-sitemap__sitemap-link link" href="<?php echo PROJECT_URL; ?>contacts.php"><p class="sitemap-link__text">Контакты</p></a>
                </div>
            </div>
            <div class="footer-container__footer-item">
                <div class="footer-item__footer-contacts">
                    <div class="footer-contacts__footer-email footer-contacts--block">
                        <p class="footer-email__item block--item">Написать нам:</p>
                        <a class="footer-email__item block--item footer--link" href="mailto:mgmgmbh@ukr.net">mgmgmbh@ukr.net</a>
                    </div>
                    <div class="footer-contacts__footer-telephone footer-contacts--block">
                        <p class="footer-telephone__item block--item">Наши телефоны:</p>
                        <a class="footer-telephone__item block--item footer--link" href="tel:+380631234567">+380666708930</a>
                        <a class="footer-telephone__item block--item footer--link" href="tel:+380631234567">+380671775755</a>
                    </div>
                    <div class="footer-contacts__footer-social footer-contacts--block">
                        <a class="footer-social__social-icon block--item link footer--link" title="Whatsapp" href="https://wa.me/380666708930?" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        <a class="footer-social__social-icon block--item link footer--link" title="Telegram" href="https://msng.link/o/?https://msng.link/o/?380666708930=vi=tg" target="_blank"><i class="fab fa-telegram-plane"></i></a>
                        <a class="footer-social__social-icon block--item link footer--link" title="Viber" href="https://msng.link/o/?380666708930=vi" target="_blank"><i class="fab fa-viber"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php if ($flashMsg) : ?>
    <div class="toast_wrapper<?php echo $flashType ? ' ' . $flashType : ''; ?>">
        <div class="toast_content"><?php echo $flashMsg; ?></div>
        <a href="#" class="close_toast"><i class="fas fa-times-circle"></i></a>
    </div>
<?php endif; ?>
</body>
</html>
