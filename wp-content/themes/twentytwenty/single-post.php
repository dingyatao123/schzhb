<?php
get_header();
?>
<main id="site-content" role="main">
	<div class="detail container">
        <div class="inside nocategory">
            <div class="postcontent">
				<p class="t"><?php echo $post->post_title; ?></p>
				<p class="date">发表于：<?php echo get_the_date('Y-m-d'); ?></p>
				<div class="rc">
					<?php echo $post->post_content; ?>
				</div>
            </div>
        </div>
	</div>
</main><!-- #site-content -->
<?php get_footer(); ?>