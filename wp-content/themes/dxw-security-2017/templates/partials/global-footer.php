<footer class="global-footer" role="contentinfo">
    <div class="row">
        <div class="global-footer-links">
            <section class="footer-contact">
                <h5>Contact</h5>
                <div itemscope itemtype="http://schema.org/Organization">
                     <span itemprop="name">dxw advisories</span>
                     <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                        <span itemprop="streetAddress">Studio 1.05c</span>
                        <span itemprop="streetAddress">4 The Boulevard</span>
                        <span itemprop="addressLocality">Leeds</span>,
                        <span itemprop="postalCode">LS10 1PZ</span>
                     </div>
                     <span itemprop="telephone"><a href="tel:0345-257-7520"><span class="sr-only">Call us on </span>0345 257 7520</a></span>
                     <span itemprop="email"><a href="mailto:contact@govpress.com">contact@dxw.com</a></span>
                </div>
            </section>

            <?php if (has_nav_menu('footer_first')) : ?>
                <section>
                    <?php echo h()->footerMenu('footer_first') ?>
                </section>
            <?php endif; ?>

            <?php if (has_nav_menu('footer_second')) : ?>
                <section>
                    <?php echo h()->footerMenu('footer_second') ?>
                </section>
            <?php endif; ?>

            <?php if (has_nav_menu('footer_third')) : ?>
                <section>
                    <?php echo h()->footerMenu('footer_third') ?>
                </section>
            <?php endif; ?>
        </div>
        <div class="global-footer-border">
            <hr>
        </div>
    </div>
    <div class="row global-footer-certificates">
        <p><?php echo get_theme_mod('digital_marketplace_text');?></p>
        <div class="badges">
            <a href="<?php h()->assetPath('img/ukas.svg'); ?>"><img class="badge ukas" src="<?php h()->assetPath('img/ukas.svg'); ?>" alt="UKAS logo"></a>
            <img src="<?php h()->assetPath('img/ccs-certificate.png'); ?>" alt="Government Procurement Service" class="badge ccss">
            <a href="https://registry.blockmarktech.com/certificates/fe6a3790-9019-4df0-8d32-f894397b03d2/" rel="external">
                <img class="pre-footer__logos__cyber" src="<?php h()->assetPath('img/ce-mark.png'); ?>" alt="Cyber Essentials logo">
            </a>
            <a href="https://registry.blockmarktech.com/certificates/ced635fc-ba0c-4e59-905c-508dd66dff1b/" rel="external">
                <img class="pre-footer__logos__cyber" src="<?php h()->assetPath('img/ce-plus-mark.png'); ?>" alt="Cyber Essentials Plus logo">
            </a>
        </div>
    </div>

    <div class="global-footer-copyright">
        <div class="row">
            <div class="footer-social">
                <ul>
                    <li>
                        <a href="https://bsky.app/profile/dxw.bsky.social" class="bsky">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="-4 -5 32 32"><title>Bluesky</title><path fill="#eeeeee" d="M6.3,4.2c2.3,1.7,4.8,5.3,5.7,7.2.9-1.9,3.4-5.4,5.7-7.2,1.7-1.3,4.3-2.2,4.3.9s-.4,5.2-.6,5.9c-.7,2.6-3.3,3.2-5.6,2.8,4,.7,5.1,3,2.9,5.3-5,5.2-6.7-2.8-6.7-2.8,0,0-1.7,8-6.7,2.8-2.2-2.3-1.2-4.6,2.9-5.3-2.3.4-4.9-.3-5.6-2.8-.2-.7-.6-5.3-.6-5.9,0-3.1,2.7-2.1,4.3-.9h0Z"></path></svg>
                            <span>Bluesky</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/thedxw/" class="facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144 144"><title>Facebook</title><path fill="#eeeeee" d="M61.6,50c0,1.9,0,10.4,0,10.4H54V73h7.6v37.7h15.6V73h10.5c0,0,1-6.1,1.5-12.7 c-1.4,0-11.9,0-11.9,0s0-7.4,0-8.7s1.7-3,3.4-3s5.2,0,8.5,0c0-1.7,0-7.7,0-13.2c-4.4,0-9.4,0-11.6,0C61.2,35.4,61.6,48.1,61.6,50z"/></svg>
                            <span>Facebook</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/company/dxw" class="linkedin">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144 144"><title>LinkedIn</title><path fill="#eeeeee" d="M110.5,80.7v28.7H93.9V82.7c0-6.7-2.4-11.3-8.4-11.3c-4.6,0-7.3,3.1-8.5,6.1 c-0.4,1.1-0.6,2.6-0.6,4.1v27.9H59.8c0,0,0.2-45.3,0-50h16.6v7.1c0,0.1-0.1,0.1-0.1,0.2h0.1v-0.2c2.2-3.4,6.1-8.3,15-8.3 C102.3,58.3,110.5,65.4,110.5,80.7z M42.4,35.3c-5.7,0-9.4,3.7-9.4,8.6c0,4.8,3.6,8.6,9.2,8.6h0.1c5.8,0,9.4-3.8,9.4-8.6 C51.6,39.1,48.1,35.3,42.4,35.3z M34,109.4h16.6v-50H34V109.4z"/></svg>
                            <span>LinkedIn</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/dxw" class="github">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144 144"><title>GitHub</title><path fill="#eeeeee" d="M116,73.72c0,25.78-16.5,34.93-44,34.93S28,99.5,28,73.85a28.91,28.91,0,0,1,6.4-18.43c-.9-4.9-1.8-13.36.95-20.07a36,36,0,0,1,19.12,7.73A68.19,68.19,0,0,1,72,40.85a66.44,66.44,0,0,1,17.4,2.23,37,37,0,0,1,19.25-7.73c2.75,6.62,1.85,15.17.95,19.94A29.17,29.17,0,0,1,116,73.72ZM104.4,84.85c0-12.85-10.4-15.6-15.9-15.6s-5.5.9-16.5.9-11-.9-16.5-.9S39.6,72,39.6,84.85c0,11,8.55,18.3,32.4,18.3S104.4,95.85,104.4,84.85Zm-41.55.9c0,6.4-2.06,8.25-4.6,8.25s-4.6-1.85-4.6-8.25,2.06-8.25,4.6-8.25S62.85,79.35,62.85,85.75Zm27.5,0c0,6.4-2.06,8.25-4.6,8.25s-4.6-1.85-4.6-8.25,2.06-8.25,4.6-8.25S90.35,79.35,90.35,85.75Z"/></svg>
                            <span>GitHub</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer-legal">
                <p>&copy; 2008 &ndash; <?php echo date('Y'); ?>. The Dextrous Web Ltd, trading as dxw. &#8220;dxw&#8221; is a registered trademark. All rights reserved. The Dextrous Web Ltd is a company registered in England &amp; Wales, No. 6617101. Registered address Studio 1.05c, 4 The Boulevard, Leeds, LS10 1PZ.</p>
            </div>
        </div>
    </div>
</footer>
