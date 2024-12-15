<?php
class PaymentController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("payments");
	}
	public function create(){
		view("payments");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["booking_id"])){
		$errors["booking_id"]="Invalid booking_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["amount"])){
		$errors["amount"]="Invalid amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_method"])){
		$errors["payment_method"]="Invalid payment_method";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_status"])){
		$errors["payment_status"]="Invalid payment_status";
	}

*/
		if(count($errors)==0){
			$payment=new Payment();
		$payment->booking_id=$data["booking_id"];
		$payment->amount=$data["amount"];
		$payment->payment_method=$data["payment_method"];
		$payment->payment_status=$data["payment_status"];
		$payment->created_at=$now;

			$payment->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("payments",Payment::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["booking_id"])){
		$errors["booking_id"]="Invalid booking_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["amount"])){
		$errors["amount"]="Invalid amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_method"])){
		$errors["payment_method"]="Invalid payment_method";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_status"])){
		$errors["payment_status"]="Invalid payment_status";
	}

*/
		if(count($errors)==0){
			$payment=new Payment();
			$payment->id=$data["id"];
		$payment->booking_id=$data["booking_id"];
		$payment->amount=$data["amount"];
		$payment->payment_method=$data["payment_method"];
		$payment->payment_status=$data["payment_status"];
		$payment->created_at=$now;

		$payment->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("payments");
	}
	public function delete($id){
		Payment::delete($id);
		redirect();
	}
	public function show($id){
		view("payments",Payment::find($id));
	}
}
?>
