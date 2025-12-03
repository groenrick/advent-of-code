<?php

$start = 50;

$input = file('input');

$positions = [];

echo 'The dial starts by pointing at ' . $start . PHP_EOL;

array_reduce($input, function ($oldPosition, $input) use (&$positions) {

	[$direction, $num] = sscanf($input, '%c%d');

	$operation = $direction === 'L' ? -$num : $num;

	$newPosition = ($oldPosition + 100 + $operation) % 100;



	echo 'The dial is rotated '.$input.' to point at ' . $newPosition . PHP_EOL;

	$positions[] = $newPosition;

	return $newPosition;

}, $start);

echo count(array_filter($positions, fn ($val) => $val === 0)) . PHP_EOL;
