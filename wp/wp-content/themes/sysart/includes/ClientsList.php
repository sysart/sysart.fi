<?php
class ClientsList {
  public function __construct($client_ids) {
    $this->clients = '';

    foreach ($client_ids as $id) {
      $post = get_post($id);
      $url = get_permalink($post);

      $background = StyleInjector::addBackground(get_post_thumbnail_id($post));

      $this->clients .= <<<EOC
<section class="col-xs-12 col-sm-4 col-md-3">
  <div class="item item--small-margin item--square item--background $background item--hover item--hide-blur">
    <a href="$url"></a>
  </div>
  <div class="people-content no-child-margins text--center">
    <a href="$url">
      <h2 class="title title--thinner">{$post->post_title}</h2>
    </a>
  </div>
</section>
EOC;
    }

  }

  public function __toString() {
    return <<<EOC
<div class="block row no-gutter text text--small">
  {$this->clients}
</div>
EOC;
  }
}
