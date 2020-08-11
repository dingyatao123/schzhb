<?php
get_header();
?>
<main id="site-content" role="main">
	<div class="detail container">
        <div class="inside">
            <div class="postcontent">
                <p class="t"><?php echo $post->post_title; ?></p>
				<div class="rc">
					<?php echo $post->post_content; ?>
				</div>
            </div>
            <div class="category">
                <p class="title"><span>沪办之窗</span></p>
                <ul>
					<?php
						$args = array(
							'post_type' 	 => 'page',
							'orderby'   	 => 'menu_order',
							'order'   	 => 'asc',
							'tax_query' => array(
								array(
									'taxonomy' => 'category_page',
									'field' => 'slug', //can be set to ID
									'terms' => 'hbzc',
								)
							),
							'posts_per_page' => -1
						);
						$slides = new WP_Query($args);
						$num = $slides->post_count;//总条数
							while ($slides->have_posts()):$slides->the_post();  ?>
							<a href="<?php echo get_the_permalink() ?>"><li><?php echo $post->post_title; ?></li></a>
						<?php endwhile; ?>
                </ul>
            </div>
        </div>
	</div>
</main><!-- #site-content -->
<?php get_footer(); ?>