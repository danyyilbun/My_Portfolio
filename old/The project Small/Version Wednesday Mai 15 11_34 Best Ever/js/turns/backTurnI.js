function backTurnI(backSide,frontSide,leftSide,bottomSide,rigthSide)
{
	//Clockwise turn 
		var temp1 = CuBe[backSide][7];
		
		CuBe[backSide][7] = CuBe[backSide][5];
		
		CuBe[backSide][5] = CuBe[backSide][3];
		
		CuBe[backSide][3] = CuBe[backSide][1];
		
		CuBe[backSide][1] = temp1;
		
		
		var temp2 = CuBe[backSide][0];
		
		CuBe[backSide][0] = CuBe[backSide][6];
		
		CuBe[backSide][6] = CuBe[backSide][4];
		
		CuBe[backSide][4] = CuBe[backSide][2];
		
		CuBe[backSide][2] = temp2;
		
	//The separate action of switching of other adjescent colours involved int his move
	
	var tempora1 = CuBe[topSide][0];
	var tempora2 = CuBe[topSide][1];
	var tempora3 = CuBe[topSide][2];
	
	CuBe[topSide][0] = CuBe[rigthSide][2];
	CuBe[topSide][1] = CuBe[rigthSide][3];
	CuBe[topSide][2] = CuBe[rigthSide][4];
	
	CuBe[rigthSide][2] = CuBe[bottomSide][2];
	CuBe[rigthSide][3] = CuBe[bottomSide][1];
	CuBe[rigthSide][4] = CuBe[bottomSide][0];
	
	CuBe[bottomSide][0] = CuBe[leftSide][0];
	CuBe[bottomSide][1] = CuBe[leftSide][7];
	CuBe[bottomSide][2] = CuBe[leftSide][6];
	
	
	CuBe[leftSide][6] = tempora1;
	CuBe[leftSide][7] = tempora2;
	CuBe[leftSide][0] = tempora3;
	
}