<?php

class SquareAreaLib {
	public function getSquareArea(int $diagonal) {
		$area = ($diagonal ** 2) / 2;
		return $area;
	}
}

class CircleAreaLib {
	public function getCircleArea(int $diagonal) {
		$area = (M_PI * $diagonal ** 2) / 4;
		return $area;
	}
}

interface ISquare {
	function squareArea(int $sideSquare);
}

interface ICircle {
	function circleArea(int $circumference);
}

class SquareAdapter implements ISquare {
	public function squareArea(int $sideSquare) {
		$diagonal = sqrt($sideSquare ** 2 + $sideSquare ** 2);
		$squeareArea = new SquareAreaLib();
		return $squeareArea->getSquareArea($diagonal);
	}
}

class CircleAdapter implements ICircle {
	public function circleArea(int $circumference) {
		$diagonal = $circumference / M_PI;
		$сircleArea = new CircleAreaLib();
		return $сircleArea->getCircleArea($diagonal);
	}
}
