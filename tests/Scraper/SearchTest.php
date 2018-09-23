<?php
    use PHPUnit\Framework\TestCase;

    class SearchTest extends TestCase{
        public function testScraper(){
            $request = new bz0\GoogleCrawler\Crawler\SearchRequest();
            $search  = new bz0\GoogleCrawler\Scraper\Search($request);

            $q = "ああああ";
            $page = 2;
            $scraperResult = $search->scraper($q, $page);
            $this->assertGreaterThan(5, count($scraperResult));
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