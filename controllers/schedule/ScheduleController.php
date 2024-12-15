<?php
class ScheduleController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("schedule");
	}
	public function create(){
		view("schedule");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["cruise_id"])){
		$errors["cruise_id"]="Invalid cruise_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["available_date"])){
		$errors["available_date"]="Invalid available_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["available_time"])){
		$errors["available_time"]="Invalid available_time";
	}
	if(!preg_match("/^[\s\S]+$/",$data["is_blackout"])){
		$errors["is_blackout"]="Invalid is_blackout";
	}

*/
		if(count($errors)==0){
			$schedule=new Schedule();
		$schedule->cruise_id=$data["cruise_id"];
		$schedule->available_date=$data["available_date"];
		$schedule->available_time=$data["available_time"];
		$schedule->is_blackout=isset($data["is_blackout"])?1:0;
		$schedule->created_at=$now;
		$schedule->updated_at=$now;

			$schedule->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("schedule",Schedule::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["cruise_id"])){
		$errors["cruise_id"]="Invalid cruise_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["available_date"])){
		$errors["available_date"]="Invalid available_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["available_time"])){
		$errors["available_time"]="Invalid available_time";
	}
	if(!preg_match("/^[\s\S]+$/",$data["is_blackout"])){
		$errors["is_blackout"]="Invalid is_blackout";
	}

*/
		if(count($errors)==0){
			$schedule=new Schedule();
			$schedule->id=$data["id"];
		$schedule->cruise_id=$data["cruise_id"];
		$schedule->available_date=$data["available_date"];
		$schedule->available_time=$data["available_time"];
		$schedule->is_blackout=isset($data["is_blackout"])?1:0;
		$schedule->created_at=$now;
		$schedule->updated_at=$now;

		$schedule->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("schedule");
	}
	public function delete($id){
		Schedule::delete($id);
		redirect();
	}
	public function show($id){
		view("schedule",Schedule::find($id));
	}
}
?>
