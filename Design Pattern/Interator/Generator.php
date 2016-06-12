<?php
// function getcsv($file) {
// 	$fd = fopen($file, 'r+');
// 	if($fd) {
// 		while(($buffer=fgets($fd))!==false) {
// 			/*
// 			 * 使用了yield的函數，執行後會回傳一個Generator，
// 			 * 而Generator也implement了Iterator，所以一樣可以用foreach來操作，只是寫起來更簡單。
// 			 */
// 			yield explode(',',$buffer);
// 		}
// 		fclose($fd);
// 	}
// }
// $a = getcsv('csv');
// foreach($a as $line) echo implode(' : ', $line);
// echo "\n";

function conv($from, $to) {
	$fd1 = fopen($from, 'r+');
	$fd2 = fopen($to, 'w+');
	if($fd1 && $fd2) {
		while(($r=fgets($fd1))!==false) {
			$w = (yield $r);
			fputs($fd2, $w);
		}
		fclose($fd1);
		fclose($fd2);
	}
}
$a = conv('csv', 'tocsv');
while($a->valid()) {
	$a->send(implode("\t", explode(',',$a->current())));
	$a->next();
}