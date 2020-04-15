<?php include("../../inc/header.php"); 
include_once("../../classes/CategoryClass.php");

$categoryClass = new CategoryClass();
$categories = $categoryClass->list();

if(isset($_POST['save_data']))
{
	$quizClass->insertQA();
	header('location: list.php');
}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			 <form method="POST" style="padding-top: 20px;">
			    <div class="form-group row">
					    <label for="category" class="col-sm-2 col-form-label">Category</label>
					    <div class="col-sm-10">
						    <select class="form-control" id="category" name="category">
						     <?php foreach($categories as $item): ?>
						      <option value="<?=$item["id"]?>"><?=$item["category"]?></option>
						  	<?php endforeach; ?>
						    </select>
						</div>
			    </div>

			    <div class="question-answer-set">
				  <div class="form-group row question-answer-single">
				    <label for="question" class="col-sm-2 col-form-label">Question</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="question" name="question[]" placeholder="Write your question" required>
				    </div>
				    <label for="answers" class="col-sm-12 col-form-label">Answers</label>
				    <div class ="answer-section form-group row">
				    <div class="col-sm-3">
				      <input type="text" class="form-control" id="answer" name="answer1[]" placeholder="First Answer" required>
				    </div>
				    <div class="col-sm-2">
				     <input class="form-check-input" type="checkbox" name="status1[]" id="inlineRadio1" value="True">
				      <label class="form-check-label" for="gridCheck">
        					(tick if correct)
      				</label>
				    </div>	 
				    <div class="col-sm-3">
				      <input type="text" class="form-control" id="answer" name="answer2[]" placeholder="Second Answer" required>
				    </div>
				     <div class="col-sm-2">
				     <input class="form-check-input" type="checkbox" name="status2[]" id="inlineRadio1" value="True">
				     <label class="form-check-label" for="gridCheck">
        					(tick if Correct)
      				</label>
				    </div>	
				    <div class="col-sm-3">
				      <input type="text" class="form-control" id="answer" name="answer3[]" placeholder="Third Answer" required>
				    </div>
				     <div class="col-sm-2">
				     <input class="form-check-input" type="checkbox" name="status3[]" id="inlineRadio1" value="True">
				     <label class="form-check-label" for="gridCheck">
        					(tick if Correct)
      				</label>
				    </div>	
				    <div class="col-sm-3">
				      <input type="text" class="form-control" id="answer" name="answer4[]" placeholder="Fourth Answer" required>
				    </div>
				     <div class="col-sm-2">
				     <input class="form-check-input" type="checkbox" name="status4[]" id="inlineRadio1" value="True">
				     <label class="form-check-label" for="gridCheck">
        					(tick if Correct)
      				</label>
				    </div>	
				   </div>
				  </div>
				</div>  
				  <div class="add-button-section">
				  	<button type="button" class="btn btn-outline-success add_more" id="add-more">Add More</button>
				  	<button type="button" class="btn btn-outline-danger remove" id="delete" style="display: none">Remove</button>
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-10">
				      <button type="submit" class="btn btn-primary" name="save_data">Save</button>
				    </div>
				  </div>
			</form>
		</div>
	</div>
</div>
<?php include("../../inc/footer.php"); ?>