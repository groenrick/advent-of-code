<?php

$input = file('input', FILE_IGNORE_NEW_LINES);

$ranges = [];
$products = [];

foreach ($input as $line) {
	$line = trim($line);
	if (str_contains($line, '-')) {
		[$min, $max] = explode('-', $line);
		$ranges[] = [(int)$min, (int)$max];
	} elseif ($line !== '') {
		$products[] = (int)$line;
	}
}

$freshCount = 0;

foreach ($products as $product) {
	foreach ($ranges as [$min, $max]) {
		if ($product >= $min && $product <= $max) {
			$freshCount++;
			break;
		}
	}
}

echo $freshCount . PHP_EOL;