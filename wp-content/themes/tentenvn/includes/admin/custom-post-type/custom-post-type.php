<?php

/*
	
@package sunsettheme
	
	========================
		THEME CUSTOM POST TYPES
	========================
*/

	/* Slidey */
	add_action( 'init', 'slide_custom_post_type' );
	add_filter('manage_slide_posts_columns','slide_column_review');
	add_action('manage_slide_posts_custom_column','slide_column',10,2);
	function slide_custom_post_type() {
		$labels = array(
			'name' 				=> 'Slide',
			'singular_name' 	=> 'Slide',
			'menu_name'			=> 'Slide',
			'name_admin_bar'	=> 'Slide'
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
            'menu_icon' => 'dashicons-slides', //Đường dẫn tới icon sẽ hiển thị
            'can_export' => true, //Có thể export nội dung bằng Tools -> Export
            'has_archive' => true, //Cho phép lưu trữ (month, date, year)
            'exclude_from_search' => true, //Loại bỏ khỏi kết quả tìm kiếm
            'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
            'supports'			=> array( 'title', 'thumbnail' , 'excerpt' , 'editor' ),
        );
		register_post_type( 'slide', $args );
	}

	function slide_column_review($columns){
		$newColumns = array();
		$newColums['title'] = 'Title';
		$newColums['avatar'] = 'Avatar';
		return $newColums;
	}

	function slide_column($column,$post_id){
		switch ($column) {
			case 'avatar':
			echo get_the_post_thumbnail();
			break;
		}
	}
	