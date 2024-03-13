<?php
/*
Template Name: Dodatkowe Informacje
*/
get_header();
?>

<style>
.related-posts {
    margin-top: 20px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    gap: 20px;
    height:80vh;
}

.related-post {
    width: 30%;
    border-radius: 8px;
    height:300px;
    overflow: hidden;
    background:#f1c540;
    color: black;
    transition: transform 0.3s ease-in-out;
    margin-bottom: 20px;
}

.related-post:hover {
    transform: scale(1.05);
}

.related-post img {
    width: 100%;
    height: 80%;
    object-fit: cover;
    border-radius: 8px 8px 0 0;
}

.related-post-content {
    padding: 15px;
}

.related-post h3 {
    margin: 0;
    font-size: 16px;
}


.related-post a {
    color: black;
    text-decoration: none;
}

.related-post a:hover {
    color: black;
    text-decoration: underline;
}
</style>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        while (have_posts()) :
            the_post();
            get_template_part('template-parts/content', 'page');

            $related_posts = get_posts(array(
                'post_type' => 'dodatkowe_informacje',
                'posts_per_page' => 10,
                'orderby' => 'rand',
            ));

            if ($related_posts) :
                echo '<div class="related-posts">';
                foreach ($related_posts as $post) :
                    setup_postdata($post);
                    ?>
                    <div class="related-post">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium_large'); ?>
                        </a>
                        <div class="related-post-content">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </div>
                    </div>
                    <?php
                endforeach;
                echo '</div>';
                wp_reset_postdata();
            endif;
        endwhile;
        ?>
    </main>
</div>

<?php
get_footer();
?>
