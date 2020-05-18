function topTurn(topSide,frontSide,rigthSide,backSide,leftSide){

		
		//Clockwise turn 
		var temp1 = CuBe[topSide][7];
		
		CuBe[topSide][7] = CuBe[topSide][5];
		
		CuBe[topSide][5] = CuBe[topSide][3];
		
		CuBe[topSide][3] = CuBe[topSide][1];
		
		CuBe[topSide][1] = temp1;
		
		
		var temp2 = CuBe[topSide][0];
		
		CuBe[topSide][0] = CuBe[topSide][6];
		
		CuBe[topSide][6] = CuBe[topSide][4];
		
		CuBe[topSide][4] = CuBe[topSide][2];
		
		CuBe[topSide][2] = temp2;
		
	//The separate action of switching of other adjescent colours involved int his move
	
	
	var tempora1 = CuBe[frontSide][0];
	var tempora2 = CuBe[frontSide][1];
	var tempora3 = CuBe[frontSide][2];
	
	CuBe[frontSide][0] = CuBe[rigthSide][0];
	CuBe[frontSide][1] = CuBe[rigthSide][1];
	CuBe[frontSide][2] = CuBe[rigthSide][2];
	
	CuBe[rigthSide][0] = CuBe[backSide][0];
	CuBe[rigthSide][1] = CuBe[backSide][1];
	CuBe[rigthSide][2] = CuBe[backSide][2];
	
	CuBe[backSide][0] = CuBe[leftSide][0];
	CuBe[backSide][1] = CuBe[leftSide][1];
	CuBe[backSide][2] = CuBe[leftSide][2];
	
	
	CuBe[leftSide][0] = tempora1;
	CuBe[leftSide][1] = tempora2;
	CuBe[leftSide][2] = tempora3;
	
	
	}