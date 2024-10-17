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
                        <a href="https://bsky.app/profile/dxw.bsky.social" class="bsky">
                            <!--[if gte IE 9]><!-->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="-21 -28 144 128"><title>Bluesky</title><path fill="#eeeeee" d="M 70.796875 50.65625 C 70.226562 50.585938 69.636719 50.519531 69.0625 50.433594 C 69.652344 50.5 70.226562 50.585938 70.796875 50.65625 Z M 50 39.035156 C 45.46875 30.324219 33.140625 14.082031 21.683594 6.070312 C 10.695312 -1.613281 6.511719 -0.289062 3.75 0.949219 C 0.574219 2.375 0 7.207031 0 10.042969 C 0 12.878906 1.578125 33.347656 2.605469 36.769531 C 5.988281 48.058594 18.074219 51.875 29.203125 50.636719 C 29.773438 50.550781 30.347656 50.484375 30.9375 50.398438 C 30.363281 50.484375 29.792969 50.570312 29.203125 50.636719 C 12.898438 53.042969 -1.578125 58.921875 17.414062 79.839844 C 38.296875 101.253906 46.023438 75.25 50 62.066406 C 53.976562 75.25 58.542969 100.308594 82.222656 79.839844 C 100 62.066406 87.101562 53.027344 70.796875 50.636719 C 70.226562 50.570312 69.636719 50.5 69.0625 50.414062 C 69.652344 50.484375 70.226562 50.570312 70.796875 50.636719 C 81.925781 51.859375 93.992188 48.042969 97.394531 36.769531 C 98.421875 33.347656 100 12.894531 100 10.042969 C 100 7.1875 99.425781 2.359375 96.25 0.949219 C 93.507812 -0.269531 89.304688 -1.613281 78.332031 6.070312 C 66.859375 14.082031 54.53125 30.324219 50 39.035156 Z M 50 39.035156"/></svg>
                            <!--<![endif]-->
                            <span>Bluesky</span>
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
                <p>&copy; 2008 &ndash; <?php echo date('Y'); ?>. The Dextrous Web Ltd, trading as dxw. &#8220;dxw&#8221; is a registered trademark. All rights reserved. The Dextrous Web Ltd is a company registered in England &amp; Wales, No. 6617101. Registered address Studio 1.05c, 4 The Boulevard, Leeds, LS10 1PZ.</p>
            </div>
        </div>
    </div>
</footer>
