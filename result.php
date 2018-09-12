<?php 
	$busca = urlencode($_GET['busca']);
	$url = 'http://google.com/complete/search?output=toolbar&q='.$busca.'';
	$xml = file_get_contents($url, false);
	$xml = simplexml_load_string($xml);
 ?>

<ul>
	 <?php foreach($xml->CompleteSuggestion as $xmls): ?>
		<li><?php echo $xmls->suggestion['data']; ?></li>
	 <?php endforeach; ?>
</ul>