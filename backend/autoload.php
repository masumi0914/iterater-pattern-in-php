<?php
// projectファイルを自動で読み込む

function scanFiles($dir) {
  $list = $tmp = array();
  foreach(glob( $dir. '*/', GLOB_ONLYDIR) as $child_dir) {
    if ($tmp = scanFiles($child_dir)) {
      $list = array_merge($list, $tmp);
    }
  }

  if($dh = opendir($dir)) {
    while (($file = readdir($dh)) !== false) {
      if(preg_match('/\.(php)$/i', $file)) {
        $list[] = $dir . $file;
      }
    }
    closedir($dh);
  }
  /* php-fpm-alpineでは「GLOB_BRACE」が使えないため上記のopen_dirで代用 */
//  foreach(glob($dir . '{*.php}', GLOB_BRACE) as $path) {
//    echo $path.'  ';
//    $list[] = $path;
//  }

  return $list;
}

$require_dir_list = [
  'App'
];
$list = [];
foreach ($require_dir_list as $path) {
  $list = array_merge($list, scanFiles($path));
}

foreach ($list as $file_path) {
  require_once $file_path;
}