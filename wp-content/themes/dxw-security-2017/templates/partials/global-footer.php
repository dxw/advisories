<footer class="global-footer" role="contentinfo">
    <div class="row">
        <div class="global-footer-links">
            <section class="footer-contact">
                <h5>Contact</h5>
                <div itemscope itemtype="http://schema.org/Organization">
                     <span itemprop="name">dxw advisories</span>
                     <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                        <span itemprop="streetAddress">Calls Landing</span>
                        <span itemprop="streetAddress">36-38 The Calls</span>
                        <span itemprop="addressLocality">Leeds</span>,
                        <span itemprop="postalCode">LS2 7EW</span>
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
            <a href="https://registry.blockmarktech.com/certificates/34ee73d3-9928-4e85-9f29-79c8ae00fea9/" rel="external">
                <img class="pre-footer__logos__cyber" src="<?php h()->assetPath('img/ce-mark.png'); ?>" alt="Cyber Essentials logo">
            </a>
            <a href="https://registry.blockmarktech.com/certificates/229da3fa-23a1-4f94-a9e1-0a0b7de97cc6/" rel="external">
                <img class="pre-footer__logos__cyber" src="<?php h()->assetPath('img/ce-plus-mark.png'); ?>" alt="Cyber Essentials Plus logo">
            </a>
        </div>
    </div>

    <div class="global-footer-copyright">
        <div class="row">
            <div class="footer-social">
                <ul>
                    <li>
                        <a href="https://twitter.com/dxw" class="twitter">
                            <!--[if gte IE 9]><!-->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144 144"><title>Twitter</title><path fill="#eeeeee" d="M107,54V56.4c0,23.85-18.13,51.35-51.3,51.35-10.18,0-19.77-2.23-27.71-7.35a28.5,28.5,0,0,0,4.3.3c8.42,0,16.29-3.65,22.39-8.55a18,18,0,0,1-16.8-12.55,17.74,17.74,0,0,0,3.35.34A18.05,18.05,0,0,0,46,79.3,18,18,0,0,1,31.57,61.6v-.21a18.1,18.1,0,0,0,8.16,2.23,18,18,0,0,1-8.08-15A17.2,17.2,0,0,1,34.1,39.9,51.31,51.31,0,0,0,71.27,58.42a18.81,18.81,0,0,1-.39-4.17,18,18,0,0,1,18-18,18.68,18.68,0,0,1,13.28,5.67,36.24,36.24,0,0,0,11.39-4.38,17.9,17.9,0,0,1-7.95,10A35.21,35.21,0,0,0,116,44.67,36.57,36.57,0,0,1,107,54Z"/></svg>
                            <!--<![endif]-->
                            <span>Twitter</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/thedxw/" class="facebook">
                            <!--[if gte IE 9]><!-->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144 144"><title>Facebook</title><path fill="#eeeeee" d="M61.6,50c0,1.9,0,10.4,0,10.4H54V73h7.6v37.7h15.6V73h10.5c0,0,1-6.1,1.5-12.7 c-1.4,0-11.9,0-11.9,0s0-7.4,0-8.7s1.7-3,3.4-3s5.2,0,8.5,0c0-1.7,0-7.7,0-13.2c-4.4,0-9.4,0-11.6,0C61.2,35.4,61.6,48.1,61.6,50z"/></svg>
                            <!--<![endif]-->
                            <span>Facebook</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/company/dxw" class="linkedin">
                            <!--[if gte IE 9]><!-->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144 144"><title>LinkedIn</title><path fill="#eeeeee" d="M110.5,80.7v28.7H93.9V82.7c0-6.7-2.4-11.3-8.4-11.3c-4.6,0-7.3,3.1-8.5,6.1 c-0.4,1.1-0.6,2.6-0.6,4.1v27.9H59.8c0,0,0.2-45.3,0-50h16.6v7.1c0,0.1-0.1,0.1-0.1,0.2h0.1v-0.2c2.2-3.4,6.1-8.3,15-8.3 C102.3,58.3,110.5,65.4,110.5,80.7z M42.4,35.3c-5.7,0-9.4,3.7-9.4,8.6c0,4.8,3.6,8.6,9.2,8.6h0.1c5.8,0,9.4-3.8,9.4-8.6 C51.6,39.1,48.1,35.3,42.4,35.3z M34,109.4h16.6v-50H34V109.4z"/></svg>
                            <!--<![endif]-->
                            <span>LinkedIn</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/dxw" class="github">
                            <!--[if gte IE 9]><!-->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144 144"><title>GitHub</title><path fill="#eeeeee" d="M116,73.72c0,25.78-16.5,34.93-44,34.93S28,99.5,28,73.85a28.91,28.91,0,0,1,6.4-18.43c-.9-4.9-1.8-13.36.95-20.07a36,36,0,0,1,19.12,7.73A68.19,68.19,0,0,1,72,40.85a66.44,66.44,0,0,1,17.4,2.23,37,37,0,0,1,19.25-7.73c2.75,6.62,1.85,15.17.95,19.94A29.17,29.17,0,0,1,116,73.72ZM104.4,84.85c0-12.85-10.4-15.6-15.9-15.6s-5.5.9-16.5.9-11-.9-16.5-.9S39.6,72,39.6,84.85c0,11,8.55,18.3,32.4,18.3S104.4,95.85,104.4,84.85Zm-41.55.9c0,6.4-2.06,8.25-4.6,8.25s-4.6-1.85-4.6-8.25,2.06-8.25,4.6-8.25S62.85,79.35,62.85,85.75Zm27.5,0c0,6.4-2.06,8.25-4.6,8.25s-4.6-1.85-4.6-8.25,2.06-8.25,4.6-8.25S90.35,79.35,90.35,85.75Z"/></svg>
                            <!--<![endif]-->
                            <span>GitHub</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer-legal">
                <p>&copy; 2008 &ndash; <?php echo date('Y'); ?>. The Dextrous Web Ltd, trading as dxw. &#8220;dxw&#8221; is a registered trademark. All rights reserved. The Dextrous Web Ltd is a company registered in England &amp; Wales, No. 6617101. Registered address Calls Landing, 36-38 The Calls, Leeds, LS2 7EW.</p>
            </div>
        </div>
    </div>
</footer>
