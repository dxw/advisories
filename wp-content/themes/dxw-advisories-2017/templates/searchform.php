<div class="search-form<?php if(is_search()) { echo ' for-results'; } ?>">
    <form role="search" method="get" id="searchform" class="form-search" action="<?php echo home_url('/') ?>">
        <label for="s" class="block-label">Search advisories &amp; plugins &amp;</label>
        <input type="search" value="<?php echo get_search_query() ?>" name="s" id="s-<?php echo esc_html($type) ?>" class="search-query">
        <button value="Search <?php echo esc_html($type) ?>" class="button">
        <!--[if gt IE 9]><!-->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72"><path fill="#fff" d="M70,70a6.79,6.79,0,0,1-9.56,0L44.58,54.11A28.9,28.9,0,0,1,29.25,58.5,29.3,29.3,0,1,1,54.14,44.58L70,60.47A6.77,6.77,0,0,1,70,70ZM47.25,29.25a18,18,0,1,0-18,18A18,18,0,0,0,47.25,29.25Z"/></svg>
        <!--<![endif]-->
        <span>Search</span></button>
        <?php if(is_search()) { ?>
            <div class="filter-options form-group">
                <fieldset class="inline-labels">
                    <legend>Show</legend>

                    <label for="all" class="radio-group" role="radio">
                    <input type="radio" name="post_type" value="all" id="all" <?php checked( $_GET['post_type'], 'all'); checked( $_GET['post_type'], '') ?>/>All</label>

                    <label for="advisories" class="radio-group" role="radio">
                    <input type="radio" name="post_type" value="advisories" id="advisories" <?php checked( $_GET['post_type'], 'advisories') ?>/>Advisories</label>

                    <label for="plugins" class="radio-group" role="radio">
                    <input type="radio" name="post_type" value="plugins" id="plugins" <?php checked( $_GET['post_type'], 'plugins') ?>/>Plugins</label>
                </fieldset>
            </div>
        <?php } ?>
    </form>
</div>
