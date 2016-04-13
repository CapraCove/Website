<?php
/*
  Template Name: Portfolio Grid Template
*/

?>

<?php get_header(); ?>

<div class="goats">

	<div class="jumbotron">
        <div class="container center-block">
            <div class="row">
            <div class="col-xs-1">
            </div>
            <div class="col-xs-10">
            <div class="col-xs-4 goatpic center-block">
            <p>
            <div class="goat-caption title">design</div>
            <a href="http://capracove.com/portfolio/zoe/">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/zoe.png" />
            </a><br><h2>ZOE</h2><div class="goat-caption"><a href="mailto:zoe@capracove.com">@capracove.com</a></div><div class="goat-caption email-mobile"><a href="mailto:zoe@capracove.com">email</a></div></p>
            </div>

            <div class="col-xs-4 goatpic">
            <p>
            <div class="goat-caption title">code</div>
            <a href="http://capracove.com/portfolio/emma/">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/emma.png" />
            </a><br><h2>EMMA</h2><div class="goat-caption"><a href="mailto:emma@capracove.com">@capracove.com</a></div><div class="goat-caption email-mobile"><a href="mailto:emma@capracove.com">email</a></div></p>
            </div>

            <div class="col-xs-4 goatpic">
            <p>
            <div class="goat-caption title">balance</div>
            <a href="http://capracove.com/portfolio/kayla">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/kayla.png" />
            </a><br><h2>KAYLA</h2><div class="goat-caption"><a href="mailto:kayla@capracove.com">@capracove.com</a></div><div class="goat-caption email-mobile"><a href="mailto:kayla@capracove.com">email</a></div></p>
            </div>
            </div>
            <div class="col-xs-1">
            </div>
            </div>
        </div>
	</div>

  <div class="container">   
    <div class="row">
      <br>
      <div class="col-md-12">
          <h2 style="letter-spacing: 3px">ALL GOAT WORK</h2><br>
      <br>
      </div>

  </div>
    <div class="row listings">
      <?php
      $temp = $wp_query;
      $wp_query = null;
      $wp_query = new WP_Query();
      $wp_query->query('showposts=10&post_type=goats'.'&paged='.$paged);
      if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
       
      <div class="col-md-6 portfolio-piece">

          <?php
            $thumbnail_id = get_post_thumbnail_id(); 
            $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
          ?>

          <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title();?> graphic" width="100%"></a>
          <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span class="glyphicon glyphicon-pencil"></span> <?php

          $terms = get_the_terms( $post->ID , 'portfolio' );
          $c = 0;
          $goat_total = count($terms);

          foreach ( $terms as $term ) {
          $c++;
          echo $term->name;
          if ($goat_total < 3){
            if ($c < $goat_total ) echo ' & ';
          }
          else {
            if ($c < $goat_total-1) echo ', ';
            else if ($c < $goat_total) echo ' & ';
          }
        }
          ?></p>

      </div>

      <?php // $portfolio_count = $the_query->current_post + 1; ?>
      <?php // if ( $portfolio_count % 4 == 0): ?>



      <?php //endif; ?>


      <?php endwhile; ?>

            </div><div class="row pager">
      <div class="portfolio-piece">
      <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
      <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
      </div>
      <?php $wp_query = null;
      $wp_query = $temp;
      ?>
      <?php else : ?>

      <h2>Not Found</h2>
      <p>Sorry, but you are looking for something that isn't here.</p>
      <?php endif; ?>
    </div>
    <?php get_footer(); ?>
    </div>
    </div>











