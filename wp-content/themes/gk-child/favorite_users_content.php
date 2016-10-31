<?php $userInfo = get_userdata($id);?>
<h2><?php echo $userInfo->display_name; ?>のお気に入りユーザ</h2>
<?php do_shortcode('[favorite-authors-list-bp-profile]'); ?>