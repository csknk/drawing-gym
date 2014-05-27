<?php while (have_posts()) : the_post(); ?>
  <?php the_content(); ?>
  <?php
  // WP_Query arguments
    $args = array (
        'post_type'              => 'lessons',
        'category_name'          => 'Gensler',
        'posts_per_page'         => '10',
        'posts_per_archive_page' => '10',
        'order'                  => 'DESC',
    );

    // The Query
    $lessonquery = new WP_Query( $args );

    // The Loop
    if ( $lessonquery->have_posts() ) {
        while ( $lessonquery->have_posts() ) {
            $lessonquery->the_post();
            // do something
        }
    } else {
        // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata();
    ?>
  <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
<?php endwhile; ?>
