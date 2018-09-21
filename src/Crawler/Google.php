<?php
    namespace bz0\GoogleCrawler\Crawler;
    use Goutte\Client;
    use GuzzleHttp\Client as GuzzleClient;
    use bz0\GoogleCrawler\Crawler\GoogleScraper;  

    class Google{
        const DOMAIN = 'https://www.google.co.jp';
        const PATH   = '/search';
        private $scraper;
        private $params = [
            'q'    => '',
            'start' => 0
        ];

        public function __construct($q, $page=0){
            $this->params['q'] = $q;
            $this->params['start'] = $page * 10;
        }

        public function searchResult(){
            $crawler = $this->request();
            $res     = $this->scraper($crawler);
            return $res;
        }

        public function queryGenerator(){
            return http_build_query($this->params);
        }

        public function request(){
            $url     = self::DOMAIN . self::PATH . '?' . $this->queryGenerator();
            echo $url;
            $client  = new Client();
            $crawler = $client->request('GET', $url);
            return $crawler;
        }

        public function scraper($crawler){
            $scraper = new GoogleScraper($crawler);
            return $scraper->search();
        }
    }