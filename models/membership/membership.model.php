<?php
class Membership extends Model implements JsonSerializable{
	public $id;
	public $user_id;
	public $membership_type;
	public $start_date;
	public $end_date;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$user_id,$membership_type,$start_date,$end_date,$created_at,$updated_at){
		$this->id=$id;
		$this->user_id=$user_id;
		$this->membership_type=$membership_type;
		$this->start_date=$start_date;
		$this->end_date=$end_date;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}membership(user_id,membership_type,start_date,end_date,created_at,updated_at)values('$this->user_id','$this->membership_type','$this->start_date','$this->end_date','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}membership set user_id='$this->user_id',membership_type='$this->membership_type',start_date='$this->start_date',end_date='$this->end_date',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}membership where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,user_id,membership_type,start_date,end_date,created_at,updated_at from {$tx}membership");
		$data=[];
		while($membership=$result->fetch_object()){
			$data[]=$membership;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,user_id,membership_type,start_date,end_date,created_at,updated_at from {$tx}membership $criteria limit $top,$perpage");
		$data=[];
		while($membership=$result->fetch_object()){
			$data[]=$membership;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}membership $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,user_id,membership_type,start_date,end_date,created_at,updated_at from {$tx}membership where id='$id'");
		$membership=$result->fetch_object();
			return $membership;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}membership");
		$membership =$result->fetch_object();
		return $membership->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		User Id:$this->user_id<br> 
		Membership Type:$this->membership_type<br> 
		Start Date:$this->start_date<br> 
		End Date:$this->end_date<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbMembership"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}membership");
		while($membership=$result->fetch_object()){
			$html.="<option value ='$membership->id'>$membership->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}membership $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,user_id,membership_type,start_date,end_date,created_at,updated_at from {$tx}membership $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"membership/create","text"=>"New Membership"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>User Id</th><th>Membership Type</th><th>Start Date</th><th>End Date</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>User Id</th><th>Membership Type</th><th>Start Date</th><th>End Date</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($membership=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"membership/show/$membership->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"membership/edit/$membership->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"membership/confirm/$membership->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$membership->id</td><td>$membership->user_id</td><td>$membership->membership_type</td><td>$membership->start_date</td><td>$membership->end_date</td><td>$membership->created_at</td><td>$membership->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,user_id,membership_type,start_date,end_date,created_at,updated_at from {$tx}membership where id={$id}");
		$membership=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Membership Show</th></tr>";
		$html.="<tr><th>Id</th><td>$membership->id</td></tr>";
		$html.="<tr><th>User Id</th><td>$membership->user_id</td></tr>";
		$html.="<tr><th>Membership Type</th><td>$membership->membership_type</td></tr>";
		$html.="<tr><th>Start Date</th><td>$membership->start_date</td></tr>";
		$html.="<tr><th>End Date</th><td>$membership->end_date</td></tr>";
		$html.="<tr><th>Created At</th><td>$membership->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$membership->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
