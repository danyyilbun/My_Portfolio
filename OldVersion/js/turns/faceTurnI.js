function faceTurnI(frontSide,leftSide,bottomSide,rigthSide,topSide){

	//Unti clockwise
		
		var temp1 = CuBe[frontSide][0];
		
		CuBe[frontSide][0] = CuBe[frontSide][2];
		
		CuBe[frontSide][2] = CuBe[frontSide][4];
		
		CuBe[frontSide][4] = CuBe[frontSide][6];
		
		CuBe[frontSide][6] = temp1;
		
		
		var temp2 = CuBe[frontSide][1];
		
		CuBe[frontSide][1] = CuBe[frontSide][3];
		
		CuBe[frontSide][3] = CuBe[frontSide][5];
		
		CuBe[frontSide][5] = CuBe[frontSide][7];
		
		CuBe[frontSide][7] = temp2;

	//The separate action of switching of other adjescent colours involved int his move	

	var tempora1 = CuBe[rigthSide][0];
	var tempora2 = CuBe[rigthSide][7];
	var tempora3 = CuBe[rigthSide][6];
	
	
	CuBe[rigthSide][0] = CuBe[bottomSide][4];
	CuBe[rigthSide][7] = CuBe[bottomSide][5];
	CuBe[rigthSide][6] = CuBe[bottomSide][6];
	
	
	CuBe[bottomSide][4] = CuBe[leftSide][4];
	CuBe[bottomSide][5] = CuBe[leftSide][3];
	CuBe[bottomSide][6] = CuBe[leftSide][2];
	
	
	CuBe[leftSide][2] = CuBe[topSide][4];
	CuBe[leftSide][3] = CuBe[topSide][5];
	CuBe[leftSide][4] = CuBe[topSide][6];
	
	
	CuBe[topSide][6] = tempora1;
	CuBe[topSide][5] = tempora2;
	CuBe[topSide][4] = tempora3;
	
	
	}