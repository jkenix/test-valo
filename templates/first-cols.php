<?php
// Переменная повторителя 1-3 блоков
$posts_1_3 = 'ifr-grid-blocks-posts-1_3-content';
// Если повторитель существует
if (have_rows($posts_1_3)):
    while (have_rows($posts_1_3)): the_row();
?>

        <?php
        // Получаем id выбранного поста 1-3 блоков
        $post_id_1_3 = get_sub_field('ifr-grid-blocks-posts-1_3-content-id');
        // Если айди получено, то выводим верстку
        if (!empty($post_id_1_3)) :
        ?>

            <div class="<?php echo (!empty(get_sub_field("ifr-grid-blocks-posts-1_3--col-width", $post_id_1_3)) ? get_sub_field("ifr-grid-blocks-posts-1_3--col-width", $post_id_1_3) : 'col-6 col-lg_2_5'); ?>">

                <a class="infrastructure-link infrastructure-link_bg" href="<?php echo esc_url(get_permalink($post_id_1_3)); ?>" target="_blank">

                    <?php
                    // Проверка флажка на отображении фонового изображения
                    $ifr_bg_img_shown = get_sub_field('ifr-grid-blocks-posts-1_3--col-bg-switch', $post_id_1_3);
                    if ($ifr_bg_img_shown === true): // Если флажок стоит, то оно выводится
                        $url_bg = wp_get_attachment_url(get_post_thumbnail_id($post_id_1_3)); // Получаем url миниатюры поста
                        $image_id = attachment_url_to_postid($url_bg); // Получаем id миниатюры поста
                    ?>
                        <div class="infrastructure-link__bg-col" itemscope itemtype="https://schema.org/ImageObject">

                            <?php echo wp_get_attachment_image(
                                $image_id,
                                'full',
                                null,
                                ['itemprop' => 'image']
                            ); ?>

                        </div>
                    <? endif; ?>

                    <div class="infrastructure-link__content">
                        <?php
                        // Получаем поле с выводом иконки
                        $ifr_icon = get_sub_field('ifr-grid-blocks-posts-1_3--col-icon', $post_id_1_3);
                        ?>
                        <?php if (!empty($ifr_icon)):
                            $url_icon = $ifr_icon['url']; // Получаем id изображения для категории
                            $image_icon_id = attachment_url_to_postid($url_icon);
                        ?>
                            <?= wp_get_attachment_image($image_icon_id, 'full', null, []) ?>
                        <?php endif; ?>

                        <?php if (!empty(get_sub_field('ifr-grid-blocks-posts-1_3-title', $post_id_1_3))) : ?>
                            <span class="infrastructure-link__content-txt">
                                <?php echo get_sub_field('ifr-grid-blocks-posts-1_3-title', $post_id_1_3); ?>
                            </span>
                        <?php else: ?>
                            <span class="infrastructure-link__content-txt">
                                <?php echo get_the_title($post_id_1_3); ?>
                            </span>
                        <?php endif; ?>

                    </div>
                </a>
            </div>
        <?php endif; // Конец обхода содержимого поста по ID 
        ?>

<?php
    endwhile; // Конец обхода повторителя
endif; // Конец проверки на существование повторителя
?>