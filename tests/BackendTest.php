<?php
require_once('/backend/Backend.php');
class BackendTest extends PHPUnit_Framework_TestCase {
  public function setUp() {
    Backend::setBlogpostDirectory('tests/mock_blog_posts');
    
    // Retrieve mock blog posts from the file system
    $this->blogposts = [];
    foreach(glob('tests/mock_blog_posts/*.html') as $filename) {
      $this->blogposts[] = file_get_contents($filename);
    }
  }

  public function testSetsBlogpostDirectory() {
    $newDirectory = 'blargh';
    Backend::setBlogpostDirectory($newDirectory);

    $this->assertEquals(Backend::getBlogpostDirectory(), $newDirectory);
  }
  
  public function testBackendGets10LatestBlogpostsByDefault() {
    $blogposts = array_slice($this->blogposts, 0, 10);

    $result = Backend::GET('blogpost');

    $this->assertEquals($blogposts, $result);
  }
}
?>
