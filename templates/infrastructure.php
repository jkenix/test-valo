<?php
// Если гибкий контент существует
if (have_rows('grid-blocks-posts-wrap')):
    // Проходимся по нему
    while (have_rows('grid-blocks-posts-wrap')): the_row();
?>

        <?php // Порядок вывода шаблонов зависит от положения шаблона в гибком контенте "Блока" ?>

        <?php
        // Выводим шаблон 1-3 блоков 
        if (get_row_layout() == 'ifr-grid-blocks-posts-1_3'):
        ?>

            <?php get_template_part('templates/first-cols', null, []); ?>

        <?php endif; // Конец Вывода шаблона 1-3 блоков 
        ?>

        <?php
        // Выводим шаблон ссылок с иконками (4 - 8 блоки)
        if (get_row_layout() == 'ifr-grid-blocks-posts-link-icons'):
        ?>

            <div class="col-12 col-lg-8 infrastructure-links-icons">
                <div class="row infrastructure-links-icons__elements">

                    <?php get_template_part('templates/link-icons', null, []); ?>

                </div>
            </div>

        <?php endif; // Конец Вывода шаблона (4 - 8 блоки) 
        ?>

        <?php
        // Выводим шаблон нижних колонок (9 - 13 блоки)
        if (get_row_layout() == 'ifr-grid-blocks-posts-bottom'):
        ?>

            <?php get_template_part('templates/bottom-cols', null, []); ?>

        <?php endif; // Конец Вывода шаблона нижних колонок (9 - 13 блоки) 
        ?>

<?php
    // Конец обхода "Гибкого контента"
    endwhile;
endif;
?>