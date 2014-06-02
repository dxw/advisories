<?php 
 
if($_GET['post_type'] == 'plugins') {
  get_template_part('templates/search', 'plugin'); 
}
else if($_GET['post_type'] == 'advisories') {
  get_template_part('templates/search', 'advisory'); 
}
else if($_GET['post_type'] == 'notices') {
  get_template_part('templates/search', 'notice'); 
}
else {
  get_template_part('templates/search'); 
}
  
  
?>
