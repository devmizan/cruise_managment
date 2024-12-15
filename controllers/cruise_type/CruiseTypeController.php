<?php
class CruiseTypeController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("cruise_type");
	}
	public function create(){
		view("cruise_type");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCruiseTypeName"])){
		$errors["cruise_type_name"]="Invalid cruise_type_name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCruiseTypeImage"])){
		$errors["cruise_type_image"]="Invalid cruise_type_image";
	}

*/
		if(count($errors)==0){
			$cruisetype=new CruiseType();
		$cruisetype->cruise_type_name=$data["cruise_type_name"];
		$cruisetype->cruise_type_image=$data["cruise_type_image"];

			$cruisetype->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit(){
	$id = $_GET['id']??0;
		view("cruise_type",CruiseType::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCruiseTypeName"])){
		$errors["cruise_type_name"]="Invalid cruise_type_name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCruiseTypeImage"])){
		$errors["cruise_type_image"]="Invalid cruise_type_image";
	}

*/
		if(count($errors)==0){
			$cruisetype=new CruiseType();
			$cruisetype->id=$data["id"];
		$cruisetype->cruise_type_name=$data["cruise_type_name"];
		$cruisetype->cruise_type_image=$data["cruise_type_image"];

		$cruisetype->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("cruise_type");
	}
	public function delete($id){
		CruiseType::delete($id);
		redirect();
	}
	public function show($id){
		view("cruise_type",CruiseType::find($id));
	}
}
?>
