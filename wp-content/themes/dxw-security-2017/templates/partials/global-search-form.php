<div class="search-form-container">
    <div class="row">
        <form role="search" method="get" id="searchform" class="search-form" action="<?php echo home_url('/') ?>">
            <div class="form-field">
                <label for="s" class="block-label sr-only">Search plugins &amp; advisories:</label>
                <input type="search" aria-label="Search plugins and advisories" value="<?php echo get_search_query() ?>" name="s" id="s">
                <button value="Search" class="button">Search</button>
            </div>
        </form>
    </div>
</div>
