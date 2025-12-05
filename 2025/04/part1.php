<?php

$input = file('input', FILE_IGNORE_NEW_LINES);
$grid = array_map(fn ($line) => str_split(trim($line)), $input);

$cols = count($grid[0]);
$rows = count($grid);

$movableRolls = 0;
readonly class Vec2d
{
	public function __construct(public int $x, public int $y)
	{
	}
}

// loop over rows
for ($y = 0; $y < $rows; $y++) {
	for ($x = 0; $x < $cols; $x++) {
		$pos = new Vec2d($x, $y);
		$char = getCharFromPos($pos);
		if (canBeMoved($pos) && $char === '@') {
			$movableRolls++;
			echo 'x';
		} else {
			echo $char;
		}
	}
	echo PHP_EOL;
}

function getCharFromPos(Vec2d $pos): string | false
{
	global $grid, $cols, $rows;

	if ($pos->x < 0 || $pos->x >= $cols || $pos->y < 0 || $pos->y >= $rows) {
		return false;
	}

	return $grid[$pos->y][$pos->x];
}


function canBeMoved(Vec2d $pos): bool
{
	$x = $pos->x;
	$y = $pos->y;

	$adjacentChars = [
		// left side neighbors
		getCharFromPos(new Vec2d($x - 1, $y - 1)),
		getCharFromPos(new Vec2d($x - 1, $y)),
		getCharFromPos(new Vec2d($x - 1, $y + 1)),

		// right side neighbors
		getCharFromPos(new Vec2d($x + 1, $y - 1)),
		getCharFromPos(new Vec2d($x + 1, $y)),
		getCharFromPos(new Vec2d($x + 1, $y + 1)),

		// top neighbor
		getCharFromPos(new Vec2d($x, $y - 1)),

		// bottom neightbor
		getCharFromPos(new Vec2d($x, $y + 1)),
	];
	$adjacentRolls = array_filter($adjacentChars, fn ($char) => $char === '@');

	$count = count($adjacentRolls);
//	echo $count;
	return $count < 4;
}



echo $movableRolls . PHP_EOL;
