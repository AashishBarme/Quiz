$(document).ready(function(){
	var max_fields      = 10; //maximum input boxes allowed
	var wrapper   		= $(".question-answer-set"); //Fields wrapper
	var add_button      = $(".add_more"); //Add button ID
	var remove_button   = $(".remove"); 
	var	html = $(".question-answer-set").html();  
	var length = $('.question-answer-single').length;
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click  
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append(html); //add input box
		    $(remove_button).css("display","inline-block");
		    $(remove_button).removeAttr("disabled");
			console.log(x);
		} 
		if(x == max_fields) {
			$(add_button).attr("disabled","disabled");
		}
	});
	
	$(remove_button).click(function(e){ //user click on remove text
		e.preventDefault();	
		$('.question-answer-single').last().remove(); 
		$(add_button).removeAttr("disabled");
		x--;
		if(x == 1)
		{
		  $(remove_button).attr("disabled","disabled");
		}	
	})
});