<?php

namespace Dxw\DxwSecurity2017\Posts;

class PostTypes implements \Dxw\Iguana\Registerable
{
	public function register()
	{
		add_action('init', [$this, 'addPluginsPostType']);
		add_action('init', [$this, 'manageEditPluginsColumns']);
		add_action('init', [$this, 'managePluginsColumn']);
		add_action('init', [$this, 'addAdvisoriesPostType']);
		add_action('init', [$this, 'advisoryFirstPublishDate']);
		add_action('init', [$this, 'manageEditAdvisoriesColumns']);
		add_action('init', [$this, 'manageAdvisoriesColumn']);
	}

	public function addPluginsPostType()
	{
		register_post_type(
			'plugins',
			[
				'labels' => [
					'name' => 'Inspections',
					'singular_name' => 'Inspection'
				],
				'supports' => ['author', 'revisions', 'title'],
				'public' => true,
				'has_archive' => true,
			]
		);
	}

	public function manageEditPluginsColumns()
	{
		add_filter('manage_edit-plugins_columns', function ($columns) {
			$new_columns = [
				'cb' => $columns['cb'],
				'title' => $columns['title'],
				'version' => 'Versions',
				'author' => 'Author',
				'result' => 'Recommendation',
				'date' => $columns['date'],
			];

			return $new_columns;
		});
	}

	public function managePluginsColumn()
	{
		add_action('manage_plugins_posts_custom_column', function ($column, $post_id) {
			switch ($column) {
				case 'result': echo h()->the_short_recommendation($post_id);
					break;
				case 'version': echo str_replace(',', ', ', get_field('version_of_plugin', $post_id));
					break;
			}
		}, 10, 2);
	}

	public function addAdvisoriesPostType()
	{
		register_post_type(
			'advisories',
			[
				'labels' => [
					'name' => 'Advisories',
					'singular_name' => 'Advisory'
				],
				'public' => true,
				'has_archive' => true,
				'supports' => ['author', 'revisions', 'title'],
			]
		);
	}

	public function advisoryFirstPublishDate()
	{
		add_filter('wp_insert_post', function ($post_id, $post, $update) {
			// Save the date of first publication for the advisory ID
			if ($post->post_type == 'advisories' && !$update) {
				add_post_meta($post_id, '_first_published', $post->post_date);
			}
		}, 3, 10);
	}

	public function manageEditAdvisoriesColumns()
	{
		add_filter('manage_edit-advisories_columns', function ($columns) {
			$new_columns = [
				'cb' => $columns['cb'],
				'title' => $columns['title'],
				'author' => 'Author',
				'workflow' => 'Workflow',
				'age' => 'Age',
				'action' => 'Next action',
				'date' => $columns['date'],
			];

			return $new_columns;
		});
	}

	public function manageAdvisoriesColumn()
	{
		add_action('manage_advisories_posts_custom_column', function ($column, $post_id) {
			$advisory = get_post($post_id);

			switch ($column) {
				case 'workflow': echo ucfirst(get_field('workflow_state', $post_id));
					break;
				case 'age':
					echo $this->advisoryAge($advisory) . ' days';
					break;

				case 'action':
					$state = get_field('workflow_state', $post_id);
					$age = $this->advisoryAge($advisory);

					if ($advisory->post_status == 'draft') {
						echo "Finish the advisory and publish privately";
					} elseif ($advisory->post_status == 'publish') {
						echo "No further action";
					} else {
						if ($state == 'identified') {
							echo "Report to vendor";
						} elseif ($state == 'reported') {
							if ($age <= 14) {
								echo "Work with vendor to fix the problem";
							} elseif ($age > 14 && $age <= 60) {
								echo "Publish on agreed date, or on a reasonable date if no agreement";
							} else {
								echo "Publish immediately";
							}
						} elseif ($state == 'fixed') {
							echo "Publish";
						}
					}

					break;
			}
		}, 10, 2);
	}

	public function advisoryAge($advisory)
	{
		return round((time() - strtotime($advisory->post_date)) / 86400);
	}
}
