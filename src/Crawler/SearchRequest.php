<?php
    namespace bz0\GoogleCrawler\Crawler;
    use GuzzleHttp\Client as GuzzleClient;
    use Goutte\Client;

    class SearchRequest implements RequestInterface{
        const DOMAIN = 'https://www.google.co.jp';
        const PATH   = '/search';
        private $params = [
            'q'    => '',
            'start' => 0
        ];

        private function setParametor($q, $page){
            $this->params['q'] = $q;
            $this->params['start'] = $page * 10;
        }

        private function queryGenerator(){
            return http_build_query($this->params);
        }

        public function request($q, $page){
            $this->setParametor($q, $page);
            $url     = self::DOMAIN . self::PATH . '?' . $this->queryGenerator();
            $client  = new Client();
            return $client->request('GET', $url);
        }
    }