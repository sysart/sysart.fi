<?php
add_action('init', function () {
  register_post_type('blog',
    array(
      'labels' => array(
        'name' => __('Blog posts'),
        'singular_name' => __('Blog post'),
      ),
      'public' => true,
      'has_archive' => false,
      'supports' => array('title', 'excerpt', 'thumbnail', 'editor'),
      'taxonomies' => array('post_tag'),
      'rewrite' => array(
        'slug' => 'blogi'
      )
    )
  );

  register_post_type('hubspotblog',
    array(
      'labels' => array(
        'name' => __('Hubspot blog posts'),
        'singular_name' => __('Hubspot blog post'),
      ),
      'public' => true,
      'has_archive' => false,
      'supports' => array('title', 'excerpt', 'thumbnail')
    )
  );

  register_post_type('employee',
    array(
      'labels' => array(
        'name' => __('Employees'),
        'singular_name' => __('Employee'),
      ),
      'public' => true,
      'has_archive' => false,
      'supports' => array('title', 'excerpt', 'thumbnail', 'editor'),
      'taxonomies' => array('post_tag'),
      'rewrite' => array(
        'slug' => 'tekijat'
      )
    )
  );

  register_post_type('client',
    array(
      'labels' => array(
        'name' => __('Clients'),
        'singular_name' => __('Client'),
      ),
      'public' => true,
      'has_archive' => false,
      'supports' => array('title', 'excerpt', 'thumbnail', 'editor'),
      'taxonomies' => array('post_tag'),
      'rewrite' => array(
        'slug' => 'asiakkaat'
      )
    )
  );

  register_post_type('service',
    array(
      'labels' => array(
        'name' => __('Services'),
        'singular_name' => __('Service'),
      ),
      'public' => true,
      'has_archive' => false,
      'supports' => array('title', 'excerpt', 'thumbnail', 'editor'),
      'taxonomies' => array('post_tag'),
      'rewrite' => array(
        'slug' => 'palvelut'
      )
    )
  );

  register_post_type('job',
    array(
      'labels' => array(
        'name' => __('Jobs'),
        'singular_name' => __('Job'),
      ),
      'public' => true,
      'has_archive' => false,
      'supports' => array('title', 'excerpt', 'thumbnail', 'editor'),
      'taxonomies' => array('post_tag'),
      'rewrite' => array(
        'slug' => 'tyopaikat'
      )
    )
  );
});
