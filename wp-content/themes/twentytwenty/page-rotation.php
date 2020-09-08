<?php
get_header();
?>
<main id="site-content" role="main">
	<div class="detail container">
        <div class="inside nocategory">
            <div class="postcontent shares">
				<p class="t"><?php echo $post->post_title; ?></p>
				<div class="date"><?php echo get_the_date('Y年m月d日 H时m分'); ?>　<?php if($post->post_excerpt)echo '来源：'.$post->post_excerpt; ?>
				<div class="bshare-custom icon-medium" style="float: right;"><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a><a title="分享到微信" class="bshare-weixin"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script><div class="clear"></div></div>
				<div class="rc">
					<img width="100%" src="<?php $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');echo $full_image_url[0]; ?>" alt="">
					<?php echo $post->post_content; ?>
				</div>
            </div>
        </div>
	</div>
</main><!-- #site-content -->
<?php get_footer(); ?>