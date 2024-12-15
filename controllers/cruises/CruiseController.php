<?php
class CruiseController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("cruises");
	}
	public function create(){
		view("cruises");
	}
public function save($data,$file){
	global $now;
	if(isset($data["create"])){
	$errors=[];

		if(count($errors)==0){
			$cruise=new Cruise();
		$cruise->owner_id=$data["owner_id"];
		$cruise->name=$data["name"];
		$cruise->type=$data["type"];
		$cruise->hourly_price=$data["hourly_price"];
		$cruise->description=$data["description"];
		$cruise->capacity=$data["capacity"];
		$cruise->images=$data["images"];
		$cruise->videos=$data["videos"];
		$cruise->features=$data["features"];
		$cruise->created_at=$now;
		$cruise->updated_at=$now;

			$cruise->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("cruises",Cruise::find($id));
}
public function update($data,$file){
	global $now;
	if(isset($data["update"])){
	$errors=[];

		if(count($errors)==0){
			$cruise=new Cruise();
			$cruise->id=$data["id"];
		$cruise->owner_id=$data["owner_id"];
		$cruise->name=$data["name"];
		$cruise->type=$data["type"];
		$cruise->hourly_price=$data["hourly_price"];
		$cruise->description=$data["description"];
		$cruise->capacity=$data["capacity"];
		$cruise->images=$data["images"];
		$cruise->videos=$data["videos"];
		$cruise->features=$data["features"];
		$cruise->created_at=$now;
		$cruise->updated_at=$now;

		$cruise->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("cruises");
	}
	public function delete($id){
		Cruise::delete($id);
		redirect();
	}
	public function show($id){
		view("cruises",Cruise::find($id));
	}
}
?>
