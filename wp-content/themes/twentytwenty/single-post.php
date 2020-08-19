<?php
get_header();
?>
<main id="site-content" role="main">
	<div class="detail container">
        <div class="inside nocategory">
            <div class="postcontent">
				<p class="t"><?php echo $post->post_title; ?></p>
				<p class="date"><?php echo get_the_date('Y年m月d日 H时m分'); ?> <?php if($post->post_excerpt)echo '来源：'.$post->post_excerpt; ?></p>
				<div class="rc">
					<?php echo $post->post_content; ?>
				</div>
            </div>
        </div>
	</div>
</main><!-- #site-content -->
<?php get_footer(); ?>