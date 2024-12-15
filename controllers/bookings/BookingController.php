<?php
class BookingController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("bookings");
	}
	public function create(){
		view("bookings");
	}
public function save($data,$file){
	global $now;
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["user_id"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["cruise_id"])){
		$errors["cruise_id"]="Invalid cruise_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status"])){
		$errors["status"]="Invalid status";
	}

*/
		if(count($errors)==0){
			$booking=new Booking();
		$booking->user_id=$data["user_id"];
		$booking->cruise_id=$data["cruise_id"];
		$booking->booking_date=date("Y-m-d",strtotime($data["booking_date"]));
		$booking->status=$data["status"];
		$booking->created_at=$now;
		$booking->updated_at=$now;

			$booking->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("bookings",Booking::find($id));
}
public function update($data,$file){
	global $now;
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["user_id"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["cruise_id"])){
		$errors["cruise_id"]="Invalid cruise_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status"])){
		$errors["status"]="Invalid status";
	}

*/
		if(count($errors)==0){
			$booking=new Booking();
			$booking->id=$data["id"];
		$booking->user_id=$data["user_id"];
		$booking->cruise_id=$data["cruise_id"];
		$booking->booking_date=date("Y-m-d",strtotime($data["booking_date"]));
		$booking->status=$data["status"];
		$booking->created_at=$now;
		$booking->updated_at=$now;

		$booking->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("bookings");
	}
	public function delete($id){
		Booking::delete($id);
		redirect();
	}
	public function show($id){
		view("bookings",Booking::find($id));
	}
}
?>
