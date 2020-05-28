function leftTurnI(leftSide,backSide,bottomSide,frontSide,topSide){
	
		//Unti clockwise
		
		var temp1 = CuBe[leftSide][0];
		
		CuBe[leftSide][0] = CuBe[leftSide][2];
		
		CuBe[leftSide][2] = CuBe[leftSide][4];
		
		CuBe[leftSide][4] = CuBe[leftSide][6];
		
		CuBe[leftSide][6] = temp1;
		
		
		var temp2 = CuBe[leftSide][1];
		
		CuBe[leftSide][1] = CuBe[leftSide][3];
		
		CuBe[leftSide][3] = CuBe[leftSide][5];
		
		CuBe[leftSide][5] = CuBe[leftSide][7];
		
		CuBe[leftSide][7] = temp2;
		
		
	//The separate action of switching of other adjescent colours involved int his move	

	
	var tempora1 = CuBe[topSide][0];
	var tempora2 = CuBe[topSide][7];
	var tempora3 = CuBe[topSide][6];
	
	
	
	CuBe[topSide][0] = CuBe[frontSide][0];
	CuBe[topSide][7] = CuBe[frontSide][7];
	CuBe[topSide][6] = CuBe[frontSide][6];
	
	
	CuBe[frontSide][0] = CuBe[bottomSide][6];
	CuBe[frontSide][7] = CuBe[bottomSide][7];
	CuBe[frontSide][6] = CuBe[bottomSide][0];
	
	
	CuBe[bottomSide][6] = CuBe[backSide][4];
	CuBe[bottomSide][7] = CuBe[backSide][3];
	CuBe[bottomSide][0] = CuBe[backSide][2];
	
	
	CuBe[backSide][4] = tempora1;
	CuBe[backSide][3] = tempora2;
	CuBe[backSide][2] = tempora3;
	
	
	}