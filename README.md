# GoogleCrawler
Googleのクローラ

# サンプル

```
use bz0\GoogleCrawler\Crawler\Google;

$q   = "あああ";
$page = 2;
$api = new Google($q, $page);
$res = $api->searchResult();
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