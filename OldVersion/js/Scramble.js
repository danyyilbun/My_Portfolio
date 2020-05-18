function Scramble(leftSide,backSide,bottomSide,frontSide,topSide,rigthSide)
{
for(var i = 0; i< 20; i++)
 {
	switch(Math.floor(Math.random() * 13)){
		case 0:
	backTurnI(backSide,frontSide,leftSide,bottomSide,rigthSide);
	break;
		
		case 1:
	faceTurn(frontSide,leftSide,bottomSide,rigthSide,topSide);
	break;
	
		case 2:
	downTurn(bottomSide,backSide,rigthSide,frontSide,leftSide);
	break;

		case 3:
	leftTurnI(leftSide,backSide,bottomSide,frontSide,topSide);
	break;

		case 4:
	mHTurnI(topSide,leftSide,rigthSide,backSide);
	break;

		case 5:
	mYTurnI(topSide,frontSide,bottomSide,backSide);
	break;

		case 6:
	topTurn(topSide,frontSide,rigthSide,backSide,leftSide);
	break;
		case 7:
	xTurn(topSide,bottomSide,rigthSide,backSide,leftSide,frontSide);
	break;

		case 8:
	yTurn(leftSide,backSide,bottomSide,frontSide,topSide,rigthSide);
	break;

		case 9:
	backTurn(backSide,frontSide,leftSide,bottomSide,rigthSide);
	break;

		case 10:
	mHTurn(topSide,leftSide,rigthSide,backSide);
	break;

		case 11:
	downTurnI(bottomSide,backSide,rigthSide,frontSide,leftSide);
	break;
		case 12:
	leftTurn(leftSide,backSide,bottomSide,frontSide,topSide);
	break;
	default:
	topTurn(backSide,frontSide,leftSide,bottomSide,rigthSide);
	break;
	}

 }
}