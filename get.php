<?php 
include('simple_html_dom.php');
$url = "http://localhost/getreviews/reviews.php";

$html = file_get_html($url);
$a = $html->find('div[class=aa]', 0)->plaintext;
echo($a);

// foreach($html->find('div[class=single-review]') as $content) {
// 	$review = $content->find('div[class=with-review-wrapper]', 0)->plaintext;
// 	echo "string";
// 	echo($review."<br>");
// }


?>