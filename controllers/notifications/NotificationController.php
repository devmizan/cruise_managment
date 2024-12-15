<?php
class NotificationController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("notifications");
	}
	public function create(){
		view("notifications");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["user_id"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["message"])){
		$errors["message"]="Invalid message";
	}
	if(!preg_match("/^[\s\S]+$/",$data["is_read"])){
		$errors["is_read"]="Invalid is_read";
	}

*/
		if(count($errors)==0){
			$notification=new Notification();
		$notification->user_id=$data["user_id"];
		$notification->message=$data["message"];
		$notification->is_read=isset($data["is_read"])?1:0;
		$notification->created_at=$now;

			$notification->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("notifications",Notification::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["user_id"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["message"])){
		$errors["message"]="Invalid message";
	}
	if(!preg_match("/^[\s\S]+$/",$data["is_read"])){
		$errors["is_read"]="Invalid is_read";
	}

*/
		if(count($errors)==0){
			$notification=new Notification();
			$notification->id=$data["id"];
		$notification->user_id=$data["user_id"];
		$notification->message=$data["message"];
		$notification->is_read=isset($data["is_read"])?1:0;
		$notification->created_at=$now;

		$notification->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("notifications");
	}
	public function delete($id){
		Notification::delete($id);
		redirect();
	}
	public function show($id){
		view("notifications",Notification::find($id));
	}
}
?>
