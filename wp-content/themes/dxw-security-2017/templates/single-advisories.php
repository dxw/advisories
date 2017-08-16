<section class="page-header-panel">
    <header class="row">
        <h2>Advisory:</h2>
        <h1><?php the_title(); ?></h1>
    </header>
</section>

<section class="inspection-introduction">
    <div class="row">
        <div class="inspection-container">
            <header>
                <h2>Vulnerability</h2>
                <p class="review">Last revised: <time class="published" datetime="<?php echo get_the_time('c');
                    ?>"><?php echo get_the_date();
                    ?></time></p>
            </header>
            <div class="vulnerability-description rich-text">
                <?php the_field('issue'); ?>
                <p class="state <?php echo esc_html(get_field('workflow_state')) ?>">Current state:
                    <?php
                        $state = get_field('workflow_state');
                        if ($state == 'identified') :
                            echo '<span class="red">';
                        elseif ($state == 'reported') :
                            echo '<span class="orange">';
                        elseif ($state == 'fixed') :
                            echo '<span class="green">';
                        endif;
                    ?>
                    <?php echo esc_html(h()->get_field_label('workflow_state')) ?></span>
                </p>
            </div>
        </div>
    </div>
</section>

<div class="row">
    <section class="page-section inspection-content">

        <article class="cvss-table">
            <h2>CVSS Summary</h2>
            <table class="cvss">
                <caption>CVSS base scores for this vulnerability</caption>
                <tbody>
                    <tr>
                        <th scope="col">Score</td>
                        <td class="score <?php echo strtolower(h()->get_cvss_severity()); ?>"><?php h()->the_cvss_score(); ?> <?php echo h()->the_cvss_severity(); ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Vector</th>
                        <td><?php h()->the_field_label('access_vector'); ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Complexity</th>
                        <td><?php h()->the_field_label('access_complexity'); ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Authentication</th>
                        <td><?php h()->the_field_label('authentication'); ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Confidentiality</th>
                        <td><?php h()->the_field_label('confidentiality'); ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Integrity</th>
                        <td><?php h()->the_field_label('integrity'); ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Availability</th>
                        <td><?php h()->the_field_label('availability'); ?></td>
                    </tr>
                </tbody>
            </table>
            <small>You can read more about CVSS base scores on <a href="http://en.wikipedia.org/wiki/CVSS">Wikipedia</a> or in the <a href="http://www.first.org/cvss/cvss-guide">CVSS specification</a>.</small>
        </article>

        <article class="report">
            <h2>Proof of concept</h2>
            <div class="rich-text">
                <?php the_field('proof') ?>
            </div>
        </article>

        <article class="report">
            <h2>Advisory timeline</h2>
            <div class="rich-text">
                <?php the_field('timeline') ?>
            </div>
        </article>

        <article class="report">
            <h2>Mitigation/further actions</h2>
            <div class="rich-text">
                <?php the_field('mitigations') ?>
            </div>
        </article>

        <?php $form = new \Dxw\DxwSecurity2017\Lib\AdvisoryEmails\Form();
        $form->displayIfSuperAdmin(); ?>

    </section>

    <aside class="sidebar page-section">
        <section>
            <dl class="inspection-details">
                <dt>Discovered by:</dt>
                <dd><?php if(function_exists('coauthors')) { coauthors(); } else { the_author(); } ?></dd>

                <dt>Advisory ID:</dt>
                <?php global $post; ?>
                <?php if($post->post_status == 'publish' || $post->post_status == 'private'): ?>
                    <dd><?php h()->the_advisory_id(); ?></dt>
                <?php else: ?>
                    <dd>Awaiting publication</dd>
                <?php endif; ?>

                <dt>CVE:</dt>
                <?php if(get_field('cve') != ''): ?>
                    <dd><?php the_field('cve'); ?></dd>
                <?php else: ?>
                    <dd>Awaiting assignment</dd>
                <?php endif; ?>

                <dt>Component/package:</dt>
                <dd><?php the_field('component'); ?></dd>

                <?php if(get_field('codex_link') != ''): ?>
                    <dt>Homepage:</dt>
                    <dd><a href="<?php the_field('codex_link'); ?>"><?php the_field('component')?></a></dd>
                <?php endif; ?>

                <dt>Version:</dt>
                <dd><?php echo esc_html(get_field('version')); ?></dd>
            </dl>
        </section>
        <?php dynamic_sidebar( 'sidebar-primary' ); ?>
    </aside>
</div>

<?php get_template_part('partials/options-banner'); ?>
