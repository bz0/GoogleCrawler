<?php
    namespace bz0\GoogleCrawler\Scraper;
    use bz0\GoogleCrawler\Crawler\RequestInterface;
    use bz0\GoogleCrawler\Entity\GoogleSearch;

    class Search{
        private $request;
        public function __construct(RequestInterface $request){
            $this->request = $request;
        }

        public function scraper($q, $page){
            $crawler = $this->request->request($q, $page);

            $result = [];
            $crawler->filter('div.g')->each(function ($node) use(&$result) {
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

        public function accept($class){
            return 'search' === strtolower($class);
        }
    }