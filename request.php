<?php 
	If (isset($_GET['id'])) {

	$_GET['id'] = strip_tags($_GET['id']);
    $_GET['id'] = addslashes($_GET['id']);


	$id = $_GET['id'];
	
	$ht = 'http://api.mp3.zing.vn/api/mobile/song/getsonginfo?requestdata={"id":"' . $id . '"}';
	$fgc = file_get_contents($ht);
	$jd = json_decode($fgc, true);
	$gdata = $jd['source']['128'];

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $gdata);
	curl_setopt($ch, CURLOPT_HEADER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Must be set to true so that PHP follows any "Location:" header
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$a = curl_exec($ch); // $a will contain all headers

	$url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); // This is what you need, it will return you the last effective URL
	echo $url;
	}
?>