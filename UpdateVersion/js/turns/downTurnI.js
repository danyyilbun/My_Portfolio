function downTurnI(bottomSide,backSide,rigthSide,frontSide,leftSide){
		//Clockwise turn 
		var temp1 = CuBe[bottomSide][7];
		
		CuBe[bottomSide][7] = CuBe[bottomSide][5];
		
		CuBe[bottomSide][5] = CuBe[bottomSide][3];
		
		CuBe[bottomSide][3] = CuBe[bottomSide][1];
		
		CuBe[bottomSide][1] = temp1;
		
		
		var temp2 = CuBe[bottomSide][0];
		
		CuBe[bottomSide][0] = CuBe[bottomSide][6];
		
		CuBe[bottomSide][6] = CuBe[bottomSide][4];
		
		CuBe[bottomSide][4] = CuBe[bottomSide][2];
		
		CuBe[bottomSide][2] = temp2;
		
	//The separate action of switching of other adjescent colours involved int his move
	
	
	
	var tempora1 = CuBe[backSide][4];
	var tempora2 = CuBe[backSide][5];
	var tempora3 = CuBe[backSide][6];
	
	CuBe[backSide][4] = CuBe[leftSide][4];
	CuBe[backSide][5] = CuBe[leftSide][5];
	CuBe[backSide][6] = CuBe[leftSide][6];
	
	CuBe[leftSide][4] = CuBe[frontSide][4];
	CuBe[leftSide][5] = CuBe[frontSide][5];
	CuBe[leftSide][6] = CuBe[frontSide][6];
	
	CuBe[frontSide][4] = CuBe[rigthSide][4];
	CuBe[frontSide][5] = CuBe[rigthSide][5];
	CuBe[frontSide][6] = CuBe[rigthSide][6];
	
	
	CuBe[rigthSide][4] = tempora1;
	CuBe[rigthSide][5] = tempora2;
	CuBe[rigthSide][6] = tempora3;
	
	
	}