<?php foreach (array('advisories', 'plugins') as $type) : ?>
  <form role="search" method="get" id="searchform-<?php echo esc_html($type) ?>" class="form-search search-header visible-desktop visible-tablet" action="<?php echo home_url('/') ?>">
    <input type="hidden" name="post_type" value="<?php echo esc_html($type) ?>">
    <label class="visuallyhidden" for="s-<?php echo esc_html($type) ?>">Search <?php echo esc_html($type) ?>:</label>
    <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s-<?php echo esc_html($type) ?>" class="search-query" placeholder="Search <?php echo esc_html($type) ?>">
    <button value="Search <?php echo esc_html($type) ?>"><i class="icon-search"></i></button>
  </form>
<?php endforeach ?>
