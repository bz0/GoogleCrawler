<?php
    use PHPUnit\Framework\TestCase;

    class SearchTest extends TestCase{
        public function testScraper(){
            $request = new bz0\GoogleCrawler\Crawler\SearchRequest();
            $search  = new bz0\GoogleCrawler\Scraper\Search($request);

            $q = "ああああ";
            $page = 2;
            $scraperResult = $search->scraper($q, $page);

            $result  = [];
            $url     = "https://www.google.co.jp/search?q=ああああ&start=20";
            $client  = new Goutte\Client();
            $crawler = $client->request('GET', $url);

            $crawler->filter('div.g')->each(function ($node) use(&$result) {
                if(count($node->filter('h3.r a')) && 
                   count($node->filter('div.s cite'))){
                    $googleSearch = new bz0\GoogleCrawler\Entity\GoogleSearch();
                    $googleSearch->title = $node->filter('h3.r a')->text();
                    $googleSearch->url   = $node->filter('div.s cite')->text();
                    $result[] =  (array)$googleSearch;
                }
            });

            $this->assertEquals($scraperResult, $result);
        }

        public function testAccept_True(){
            $stub = $this->createMock(bz0\GoogleCrawler\Crawler\SearchRequest::class);
            $search = new bz0\GoogleCrawler\Scraper\Search($stub);
            $this->assertEquals(true, $search->accept('search'));
        }

        public function testAccept_False(){
            $stub = $this->createMock(bz0\GoogleCrawler\Crawler\SearchRequest::class);
            $search = new bz0\GoogleCrawler\Scraper\Search($stub);
            $this->assertEquals(false, $search->accept('a'));
        }
    }