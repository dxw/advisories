<div class="search-form">
    <div class="row">
        <h3>Search</h3>

        <div class="search-forms">
            <?php foreach (array('plugins', 'advisories') as $type) : ?>
            <form role="search" method="get" id="searchform-<?php echo esc_html($type) ?>" class="form-search" action="<?php echo home_url('/') ?>">
                <input type="hidden" name="post_type" value="<?php echo esc_html($type) ?>">
                <label for="s-<?php echo esc_html($type) ?>">Search <?php echo esc_html($type) ?></label>
                <input type="search" value="<?php echo get_search_query() ?>" name="s" id="s-<?php echo esc_html($type) ?>" class="search-query">
                <button value="Search <?php echo esc_html($type) ?>" class="button button--small">Search</button>
            </form>
            <?php endforeach ?>
        </div>
    </div>
</div>
