var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    var quiz = JSON.parse(this.responseText);
    console.log(quiz);
    displayQuiz(quiz);
    document.getElementById("submit").onclick = function() {myPoint(quiz)};
    }
  };
  xhttp.open("GET", "http://localhost/php/php_quiz/admin/api/api.php", true);
  xhttp.send();


function displayQuiz(quiz){
let count = 0;
for (i=0;i<quiz.length;i++){
	let quizOuter = document.getElementById('quiz');
	let queOuter = document.createElement('div');
	queOuter.setAttribute('class','que-ans');
	queOuter.setAttribute('id','que-ans'+i);

	let zQuestion = document.createElement('div');
	zQuestion.setAttribute('id','question'+i);
	zQuestion.innerHTML = quiz[i].question;
	quizOuter.appendChild(queOuter);
	queOuter.appendChild(zQuestion);


for (j=0;j<4;j++){
	//Create a input type radio option
	let zOption = document.createElement('input');
	zOption.setAttribute('type','radio');
	zOption.setAttribute('id','option'+i+j);
	zOption.setAttribute('name','select'+i);
	zOption.setAttribute('value', quiz[i].option[j]);
	//create a label in input
	let zLabel = document.createElement('label');
	zLabel.innerHTML = quiz[i].option[j];
	queOuter.appendChild(zOption);
	queOuter.appendChild(zLabel);


}
// console.log(quizOuter.children);
}
}

function myPoint(quiz){
	let count = 0;
	for (i = 0 ; i <quiz.length ; i++){
		for (j = 0 ; j <4 ; j++){
			let userAnswer = document.getElementById('option'+i+j);
			if(userAnswer.checked){
	 	if(userAnswer.value == quiz[i].answer){
	 		count  = count + 1;
	 		document.getElementById('que-ans'+i).style.border ='1px solid green';
	 		document.getElementById('que-ans'+i).style.boxShadow ='2px 2px green';
	 			} else {
			document.getElementById('que-ans'+i).style.border ='1px solid red';
	 		document.getElementById('que-ans'+i).style.boxShadow ='2px 2px red';
	 			}
	 		}
	 	}
	}
	 	document.getElementById('mark').innerHTML = count;
	 	let checker  = quiz.length / 2;
	 	if (count >= checker ){
		document.getElementById('gif-welldone').style.display ='block';
		document.getElementById('gif-bad').style.display ='none';
		} else {
		document.getElementById('gif-bad').style.display ='block';
		document.getElementById('gif-welldone').style.display ='none';
		}
	}


document.getElementById("reload").onclick =  function(){
	pageReload()
}
function pageReload() {
	location.reload();
}
