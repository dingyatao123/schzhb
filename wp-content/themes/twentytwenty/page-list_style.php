<?php
get_header();

$post_name = get_post( $thisid )->post_name;
$pageid = isset( $_REQUEST['pageid'] )? intval($_REQUEST['pageid']):1;
$per_page = 10;

$args = array(
	'post_type' 	 => 'scfq',
	'orderby'   	 => 'date',
	'order'   	 => 'desc',
	'posts_per_page' => -1
);
$wp_query = new WP_Query($args);
$num = $wp_query->post_count;

$max_page = ceil($num/$per_page);//页数

function mo_paging($post_name,$pageid,$max_page) {
    $p = 3;
	
    if ( $max_page <= 1 ) return; 
    echo '<div class="pagination"><ul>';
	if ( empty( $pageid ) ) $pageid = 1;
    echo '<li class="prev-page">'; previous_posts_link('上一页'); echo '</li>';
    if ( $pageid > $p + 1 ) _paging_link( 1, '<li>第一页</li>',$post_name);
    if ( $pageid > $p + 2 ) echo "<li><span>···</span></li>";
    for( $i = $pageid - $p; $i <= $pageid + $p; $i++ ) { 
        if ( $i > 0 && $i <= $max_page ) $i == $pageid ? print "<li class=\"active\"><span>{$i}</span></li>" : _paging_link( $i,'',$post_name);
    }
    if ( $pageid < $max_page - $p - 1 ) echo "<li><span> ... </span></li>";
    echo '<li class="next-page">'; next_posts_link('下一页'); echo '</li>';
    echo '<li><span>共 '.$max_page.' 页</span></li>';
    echo '</ul></div>';
}

function _paging_link( $i, $title = '',$post_name) {
    if ( $title == '' ) $title = "第 {$i} 页";
    echo "<li><a href='".home_url()."/{$post_name}?pageid={$i}'>{$i}</a></li>";
}
?>
<main id="site-content" role="main">
	<div class="detail container liststyle">
        <div class="inside list">
            <div class="postcontent">
                <p class="t"><?php echo $post->post_title; ?></p>
				<ul>
					<?php
						$args = array(
							'post_type' 	 => 'scfq',
							'orderby'   	 => 'date',
							'order'   	 => 'desc',
							'posts_per_page' => $per_page,
							'paged' => $pageid
						);
						$slides = new WP_Query($args);
						while ($slides->have_posts()):$slides->the_post(); ?>
						<li><a href="<?php echo get_the_permalink() ?>"><div><img src="<?php $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');echo $full_image_url[0]; ?>" alt=""></div></a><div><p><a href="<?php echo get_the_permalink() ?>"><?php the_title(); ?></a><p><?php echo strip_tags(mb_substr($post->post_content, 0, 140)); ?><div></p><div class="clear"></div></li>
					<?php endwhile; ?>
				</ul>
				<?php mo_paging($post_name,$pageid,$max_page); ?>
            </div>
            <div class="category">
                <p class="title"><span>四川风情</span></p>
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
									'terms' => 'scfq',
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