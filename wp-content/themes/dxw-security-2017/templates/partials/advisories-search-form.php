<div class="search-form-container">
    <div class="row">
        <form role="search" method="get" id="searchform" class="search-form" action="<?php echo home_url('/') ?>">
            <div class="form-field">
                <label for="s" class="block-label sr-only">Search advisories:</label>
                <input type="hidden" name="post_type" value="advisories">
                <input type="search" value="<?php echo get_search_query() ?>" name="s" id="s">
                <button value="Search" class="button">Search advisories</button>
            </div>
        </form>
    </div>
</div>
