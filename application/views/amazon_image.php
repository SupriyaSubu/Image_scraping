<?php

/*$url = 'https://www.amazon.in/';

//initialing curl session
$ch = curl_init();

//setting options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execute
$source_code = curl_exec($ch);


//close curl session

$pattern ='/<img[^>]+>/';
$matches = '';

preg_match_all($pattern, $source_code, $matches);

echo '<pre>';
print_r($matches);*/

/*if(!is_dir('downloads')){
	mkdir('downloads',0777);
}

//fopen creates a file (if not exits) when you use writing mode which is w
$file = fopen('downloads/amazon_scrap.txt','w');

foreach($matches[0] as $img){
	fwrite($file, $img."\n");
}

fclose($file);*/



//reading our local file scrapped.txt to extract img urls
$scrapped = file_get_contents('downloads/amazon_scrap.txt');
/*echo $scrapped;*/

$pattern = '/src="([^"]+)/';
$matches = '';

preg_match_all($pattern, $scrapped, $matches);
/*echo '<pre>';
print_r($matches);
*/

 foreach($matches[1] as $img_url){
 	$ch = curl_init();
 	curl_setopt($ch, CURLOPT_URL, $img_url);
 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 	$img = curl_exec($ch);
 	curl_close($ch);

 	$img_name = explode("/", $img_url);

 	$img_name = $img_name[count($img_name)-1];

	/*echo '<pre>';
	print_r($img_name);
	break;*/
 	file_put_contents('images2/'.$img_name, $img);
 }

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.img-container{
			display: inline-block;
			vertical-align: top;
			width: 150px;
		}
		.img-container > img{
			width: 100%;
		}
	</style>
</head>
<body>

	<div class="wrapper">
		<!-- <?php if(!empty($matches)): ?>
			<?php foreach($matches[1] as $url): ?>
				<div class="img-container">
					<img src="<?=$url;?>">
				</div>

			<?php endforeach; ?>

		<?php endif; ?> -->
		<!-- <?php 
			$dir = 'images';

			if(is_dir($dir)){
				$handle = opendir($dir);

				while($file = readdir($handle)){
					/*echo $file.'<br>';*/
					if($file != '.' AND $file != '..'){
						?>

						<div class="img-container">
						<img src="./images/<?= $file; ?>">
						</div>
						
						<?php
					}
				}
				closedir($handle);
			}
		?>
-->
	</div>
 
</body>
</html>