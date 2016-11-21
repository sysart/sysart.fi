<?php
/**
 * Template Name: People
 */

$hero_bg = StyleInjector::addBackground(get_post_thumbnail_id());

$employees = get_posts(array(
  'post_type' => 'employee',
  'orderby' => 'menu_order',
  'numberposts' => -1
));

$peoples_list = new PeoplesList($employees);

get_header();
?>
<div class="hero block <?php echo $hero_bg; ?>">
  <div class="block__content">
    <h1 class="hero__title"><?php the_title(); ?></h1>
  </div>
</div>
<?php echo $peoples_list; ?>
<?php get_footer(); ?>
