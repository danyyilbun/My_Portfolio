function mHTurnI(topSide,leftSide,rightSide,backSide)
{
	var temp1 = CuBe[frontSide][8];
var temp2 = CuBe[frontSide][7];
var temp3 = CuBe[frontSide][3];

CuBe[frontSide][8] =CuBe[rigthSide][8];
CuBe[frontSide][7] =CuBe[rigthSide][7];
CuBe[frontSide][3] =CuBe[rigthSide][3];

CuBe[rigthSide][8] =CuBe[backSide][8];
CuBe[rigthSide][7] =CuBe[backSide][7];
CuBe[rigthSide][3] =CuBe[backSide][3];

CuBe[backSide][8] =CuBe[leftSide][8];
CuBe[backSide][7] =CuBe[leftSide][7];
CuBe[backSide][3] =CuBe[leftSide][3];

CuBe[leftSide][8] = temp1;
CuBe[leftSide][7] = temp2;
CuBe[leftSide][3] = temp3;
	
	
	
	
}
