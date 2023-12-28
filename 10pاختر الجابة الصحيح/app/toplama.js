let option1= document.getElementById("option1");
let option2= document.getElementById("option2");
let option3= document.getElementById("option3");
let answer=0;
  

function generate_equation(){
   let num1 =Math.floor(Math.random() * 13);
   let num2 =Math.floor(Math.random() * 13);
   let dummyAnswer1 =Math.floor(Math.random() * 13);
   let dummyAnswer2 =Math.floor(Math.random() * 13);
   let allAnswers = [];
   let switchAnswer = [];
   answer = num1 + num2 ;
   document.getElementById("num1").innerHTML = num1 ;
   document.getElementById("num2").innerHTML = num2 ;
   // مشان ما يبقا اكبس على نفس المكانن 
   allAnswers = [answer , dummyAnswer1 ,dummyAnswer2 ];

   for(i=allAnswers.length ; i--;)
   {
    switchAnswer.push(allAnswers.splice(Math.floor(Math.random()* (i+1)) , 1)[0]);
   }


   option1.innerHTML = switchAnswer[0];
   option2.innerHTML = switchAnswer[1];
   option3.innerHTML = switchAnswer[2];
}


option1.addEventListener("click" , function () {
    if(option1.innerHTML == answer ){
        generate_equation();
    }
})

option2.addEventListener("click" , function () {
    if(option2.innerHTML == answer ){
        generate_equation();
    }
})


option3.addEventListener("click" , function () {
    if(option3.innerHTML == answer ){
        generate_equation();
    }
})


generate_equation();
