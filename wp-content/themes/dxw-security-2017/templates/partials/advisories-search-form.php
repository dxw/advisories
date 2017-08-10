<div class="search-form-container">
    <div class="row">
        <form role="search" method="get" id="searchform" class="search-form" action="<?php echo home_url('/') ?>">
            <label for="s" class="block-label">Search advisories:</label>
            <div class="form-field">
                <input type="hidden" name="post_type" value="advisories">
                <input type="search" value="<?php echo get_search_query() ?>" name="s" id="s">
                <button value="Search" class="button">Search</button>
            </div>
        </form>
    </div>
</div>
