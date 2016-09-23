<?php
$def_rate = 25;
$sum_rate = 0;
$count = 200;
for($j = 0; $j < 10; $j++) {

	$bingo_cnt = 0;
	for($i = 0; $i < $count; $i++) {

		$rate = mt_rand(1, 1000);

		if($rate <= $def_rate) { // 中獎率 2.5%
			$bingo_cnt += 1;
		}

	}
	$rate = (($bingo_cnt / $count) * 100);
	$sum_rate += $rate; 
	echo ($j + 1) . " - " . $rate . "%\n";
}

echo "avg - " . $sum_rate / $j . "%\n";
echo "def - " . $def_rate / 10 . "%\n";
