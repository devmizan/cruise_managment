<?php
class Notification extends Model implements JsonSerializable{
	public $id;
	public $user_id;
	public $message;
	public $is_read;
	public $created_at;

	public function __construct(){
	}
	public function set($id,$user_id,$message,$is_read,$created_at){
		$this->id=$id;
		$this->user_id=$user_id;
		$this->message=$message;
		$this->is_read=$is_read;
		$this->created_at=$created_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}notifications(user_id,message,is_read,created_at)values('$this->user_id','$this->message','$this->is_read','$this->created_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}notifications set user_id='$this->user_id',message='$this->message',is_read='$this->is_read',created_at='$this->created_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}notifications where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,user_id,message,is_read,created_at from {$tx}notifications");
		$data=[];
		while($notification=$result->fetch_object()){
			$data[]=$notification;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,user_id,message,is_read,created_at from {$tx}notifications $criteria limit $top,$perpage");
		$data=[];
		while($notification=$result->fetch_object()){
			$data[]=$notification;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}notifications $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,user_id,message,is_read,created_at from {$tx}notifications where id='$id'");
		$notification=$result->fetch_object();
			return $notification;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}notifications");
		$notification =$result->fetch_object();
		return $notification->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		User Id:$this->user_id<br> 
		Message:$this->message<br> 
		Is Read:$this->is_read<br> 
		Created At:$this->created_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbNotification"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}notifications");
		while($notification=$result->fetch_object()){
			$html.="<option value ='$notification->id'>$notification->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}notifications $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,user_id,message,is_read,created_at from {$tx}notifications $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"notification/create","text"=>"New Notification"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>User Id</th><th>Message</th><th>Is Read</th><th>Created At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>User Id</th><th>Message</th><th>Is Read</th><th>Created At</th></tr>";
		}
		while($notification=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"notification/show/$notification->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"notification/edit/$notification->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"notification/confirm/$notification->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$notification->id</td><td>$notification->user_id</td><td>$notification->message</td><td>$notification->is_read</td><td>$notification->created_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,user_id,message,is_read,created_at from {$tx}notifications where id={$id}");
		$notification=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Notification Show</th></tr>";
		$html.="<tr><th>Id</th><td>$notification->id</td></tr>";
		$html.="<tr><th>User Id</th><td>$notification->user_id</td></tr>";
		$html.="<tr><th>Message</th><td>$notification->message</td></tr>";
		$html.="<tr><th>Is Read</th><td>$notification->is_read</td></tr>";
		$html.="<tr><th>Created At</th><td>$notification->created_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
