<?php
// Переменная повторителя ссылок с иконками
$posts_link_icons = 'ifr-grid-blocks-posts-link-icons-content';
// Если повторитель ссылок с иконками существует
if (have_rows($posts_link_icons)):
    while (have_rows($posts_link_icons)): the_row();
?>

        <?php
        // Получаем id выбранного поста ссылок с иконками
        $post_id_icons = get_sub_field('ifr-grid-blocks-posts-link-icons-content-id');
        // Если айди получено, то выводим верстку ссылок с иконками
        if (!empty($post_id_icons)) :
        ?>
            <div class="<?php echo (!empty(get_sub_field("ifr-grid-blocks-posts-link-icons--col-width", $post_id_icons)) ? get_sub_field("ifr-grid-blocks-posts-link-icons--col-width", $post_id_icons) : 'col-6 col-lg_2_5'); ?>">

                <?php
                $link_class = get_sub_field('ifr-grid-blocks-posts-link-icons--link-class', $post_id_icons);
                $link_class_add = $link_class ?: ''; // Используем тернарный оператор для определения класса для блока ссылки
                ?>

                <a class="infrastructure-link infrastructure-link_with-icons <?= esc_attr($link_class_add) ?>" href="<?php echo esc_url(get_permalink($post_id_icons)); ?>" target="_blank">

                    <div class="infrastructure-link__content infrastructure-link__content_icons">
                        <?php
                        // Получаем поле с выводом иконки
                        $ifr_icon_2 = get_sub_field('ifr-grid-blocks-posts-link-icons--col-icon', $post_id_icons);
                        ?>
                        <?php if (!empty($ifr_icon_2)):
                            $url_icon_2 = $ifr_icon_2['url']; // Получаем id изображения для категории
                            $image_icon_id = attachment_url_to_postid($url_icon_2);
                        ?>
                            <?= wp_get_attachment_image($image_icon_id, 'full', null, []) ?>
                        <?php endif; ?>

                        <?php if (!empty(get_sub_field('ifr-grid-blocks-posts--link-icons-title', $post_id_icons))) : ?>
                            <span class="infrastructure-link__content-txt infrastructure-link__content-txt_icons">
                                <?php echo get_sub_field('ifr-grid-blocks-posts--link-icons-title', $post_id_icons); ?>
                            </span>
                        <?php else: ?>
                            <span class="infrastructure-link__content-txt infrastructure-link__content-txt_icons">
                                <?php echo get_the_title($post_id_icons); ?>
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