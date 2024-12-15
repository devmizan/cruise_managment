<?php
class Discount extends Model implements JsonSerializable{
	public $id;
	public $cruise_id;
	public $discount_type;
	public $value;
	public $start_date;
	public $end_date;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$cruise_id,$discount_type,$value,$start_date,$end_date,$created_at,$updated_at){
		$this->id=$id;
		$this->cruise_id=$cruise_id;
		$this->discount_type=$discount_type;
		$this->value=$value;
		$this->start_date=$start_date;
		$this->end_date=$end_date;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}discounts(cruise_id,discount_type,value,start_date,end_date,created_at,updated_at)values('$this->cruise_id','$this->discount_type','$this->value','$this->start_date','$this->end_date','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}discounts set cruise_id='$this->cruise_id',discount_type='$this->discount_type',value='$this->value',start_date='$this->start_date',end_date='$this->end_date',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}discounts where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,cruise_id,discount_type,value,start_date,end_date,created_at,updated_at from {$tx}discounts");
		$data=[];
		while($discount=$result->fetch_object()){
			$data[]=$discount;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,cruise_id,discount_type,value,start_date,end_date,created_at,updated_at from {$tx}discounts $criteria limit $top,$perpage");
		$data=[];
		while($discount=$result->fetch_object()){
			$data[]=$discount;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}discounts $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,cruise_id,discount_type,value,start_date,end_date,created_at,updated_at from {$tx}discounts where id='$id'");
		$discount=$result->fetch_object();
			return $discount;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}discounts");
		$discount =$result->fetch_object();
		return $discount->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Cruise Id:$this->cruise_id<br> 
		Discount Type:$this->discount_type<br> 
		Value:$this->value<br> 
		Start Date:$this->start_date<br> 
		End Date:$this->end_date<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbDiscount"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}discounts");
		while($discount=$result->fetch_object()){
			$html.="<option value ='$discount->id'>$discount->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}discounts $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,cruise_id,discount_type,value,start_date,end_date,created_at,updated_at from {$tx}discounts $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"discount/create","text"=>"New Discount"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Cruise Id</th><th>Discount Type</th><th>Value</th><th>Start Date</th><th>End Date</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Cruise Id</th><th>Discount Type</th><th>Value</th><th>Start Date</th><th>End Date</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($discount=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"discount/show/$discount->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"discount/edit/$discount->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"discount/confirm/$discount->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$discount->id</td><td>$discount->cruise_id</td><td>$discount->discount_type</td><td>$discount->value</td><td>$discount->start_date</td><td>$discount->end_date</td><td>$discount->created_at</td><td>$discount->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,cruise_id,discount_type,value,start_date,end_date,created_at,updated_at from {$tx}discounts where id={$id}");
		$discount=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Discount Show</th></tr>";
		$html.="<tr><th>Id</th><td>$discount->id</td></tr>";
		$html.="<tr><th>Cruise Id</th><td>$discount->cruise_id</td></tr>";
		$html.="<tr><th>Discount Type</th><td>$discount->discount_type</td></tr>";
		$html.="<tr><th>Value</th><td>$discount->value</td></tr>";
		$html.="<tr><th>Start Date</th><td>$discount->start_date</td></tr>";
		$html.="<tr><th>End Date</th><td>$discount->end_date</td></tr>";
		$html.="<tr><th>Created At</th><td>$discount->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$discount->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
