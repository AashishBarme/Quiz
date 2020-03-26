<?php include("../inc/header.php"); ?>
<?php $data = $quizClass->list(); ?>
<?php if(isset($_GET['action'])){
	$quizClass->delete($_GET['id']);
} ?>
<div class="container pt-2">
	<div class="row">
		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">SN</th>
		      <th scope="col">Question</th>
		      <th scope="col">Correct Answer</th>
		      <th scope="col">Actions</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php foreach ($data as $key => $item) { ?>
		    <tr>
		      <th scope="row"><?= $key + 1 ; ?></th>
		      <td><?= $item["question"]; ?></td>
		      <td><?= $item["answer"]; ?></td>
		      <td>
		      	<a href="edit.php?id=<?php echo $item["id"]; ?>" class="btn btn-success">Edit</a>
		      	<a href="list.php?id=<?php echo $item["id"]; ?>&action=del" class="btn btn-danger">Delete</a>
		      </td>
		    </tr>
		    <?php } ?>
		  </tbody>
		</table>
	</div>
</div>		
<?php include("../inc/footer.php"); ?>