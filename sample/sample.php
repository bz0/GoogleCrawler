<?php
    ini_set("display_errors", 1);
    error_reporting(-1);

    require_once(dirname(__DIR__) . '/vendor/autoload.php');

    use bz0\GoogleCrawler\Crawler\Google;

    $q   = "あああ";
    $api = new Google($q, 2);
    $res = $api->searchResult();
    var_dump($res);