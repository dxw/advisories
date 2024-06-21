<?php

namespace Dxw\DxwSecurity2017\Theme;

class PostClasses implements \Dxw\Iguana\Registerable
{
	public function register()
	{
		add_filter('post_class', [$this, 'recommendationStatusClass']);
	}

	public function recommendationStatusClass($classes)
	{
		global $post;
		$recommendationStatus = get_field('recommendation', $post->ID);
		if ($recommendationStatus) {
			$classes[] = $recommendationStatus;
		}
		return $classes;
	}
}
