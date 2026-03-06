<?php get_header(); ?>

<main id="primary" class="site-main" style="max-width: 1000px; margin: 50px auto; padding: 0 20px;">

    <section class="services-header" style="text-align: center; margin-bottom: 50px;">
        <h2 style="font-size: 36px; color: #333;">Our Luxury Treatments</h2>
        <p style="color: #666;">Experience the pinnacle of medical-grade skincare.</p>
    </section>

    <div class="services-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
        <?php
        //  A Custom WP_Query
        $services_query = new WP_Query( array(
            'post_type'      => 'services',
            'posts_per_page' => 3,
            'orderby'        => 'date',
            'order'          => 'DESC',
        ) );

        if ( $services_query->have_posts() ) :
            while ( $services_query->have_posts() ) :
                $services_query->the_post();
                ?>
                <article style="background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid #eee;">
                    <h3 style="color: #bc9c22; margin-top: 0;"><?php the_title(); ?></h3>
                    <div style="color: #555; line-height: 1.6; margin-bottom: 20px;">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: #333; font-weight: bold; border-bottom: 2px solid #bc9c22;">Learn More &rarr;</a>
                </article>
                <?php
            endwhile;
            wp_reset_postdata(); // Essential: tells WP it's done with the custom loop
        else :
            echo '<p>Our specialist treatments are coming soon.</p>';
        endif;
        ?>
    </div>

</main>

<?php get_footer(); ?>