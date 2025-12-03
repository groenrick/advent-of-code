<?php

$input = file('input');

$sets = explode(",", $input[0]);

$sumOfInvalidIdValues = 0;

function isRepeatedSequence($number) {
	$str = (string)$number;
	$len = strlen($str);

	for ($blockSize = 1; $blockSize <= $len / 2; $blockSize++) {
		if ($len % $blockSize !== 0) {
			continue;
		}

		$block = substr($str, 0, $blockSize);
		$repeats = $len / $blockSize;

		if (str_repeat($block, $repeats) === $str) {
			return true;
		}
	}

	return false;
}

foreach ($sets as $set) {
	$range = explode("-", $set);
	$numbers = range($range[0], $range[1]);

	foreach ($numbers as $number) {
		if (isRepeatedSequence($number)) {
			$sumOfInvalidIdValues += $number;
		}
	}
}

echo $sumOfInvalidIdValues;
