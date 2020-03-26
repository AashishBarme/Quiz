<?php include("../inc/header.php"); ?>
<?php $id = ($_GET["id"]);
$question = $quizClass->getQuestion($id);
$answers = $quizClass->getAnswers($id); 

if(isset($_POST['question']) || isset($_POST['status']))
{
	 $quizClass->updateQuestion($id);
	 $quizClass->updateAnswer();
	 $helpers->homepageReload();
}
?>


<div class="container">
	<div class="row">
		<div class="col-md-12">
			 <form method="POST" style="padding-top: 20px;">
				  <div class="form-group row">
				    <label for="question" class="col-sm-2 col-form-label">Question</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="question" name="question" placeholder="Write your question" value="<?=$question[0]['question']; ?>">
				    </div>
				  </div>
				  <div class="form-group row">
				  	<?php foreach ($answers as $key => $item) { ?>
				    <label for="answer" class="col-sm-2 col-form-label">Answer <?=$key+1; ?></label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="answer" name="answer[]" value="<?=$item['answer'];?>">
				    </div>
				    <div class="col-sm-2">
				     <input type="hidden" name="ansid[]" value="<?=$item["id"]; ?>">
				     <input class="form-check-input" type="checkbox" name="status[<?=$item["id"]; ?>]" id="inlineRadio1" value="True" <?php if(($item['status']) == 'True'){ echo 'checked';} ?>>
				      <label class="form-check-label" for="gridCheck">
        					if Correct?
      				</label>
				    </div>	 
				<?php } ?>
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


<?php include("../inc/footer.php"); ?>
