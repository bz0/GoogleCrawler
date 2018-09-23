<?php
    use PHPUnit\Framework\TestCase;
    
    class ClientTest extends TestCase{
        public function testClient_Search(){
            $client = new bz0\GoogleCrawler\Client();
            $res = $client->Api('search');

            $this->assertEquals(get_class($res), 'bz0\GoogleCrawler\Scraper\Search');
        }

        public function testClient_ApiNotException(){
            $client = new bz0\GoogleCrawler\Client();
            try{
                $res = $client->Api('notFound');
            }catch(Exception $e){
                $this->assertEquals($e->getMessage(), 'Api Not Found');
            }
        }
    }