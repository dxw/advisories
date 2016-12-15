<div class="search-form">
    <form role="search" method="get" id="searchform" class="form-search" action="<?php echo home_url('/') ?>">
        <input type="hidden" name="post_type" value="plugins">
        <input type="hidden" name="post_type" value="advisories">
        <label for="s">Search advisories &amp; plugins</label>
        <input type="search" value="<?php echo get_search_query() ?>" name="s" id="s-<?php echo esc_html($type) ?>" class="search-query">
        <button value="Search <?php echo esc_html($type) ?>" class="button">Search</button>
    </form>
</div>
