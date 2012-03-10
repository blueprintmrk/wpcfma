<!-- Begin content_scroll_pane -->
<div class="content_scroll_pane"> 
	<div class="page-mid-content"> <!-- Begin page-mid-content-->
        <h1><?php the_title(); ?></h1>
 
        
        <div class="clear"></div>
        <ul class="ul_annee block">
        	<li class="text_title">Année</li>
           <?php 
           $post_year_newgest = 2012;
           $post_year_oldgest = 2000;
           
            query_posts(array(
                'post_type'=>'post',
                'taxonomy'=>'category',
                'term'=>'dossiers',
                'posts_per_page'=>1,
                'orderby'=>'date',
                'order'=>'DSC'
                )
            );
            if (have_posts()) : while (have_posts()): the_post(); 
                    $post_year_newgest = get_the_time('Y');
                 endwhile; 
             endif;
             wp_reset_query();
             
             query_posts(array(
                'post_type'=>'post',
                'taxonomy'=>'category',
                'term'=>'dossiers',
                'posts_per_page'=>1,
                'orderby'=>'date',
                'order'=>'ASC'
                )
            );
            if (have_posts()) : while (have_posts()): the_post(); 
                    $post_year_oldgest = get_the_time('Y');
                 endwhile; 
             endif;
             wp_reset_query();
             
         
         if ($post_year_oldgest <= $post_year_newgest){
            for ($tmp = $post_year_newgest ; $tmp >= $post_year_oldgest ; $tmp-- ){
                echo '<li class="theyear">'.$tmp.'</li>';
            }
         }
        
         
         ?>
        </ul>
        
         <ul class="ul_mois block">
        	<li class="text_title">Mois</li>
            <li class="themonth" month="1" >Janvier</li>
            <li class="themonth" month="2">Février</li>
            <li class="themonth" month="3">Mars</li>
            <li class="themonth" month="4">Avril</li>
            <li class="themonth" month="5">Mai</li>
            <li class="themonth" month="6">Juin</li>
            <li class="themonth" month="7">Juillet</li>
            <li class="themonth" month="8">Août</li>
            <li class="themonth" month="9">Septembre</li>
            <li class="themonth" month="10">Octobre</li>
            <li class="themonth" month="11">Novembre</li>
            <li class="themonth" month="12">Décembre</li>
        </ul>
        
        <ul class="ul_articles block">
            <li class="text_title">Articles</li>
        	<?php
            query_posts(array(
                   'post_type'=>'post',
                'taxonomy'=>'category',
                'term'=>'dossiers',
                'orderby'=>'date',
                'order'=>'DSC'
                )
            );
                if (have_posts()) : while (have_posts()): the_post();  
                    echo '<li>';
                    echo '<a href="'.get_permalink().'" >';
                    echo '- ';
                    echo get_the_title();
                    echo '</a></li>';   
                 endwhile; 
                else: 
                    echo __('');
                endif;
             wp_reset_query();
            ?>         
        </ul>
        <div class="clear"></div>
        
	</div> <!-- End page-mid-content-->
</div> 
<!-- End content_scroll_pane-->