<?php

/**
 * @author SHAHID
 * @copyright 2017
 */


function get_rand_img($dir)
{
    $arr = array();
    $list = scandir($dir);
    foreach ($list as $file)
    {
        if (!isset($img))
        {
            $img = '';
        }
        if (is_file($dir . '/' . $file))
        {
            $ext = end(explode('.', $file));
            if (
            $ext == 'gif' ||
            $ext == 'jpeg' ||
            $ext == 'jpg' ||
            $ext == 'png' ||
            $ext == 'GIF' ||
            $ext == 'JPEG' ||
            $ext == 'JPG' ||
            $ext == 'PNG')
            {
                array_push($arr, $file);
                $img = $file;
            }
        }
    }
    if ($img != '')
    {
        $img = array_rand($arr);
        $img = $arr[$img];
    }
    $img = str_replace("'", "\'", $img);
    $img = str_replace(" ", "%20", $img);
    return $img;
}


echo get_rand_img('images');

?>
