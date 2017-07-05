<?php

add_action( 'init', function() {
	register_post_type( 'plugins',
		array(
			'labels' => array(
				'name' => __( 'Inspections' ),
				'singular_name' => __( 'Inspection' )
			),
		'public' => true,
		'has_archive' => true,
    'supports' => array('author', 'revisions', 'title'),
		)
	);

	add_filter('manage_edit-plugins_columns', function($columns) {

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

	add_action('manage_plugins_posts_custom_column', function($column, $post_id) {
   switch($column) {
   	case 'result': the_short_recommendation($post_id); break;
   	case 'version': echo str_replace(',', ', ', get_field('version_of_plugin', $post_id)); break;
   }
	}, 10, 2 );

	register_post_type( 'advisories',
		array(
			'labels' => array(
				'name' => __( 'Advisories' ),
				'singular_name' => __( 'Advisory' )
			),
		'public' => true,
		'has_archive' => true,
    'supports' => array('author', 'revisions', 'title'),
		)
	);

  add_filter('wp_insert_post', function($post_id, $post, $update) {
    // Save the date of first publication for the advisory ID
    if($post->post_type == 'advisories' && !$update) {
      add_post_meta($post_id, '_first_published', $post->post_date);
    }
  }, 3, 10);

	add_filter('manage_edit-advisories_columns', function($columns) {

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

	add_action('manage_advisories_posts_custom_column', function($column, $post_id) {
	  $advisory = get_post($post_id);

    switch($column) {
	   	case 'workflow': echo ucfirst(get_field('workflow_state', $post_id)); break;
	   	case 'age':
	   	  echo  advisory_age($advisory) . ' days';
	   	  break;

	   	case 'action':
	   	  $state = get_field('workflow_state', $post_id);
	   	  $age = advisory_age($advisory);

        if($advisory->post_status == 'draft') {
        	echo "Finish the advisory and publish privately";
        }
        elseif($advisory->post_status == 'publish') {
          echo "No further action";
        }
        else {
		      if($state == 'identified') {
		        echo "Report to vendor";
		      }
		      else if($state == 'reported') {
		      	if($age <= 14) {
		      	  echo "Work with vendor to fix the problem";
		        }
		        else if($age > 14 && $age <= 60) {
		        	echo "Publish on agreed date, or on a reasonable date if no agreement";
		        }
		        else {
		        	echo "Publish immediately";
		        }
		      }
		      else if($state == 'fixed') {
		      	echo "Publish";
		      }
		    }

	   	  break;
	  }
	}, 10, 2 );
});

function advisory_age($advisory){
	return round((time() - strtotime($advisory->post_date)) / 86400);
}

