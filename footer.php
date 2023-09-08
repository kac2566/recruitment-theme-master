    <?php 
        $siteLogo = get_field('site_logo', 'option');
        $footerContent = get_field('footer_content', 'option');
        $footerContact = get_field('footer_contact', 'option');
        $footerPhone = get_field('footer_phone', 'option');
        $footerEmail = get_field('footer_email', 'option');
        $footerCopyright = get_field('footer_copyright', 'option');

        $footerEmailProtected = antispambot($footerEmail, 1);
        $footerPhoneProtected = antispambot($footerPhone, 1);
    ?>

    <footer>
        <div class="footer container">
            <div class="footer__wrapper">
                <div class="footer__content">
                    <div class="footer__logo">
                        <a href="<?= home_url(); ?>"><img src="<?= $siteLogo['url'] ?>" alt="<?= $siteLogo['alt'] ?>"
                                width="126" height="32"></a>
                    </div>
                    <p><?= $footerContent ?></p>
                </div>
                <div class="footer__quick-links">
                    <h2 class="footer__quick-links-title">Quick links</h2>
                    <?php wp_nav_menu(array(
                        'menu'              => 'footer_menu',
                        'theme_location'    => 'footer_menu',
                        'depth'             => 1,
                        'menu_class'        => 'footer__menu',
                        'container'         => 'ul',
                    )); ?>
                </div>
                <div class="footer__contact">
                    <h2 class="footer__contact-title">Contact Us</h2>
                    <div class="footer__contact-info">
                        <?= $footerContact ?>
                    </div>
                    <div class="footer__contact-buttons">
                        <a href="mailto:<?= $footerEmailProtected ?>">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.14097 5.53955L9.99999 10.1122L16.859 5.53955C16.7314 5.09332 16.3205 4.76668 15.8333 4.76668H4.16666C3.67946 4.76668 3.26854 5.09332 3.14097 5.53955ZM16.9 6.95446L10.3328 11.3326C10.1313 11.4669 9.86871 11.4669 9.66717 11.3326L3.09999 6.95446V14.1667C3.09999 14.7558 3.57756 15.2333 4.16666 15.2333H15.8333C16.4224 15.2333 16.9 14.7558 16.9 14.1667V6.95446ZM1.89999 5.83335C1.89999 4.5815 2.91481 3.56668 4.16666 3.56668H15.8333C17.0852 3.56668 18.1 4.5815 18.1 5.83335V14.1667C18.1 15.4185 17.0852 16.4333 15.8333 16.4333H4.16666C2.91481 16.4333 1.89999 15.4185 1.89999 14.1667V5.83335Z"
                                    fill="white" />
                            </svg>
                            Send mail</a>
                        <a href="tel:<?= $footerPhoneProtected ?>">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.16666 3.93334C3.88376 3.93334 3.61245 4.04572 3.41241 4.24576C3.21624 4.44193 3.10437 4.70664 3.10012 4.9836C3.29321 8.08051 4.61052 11.0006 6.80495 13.1951C8.99937 15.3895 11.9195 16.7068 15.0164 16.8999C15.2934 16.8956 15.5581 16.7838 15.7542 16.5876C15.9543 16.3875 16.0667 16.1162 16.0667 15.8333V12.9062L12.7516 11.5802L11.7645 13.2254C11.6038 13.4931 11.2647 13.5929 10.9846 13.4548C9.05655 12.5039 7.49609 10.9434 6.54521 9.01539C6.40709 8.73534 6.50687 8.39616 6.77463 8.23551L8.4198 7.24841L7.09377 3.93334H4.16666ZM2.56389 3.39723C2.98897 2.97215 3.5655 2.73334 4.16666 2.73334H7.49999C7.74534 2.73334 7.96596 2.88271 8.05708 3.1105L9.72375 7.27717C9.83312 7.5506 9.72788 7.86298 9.47536 8.0145L7.88112 8.97104C8.63459 10.2793 9.72071 11.3654 11.029 12.1189L11.9855 10.5246C12.137 10.2721 12.4494 10.1669 12.7228 10.2763L16.8895 11.9429C17.1173 12.034 17.2667 12.2547 17.2667 12.5V15.8333C17.2667 16.4345 17.0279 17.011 16.6028 17.4361C16.1777 17.8612 15.6012 18.1 15 18.1C14.9879 18.1 14.9757 18.0996 14.9636 18.0989C11.5667 17.8925 8.36282 16.45 5.95642 14.0436C3.55002 11.6372 2.10753 8.43329 1.9011 5.0364C1.90036 5.02428 1.89999 5.01214 1.89999 5C1.89999 4.39885 2.1388 3.82231 2.56389 3.39723Z"
                                    fill="white" />
                            </svg>
                            Call us</a>
                    </div>
                </div>
            </div>
            <div class="footer__social-links">
                <?php
                    $social_icons = get_field('footer_social_icons', 'option');

                    if ($social_icons) {
                        foreach ($social_icons as $icon) {
                            $iconImage = $icon['icon'];

                            if (!empty($icon['link'])) {
                                echo '<a href="' . esc_url($icon['link']) . '" target="_blank" rel="noopener" class="footer__social-link">';
                                echo $iconImage;
                                echo '</a>';
                            }
                        }
                    }
                ?>

            </div>
            <div class="footer__copyright">
                <p>&copy; <?= date('Y'); ?> <?= $footerCopyright; ?></p>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
    </body>

    </html>