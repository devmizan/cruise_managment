<?php
class MembershipController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("membership");
	}
	public function create(){
		view("membership");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["user_id"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["membership_type"])){
		$errors["membership_type"]="Invalid membership_type";
	}

*/
		if(count($errors)==0){
			$membership=new Membership();
		$membership->user_id=$data["user_id"];
		$membership->membership_type=$data["membership_type"];
		$membership->start_date=date("Y-m-d",strtotime($data["start_date"]));
		$membership->end_date=date("Y-m-d",strtotime($data["end_date"]));
		$membership->created_at=$now;
		$membership->updated_at=$now;

			$membership->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("membership",Membership::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["user_id"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["membership_type"])){
		$errors["membership_type"]="Invalid membership_type";
	}

*/
		if(count($errors)==0){
			$membership=new Membership();
			$membership->id=$data["id"];
		$membership->user_id=$data["user_id"];
		$membership->membership_type=$data["membership_type"];
		$membership->start_date=date("Y-m-d",strtotime($data["start_date"]));
		$membership->end_date=date("Y-m-d",strtotime($data["end_date"]));
		$membership->created_at=$now;
		$membership->updated_at=$now;

		$membership->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("membership");
	}
	public function delete($id){
		Membership::delete($id);
		redirect();
	}
	public function show($id){
		view("membership",Membership::find($id));
	}
}
?>
