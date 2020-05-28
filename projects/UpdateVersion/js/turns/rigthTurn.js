function RigthTurn(rigthSide,bottomSide,backSide,topSide,frontSide){

		//Clockwise turn 
		var temp1 = CuBe[rigthSide][7];
		
		CuBe[rigthSide][7] = CuBe[rigthSide][5];
		
		CuBe[rigthSide][5] = CuBe[rigthSide][3];
		
		CuBe[rigthSide][3] = CuBe[rigthSide][1];
		
		CuBe[rigthSide][1] = temp1;
		
		
		var temp2 = CuBe[rigthSide][0];
		
		CuBe[rigthSide][0] = CuBe[rigthSide][6];
		
		CuBe[rigthSide][6] = CuBe[rigthSide][4];
		
		CuBe[rigthSide][4] = CuBe[rigthSide][2];
		
		CuBe[rigthSide][2] = temp2;
	//The separate action of switching of other adjescent colours involved int his move
	
	
	
	var tempora1 = CuBe[bottomSide][2];
	var tempora2 = CuBe[bottomSide][3];
	var tempora3 = CuBe[bottomSide][4];
	
	CuBe[bottomSide][2] = CuBe[backSide][0];
	CuBe[bottomSide][3] = CuBe[backSide][7];
	CuBe[bottomSide][4] = CuBe[backSide][6];
	
	CuBe[backSide][0] = CuBe[topSide][4];
	CuBe[backSide][7] = CuBe[topSide][3];
	CuBe[backSide][6] = CuBe[topSide][2];
	
	CuBe[topSide][2] = CuBe[frontSide][2];
	CuBe[topSide][3] = CuBe[frontSide][3];
	CuBe[topSide][4] = CuBe[frontSide][4];
	
	
	CuBe[frontSide][2] = tempora3;
	CuBe[frontSide][3] = tempora2;
	CuBe[frontSide][4] = tempora1;
	
	
	}