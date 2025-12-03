<?php

$banks = file('input');
$totalJoltage = 0;

foreach ($banks as $bank) {
	$bank = trim($bank);

	$len = strlen($bank);
	$toSelect = 12;

	$result = '';
	$startPos = 0;

	for ($i = 0; $i < $toSelect; $i++) {
		$remaining = $toSelect - $i - 1;

		$endPos = $len - $remaining - 1;

		$maxDigit = '0';
		$maxPos = $startPos;

		for ($j = $startPos; $j <= $endPos; $j++) {
			if ($bank[$j] > $maxDigit) {
				$maxDigit = $bank[$j];
				$maxPos = $j;
				if ($maxDigit === '9') break;
			}
		}

		$result .= $maxDigit;
		$startPos = $maxPos + 1;
	}

	echo "Bank: $bank => Max joltage: $result" . PHP_EOL;

	$totalJoltage = bcadd($totalJoltage, $result);
}

echo "Total: $totalJoltage" . PHP_EOL;