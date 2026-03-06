<?php get_header(); ?>

<section class="hero-wrapper">
    <div class="hero-overlay"></div>
    
    <div class="container hero-content">
        <div class="hero-text-box">
            <span class="hero-subtitle">Est. 2026 • Medical Excellence</span>
            <h1 class="hero-title">Rejuvenation <br><span class="italic-serif">Awaits</span></h1>
            <p class="hero-description">Experience the intersection of advanced clinical science and the serenity of a world-class spa.</p>
            <div class="hero-actions">
                <a href="#services" class="btn-primary">View Treatments</a>
                <a href="/contact" class="btn-secondary" style="color: white; margin-left: 20px; text-decoration: none; font-size: 11px; letter-spacing: 2px; text-transform: uppercase; font-weight: 600;">Book Consultation</a>
            </div>
        </div>
    </div>

    <div class="scroll-indicator">
        <div class="mouse"></div>
    </div>
</section>

<main id="services" class="container">
    <div class="section-header">
        <h2 class="section-title">Signature Services</h2>
        <div class="title-divider"></div>
    </div>

    <div class="services-grid">
        <?php
        $services_query = new WP_Query(array('post_type' => 'services', 'posts_per_page' => 3));
        if ($services_query->have_posts()) :
            while ($services_query->have_posts()) : $services_query->the_post(); 
                
                // SENIOR LOGIC: Auto-assign icons based on Service Title
                $title = strtolower(get_the_title());
                $icon = 'fa-spa'; // Default

                if (strpos($title, 'facial') !== false) $icon = 'fa-face-smile';
                if (strpos($title, 'laser') !== false) $icon = 'fa-wand-magic-sparkles';
                if (strpos($title, 'massage') !== false) $icon = 'fa-hands-bubbles';
                ?>
                
                <article class="service-card">
                    <div class="card-icon-wrapper">
                        <i class="fa-solid <?php echo $icon; ?>"></i>
                    </div>
                    <span class="card-category">Advanced Treatment</span>
                    <h3 class="card-title"><?php the_title(); ?></h3>
                    <div class="card-excerpt"><?php the_excerpt(); ?></div>
                    <a href="<?php the_permalink(); ?>" class="card-link">Discover More &rarr;</a>
                </article>

            <?php endwhile; wp_reset_postdata(); endif; ?>
    </div>
</main>

<?php get_footer(); ?>