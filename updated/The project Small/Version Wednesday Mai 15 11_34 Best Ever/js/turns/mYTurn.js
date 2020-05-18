function mYTurn(topSide,frontSide,bottomSide,backSide)
{
	
var temp1 = CuBe[frontSide][1];
var temp2 = CuBe[frontSide][5];
var temp3 = CuBe[frontSide][8];

CuBe[frontSide][1] =CuBe[topSide][1];
CuBe[frontSide][5] =CuBe[topSide][5];
CuBe[frontSide][8] =CuBe[topSide][8];

CuBe[topSide][1] =CuBe[backSide][5];
CuBe[topSide][5] =CuBe[backSide][1];
CuBe[topSide][8] =CuBe[backSide][8];

CuBe[backSide][1] =CuBe[bottomSide][1];
CuBe[backSide][5] =CuBe[bottomSide][5];
CuBe[backSide][8] =CuBe[bottomSide][8];

CuBe[bottomSide][5] = temp1;
CuBe[bottomSide][1] = temp2;
CuBe[bottomSide][8] = temp3;
	

	
}