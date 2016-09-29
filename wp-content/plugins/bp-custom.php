<?php

/*BuddyPressユーザーページにメニューの追加だよ*/
//ユーザーメニューを追加
add_action( 'bp_setup_nav', 'works_nav');
//ユーザーメニュー追加の独自関数をセット
function works_nav() {
    global $bp;
    bp_core_new_nav_item( array(
        'name' => '実績', //メニューの表示名
        'slug' => 'works', //スラッグ名
        'position' => 75,//追加メニューの表示順位
//　http://hoge.com/members/ユーザーID/works/　と、なる　
        'screen_function' => 'works',
        'show_for_displayed_user' => true,//ユーザに表示するか
        'default_subnav_slug' => 'works',//ユーザに表示するか
        'item_css_id' => 'works'//メニューにIDを付与
    ));
}

function works_title() {
    echo '実績一覧';//追加したユーザーページのタイトル
}

function works_content() {
    include_once "buddypress/custom_user/works_content.php";
}

function works () {
    add_action( 'bp_template_title', 'works_title' );//カスタムユーザーページに見出し
    add_action( 'bp_template_content', 'works_content' );//カスタムユーザーページに表示したい内容
//テーマファイルの呼び出し(この記述で、メンバーページのファイル)
    bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}


/**
 * Created by PhpStorm.
 * User: s-iijima
 * Date: 2016/09/29
 * Time: 20:31
 */