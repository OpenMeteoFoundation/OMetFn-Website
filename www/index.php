<?php


$page='404';
if ($_GET['page'] == '') {
  $page='index';
} else if (preg_match('^[\w\d-]+^', $_GET['page'])) {
  $page=$_GET['page'];
}

$lang='en';
if (substr($_SERVER['HTTP_HOST'], 0, 2) == 'fr') {
  $lang='fr';
} else if (substr($_SERVER['HTTP_HOST'], 0, 2) == 'de') {
  $lang='de';
}

// temp dataconnexions
$cache_dir="../cache/$lang-";
$php_cache_file=$cache_dir.$page.'.php';
if (file_exists($php_cache_file)) {
  include($php_cache_file);
  exit();
}
//---------------------------

$page_dir="../pages/$lang/";
$page_dir_en="../pages/en/";
$page_file=$page_dir.$page.'.php';
$page_file_en=$page_dir_en.$page.'.php';

if (!file_exists($page_file)) {
  if (file_exists($page_file_en)) {
    $page_file=$page_file_en;
  } else {
    $page='404';
    $page_file=$page_dir.$page.'.php';
  }
}

if ($page == '404') {
  header('HTTP/1.0 404 Not Found');
}

$cache_dir="../cache/$lang-";
$php_cache_file=$cache_dir.$page.'.php';



/*
$mtime_file=$cache_dir.'mtime';
$mtime_old=file_get_contents($mtime_file);
$stat=stat($page_dir); //BUG
$mtime=$stat['mtime'];

if ($mtime == $mtime_old) {
  include($php_cache_file);
  echo "\n<!-- FROM CACHE : $mtime -->\n";
  exit();
}*/

$page_body=file_get_contents($page_file);
$page_head=file_get_contents($page_dir.'head.inc.php');
$page_foot=file_get_contents($page_dir.'foot.inc.php');

//  title --------
preg_match('/<!-- \%TITLE\%: "(.*)" -->/', $page_body, $matches);
$title=$matches[1];
$page_body=str_replace($matches[0], '', $page_body);

if (empty($title)) {
  $title = 'Open Meteo Foundation';
} else {
  $title = $title.' | Open Meteo Foundation';
}

$page_head=str_replace('<!-- %TITLE% -->', $title, $page_head);

// -------------------


$full_page=$page_head.$page_body.$page_foot;

file_put_contents($php_cache_file, $full_page);
//file_put_contents($mtime_file, $mtime);

include($php_cache_file);
