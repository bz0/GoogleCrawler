<?php
    namespace bz0\GoogleCrawler\Crawler;
    use bz0\GoogleCrawler\Entity\GoogleSearch;

    class GoogleScraper{
        private $crawler;
        public function __construct($crawler){
            $this->crawler = $crawler;
        }

        public function search(){
            $result = [];
            $this->crawler->filter('div.g')->each(function ($node) use(&$result) {
                if(count($node->filter('h3.r a')) && 
                   count($node->filter('div.s cite'))){
                    $googleSearch = new GoogleSearch();
                    $googleSearch->title = $node->filter('h3.r a')->text();
                    $googleSearch->url   = $node->filter('div.s cite')->text();
                    $result[] =  (array)$googleSearch;
                }
            });

            return $result;
        }
    }