<?php
## Добавляет миниатюры записи в таблицу записей в админке
if (1) {
	add_action('init', 'add_post_thumbs_in_post_list_table', 20);
	function add_post_thumbs_in_post_list_table()
	{
		// проверим какие записи поддерживают миниатюры
		$supports = get_theme_support('post-thumbnails');

		// $ptype_names = array('post','page'); // указывает типы для которых нужна колонка отдельно

		// Определяем типы записей автоматически
		if (! isset($ptype_names)) {
			if ($supports === true) {
				$ptype_names = get_post_types(array('public' => true), 'names');
				$ptype_names = array_diff($ptype_names, array('attachment'));
			}
			// для отдельных типов записей
			elseif (is_array($supports)) {
				$ptype_names = $supports[0];
			}
		}

		// добавляем фильтры для всех найденных типов записей
		foreach ($ptype_names as $ptype) {
			add_filter("manage_{$ptype}_posts_columns", 'add_thumb_column');
			add_action("manage_{$ptype}_posts_custom_column", 'add_thumb_value', 10, 2);
		}
	}

	// добавим колонку
	function add_thumb_column($columns)
	{
		// подправим ширину колонки через css
		add_action('admin_notices', function () {
			echo '
			<style>
				.column-thumbnail{ width:80px; text-align:center; }
			</style>';
		});

		$num = 1; // после какой по счету колонки вставлять новые

		$new_columns = array('thumbnail' => __('Thumbnail'));

		return array_slice($columns, 0, $num) + $new_columns + array_slice($columns, $num);
	}

	// заполним колонку
	function add_thumb_value($colname, $post_id) {
		if ('thumbnail' == $colname) {
			$width = $height = 45; // миниатюра
			$thumbnail_id = get_post_meta($post_id, '_thumbnail_id', true);
	
			if ($thumbnail_id) {
				// Проверяем существует ли прикрепленная миниатюра
				if (get_post($thumbnail_id)) {
					$thumb = wp_get_attachment_image($thumbnail_id, array($width, $height), true);
				} else {
					// Если миниатюра была удалена, обнуляем переменную
					$thumb = '';
				}
			} else {
				// Если миниатюры нет, обнуляем переменную
				$thumb = '';
			}
	
			echo empty($thumb) ? ' ' : $thumb;
		}
	}
}

## Удаление метабоксов на странице редактирования записи
add_action('admin_menu', 'remove_default_post_screen_metaboxes');
function remove_default_post_screen_metaboxes()
{
	// для постов
	remove_meta_box('postcustom', 'post', 'normal'); // произвольные поля
	remove_meta_box('postexcerpt', 'post', 'normal'); // цитата
	remove_meta_box('commentstatusdiv', 'post', 'normal'); // комменты
	remove_meta_box('trackbacksdiv', 'post', 'normal'); // блок уведомлений
	remove_meta_box('slugdiv', 'post', 'normal'); // блок альтернативного названия статьи
	remove_meta_box('authordiv', 'post', 'normal'); // автор

	// для страниц
	remove_meta_box('postcustom', 'page', 'normal'); // произвольные поля
	remove_meta_box('postexcerpt', 'page', 'normal'); // цитата
	remove_meta_box('commentstatusdiv', 'page', 'normal'); // комменты
	remove_meta_box('trackbacksdiv', 'page', 'normal'); // блок уведомлений
	remove_meta_box('slugdiv', 'page', 'normal'); // блок альтернативного названия статьи
	remove_meta_box('authordiv', 'page', 'normal'); // автор
}

// Отключение rss, atom
function wpcourses_disable_feed()
{
	wp_redirect(get_option('siteurl'));
}
add_action('do_feed', 'wpcourses_disable_feed', 1);
add_action('do_feed_rdf', 'wpcourses_disable_feed', 1);
add_action('do_feed_rss', 'wpcourses_disable_feed', 1);
add_action('do_feed_rss2', 'wpcourses_disable_feed', 1);
add_action('do_feed_atom', 'wpcourses_disable_feed', 1);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');

// Отключаем Emojii
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
add_filter('tiny_mce_plugins', 'disable_wp_emojis_in_tinymce');
function disable_wp_emojis_in_tinymce($plugins)
{
	if (is_array($plugins)) {
		return array_diff($plugins, array('wpemoji'));
	} else {
		return array();
	}
}

// Удаляет ссылки RSS-лент записи и комментариев
remove_action('wp_head', 'feed_links', 2);
// Удаляет ссылки RSS-лент категорий и архивов
remove_action('wp_head', 'feed_links_extra', 3);
// Удаляет RSD ссылку для удаленной публикации
remove_action('wp_head', 'rsd_link');
// Удаляет ссылку Windows для Live Writer
remove_action('wp_head', 'wlwmanifest_link');
// Удаляет короткую ссылку
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
// Удаляет информацию о версии WordPress
remove_action('wp_head', 'wp_generator');

// Удаление ссылок и коротких ссылок на посты блога
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Удаление JSON API ссылок
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

// Отключаем встроенный редактор
// define('DISALLOW_FILE_EDIT', true);

// Отключаем поддержку комментариев
add_action('admin_init', function () {
	// Redirect any user trying to access comments page
	global $pagenow;

	if ($pagenow === 'edit-comments.php') {
		wp_safe_redirect(admin_url());
		exit;
	}

	// Remove comments metabox from dashboard
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

	// Disable support for comments and trackbacks in post types
	foreach (get_post_types() as $post_type) {
		if (post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
	remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
});

// Удаление span из заголовка архивов
function custom_archive_title($title)
{
	return wp_strip_all_tags($title);
}
add_filter('get_the_archive_title', 'custom_archive_title');
