<?php
// Если гибкий контент существует
if (have_rows('grid-blocks-posts-wrap')):
    // Проходимся по нему
    while (have_rows('grid-blocks-posts-wrap')): the_row();
?>

        <?php
        // Выводим шаблон 1-3 блоков 
        if (get_row_layout() == 'ifr-grid-blocks-posts-1_3'):
            // Переменная повторителя
            $posts_1_3 = 'ifr-grid-blocks-posts-1_3-content';
            // Если повторитель существует
            if (have_rows($posts_1_3)):
                while (have_rows($posts_1_3)): the_row();
        ?>
                    <?php
                    // Получаем id выбранного поста
                    $post_id_1_3 = get_sub_field('ifr-grid-blocks-posts-1_3-content-id');
                    // Если айди получено, то выводим верстку
                    if (!empty($post_id_1_3)) :
                    ?>
                        <div class="<?php echo (!empty(get_sub_field("ifr-grid-blocks-posts-1_3--col-width", $post_id_1_3)) ? get_sub_field("ifr-grid-blocks-posts-1_3--col-width", $post_id_1_3) : 'col-sm-4_5'); ?>">

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
        <?php endif; // Конец Вывода шаблона 1-3 блоков 
        ?>

        <?php
        // Выводим шаблон ссылок с иконками (3 - 7 блоков)
        if (get_row_layout() == 'ifr-grid-blocks-posts-link-icons'):
            // Переменная повторителя
            $posts_link_icons = 'ifr-grid-blocks-posts-link-icons-content'; ?>

            <div class="col-12 col-lg-8 infrastructure-links-icons">
                <div class="row infrastructure-links-icons__elements">

                    <?php
                    // Если повторитель существует
                    if (have_rows($posts_link_icons)):
                        while (have_rows($posts_link_icons)): the_row();
                    ?>

                            <?php
                            // Получаем id выбранного поста
                            $post_id = get_sub_field('ifr-grid-blocks-posts-link-icons-content-id');
                            // Если айди получено, то выводим верстку
                            if (!empty($post_id)) :
                            ?>
                                <div class="<?php echo (!empty(get_sub_field("ifr-grid-blocks-posts-link-icons--col-width", $post_id)) ? get_sub_field("ifr-grid-blocks-posts-link-icons--col-width", $post_id) : 'col-sm-4_5'); ?>">

                                    <?php
                                    $link_class = get_sub_field('ifr-grid-blocks-posts-link-icons--link-class', $post_id);
                                    $link_class_add = $link_class ? : ''; // Используем тернарный оператор для определения класса для блока ссылки
                                    ?>

                                    <a class="infrastructure-link infrastructure-link_icons <?= esc_attr($link_class_add) ?>" href="<?php echo esc_url(get_permalink($post_id)); ?>" target="_blank">

                                        <div class="infrastructure-link__content infrastructure-link__content_icons">
                                            <?php
                                            // Получаем поле с выводом иконки
                                            $ifr_icon_2 = get_sub_field('ifr-grid-blocks-posts-link-icons--col-icon', $post_id);
                                            ?>
                                            <?php if (!empty($ifr_icon_2)):
                                                $url_icon_2 = $ifr_icon_2['url']; // Получаем id изображения для категории
                                                $image_icon_id = attachment_url_to_postid($url_icon_2);
                                            ?>
                                                <?= wp_get_attachment_image($image_icon_id, 'full', null, []) ?>
                                            <?php endif; ?>

                                            <?php if (!empty(get_sub_field('ifr-grid-blocks-posts--link-icons-title', $post_id))) : ?>
                                                <span class="infrastructure-link__content-txt infrastructure-link__content-txt_icons">
                                                    <?php echo get_sub_field('ifr-grid-blocks-posts--link-icons-title', $post_id); ?>
                                                </span>
                                            <?php else: ?>
                                                <span class="infrastructure-link__content-txt infrastructure-link__content-txt_icons">
                                                    <?php echo get_the_title($post_id); ?>
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

                </div>
            </div>
        <?php endif; // Конец Вывода шаблона (3 - 7 блоков) 
        ?>



<?php
    // Конец обхода "Гибкого контента"
    endwhile;
endif;
?>