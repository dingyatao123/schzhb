<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>
<link href="<?php bloginfo('template_directory'); ?>/assets/css/swiper.min.css" rel="stylesheet">
<script src="<?php bloginfo('template_directory'); ?>/assets/js/swiper.min.js" type='text/javascript'></script>

<main id="site-content" role="main">
	<div class="wrap" id="wrap">
		<ul class="content"></ul>
		<a href="javascript:;" class="prev" style="display: none;">&lt;</a>
		<a href="javascript:;" class="next" style="display: none;">&gt;</a>
	</div>
	<div id="hb">
		<div class="left">
			<div class="swiper-container swiper1">
				<div class="swiper-wrapper">
					<?php
						$args = array(
							'post_type' 	 => 'page',
							'orderby'   	 => 'menu_order',
							'order'   	 => 'desc',
							'tax_query' => array(
								array(
									'taxonomy' => 'category',
									'field' => 'slug', //can be set to ID
									'terms' => 'rotation2',
								)
							),
							'posts_per_page' => -1
						);
						$slides = new WP_Query($args);
						$num = $slides->post_count;//总条数
						if($num>0){
							while ($slides->have_posts()):$slides->the_post();  ?>
							<div class="swiper-slide li li<?php echo $post->ID; ?>">
								<img width="100%" src="<?php $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');echo $full_image_url[0]; ?>" alt="">
								<p><?php echo $post->post_title; ?></p>
							</div>
						<?php endwhile;} ?>
				</div>
    			<div class="swiper-pagination"></div>
			</div>
			<script>
				$(document).ready(function(){
					var swiper = new Swiper('.swiper1', {
						slidesPerView: 1,
						loop: true,
						pagination: {
							el: '.swiper-pagination',
						},
						autoplay: {
							delay: 4000,
							disableOnInteraction: false,
						}
					});
					$('.swiper1').hover(function(){
						swiper.autoplay.stop();
					},function(){
						swiper.autoplay.start();
					});
				});
			</script>
		</div>
		<div class="left">
			<h2><?php echo get_post(1)->post_title; ?> <a href="<?php echo get_permalink(1); ?>">更多>></a></h2>
			<div><?php echo get_post(1)->post_content; ?></div><a href="<?php echo get_permalink(1); ?>">[详情]</a>
		</div>
		<div class="left">

		</div>
		<div class="clear"></div>
	</div>

</main><!-- #site-content -->

<?php get_footer(); ?>
<script>
	

window.onload=function(){
	let imgArr=[];
	<?php
		$args = array(
			'post_type' 	 => 'page',
			'orderby'   	 => 'date',
			'order'   	 => 'desc',
			'tax_query' => array(
				array(
					'taxonomy' => 'category',
					'field' => 'slug', //can be set to ID
					'terms' => 'rotation',
				)
			),
			'posts_per_page' => -1
		);
		$slides = new WP_Query($args);
		$num = $slides->post_count;//总条数
		if($num>0){
			$a = ceil(8/$num);
			for($i=0;$i<$a;$i++){
			while ($slides->have_posts()):$slides->the_post();  ?>
			
			var obj = { "path" : "<?php $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');echo $full_image_url[0]; ?>" }
			imgArr.push(obj);
	<?php endwhile;} ?>
    var size=[
		{"top":60,"left":0,"width":400,"height":240,"zIndex":1,"opacity":0},
		{"top":60,"left":0,"width":400,"height":240,"zIndex":1,"opacity":0},
        {"top":60,"left":0,"width":400,"height":240,"zIndex":1,"opacity":0},
        {"top":60,"left":0,"width":400,"height":240,"zIndex":2,"opacity":40},
        {"top":30,"left":150,"width":500,"height":300,"zIndex":3,"opacity":70},
        {"top":0,"left":300,"width":600,"height":360,"zIndex":4,"opacity":100},
        {"top":30,"left":550,"width":500,"height":300,"zIndex":3,"opacity":70},
        {"top":60,"left":800,"width":400,"height":240,"zIndex":2,"opacity":40}
    ];
	var b=imgArr.length-size.length;
	if(b>0){
		for(i=0;i<b;i++){
			size.push({"top":60,"left":800,"width":400,"height":240,"zIndex":1,"opacity":0});
		}
	}
    var imgSum=imgArr.length;
    var wrap=document.getElementById('wrap');
    var cont=wrap.firstElementChild || wrap.firstChild;
    var btnArr=wrap.getElementsByTagName('a');
    var falg=true;
    var speed=7000;
    wrap.onmouseover=function(){
        for (var i=0;i<btnArr.length;i++) {
            btnArr[i].style.display='block';
        }
        clearInterval(wrap.timer);
    }
    wrap.onmouseout=function(){
        for (var i=0;i<btnArr.length;i++) {
            btnArr[i].style.display='none';
        }
        wrap.timer=setInterval(function(){
             move(true);
         },speed);
    }
    for (var i=0;i<imgSum;i++) {
        var lis=document.createElement('li');             
        // lis.style.cssText='top:'+size[i].top+'px;'+'left:'+size[i].left+'px;'+'width:'+size[i].width+'px;'+'z-index:'+size[i].zIndex+';'+'height:'
        // +size[i].height+'px;'+'opacity:'+size[i].opacity+';';
        lis.style.backgroundImage='url('+imgArr[i].path+')';
        cont.appendChild(lis);
    }
    var liArr=cont.children;
    move();
    wrap.timer=setInterval(function(){
        move(true);
    },speed);
    btnArr[1].onclick=function(){
        if (falg) {
            move(true);
        }
    }
    btnArr[0].onclick=function(){
        if (falg) {
            move(false);
        }
    }
    function move(bool){
        if(bool!=undefined){
            if(bool){
                size.unshift(size.pop());
            }else {
                size.push(size.shift());
            }
        }
        for (var i=0;i<liArr.length;i++) {
            animate(liArr[i],size[i],function(){
                falg=true;
            });
        }
    }
	<?php } ?>
}


function getStyle(obj,attr){
	return obj.currentStyle ? obj.currentStyle[attr] : window.getComputedStyle(obj,null)[attr];
}

function animate(obj,json,fn){
	clearInterval(obj.timer);
	obj.timer=setInterval(function(){
		var bool=true;
		for(var k in json){
			var leader;
			if (k=='opacity') {
				if (getStyle(obj,k)==undefined) {
					leader=100;
				}else {
					leader=parseInt(getStyle(obj,k)*100);
				}
			}else {
				leader=parseInt(getStyle(obj,k)) || 0;
			}
			var step=(json[k]-leader)/10;
			step=step>0?Math.ceil(step):Math.floor(step);
			leader=leader+step;
			if(k=='zIndex'){
				obj.style[k]=json[k];
			}else if(k=='opacity'){
				obj.style[k]=leader/100;
				obj.style.filter='alpha(opacity='+leader+')';
			}else {
				obj.style[k]=leader+'px';
			}
			if(json[k]!=leader){
				bool=false;
			}
		}
		if(bool){
			clearInterval(obj.timer);
			if (fn) {
				fn();
			}
		}
	},10);
}
</script>