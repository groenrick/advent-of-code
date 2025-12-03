<?php

$input = file('input');

$sets = explode(",", $input[0]);

$sumOfInvalidIdValues = 0;

foreach ($sets as $set) {
	$range = explode("-", $set);

	$numbers = range($range[0], $range[1]);

	foreach ($numbers as $number) {

		$strlen = strlen($number);
		$halfStrlen = ceil($strlen / 2);

		$part1 = substr($number, 0, $halfStrlen);
		$part2 = substr($number, $halfStrlen);

		$valid = $part1 !== $part2;

		if (!$valid) {
			$sumOfInvalidIdValues += $number;
		}
	}
}

echo $sumOfInvalidIdValues;