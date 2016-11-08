<?php
/**
 * Template Name: Blogs
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage sysart
 * @since sysart
 */
$fields = get_fields();

get_header();


?>
    <section class="content-section">
      <div class="title">
        <h1><?php echo $post->post_title; ?></h1>
      </div>
      <div class="content">
<?php
echo new PostGrid(array('items' => $fields['blogs'], 'force' => true));
?>
      </div>
    </section>

<?php
get_footer();
