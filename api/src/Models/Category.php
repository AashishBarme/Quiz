<?php
declare(strict_types = 1);

namespace App\Models;
class Category{
	private $Db;

	public function __construct(\App\Database\Db $db)
	{
		$this->Db = $db;
	} 
	
	public function ListCategory()
	{
		$models = [];
		$sql = "select category,slug from category";
		$stmt = $this->Db->Execute($sql);
		$result = $this->Db->FetchAllObject($stmt);

		foreach ($result as $item ) {
			$model = [];
			$model["category"] = $item->category;
			$model["slug"] = $item->slug;
			array_push($models, $model);
		}
		return $models;
	}

	public function GetQAByCategoryName(string $name)
	{
		$model = [];
		$sql = "select id,category from category where slug = :slug";
		$stmt = $this->Db->Execute($sql,['slug'=>$name]);
		$cat = $this->Db->FetchObject($stmt);

		$model["category"] = $cat->category;
		$model["values"] = $this->GetQA($cat->id);
		return $model;
	}

	public function GetQA(string $category_id)
	{
		$models = [];
		$sql = "select id,question from questions where category_id = :category_id";
		$stmt = $this->Db->Execute($sql,['category_id'=>$category_id]);
		$questions = $this->Db->FetchAllObject($stmt);

		foreach ($questions as $que)
		{
		  $sql = "select answer from answers where que_id = :que_id";
		  $stmt = $this->Db->Execute($sql,['que_id'=>$que->id]);
		  $answers = $this->Db->FetchAllObject($stmt);
		  	foreach($answers as $item)
 			{	
 			$options[] = $item->answer;
 			}

		  $sql = "select answer from answers where que_id = :que_id and status = :status";
		  $stmt = $this->Db->Execute($sql,['que_id'=> $que->id,'status'=>'True']);
		  $correct = $this->Db->FetchObject($stmt);
		  $model = [];
		  $model["question"] = $que->question;
		  $model["option"] = $options;
		  $model["answer"] = $correct->answer;
		  unset($options);
		  array_push($models, $model);
		}
		return $models;
	}

}