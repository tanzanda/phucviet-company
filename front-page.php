<?php
/**
 * Template Name: Home Page
 * Front page template
 */
?>

<?php
get_header();
?>

<main id="site-content" class="home-page">
  <h1 class="company-name"><?php bloginfo('name'); ?></h1>
  <div class="desc">
    <?= the_content(); ?>
  </div>

  <div class="info">
  <?php if(have_rows('section')) {
    while (have_rows('section')){
      the_row();               
  ?>
      <div class="item">
        <h4 class="title"><?= get_sub_field('title'); ?></h4>
        <div class="content"><?= get_sub_field('content'); ?></div>
      </div>
    <?php } ?>
  <?php } ?>    
  </div>

  <div class="notice-auction">
  <?php if(have_rows('auction_notice')) {
    while (have_rows('auction_notice')){
      the_row();               
  ?>
    <h2 class="title text-start text-md-center"><?= get_sub_field('title'); ?></h2>

    <div class="content"><?= get_sub_field('content'); ?></div>

    <?php if(have_rows('images')) { ?>
    <div class="image-list gallery" id="mainCarousel">
      <?php while (have_rows('images')){
        the_row();
        $image_field = get_sub_field('image');
      ?>
      <div class="image" data-src="<?php echo esc_url($image_field['url']); ?>" data-fancybox="gallery">
        <img class="image-auction" src="<?php echo esc_url($image_field['url']); ?>" alt="<?php echo esc_attr($image_field['alt']); ?>" />
      </div>
      <?php } ?>
    </div>
    <?php } ?>
  
    <?php if(have_rows('files')) { ?>
    <div class="file-list">
      <?php while (have_rows('files')){
        the_row();
        $file_field = get_sub_field('file');
      ?>
      <div>
        <span class="label"><?= get_sub_field('label'); ?>&nbsp;</span>
        <a class="file" href="<?php echo esc_url($file_field['url']); ?>"><?= get_sub_field('name'); ?></a>
      </div>
      <?php } ?>
    </div>
    <?php } ?>   

    <?php } ?>
  <?php } ?>  
  </div>
</main>

<?php
get_footer();
?>

<script type="text/javascript">
  // Fancybox.bind('[data-fancybox="gallery"]');

  jQuery("#mainCarousel").on('init', function(event, slick){
    Fancybox.bind('.slick-slide:not(.slick-cloned)');
  });

  if (jQuery(".file-list").children().length > 2) {
    jQuery("#mainCarousel").slick({
      slidesToShow   : 3,
      slidesToScroll : 1,
      infinite : false,
      dots     : true,
      arrows   : false,
      variableWidth: true,
      centerMode: true,
      responsive : [
        {
          breakpoint : 960,
          settings : {
            centerMode: true,
            slidesToShow   : 1,
            slidesToScroll : 1
          }
        }
      ]
    });
  }

</script>
