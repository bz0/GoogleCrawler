<?php
    namespace bz0\GoogleCrawler;
    use bz0\GoogleCrawler\Scraper\Search;
    use bz0\GoogleCrawler\Crawler\SearchRequest;
    
    class Client{
        private $crawlers;

        public function __construct(){
            $this->crawlers[] = new Search(new SearchRequest());
        }

        public function Api($method){
            foreach($this->crawlers as $crawler){
                if ($crawler->accept($method)){
                    return $crawler;
                }
            }

            throw new Exception('Api Not Found');
        }
    }