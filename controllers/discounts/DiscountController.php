<?php
class DiscountController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("discounts");
	}
	public function create(){
		view("discounts");
	}
public function save($data,$file){
	global $now;
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["cruise_id"])){
		$errors["cruise_id"]="Invalid cruise_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount_type"])){
		$errors["discount_type"]="Invalid discount_type";
	}
	if(!preg_match("/^[\s\S]+$/",$data["value"])){
		$errors["value"]="Invalid value";
	}

*/
		if(count($errors)==0){
			$discount=new Discount();
		$discount->cruise_id=$data["cruise_id"];
		$discount->discount_type=$data["discount_type"];
		$discount->value=$data["value"];
		$discount->start_date=date("Y-m-d",strtotime($data["start_date"]));
		$discount->end_date=date("Y-m-d",strtotime($data["end_date"]));
		$discount->created_at=$now;
		$discount->updated_at=$now;

			$discount->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("discounts",Discount::find($id));
}
public function update($data,$file){
	global $now;
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["cruise_id"])){
		$errors["cruise_id"]="Invalid cruise_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount_type"])){
		$errors["discount_type"]="Invalid discount_type";
	}
	if(!preg_match("/^[\s\S]+$/",$data["value"])){
		$errors["value"]="Invalid value";
	}

*/
		if(count($errors)==0){
			$discount=new Discount();
			$discount->id=$data["id"];
		$discount->cruise_id=$data["cruise_id"];
		$discount->discount_type=$data["discount_type"];
		$discount->value=$data["value"];
		$discount->start_date=date("Y-m-d",strtotime($data["start_date"]));
		$discount->end_date=date("Y-m-d",strtotime($data["end_date"]));
		$discount->created_at=$now;
		$discount->updated_at=$now;

		$discount->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("discounts");
	}
	public function delete($id){
		Discount::delete($id);
		redirect();
	}
	public function show($id){
		view("discounts",Discount::find($id));
	}
}
?>
