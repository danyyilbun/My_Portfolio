
//---------Face turn---------//	
$("#F").on("click",function(){
	faceTurn(frontSide,leftSide,bottomSide,rigthSide,topSide);
	Display();
});	
$("#Fk").on("click",function(){
	faceTurnI(frontSide,leftSide,bottomSide,rigthSide,topSide);
	Display();
});	
//--------------The scramble button--------------//

$("#Scramble").on("click",function(){
	Scramble(leftSide,backSide,bottomSide,frontSide,topSide,rigthSide);
	Display();
});




//---------Right or Left turn by X axes---------//		
$("#X").on("click",function(){
	xTurn(topSide,bottomSide,rigthSide,backSide,leftSide,frontSide);
	Display();
});	
$("#Xk").on("click",function(){
	xTurnI(topSide,bottomSide,rigthSide,backSide,leftSide,frontSide);
	Display();
});

//---------Right or Left turn by Y axes---------//		
$("#Y").on("click",function(){
	yTurn(leftSide,backSide,bottomSide,frontSide,topSide,rigthSide);
	Display();
});	
$("#Yk").on("click",function(){
	yTurnI(leftSide,backSide,bottomSide,frontSide,topSide,rigthSide);
	Display();
});

//--------Down turn---------//	
$("#D").on("click",function(){
	downTurn(bottomSide,backSide,rigthSide,frontSide,leftSide);
	Display();
});	
$("#Dk").on("click",function(){
	downTurnI(bottomSide,backSide,rigthSide,frontSide,leftSide);
	Display();
});		

//--------Back turn---------//	
$("#B").on("click",function(){
	backTurn(backSide,frontSide,leftSide,bottomSide,rigthSide);
	Display();
});	
$("#Bk").on("click",function(){
	backTurnI(backSide,frontSide,leftSide,bottomSide,rigthSide);
	Display();
});


//----------Top turn----------//
$("#T").on("click",function(){
	topTurn(topSide,frontSide,rigthSide,backSide,leftSide);
	Display();
});	
$("#Tk").on("click",function(){
	topTurnI(topSide,frontSide,rigthSide,backSide,leftSide);
	Display();
});	

//--------Middle Y turn--------//
$("#My").on("click",function()
{
	mYTurn(topSide,frontSide,bottomSide,backSide);	
	Display();	
});
$("#Myk").on("click",function(){
	mYTurnI(topSide,frontSide,bottomSide,backSide);	
	Display();
});

//--------Middle H turn--------//
$("#Mh").on("click",function()
{
	mHTurn(topSide,leftSide,rigthSide,backSide);	
	Display();	
});
$("#Mhk").on("click",function(){
	mHTurnI(topSide,leftSide,rigthSide,backSide);	
	Display();
});

//--------Right turn--------//
$("#R").on("click",function()
{
	RigthTurn(rigthSide,bottomSide,backSide,topSide,frontSide);	
	Display();	
});
$("#Rk").on("click",function(){
	RigthTurnI(rigthSide,bottomSide,backSide,topSide,frontSide);	
	Display();
});


//--------Left turn---------//	
$("#L").on("click",function()
{
	leftTurn(leftSide,backSide,bottomSide,frontSide,topSide);	
	Display();	
});	
$("#Lk").on("click",function()
{
	leftTurnI(leftSide,backSide,bottomSide,frontSide,topSide);	
	Display();	
});		


	