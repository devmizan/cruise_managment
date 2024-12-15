<?php
class ReviewController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("reviews");
	}
	public function create(){
		view("reviews");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["cruise_id"])){
		$errors["cruise_id"]="Invalid cruise_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["user_id"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["rating"])){
		$errors["rating"]="Invalid rating";
	}
	if(!preg_match("/^[\s\S]+$/",$data["review_text"])){
		$errors["review_text"]="Invalid review_text";
	}

*/
		if(count($errors)==0){
			$review=new Review();
		$review->cruise_id=$data["cruise_id"];
		$review->user_id=$data["user_id"];
		$review->rating=$data["rating"];
		$review->review_text=$data["review_text"];
		$review->created_at=$now;

			$review->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("reviews",Review::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["cruise_id"])){
		$errors["cruise_id"]="Invalid cruise_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["user_id"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["rating"])){
		$errors["rating"]="Invalid rating";
	}
	if(!preg_match("/^[\s\S]+$/",$data["review_text"])){
		$errors["review_text"]="Invalid review_text";
	}

*/
		if(count($errors)==0){
			$review=new Review();
			$review->id=$data["id"];
		$review->cruise_id=$data["cruise_id"];
		$review->user_id=$data["user_id"];
		$review->rating=$data["rating"];
		$review->review_text=$data["review_text"];
		$review->created_at=$now;

		$review->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("reviews");
	}
	public function delete($id){
		Review::delete($id);
		redirect();
	}
	public function show($id){
		view("reviews",Review::find($id));
	}
}
?>
