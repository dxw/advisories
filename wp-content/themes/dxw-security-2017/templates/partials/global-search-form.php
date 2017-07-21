<div class="search-form-container">
    <div class="row">
        <form role="search" method="get" id="searchform" class="search-form" action="<?php echo home_url('/') ?>">
            <label for="s" class="block-label">Search plugins &amp; advisories:</label>
            <div class="form-field">
                <input type="search" value="<?php echo get_search_query() ?>" name="s" id="s-<?php echo esc_html($type) ?>">
                <button value="Search <?php echo esc_html($type) ?>" class="button">Search</button>
            </div>
        </form>
    </div>
</div>
