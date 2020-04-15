<?php 
      include("../../inc/header.php"); 
	  include_once($filepath."/../config/config.php");
	  include_once ($filepath."/../classes/CategoryClass.php");

	  $category = new CategoryClass();

	  if(isset($_POST['save_data']))
	  {
	  	$category->add();
	  	header('location: list.php');
	  }
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			 <form method="POST" style="padding-top: 20px;">
				  <div class="form-group row">
				    <label for="category" class="col-sm-2 col-form-label">Category Name</label>
				    <div class="col-sm-10">
				     <input type="text" class="form-control" id="category" name="category" placeholder="Name">
				    </div>
				  </div>
				  <div class="form-group row">
				  	 <label for="description" class="col-sm-2">Description</label>
				  	 <div class="col-sm-10">
    				<textarea class="form-control" id="description" name="description" rows="3"></textarea>
    			      </div>
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