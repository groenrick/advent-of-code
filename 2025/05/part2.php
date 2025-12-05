<?php

$input = file('input', FILE_IGNORE_NEW_LINES);

$ranges = [];

foreach ($input as $line) {
	$line = trim($line);
	if (str_contains($line, '-')) {
		[$min, $max] = explode('-', $line);
		$ranges[]    = [(int)$min, (int)$max];
	}
}

usort($ranges, fn ($a, $b) => $a[0] <=> $b[0]);

// merge overlapping series
$merged = [];
foreach ($ranges as [$min, $max]) {
	if ([] === $merged) {
		$merged[] = [$min, $max];
	} else {
		$last = &$merged[count($merged) - 1];
		if ($min <= $last[1] + 1) {
			$last[1] = max($last[1], $max);
		} else {
			$merged[] = [$min, $max];
		}
	}
}

$total = 0;
foreach ($merged as [$min, $max]) {
	$total += $max - $min + 1;
}

echo $total . PHP_EOL;
