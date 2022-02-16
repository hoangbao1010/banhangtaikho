<?php

/*
	
@package sunsettheme
	
	========================
		THEME CUSTOM POST TYPES
	========================
*/

	/* Diemphanphoi */
	add_action( 'init', 'distribution_point_custom_post_type' );
	add_filter('manage_distribution_point_posts_columns','distribution_point_column_review');
	add_action('manage_distribution_point_posts_custom_column','distribution_point_column',10,2);
	function distribution_point_custom_post_type() {
		$labels = array(
			'name' 				=> 'Điểm phân phối',
			'singular_name' 	=> 'Điểm phân phối',
			'menu_name'			=> 'Điểm phân phối',
			'name_admin_bar'	=> 'Điểm phân phối'
		);

		$args = array(
			'labels'			=> $labels,
            'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
            'public' => true, //Kích hoạt post type
            'show_ui' => true, //Hiển thị khung quản trị như Post/Page
            'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
            'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
            'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
            'menu_position' => 26, //Thứ tự vị trí hiển thị trong menu (tay trái)
            'menu_icon' => 'dashicons-groups', //Đường dẫn tới icon sẽ hiển thị
            'can_export' => true, //Có thể export nội dung bằng Tools -> Export
            'has_archive' => true, //Cho phép lưu trữ (month, date, year)
            'exclude_from_search' => true, //Loại bỏ khỏi kết quả tìm kiếm
            'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
            'supports'			=> array( 'title', 'thumbnail' , 'excerpt' , 'editor' ),
        );
		register_post_type( 'distribution-point', $args );
	}

	function distribution_point_column_review($columns){
		$newColumns = array();
		$newColums['title'] = 'Title';
		$newColums['avatar'] = 'Avatar';		
		return $newColums;
	}

	function distribution_point_column($column,$post_id){
		switch ($column) {
			case 'avatar':
			echo get_the_post_thumbnail();
			break;
		}
	}

		/* Baochi */
	add_action( 'init', 'newspapers_custom_post_type' );
	add_filter('manage_newspapers_posts_columns','newspapers_column_review');
	add_action('manage_newspapers_posts_custom_column','newspapers_column',10,2);
	function newspapers_custom_post_type() {
		$labels = array(
			'name' 				=> 'Báo chí',
			'singular_name' 	=> 'Báo chí',
			'menu_name'			=> 'Báo chí',
			'name_admin_bar'	=> 'Báo chí'
		);

		$args = array(
			'labels'			=> $labels,
            'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
            'public' => true, //Kích hoạt post type
            'show_ui' => true, //Hiển thị khung quản trị như Post/Page
            'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
            'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
            'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
            'menu_position' => 27, //Thứ tự vị trí hiển thị trong menu (tay trái)
            'menu_icon' => 'dashicons-media-document', //Đường dẫn tới icon sẽ hiển thị
            'can_export' => true, //Có thể export nội dung bằng Tools -> Export
            'has_archive' => true, //Cho phép lưu trữ (month, date, year)
            'exclude_from_search' => true, //Loại bỏ khỏi kết quả tìm kiếm
            'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
            'supports'			=> array( 'title', 'thumbnail' , 'excerpt' , 'editor' ),
        );
		register_post_type( 'newspapers', $args );
	}

	function newspapers_column_review($columns){
		$newColumns = array();
		$newColums['title'] = 'Title';
		$newColums['avatar'] = 'Avatar';		
		return $newColums;
	}

	function newspapers_column($column,$post_id){
		switch ($column) {
			case 'avatar':
			echo get_the_post_thumbnail();
			break;
		}
	}

			/* Sukien */
	add_action( 'init', 'events_custom_post_type' );
	add_filter('manage_events_posts_columns','events_column_review');
	add_action('manage_events_posts_custom_column','events_column',10,2);
	function events_custom_post_type() {
		$labels = array(
			'name' 				=> 'Sự kiện',
			'singular_name' 	=> 'Sự kiện',
			'menu_name'			=> 'Sự kiện',
			'name_admin_bar'	=> 'Sự kiện'
		);

		$args = array(
			'labels'			=> $labels,
            'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
            'public' => true, //Kích hoạt post type
            'show_ui' => true, //Hiển thị khung quản trị như Post/Page
            'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
            'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
            'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
            'menu_position' => 28, //Thứ tự vị trí hiển thị trong menu (tay trái)
            'menu_icon' => 'dashicons-megaphone', //Đường dẫn tới icon sẽ hiển thị
            'can_export' => true, //Có thể export nội dung bằng Tools -> Export
            'has_archive' => true, //Cho phép lưu trữ (month, date, year)
            'exclude_from_search' => true, //Loại bỏ khỏi kết quả tìm kiếm
            'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
            'supports'			=> array( 'title', 'thumbnail' , 'excerpt' , 'editor' ),
        );
		register_post_type( 'events', $args );
	}

	function events_column_review($columns){
		$newColumns = array();
		$newColums['title'] = 'Title';
		$newColums['avatar'] = 'Avatar';		
		return $newColums;
	}

	function events_column($column,$post_id){
		switch ($column) {
			case 'avatar':
			echo get_the_post_thumbnail();
			break;
		}
	}

				/* Video */
	add_action( 'init', 'video_custom_post_type' );
	add_filter('manage_video_posts_columns','video_column_review');
	add_action('manage_video_posts_custom_column','video_column',10,2);
	function video_custom_post_type() {
		$labels = array(
			'name' 				=> 'Video',
			'singular_name' 	=> 'Video',
			'menu_name'			=> 'Video',
			'name_admin_bar'	=> 'Video'
		);

		$args = array(
			'labels'			=> $labels,
            'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
            'public' => true, //Kích hoạt post type
            'show_ui' => true, //Hiển thị khung quản trị như Post/Page
            'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
            'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
            'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
            'menu_position' => 29, //Thứ tự vị trí hiển thị trong menu (tay trái)
            'menu_icon' => 'dashicons-video-alt3', //Đường dẫn tới icon sẽ hiển thị
            'can_export' => true, //Có thể export nội dung bằng Tools -> Export
            'has_archive' => true, //Cho phép lưu trữ (month, date, year)
            'exclude_from_search' => true, //Loại bỏ khỏi kết quả tìm kiếm
            'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
            'supports'			=> array( 'title', 'thumbnail' , 'excerpt' , 'editor' ),
        );
		register_post_type( 'video', $args );
	}

	function video_column_review($columns){
		$newColumns = array();
		$newColums['title'] = 'Title';
		$newColums['avatar'] = 'Avatar';		
		return $newColums;
	}

	function video_column($column,$post_id){
		switch ($column) {
			case 'avatar':
			echo get_the_post_thumbnail();
			break;
		}
	}

					/* Cauchuyenkhachhang */
	add_action( 'init', 'customer_exchange_custom_post_type' );
	add_filter('manage_customer_exchange_posts_columns','customer_exchange_column_review');
	add_action('manage_customer_exchange_posts_custom_column','customer_exchange_column',10,2);
	function customer_exchange_custom_post_type() {
		$labels = array(
			'name' 				=> 'Câu chuyện khách hàng',
			'singular_name' 	=> 'Câu chuyện khách hàng',
			'menu_name'			=> 'Câu chuyện khách hàng',
			'name_admin_bar'	=> 'Câu chuyện khách hàng'
		);

		$args = array(
			'labels'			=> $labels,
            'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
            'public' => true, //Kích hoạt post type
            'show_ui' => true, //Hiển thị khung quản trị như Post/Page
            'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
            'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
            'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
            'menu_position' => 30, //Thứ tự vị trí hiển thị trong menu (tay trái)
            'menu_icon' => 'dashicons-id-alt', //Đường dẫn tới icon sẽ hiển thị
            'can_export' => true, //Có thể export nội dung bằng Tools -> Export
            'has_archive' => true, //Cho phép lưu trữ (month, date, year)
            'exclude_from_search' => true, //Loại bỏ khỏi kết quả tìm kiếm
            'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
            'supports'			=> array( 'title', 'thumbnail' , 'excerpt' , 'editor' ),
        );
		register_post_type( 'customer_exchange', $args );
	}

	function customer_exchange_column_review($columns){
		$newColumns = array();
		$newColums['title'] = 'Title';
		$newColums['avatar'] = 'Avatar';		
		return $newColums;
	}

	function customer_exchange_column($column,$post_id){
		switch ($column) {
			case 'avatar':
			echo get_the_post_thumbnail();
			break;
		}
	}
	