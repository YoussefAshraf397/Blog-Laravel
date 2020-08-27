<?php
function image($img, $folder = '/var/www/html/blog/storage/app/public/profile')
{
    $src = $folder . '/'. $img;
//    dd($src);
    if (!file_exists($src) || !$img) {
        $src = 'https://via.placeholder.com/500x500';
    } else {
        $src = app()->make("url")->to('/') . '/' . $src;
    }
    return $src;
}
