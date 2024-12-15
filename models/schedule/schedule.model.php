<?php
class Schedule extends Model implements JsonSerializable{
	public $id;
	public $cruise_id;
	public $available_date;
	public $available_time;
	public $is_blackout;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$cruise_id,$available_date,$available_time,$is_blackout,$created_at,$updated_at){
		$this->id=$id;
		$this->cruise_id=$cruise_id;
		$this->available_date=$available_date;
		$this->available_time=$available_time;
		$this->is_blackout=$is_blackout;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}schedule(cruise_id,available_date,available_time,is_blackout,created_at,updated_at)values('$this->cruise_id','$this->available_date','$this->available_time','$this->is_blackout','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}schedule set cruise_id='$this->cruise_id',available_date='$this->available_date',available_time='$this->available_time',is_blackout='$this->is_blackout',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}schedule where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,cruise_id,available_date,available_time,is_blackout,created_at,updated_at from {$tx}schedule");
		$data=[];
		while($schedule=$result->fetch_object()){
			$data[]=$schedule;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,cruise_id,available_date,available_time,is_blackout,created_at,updated_at from {$tx}schedule $criteria limit $top,$perpage");
		$data=[];
		while($schedule=$result->fetch_object()){
			$data[]=$schedule;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}schedule $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,cruise_id,available_date,available_time,is_blackout,created_at,updated_at from {$tx}schedule where id='$id'");
		$schedule=$result->fetch_object();
			return $schedule;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}schedule");
		$schedule =$result->fetch_object();
		return $schedule->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Cruise Id:$this->cruise_id<br> 
		Available Date:$this->available_date<br> 
		Available Time:$this->available_time<br> 
		Is Blackout:$this->is_blackout<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSchedule"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}schedule");
		while($schedule=$result->fetch_object()){
			$html.="<option value ='$schedule->id'>$schedule->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}schedule $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,cruise_id,available_date,available_time,is_blackout,created_at,updated_at from {$tx}schedule $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"schedule/create","text"=>"New Schedule"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Cruise Id</th><th>Available Date</th><th>Available Time</th><th>Is Blackout</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Cruise Id</th><th>Available Date</th><th>Available Time</th><th>Is Blackout</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($schedule=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"schedule/show/$schedule->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"schedule/edit/$schedule->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"schedule/confirm/$schedule->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$schedule->id</td><td>$schedule->cruise_id</td><td>$schedule->available_date</td><td>$schedule->available_time</td><td>$schedule->is_blackout</td><td>$schedule->created_at</td><td>$schedule->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,cruise_id,available_date,available_time,is_blackout,created_at,updated_at from {$tx}schedule where id={$id}");
		$schedule=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Schedule Show</th></tr>";
		$html.="<tr><th>Id</th><td>$schedule->id</td></tr>";
		$html.="<tr><th>Cruise Id</th><td>$schedule->cruise_id</td></tr>";
		$html.="<tr><th>Available Date</th><td>$schedule->available_date</td></tr>";
		$html.="<tr><th>Available Time</th><td>$schedule->available_time</td></tr>";
		$html.="<tr><th>Is Blackout</th><td>$schedule->is_blackout</td></tr>";
		$html.="<tr><th>Created At</th><td>$schedule->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$schedule->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
