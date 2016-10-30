<?php $id = $bp->displayed_user->id;?>

<?php $url = esc_url( get_home_url()) . "/authorposts/?id=" . $id ; ?>
<a href=<?php echo $url ;?>> 投稿一覧 </a>

<?php
$url = esc_url( get_home_url()) . "/favoposts/?id=" . $id ; ?>
    <a href=<?php echo $url ;?>>お気に入り一覧 </a>

