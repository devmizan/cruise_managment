<?php
class Booking extends Model implements JsonSerializable{
	public $id;
	public $user_id;
	public $cruise_id;
	public $booking_date;
	public $status;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$user_id,$cruise_id,$booking_date,$status,$created_at,$updated_at){
		$this->id=$id;
		$this->user_id=$user_id;
		$this->cruise_id=$cruise_id;
		$this->booking_date=$booking_date;
		$this->status=$status;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}bookings(user_id,cruise_id,booking_date,status,created_at,updated_at)values('$this->user_id','$this->cruise_id','$this->booking_date','$this->status','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}bookings set user_id='$this->user_id',cruise_id='$this->cruise_id',booking_date='$this->booking_date',status='$this->status',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}bookings where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	} 
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,user_id,cruise_id,booking_date,status,created_at,updated_at from {$tx}bookings");
		$data=[];
		while($booking=$result->fetch_object()){
			$data[]=$booking;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,user_id,cruise_id,booking_date,status,created_at,updated_at from {$tx}bookings $criteria limit $top,$perpage");
		$data=[];
		while($booking=$result->fetch_object()){
			$data[]=$booking;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}bookings $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,user_id,cruise_id,booking_date,status,created_at,updated_at from {$tx}bookings where id='$id'");
		$booking=$result->fetch_object();
			return $booking;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}bookings");
		$booking =$result->fetch_object();
		return $booking->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		User Id:$this->user_id<br> 
		Cruise Id:$this->cruise_id<br> 
		Booking Date:$this->booking_date<br> 
		Status:$this->status<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbBooking"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}bookings");
		while($booking=$result->fetch_object()){
			$html.="<option value ='$booking->id'>$booking->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}bookings $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,user_id,cruise_id,booking_date,status,created_at,updated_at from {$tx}bookings $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"booking/create","text"=>"New Booking"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>User Id</th><th>Cruise Id</th><th>Booking Date</th><th>Status</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>User Id</th><th>Cruise Id</th><th>Booking Date</th><th>Status</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($booking=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"booking/show/$booking->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"booking/edit/$booking->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"booking/confirm/$booking->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$booking->id</td><td>$booking->user_id</td><td>$booking->cruise_id</td><td>$booking->booking_date</td><td>$booking->status</td><td>$booking->created_at</td><td>$booking->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,user_id,cruise_id,booking_date,status,created_at,updated_at from {$tx}bookings where id={$id}");
		$booking=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Booking Show</th></tr>";
		$html.="<tr><th>Id</th><td>$booking->id</td></tr>";
		$html.="<tr><th>User Id</th><td>$booking->user_id</td></tr>";
		$html.="<tr><th>Cruise Id</th><td>$booking->cruise_id</td></tr>";
		$html.="<tr><th>Booking Date</th><td>$booking->booking_date</td></tr>";
		$html.="<tr><th>Status</th><td>$booking->status</td></tr>";
		$html.="<tr><th>Created At</th><td>$booking->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$booking->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
