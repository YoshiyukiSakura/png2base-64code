<?php
function ls($dir) {
	$arr = [];
	foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir)) as $v) {
    if ($v->isDir()) {

    }else{
      $arr[] = ['path'=>$v->getRealPath(),'name'=>$v->getFileName()];// . $type;
    }
	}
	return $arr;
}
 $result = ls('/var/www/test/icon');
 $output = '';
 foreach ($result as $key => $icon) {
   $file = file_get_contents( $icon['path'] );
   $code = "data:image/jpg/png/gif;base64,".base64_encode( $file );
   $css = ".icon.". str_replace('.png', '', $icon['name']) ."{\nbackground-image:url(". $code . ")\n}";
  //  echo $css;
   $output = $output.$css;
   echo $icon['name'] . "\n";

 }
 file_put_contents('./icon.css', $output);
 echo "generate icon.css in current directory";
?>
