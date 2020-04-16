var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    var cat = JSON.parse(this.responseText); 
    console.log(cat.length);
    displayCategory(cat);
    }
  };
xhttp.open("GET", "http://localhost/php/php_quiz/api/", true);
xhttp.send();


function displayCategory(cat)
{
 	cat.forEach(
 		element => createHTML(element)
 	);

}

function createHTML(element)
{
	var categorySection = document.getElementById("category-section");
	var anchor = document.createElement("a");
	anchor.setAttribute("href","http://localhost/php/php_quiz/index.php/category/"+element.slug);
	var button = document.createElement("button");
	button.setAttribute("class","btn btn-grad btn-lg");
	button.setAttribute("type","button");
	button.innerHTML = element.category;
	categorySection.appendChild(anchor);
	anchor.appendChild(button);
}