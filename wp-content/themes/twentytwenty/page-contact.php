<?php
get_header();
?>
<main id="site-content" role="main">
	<div class="detail container">
        <div class="inside">
            <div class="postcontent" style="min-height: 454px;">
                <p class="t"><?php echo $post->post_title; ?></p>
				<div class="rc">
                    <?php echo $post->post_content; ?>
				</div>
            </div>
            <div class="category">
                <p class="title"><span>访客留言</span></p>
				<div class="rc2">
                    <?php $content = apply_filters( 'the_content',get_the_excerpt());
                        echo  $content;?>
                </div>
            </div>
			<div class="clear"></div>
        </div>
	</div>
</main><!-- #site-content -->
<?php get_footer(); ?>