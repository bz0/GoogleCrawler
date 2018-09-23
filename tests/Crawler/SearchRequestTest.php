<?php
    use PHPUnit\Framework\TestCase;
    
    class SearchRequestTest extends TestCase{
        public function testSetParametor_１Ｐ目(){
            $q = "ああああ"; 
            $page = 0;

            $req = new bz0\GoogleCrawler\Crawler\SearchRequest();

            $reflection = new \ReflectionClass($req);
            $method = $reflection->getMethod('setParametor');
            $method->setAccessible(true);
            $this->assertEquals(['q' => 'ああああ', 'start' => 0], $method->invoke($req, $q, $page));
        }

        public function testSetParametor_２Ｐ目(){
            $q = "テスト"; 
            $page = 2;

            $req = new bz0\GoogleCrawler\Crawler\SearchRequest();

            $reflection = new \ReflectionClass($req);
            $method = $reflection->getMethod('setParametor');
            $method->setAccessible(true);
            $this->assertEquals(['q' => 'テスト', 'start' => 20], $method->invoke($req, $q, $page));
        }

        public function testQueryGenerator(){
            $q = "テスト"; 
            $page = 2;

            $req = new bz0\GoogleCrawler\Crawler\SearchRequest();

            $reflection = new \ReflectionClass($req);
            $method = $reflection->getMethod('setParametor');
            $method->setAccessible(true);
            $method->invoke($req, $q, $page);

            $method = $reflection->getMethod('queryGenerator');
            $method->setAccessible(true);
            $method->invoke($req);

            $this->assertEquals('q=%E3%83%86%E3%82%B9%E3%83%88&start=20', $method->invoke($req));
        }

        public function testRequest(){
            $req = new bz0\GoogleCrawler\Crawler\SearchRequest();
            $q = "ああああ";
            $res = $req->request($q, 2);
            
            $this->assertEquals(get_class($res), "Symfony\Component\DomCrawler\Crawler");
        }

    }