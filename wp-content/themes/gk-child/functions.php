<?php //子テーマで利用する関数を書く

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}


/*
* メディアの抽出条件にログインユーザーの絞り込み条件を追加する
*/
function display_only_self_uploaded_medias( $wp_query ) {
    if ( is_admin() && ( $wp_query->is_main_query() || ( defined( 'DOING_QUERY_ATTACHMENT' ) && DOING_QUERY_ATTACHMENT ) ) && $wp_query->get( 'post_type' ) == 'attachment' ) {
        $user = wp_get_current_user();
        $wp_query->set( 'author', $user->ID );
    }
}
function define_doing_query_attachment_const() {
    if ( ! defined( 'DOING_QUERY_ATTACHMENT' ) ) {
        define( 'DOING_QUERY_ATTACHMENT', true );
    }
}
get_currentuserinfo();
if($current_user->user_level < 10){
    add_action( 'pre_get_posts', 'display_only_self_uploaded_medias' );
    add_action( 'wp_ajax_query-attachments', 'define_doing_query_attachment_const', 0 );
}


//他の人の投稿を見れないようにする
function exclude_other_posts( $wp_query ) {
    if ( isset( $_REQUEST['post_type'] ) && post_type_exists( $_REQUEST['post_type'] ) ) {
        $post_type = get_post_type_object( $_REQUEST['post_type'] );
        $cap_type = $post_type->cap->edit_other_posts;
    } else {
        $cap_type = 'edit_others_posts';
    }
    if ( is_admin() && $wp_query->is_main_query() && ! $wp_query->get( 'author' ) && ! current_user_can( $cap_type ) ) {
        $user = wp_get_current_user();
        $wp_query->set( 'author', $user->ID );
    }
}
add_action( 'pre_get_posts', 'exclude_other_posts' );


// 管理バーのヘルプメニューを非表示にする
function my_admin_head(){
    echo '<style type="text/css">#contextual-help-link-wrap{display:none;}</style>';
}
add_action('admin_head', 'my_admin_head');


// メニューを非表示にする
function remove_menus () {
    if (!current_user_can('level_10')) { //level10以下のユーザーの場合メニューをunsetする

        remove_menu_page('wpcf7'); //Contact Form 7
        remove_menu_page('duplicator');//dupricator
        remove_menu_page( 'edit.php?post_type=page' );

        global $menu;
        unset($menu[2]); // ダッシュボード
//unset($menu[4]); // メニューの線1
//unset($menu[5]); // 投稿
//unset($menu[10]); // メディア

        unset($menu[15]); // リンク
        unset($menu[20]); // ページ
        unset($menu[25]); // コメント
//unset($menu[59]); // メニューの線2
        unset($menu[60]); // テーマ
        unset($menu[65]); // プラグイン
        unset($menu[70]); // プロフィール
        unset($menu[75]); // ツール
        unset($menu[80]); // 設定
        unset($menu[90]); // メニューの線3
    }
}

function remove_jetpack () {
    if (!current_user_can('level_10')) {
        remove_menu_page('jetpack','jetpack');//jetpack
    }
}

add_action('admin_init', 'remove_jetpack');
add_action('admin_menu', 'remove_menus');
//入力画面のカテゴリとタグの設定を非表示に
if (!current_user_can('level_10')) {
    function remove_extra_meta_boxes() {
        remove_meta_box( 'categorydiv','post','side'); /* 投稿のカテゴリーフィールド */
remove_meta_box( 'postcustom' , 'post' , 'normal' ); /* 投稿のカスタムフィールド */
remove_meta_box( 'postcustom' , 'page' , 'normal' ); /* 固定ページのカスタムフィールド */
remove_meta_box( 'postexcerpt' , 'post' , 'normal' ); /* 投稿の抜粋 */
remove_meta_box( 'postexcerpt' , 'page' , 'normal' ); /* 固定ページの抜粋 */
remove_meta_box( 'commentsdiv' , 'post' , 'normal' ); /* 投稿のコメント */
remove_meta_box( 'commentsdiv' , 'page' , 'normal' ); /* 固定ページのコメント */
        //remove_meta_box( 'tagsdiv-post_tag' , 'post' , 'side' ); /* 投稿のタグ */
remove_meta_box( 'tagsdiv-post_tag' , 'page' , 'side' ); /* 固定ページのタグ */
remove_meta_box( 'trackbacksdiv' , 'post' , 'normal' ); /* 投稿のトラックバック */
remove_meta_box( 'trackbacksdiv' , 'page' , 'normal' ); /* 固定ページのトラックバック */
remove_meta_box( 'commentstatusdiv' , 'post' , 'normal' ); /* 投稿のディスカッション */
remove_meta_box( 'commentstatusdiv' , 'page' , 'normal' ); /* ページのディスカッション */
remove_meta_box( 'slugdiv','post','normal'); /* 投稿のスラッグ */
remove_meta_box( 'slugdiv','page','normal'); /* 固定ページのスラッグ */
remove_meta_box( 'authordiv','post','normal' ); /* 投稿の作成者 */
remove_meta_box( 'authordiv','page','normal' ); /* 固定ページの作成者 */
remove_meta_box( 'revisionsdiv','post','normal' ); /* 投稿のリビジョン */
remove_meta_box( 'revisionsdiv','page','normal' ); /* 固定ページのリビジョン */
remove_meta_box( 'pageparentdiv','page','side'); /* 固定ページのページ属性 */
    }
    add_action( 'admin_menu' , 'remove_extra_meta_boxes' );
}
// バージョン更新を非表示にする
add_filter('pre_site_transient_update_core', '__return_zero');
// APIによるバージョンチェックの通信をさせない
remove_action('wp_version_check', 'wp_version_check');
remove_action('admin_init', '_maybe_update_core');
// 管理バーにログアウトを追加
//function add_new_item_in_admin_bar() {
//    global $wp_admin_bar;
//    $wp_admin_bar->add_menu(array(
//        'id' => 'new_item_in_admin_bar',
//        'title' => __('ログアウト'),
//        'href' => wp_logout_url()
//    ));
//}
//add_action('wp_before_admin_bar_render', 'add_new_item_in_admin_bar');


function my_custom_login_logo() {
    echo '<style type="text/css">.login h1 a { background-image:url(/images/[画像ファイル名]);background-size: ***px ***px;
width:***px; height:px;***
}</style>';
}
add_action('login_head', 'my_custom_login_logo');
//投稿リストから「すべて」などを消す
function custom_columns($columns) {
    if (!current_user_can('level_10')) {
        echo '<style type="text/css">li.all,li.publish,li.pending {display:none;}</style>';
    }
    return $columns;
}
add_filter( 'manage_posts_columns', 'custom_columns' );


// 管理バーの項目を非表示
function remove_admin_bar_menu( $wp_admin_bar )
{
    if (!current_user_can('level_10')) {
        $wp_admin_bar->remove_menu('wp-logo'); // WordPressシンボルマーク
       // $wp_admin_bar->remove_menu('my-account'); // マイアカウント
        $wp_admin_bar->remove_menu('site-name');// サイト名
        $wp_admin_bar->remove_menu('view-site'); // サイト名 -> サイトを表示
        $wp_admin_bar->remove_menu( 'dashboard' );    // サイト名 -> ダッシュボード (公開側)
        $wp_admin_bar->remove_menu( 'comments' );     // コメント
        $wp_admin_bar->remove_menu( 'updates' );      // 更新
        $wp_admin_bar->remove_menu('new-content'); // 新規
        $wp_admin_bar->remove_menu('new-post'); // 新規 -> 投稿
        $wp_admin_bar->remove_menu('new-content'); // 新規
        $wp_admin_bar->remove_menu('post'); // 新規 -> 投稿
        $wp_admin_bar->remove_menu('media-new'); // 新規 -> メディア
        $wp_admin_bar->remove_menu('new-link'); // 新規 -> リンク
        $wp_admin_bar->remove_menu('new-page'); // 新規 -> 固定ページ
        $wp_admin_bar->remove_menu('new-user'); // 新規 -> ユーザー
        $wp_admin_bar->remove_menu( 'new-media' );    // 新規 -> メディア
        $wp_admin_bar->remove_menu( 'user-info' );    // マイアカウント -> プロフィール
        $wp_admin_bar->remove_menu( 'edit-profile' ); // マイアカウント -> プロフィール編集
        $wp_admin_bar->remove_menu( 'logout' );       // マイアカウント -> ログアウト
        $wp_admin_bar->remove_menu( 'search' );       // 検索 (公開側)
        $wp_admin_bar->remove_menu('logout'); // マイアカウント -> ログアウト
    }
}
add_action( 'admin_bar_menu', 'remove_admin_bar_menu', 70 );
//入力画面 現在の状況　のWordPress表示を消す
function my_admin_print_styles(){
    if (!current_user_can('level_10')) {
        echo '<style type="text/css">.versions p,#wp-version-message{display:none;}</style>';
    }
}
add_action('admin_print_styles', 'my_admin_print_styles', 21);
// フッターWordPressリンクを非表示に
function custom_admin_footer() {
    echo '<a href="mailto:xxx@zzz">お問い合わせ</a>';
}
add_filter('admin_footer_text', 'custom_admin_footer');


function disable_drag_metabox() {
    wp_deregister_script('postbox');
}
add_action( 'admin_init', 'disable_drag_metabox' );


/**
 * Created by PhpStorm.
 * User: nasig
 * Date: 2016/10/01
 * Time: 14:51
 */