<?php
/* 
* RewriteHost
* 该项目非常的蠢 实际上推荐 Nginx反代一次 改变Host 或者在Nginx处理Host,实在没救了你想在PHP上动手可以试试本项目
*/

//配置设置
$TargetHost = "test.com";

// 重写 Host
$_SERVER['HTTP_HOST'] = $TargetHost;
$_SERVER['SERVER_NAME'] = $TargetHost;

// 重写 Refer
function unparse_url($parsed_url) {
  $scheme   = isset($parsed_url['scheme']) ? $parsed_url['scheme'] . '://' : '';
  $host     = isset($parsed_url['host']) ? $parsed_url['host'] : '';
  $port     = isset($parsed_url['port']) ? ':' . $parsed_url['port'] : '';
  $user     = isset($parsed_url['user']) ? $parsed_url['user'] : '';
  $pass     = isset($parsed_url['pass']) ? ':' . $parsed_url['pass']  : '';
  $pass     = ($user || $pass) ? "$pass@" : '';
  $path     = isset($parsed_url['path']) ? $parsed_url['path'] : '';
  $query    = isset($parsed_url['query']) ? '?' . $parsed_url['query'] : '';
  $fragment = isset($parsed_url['fragment']) ? '#' . $parsed_url['fragment'] : '';
  return "$scheme$user$pass$host$port$path$query$fragment";
}
$arrayRefer = parse_url($_SERVER['HTTP_REFERER']);
$arrayRefer["host"] = $TargetHost;
$_SERVER['HTTP_REFERER'] = unparse_url($arrayRefer);

?>
