<?php
// Переменная повторителя нижних колонок
$bottom_cols = 'ifr-grid-blocks-posts-bottom-content';
// Если повторитель нижних колонок существует
if (have_rows($bottom_cols)):
    while (have_rows($bottom_cols)): the_row();
?>

        <?php
        // Получаем id выбранного поста нижних колонок
        $post_id = get_sub_field('ifr-grid-blocks-posts-bottom-content-id');
        // Если айди получено, то выводим верстку нижних колонок
        if (!empty($post_id)) :
        ?>
            <div class="<?php echo (!empty(get_sub_field("ifr-grid-blocks-posts-bottom--col-width", $post_id)) ? get_sub_field("ifr-grid-blocks-posts-bottom--col-width", $post_id) : 'col-6 col-lg_2_5'); ?>">

                <?php
                $link_class = get_sub_field('ifr-grid-blocks-posts-bottom--link-class', $post_id);
                $link_class_add = $link_class ?: ''; // Используем тернарный оператор для определения класса для блока ссылки
                ?>

                <a class="infrastructure-link infrastructure-link_bottom <?= esc_attr($link_class_add) ?>" href="<?php echo esc_url(get_permalink($post_id)); ?>" target="_blank">

                    <div class="infrastructure-link__content infrastructure-link__content_bottom">
                        <?php
                        // Получаем поле с выводом иконки
                        $ifr_icon_3 = get_sub_field('ifr-grid-blocks-posts-bottom--col-icon', $post_id);
                        ?>
                        <?php if (!empty($ifr_icon_3)):
                            $url_icon_3 = $ifr_icon_3['url']; // Получаем id изображения для категории
                            $image_icon_id_2 = attachment_url_to_postid($url_icon_3);
                        ?>
                            <?= wp_get_attachment_image($image_icon_id_2, 'full', null, []) ?>
                        <?php endif; ?>

                        <?php if (!empty(get_sub_field('ifr-grid-blocks-posts--bottom-title', $post_id))) : ?>
                            <span class="infrastructure-link__content-txt infrastructure-link__content-txt_bottom">
                                <?php echo get_sub_field('ifr-grid-blocks-posts--bottom-title', $post_id); ?>
                            </span>
                        <?php else: ?>
                            <span class="infrastructure-link__content-txt infrastructure-link__content-txt_bottom">
                                <?php echo get_the_title($post_id); ?>
                            </span>
                        <?php endif; ?>

                    </div>
                </a>
            </div>
        <?php endif; // Конец обхода содержимого поста нижних колонок по ID 
        ?>

<?php
    endwhile; // Конец обхода повторителя нижних колонок
endif; // Конец проверки на существование повторителя нижних колонок
?>