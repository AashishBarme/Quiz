<?php include("../../inc/header.php"); 
include_once("../../classes/CategoryClass.php");

$categoryClass = new CategoryClass();
$categories = $categoryClass->list();
if(isset($_POST['question']) && isset($_POST['status1']) || isset($_POST['status2']) || isset($_POST['status3']) || isset($_POST['status4']))
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
				    <label for="question" class="col-sm-2 col-form-label">Question</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="question" name="question" placeholder="Write your question">
				    </div>
				  </div>
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
				  <div class="form-group row">
				    <label for="answer" class="col-sm-2 col-form-label">Answer One</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="answer" name="answer1">
				    </div>
				    <div class="col-sm-2">
				     <input class="form-check-input" type="radio" name="status1" id="inlineRadio1" value="True">
				      <label class="form-check-label" for="gridCheck">
        					if Correct?
      				</label>
				    </div>	 
				     <label for="answer" class="col-sm-2 col-form-label">Answer Two</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="answer" name="answer2">
				    </div>
				     <div class="col-sm-2">
				     <input class="form-check-input" type="radio" name="status2" id="inlineRadio1" value="True">
				     <label class="form-check-label" for="gridCheck">
        					if Correct?
      				</label>
				    </div>	
				     <label for="answer" class="col-sm-2 col-form-label">Answer Three</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="answer" name="answer3">
				    </div>
				     <div class="col-sm-2">
				     <input class="form-check-input" type="radio" name="status3" id="inlineRadio1" value="True">
				     <label class="form-check-label" for="gridCheck">
        					if Correct?
      				</label>
				    </div>	
				     <label for="answer" class="col-sm-2 col-form-label">Answer Four</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="answer" name="answer4">
				    </div>
				     <div class="col-sm-2">
				     <input class="form-check-input" type="radio" name="status4" id="inlineRadio1" value="True">
				     <label class="form-check-label" for="gridCheck">
        					if Correct?
      				</label>
				    </div>	
				  </div>

				  <div class="form-group row">
				    <div class="col-sm-10">
				      <button type="submit" class="btn btn-primary">Save</button>
				    </div>
				  </div>
			</form>
		</div>
	</div>
</div>
<?php include("../../inc/footer.php"); ?>