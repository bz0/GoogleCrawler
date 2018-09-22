<?php
    ini_set("display_errors", 1);
    error_reporting(-1);

    require_once(dirname(__DIR__) . '/vendor/autoload.php');

    use bz0\GoogleCrawler\Client;

    $q   = "あああ";
    $client = new Client();
    $res = $client->api('search')->scraper($q, 1);
    var_dump($res);