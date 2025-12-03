<?php

$banks = file('input');
$totalJoltage = 0;

foreach ($banks as $bank) {
	$bank = trim($bank);

	$len = strlen($bank);
	$maxJoltage = 0;

	$maxDigitSoFar = 0;
	for ($j = 0; $j < $len; $j++) {
		if ($j > 0) {
			$joltage = intval($maxDigitSoFar . $bank[$j]);
			$maxJoltage = max($maxJoltage, $joltage);
		}
		$maxDigitSoFar = max($maxDigitSoFar, intval($bank[$j]));
	}

	echo "Bank: $bank => Max joltage: $maxJoltage" . PHP_EOL;
	$totalJoltage += $maxJoltage;
}

echo "Total: $totalJoltage" . PHP_EOL;