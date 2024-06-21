<?php

namespace Dxw\DxwSecurity2017\Theme;

class Feeds implements \Dxw\Iguana\Registerable
{
	public function register()
	{
		add_action('wp_head', [$this, 'wp_head']);
	}

	public function wp_head()
	{
		?>
          <link rel="alternate" type="application/atom+xml" title="<?php echo get_bloginfo('name') ?> Advisory Feed" href="<?php echo esc_attr(get_post_type_archive_feed_link('advisories', 'atom')) ?>">
          <link rel="alternate" type="application/atom+xml" title="<?php echo get_bloginfo('name') ?> Plugin Feed" href="<?php echo esc_attr(get_post_type_archive_feed_link('plugins', 'atom')) ?>">
        <?php
	}
}
