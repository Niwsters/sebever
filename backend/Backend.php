<?php
class Backend {
  private static $blogpostDirectory;
  public static function setBlogpostDirectory($dir) {
    self::$blogpostDirectory = $dir;
  }

  public static function getBlogpostDirectory() {
    return self::$blogpostDirectory;
  }

  public static function GET() {
    $blogposts = [];

    // Get the first 10 filenames in the blog directory
    // in alphabetical order
    $filenames = array_slice(glob(self::$blogpostDirectory . '/*.html'), 0, 10);

    foreach($filenames as $filename) {
      $blogposts[] = file_get_contents($filename);
    }

    return $blogposts;
  }
}
?>
