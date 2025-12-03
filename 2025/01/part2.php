<?php

$start = 50;
$input = file('input');
$zeroCount = 0;
$position = $start;

foreach ($input as $line) {
	[$direction, $num] = sscanf($line, '%c%d');

	$step = $direction === 'L' ? -1 : 1;

	for ($i = 0; $i < $num; $i++) {
		$position = ($position + $step + 100) % 100;
		if ($position === 0) {
			$zeroCount++;
		}
	}
}

echo $zeroCount . PHP_EOL;