<?php

namespace Dxw\DxwSecurity2017\Theme;

class Media implements \Dxw\Iguana\Registerable
{
	public function register()
	{
		set_post_thumbnail_size(150, 150, true);
		add_image_size('medium', 200, 200, true);
		add_image_size('large', 800, 300, true);
	}
}
