<?php
if (!empty($attributes['grid-blocks-url'])) :

    $url = esc_url($attributes['grid-blocks-url']);
    $post_ID = url_to_postid($url);
?>

    <section class="infrastructure">

        <div class="container main-wrap main-pad-container">

            <div class="infrastructure__content">

                <div class="infrastructure__top main-top row">
                    <div class="infrastructure__top-number">06</div>

                    <?php if (!empty($attributes['grid-blocks-title'])) : ?>
                        <h2 class="infrastructure__top-title main-top__title">
                            <?php echo $attributes['grid-blocks-title']; ?>
                        </h2>
                    <?php else: ?>
                        <h2 class="infrastructure__top-title main-top__title">
                            <?php echo get_the_title($post_ID); ?>
                        </h2>
                    <?php endif; ?>
                </div>

                <div class="row infrastructure__elements">

                    <?php
                    $args = [
                        'post_type' => 'grid_blocks',
                        'orderby' => 'post__in', // Указываем поле сортировки
                        'include' => $post_ID,
                        'post_status' => 'publish', // Опубликованные
                    ];

                    $posts = get_posts($args);
                    global $post;
                    ?>

                    <?php foreach ($posts as $post) : setup_postdata($post); ?>
                        <?php get_template_part('templates/infrastructure'); ?>
                    <?php endforeach;
                    wp_reset_postdata();
                    ?>
                    <?php
                    ?>

                </div>
            </div>
        </div>

    </section>
<?php
endif;
?>