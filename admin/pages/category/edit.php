<?php 
      include("../../inc/header.php"); 
	  include_once($filepath."/../config/config.php");
	  include_once ($filepath."/../classes/CategoryClass.php");

	  $category = new CategoryClass();
	  $id = $_GET['id'];
	  $data = $category->getbyid($id);
	  if(isset($_POST['category']) || isset($_POST['description']))
	  {
	  	$category->update($_POST['id']);
	  	header('location: list.php');
	  }
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			 <form method="POST" style="padding-top: 20px;">
			 	<input type="hidden" name="id" value="<?=$data[0]["id"]; ?>">
				  <div class="form-group row">
				    <label for="category" class="col-sm-2 col-form-label">Category Name</label>
				    <div class="col-sm-10">
				     <input type="text" class="form-control" id="category" name="category" placeholder="Name" value="<?=$data[0]["category"]; ?>">
				    </div>
				  </div>
				  <div class="form-group row">
				  	 <label for="description" class="col-sm-2">Description</label>
				  	 <div class="col-sm-10">
    				<textarea class="form-control" id="description" name="description" rows="3"><?=$data[0]["description"]; ?></textarea>
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