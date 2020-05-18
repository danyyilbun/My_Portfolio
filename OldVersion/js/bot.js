var colours = ["yellow","orange","blue","white","red","green"];
	var CuBe = 
	[
	[0,0,0,0,0,0,0,0,0],
	[1,1,1,1,1,1,1,1,1],
	[2,2,2,2,2,2,2,2,2],
	[3,3,3,3,3,3,3,3,3],
	[4,4,4,4,4,4,4,4,4],
	[5,5,5,5,5,5,5,5,5],

	];	
	
	var topSide = 0; 	
	var frontSide = 1;
	var rigthSide = 2;
	var bottomSide = 3;
	var backSide   = 4;
	var leftSide  =  5;
	function Display()
	{
	//Top Part
	
	$("#c").attr("style",'background-color:'+colours[CuBe[topSide][0]]);	
	$("#d").attr("style",'background-color:'+colours[CuBe[topSide][1]]);
	$("#e").attr("style",'background-color:'+colours[CuBe[topSide][2]]);
	$("#j").attr("style",'background-color:'+colours[CuBe[topSide][3]]);
	$("#o").attr("style",'background-color:'+colours[CuBe[topSide][4]]);
	$("#n").attr("style",'background-color:'+colours[CuBe[topSide][5]]);
	$("#m").attr("style",'background-color:'+colours[CuBe[topSide][6]]);
	$("#h").attr("style",'background-color:'+colours[CuBe[topSide][7]]);
	
	//centers
	$("#i").attr("style",'background-color:'+colours[CuBe[topSide][8]]);
	$("#z").attr("style",'background-color:'+colours[CuBe[frontSide][8]]);
	$("#w").attr("style",'background-color:'+colours[CuBe[rigthSide][8]]);
	
	//Front part
	$("#s").attr("style",'background-color:'+colours[CuBe[frontSide][0]]);	
	$("#t").attr("style",'background-color:'+colours[CuBe[frontSide][1]]);
	$("#u").attr("style",'background-color:'+colours[CuBe[frontSide][2]]);
	$("#1").attr("style",'background-color:'+colours[CuBe[frontSide][3]]);
	$("#6").attr("style",'background-color:'+colours[CuBe[frontSide][4]]);
	$("#5").attr("style",'background-color:'+colours[CuBe[frontSide][5]]);
	$("#4").attr("style",'background-color:'+colours[CuBe[frontSide][6]]);
	$("#y").attr("style",'background-color:'+colours[CuBe[frontSide][7]]);
	
	//Rigth Side
	$("#v").attr("style",'background-color:'+colours[CuBe[rigthSide][0]]);	
	$("#q").attr("style",'background-color:'+colours[CuBe[rigthSide][1]]);
	$("#l").attr("style",'background-color:'+colours[CuBe[rigthSide][2]]);
	$("#r").attr("style",'background-color:'+colours[CuBe[rigthSide][3]]);
	$("#x").attr("style",'background-color:'+colours[CuBe[rigthSide][4]]);
	$("#3").attr("style",'background-color:'+colours[CuBe[rigthSide][5]]);
	$("#7").attr("style",'background-color:'+colours[CuBe[rigthSide][6]]);
	$("#2").attr("style",'background-color:'+colours[CuBe[rigthSide][7]]);
	
	
	}
	
Display();
	
	
