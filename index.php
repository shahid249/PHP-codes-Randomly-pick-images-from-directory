<?php

/**
 * @author SHAHID
 * @link 
 * @description Pull random one image file from directory and index them whenever you reload the page.
 */


function get_rand_img($directory)
{
    $arr = array();
    $list = scandir($directory);
    foreach ($list as $file)
    {
        if (!isset($img)){$img = '';}
        if (is_file($directory . '/' . $file))
        {
            $ext = end(explode('.', $file));
            if (
            // Put here Image extension
            $ext == 'gif' ||
            $ext == 'jpeg' ||
            $ext == 'jpg' ||
            $ext == 'png' ||
            $ext == 'GIF' ||
            $ext == 'JPEG' ||
            $ext == 'JPG' ||
            $ext == 'PNG')
            {array_push($arr, $file);$img = $file;}
        }
    }
    if ($img != ''){$img = array_rand($arr);$img = $arr[$img];}
    $img = str_replace("'", "\'", $img);
    $img = str_replace(" ", "%20", $img);
    return $img;
}

// Put here Image directoty location by removing 'images'
$random_images = get_rand_img('images');
?>

<!DOCTYPE html>
<html>
<head>
<title>Random Image Load</title>
<meta charset="utf-8">
<link href="style.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<div class="wrapper bgded overlay" style="background-image:url('images/<?php echo $random_images?>');">
  <div id="pageintro" class="hoc clear"> 
    <article class="introtxt" style="margin-right: 30px;">
      <h2 class="heading">Every time you <strong>Reload</strong>. <br/>This page will show random<br/>images from directory.</h2>
      <footer>
        <ul class="nospace inline pushright">
          <li><a class="btn" href="/">RELOAD PAGE</a></li>
          <li><a class="btn" href="/">Get Code</a></li>
        </ul>
      </footer>
    </article>
  </div>
</div>
</body>
</html>
