# GoogleCrawler
Google検索結果のクローラ

PHP7.1  
MIT License  

# サンプル

```
use bz0\GoogleCrawler\Client;

$q   = "あああ";
$page = 2;

$client = new Client();
$res = $client->api('search')->scraper($q, $page);
var_dump($res);
```

## 検索ワード指定

```
$q   = "あああ";
```

## ページ指定

1P目の場合は、指定不要です。

```
$page = 2;
```
