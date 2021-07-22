<?php

function mytheme_setup() {

	// （Ｃ）のCSSを有効化
	add_theme_support( 'wp-block-styles' );

	// 縦横比を維持したレスポンシブを有効化
	add_theme_support( 'responsive-embeds' );
	
	// （Ｅ）のCSSを有効化＆エディタに読み込み
	add_theme_support( 'editor-styles' );
	add_editor_style( 'editor-style.css' );

	// ページのタイトルを有効化
	add_theme_support( 'title-tag' );

	// link、style、scriptのHTML5対応を有効化
	add_theme_support( 'html5', array( 
		'style', 
		'script' 
	) );

	// アイキャッチ画像を有効化
	add_theme_support( 'post-thumbnails' );

	// 全幅・幅広を有効化
	add_theme_support( 'align-wide' );

	// ブロックベースのウィジェットを無効化
	remove_theme_support( 'widgets-block-editor' );

	// メニューのロケーションを登録
	register_nav_menus( array(
		'primary' => 'ナビゲーション'
	) );

	// ２段組みを有効化
	add_theme_support( 'mycols' );

}
add_action( 'after_setup_theme', 'mytheme_setup' );


function mytheme_enqueue() {

	// Google Fontsを読み込み
	wp_enqueue_style( 
		'myfonts', 
		'https://fonts.googleapis.com/css?family=Josefin+Sans:300,700&display=swap', 
		array(), 
		null 
	);

	// Dashiconsを読み込み
	wp_enqueue_style( 
		'dashicons' 
	);

	// （Ｄ）テーマのCSSを読み込み
	wp_enqueue_style( 
		'mytheme-style', 
		get_stylesheet_uri(),
		array(),
		filemtime( get_theme_file_path( 'style.css' ) )
	);

}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue' );


function mytheme_widgets() {

	// ウィジェットエリアを登録
	register_sidebar( array(
		'id' => 'sidebar-1',
		'name' => 'フッターメニュー',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>'
	) );

}
add_action( 'widgets_init', 'mytheme_widgets' );


// IE11対応
function mytheme_ie() {
	global $is_IE;
	if ($is_IE) {

		// css-var-polyfill.jsを読み込み
		wp_enqueue_script( 
			'mytheme-css-var-polyfill', 
			get_theme_file_uri( 'ie/css-var-polyfill.js' ),
			array(),
			null,
			true
		);

		// ofi.min.jsを読み込み
		wp_enqueue_script( 
			'mytheme-ofi', 
			get_theme_file_uri( 'ie/ofi.min.js' ),
			array(),
			null,
			true
		);
		
		wp_add_inline_script( 
			'mytheme-ofi',
			'jQuery(function($){ objectFitImages() });'
		);

		wp_add_inline_style( 
			'mytheme-style',
			'img {font-family: "object-fit: cover";}'
		);

		// mainに対応
		wp_add_inline_style( 
			'mytheme-style',
			'main {display: block;}'
		);

	}
}
add_action( 'wp_enqueue_scripts', 'mytheme_ie' );


// ブロックスタイル
register_block_style(
	'core/image',
	array(
		'name' => 'mycard',
		'label' => 'カード型',
		'inline_style' => 
			'.is-style-mycard {
				padding: 10px;
				border: solid 1px gray;
				box-shadow: 5px 5px 5px gray;
			}'
	)
);

register_block_style(
	'core/heading',
	array(
		'name' => 'mybar',
		'label' => '基本色のバー',
		'inline_style' => 
			'.is-style-mybar {
				border-left: solid 14px var(--basecolor);
				padding-left: 14px;
			}'
	)
);

