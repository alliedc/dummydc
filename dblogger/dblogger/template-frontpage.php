<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dblogger
 * Template Name: Frontpage
 */

get_header(); ?>


<!-- banner Page
    ==========================================-->

<?php
    // *************REMOVE THIS ************ Dont use this. Add a default image in customizer thats it. 
	
 $background_img   = esc_url( get_theme_mod( 'dblogger_back_img' ) );   
 $background_img_static   = get_template_directory_uri()."/img/b-1.jpg";
 $image = $background_img ? "$background_img" : "$background_img_static";      
//  $color=esc_attr(get_theme_mod( 'header_textcolor' ));
?>


<section id="home-banner" style="background-image: url(<?php echo $image; ?>);">
    <div class="content">
        <div class="container wow fdeInUp"  data-wow-duration="1s">
            <span>  
                <?php echo  $dblogger_tagline=( get_theme_mod( 'dblogger_tagline_text' ) )?
                    ( get_theme_mod( 'dblogger_tagline_text' ) ):'WELCOME TO DCRAZED'; ?>
            </span>
            <h1> 
                <?php echo $dblogger_heder=( get_theme_mod( 'dblogger_heder_text' ) )?
                    ( get_theme_mod( 'dblogger_heder_text' ) ):'Create your own website with our free themes.'; ?>
            </h1>
            <a class="btn btn-default" href=" <?php echo $dblogger_button_url=( get_theme_mod( 'dblogger_button_url' ) )?
                    ( get_theme_mod( 'dblogger_button_url' ) ):'www.burstfly.com'; ?>">
                
              <?php echo $dblogger_button_text=( get_theme_mod( 'dblogger_button_text' ) )?
                    ( get_theme_mod( 'dblogger_button_text' ) ):'Click more'; ?>
          
            </a> 
        </div>
    </div>
</section>

<!-- Guide Page
    ==========================================-->
<?php //if( get_theme_mod( 'dblogger_guide_check' ) == 1 ) { ?>

<section id="guide-block"> 
  
  <!--section-title-->
  <div class="section-title text-center "> <i class="fa fa-book "></i>
    <h2>
         <?php echo  $dblogger_guide_title=( get_theme_mod( 'dblogger_guide_title' ) )?
                    ( get_theme_mod( 'dblogger_guide_title' ) ):'How to Guides'; ?>
    </h2>
    <p >
        <?php echo  $dblogger_guide_desc=( get_theme_mod( 'dblogger_guide_desc' ) )?
                    ( get_theme_mod( 'dblogger_guide_desc' ) ):'Start a blog and earn money online. Learn from<br>
                      these amazing articles we have created for you <br>that help you build any type of blog from scracth.'; ?>
    </p>
  </div>
  <!--/section-title--> 
  
  <!--guide-list-->
  <div class="guide-list wow fdeInUp">
    <div class="container">
      <div class="row  guide-block"> 
       
       
     <!-- guides tabs -->    
  <div>

  <ul class="nav nav-tabs" >
  <!-- guides tabs ul -->
      <?php
         $firstClass = 'active'; 
         $values=0;
        $count = get_theme_mod( 'dblogger_post_number' );
       $slidecat =get_option( 'dblogger_slide_categories' );

        $query = new WP_Query( array( 'cat' =>$slidecat,'posts_per_page' =>$count ) );
    
    
        if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post();
        $values++;
    ?>
      
      
    <li role="presentation" class="<?php echo $firstClass; ?>"><a href="#<?php echo $values;?>" aria-controls="home" role="tab" data-toggle="tab"><h6><?php the_title();?></h6></a></li>
 
      <?php  $firstClass = ""; endwhile;endif; wp_reset_query();?>
  </ul>

  <!--  guides Tab panes -->
  <div class="tab-content">
      
         <?php
         $firstClass = 'active'; 
         $values=0;
        $count = get_theme_mod( 'dblogger_post_number' );
       $slidecat =get_option( 'dblogger_slide_categories' );

        $query = new WP_Query( array( 'cat' =>$slidecat,'posts_per_page' =>$count ) );
       
    
    
        if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post();
        $values++;
    ?>
      
      
    <div role="tabpanel" class="tab-pane <?php echo $firstClass; ?>" id="<?php echo $values;?>"><?php
            if  ( get_the_post_thumbnail()!='')
            {
             the_post_thumbnail(); 
            }else{?>
          <img src="<?php echo get_template_directory_uri()?>/img/p-1.jpg" class="img-responsive">
          <?php } ?>
    </div>
    
      
      <?php  $firstClass = ""; endwhile;endif;?>
	  
	    <?php wp_reset_query(); //wp_reset_postdata(); ?>
  </div>
</div>
    <!-- /guides tabs -->    
      </div>
    </div>
  </div>
  <!--/guide-list--> 
</section>
<?php //}?>
<!-- Theme Page
    ==========================================-->
<?php //if( get_theme_mod( 'dblogger_theme_check' ) == 1 ) { ?>
    <section id="theme-block">
      <div class="container">
        <div class="row wow fdeInUp"> 
          <!--section-title-->
          <div class="section-title text-center">
            <h2>
                <?php echo  $dblogger_theme_title=( get_theme_mod( 'dblogger_theme_title' ) )?
                ( get_theme_mod( 'dblogger_theme_title' ) ):'Our Themes'; ?>
            </h2>
            <a class="btn btn-white" href="<?php echo  $theme_button_url=( get_theme_mod( 'dblogger_theme_button_url' ) )?
                ( get_theme_mod( 'dblogger_theme_button_url' ) ):'#'; ?>">
                
                <?php echo  $theme_button_text=( get_theme_mod( 'dblogger_theme_button_text' ) )?
                ( get_theme_mod( 'dblogger_theme_button_text' ) ):'more themes'; ?>
            </a>
            <hr>
          </div>
          <!--/section-title--> 
			<?php $page_query = new WP_Query( array( 'post_type' => 'page', ) ); ?>
			 <?php if ( $page_query->have_posts() ) : while ( $page_query->have_posts() ) : $page_query->the_post(); ?>
			  	 
			
			 
          <!--Theme-post-->
          <div class="col-md-4 theme-post "> 
              <?php the_post_thumbnail();?>
              <!--<img src="<?php the_post_thumbnail();?>" class="img-responsive">-->
            <div class="theme-post-caption eq-blocks">
              <h6><?php the_title(); ?> <span class="badge badge-info"><?php _e('Free');?></span></h6>
              <!--view-payment-->
              <div class="view-payment"> <a href="<?php the_permalink();?>"><?php _e('Download Now');?></a> </div>
              <!--/view-payment--> 
            </div>
          </div>
          <!--/Theme-post--> 
		<?php  endwhile;endif;?>
		
      <?php wp_reset_query();  //wp_reset_postdata(); ?>
        </div>
      </div>
    </section>
<?php //}?>

<!--From the blog
    ==========================================-->

<section id="from-blog">
  <div class="container">
    <div class="row wow fdeInUp"> 
      <!--section-title-->
      <div class="section-title text-center">
        <h2><?php echo esc_html__('From the blog');?></h2>
          
           <a class="btn btn-white" href="<?php echo get_page_link();?>"><?php echo esc_html__('See More');?></a> </div>
          <?php $post_query = new WP_Query( array( 'post_type' => 'product', ) ); ?>
		  <?php 
        
                if ( $post_query->have_posts() ) :
                 /* Start the Loop */
		        while ( $post_query->have_posts() ) : $post_query->the_post();	
         
            //get_template_part( 'template-parts/content', get_post_format() );
            get_template_part( 'woocommerce/home-product' );
      
        endwhile;endif;?>
    
      <?php wp_reset_postdata(); ?>
    </div>
  </div>
</section>

<!--Newsletter
    ==========================================-->
<?php if( get_theme_mod( 'dblogger_newsletter_disable' ) == 1 ) {
       
        $dblogger_newsletter_mailchimp = get_theme_mod('dblogger_newsletter_mailchimp');
 ?> 
<section id="newsletter-block">
  <div class="container">
    <div class="row wow fdeInUp"> 
      <!--section-title-->
      <div class="section-title text-center">
        <h3> 
            <?php echo  $dblogger_newsletter_title=( get_theme_mod( 'dblogger_newsletter_title' ) )?
                    ( get_theme_mod( 'dblogger_newsletter_title' ) ):'Subscribe to our newsletter'; ?>
         </h3>
      </div>
      <!--/section-title-->
      
      <div class="col-md-4 col-md-offset-4">
        
        <form action="<?php if ($dblogger_newsletter_mailchimp != '') echo $dblogger_newsletter_mailchimp; ?>" target="_blank">
          <div class="input-group">
            <input class="form-control" type="text" placeholder="Email Address..." value="<?php esc_attr_e('Subscribe', 'dblogger'); ?>">
            <span class="input-group-btn">
            <button  type="button"><i class="fa  fa-chevron-right"></i></button>
            </span></div>
        </form>
        <p> 
            <?php echo  $dblogger_newsletter_det=( get_theme_mod( 'dblogger_newsletter_det' ) )?
                    ( get_theme_mod( 'dblogger_newsletter_det' ) ):'We protect your privacy. We provide you with high quality updates.'; ?>
        </p>
      </div>
    </div>
  </div>
</section>
<?php }?>

<?php
get_footer();
