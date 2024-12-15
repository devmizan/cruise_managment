<?php
class CruiseType extends Model implements JsonSerializable{
	public $id;
	public $cruise_type_name;
	public $cruise_type_image;

	public function __construct(){
	}
	public function set($id,$cruise_type_name,$cruise_type_image){
		$this->id=$id;
		$this->cruise_type_name=$cruise_type_name;
		$this->cruise_type_image=$cruise_type_image;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}cruise_types(cruise_type_name,cruise_type_image)values('$this->cruise_type_name','$this->cruise_type_image')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}cruise_types set cruise_type_name='$this->cruise_type_name',cruise_type_image='$this->cruise_type_image' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}cruise_types where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,cruise_type_name,cruise_type_image from {$tx}cruise_types");
		$data=[];
		while($cruisetype=$result->fetch_object()){
			$data[]=$cruisetype;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,cruise_type_name,cruise_type_image from {$tx}cruise_types $criteria limit $top,$perpage");
		$data=[];
		while($cruisetype=$result->fetch_object()){
			$data[]=$cruisetype;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}cruise_types $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,cruise_type_name,cruise_type_image from {$tx}cruise_types where id='$id'");
		$cruisetype=$result->fetch_object();
			return $cruisetype;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}cruise_types");
		$cruisetype =$result->fetch_object();
		return $cruisetype->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Cruise Type Name:$this->cruise_type_name<br> 
		Cruise Type Image:$this->cruise_type_image<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbCruiseType"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}cruise_types");
		while($cruisetype=$result->fetch_object()){
			$html.="<option value ='$cruisetype->id'>$cruisetype->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}cruise_types $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,cruise_type_name,cruise_type_image from {$tx}cruise_types $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"cruisetype/create","text"=>"New Cruise 	Type"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Cruise Type Name</th><th>Cruise Type Image</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Cruise Type Name</th><th>Cruise Type Image</th></tr>";
		}
		while($cruisetype=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' >" ;
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-primary", "route"=>"cruisetype/show/$cruisetype->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn edit-item-btn btn-sm btn-success", "route"=>"cruisetype/edit/$cruisetype->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn remove-item-btn btn-sm btn-danger", "route"=>"cruisetype/confirm/$cruisetype->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$cruisetype->id</td><td>$cruisetype->cruise_type_name</td><td>$cruisetype->cruise_type_image</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,cruise_type_name,cruise_type_image from {$tx}cruise_types where id={$id}");
		$cruisetype=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">CruiseType Show</th></tr>";
		$html.="<tr><th>Id</th><td>$cruisetype->id</td></tr>";
		$html.="<tr><th>Cruise Type Name</th><td>$cruisetype->cruise_type_name</td></tr>";
		$html.="<tr><th>Cruise Type Image</th><td>$cruisetype->cruise_type_image</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
