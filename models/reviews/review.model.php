<?php
class Review extends Model implements JsonSerializable{
	public $id;
	public $cruise_id;
	public $user_id;
	public $rating;
	public $review_text;
	public $created_at;

	public function __construct(){
	}
	public function set($id,$cruise_id,$user_id,$rating,$review_text,$created_at){
		$this->id=$id;
		$this->cruise_id=$cruise_id;
		$this->user_id=$user_id;
		$this->rating=$rating;
		$this->review_text=$review_text;
		$this->created_at=$created_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}reviews(cruise_id,user_id,rating,review_text,created_at)values('$this->cruise_id','$this->user_id','$this->rating','$this->review_text','$this->created_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}reviews set cruise_id='$this->cruise_id',user_id='$this->user_id',rating='$this->rating',review_text='$this->review_text',created_at='$this->created_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}reviews where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,cruise_id,user_id,rating,review_text,created_at from {$tx}reviews");
		$data=[];
		while($review=$result->fetch_object()){
			$data[]=$review;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,cruise_id,user_id,rating,review_text,created_at from {$tx}reviews $criteria limit $top,$perpage");
		$data=[];
		while($review=$result->fetch_object()){
			$data[]=$review;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}reviews $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,cruise_id,user_id,rating,review_text,created_at from {$tx}reviews where id='$id'");
		$review=$result->fetch_object();
			return $review;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}reviews");
		$review =$result->fetch_object();
		return $review->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Cruise Id:$this->cruise_id<br> 
		User Id:$this->user_id<br> 
		Rating:$this->rating<br> 
		Review Text:$this->review_text<br> 
		Created At:$this->created_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbReview"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}reviews");
		while($review=$result->fetch_object()){
			$html.="<option value ='$review->id'>$review->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}reviews $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,cruise_id,user_id,rating,review_text,created_at from {$tx}reviews $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"review/create","text"=>"New Review"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Cruise Id</th><th>User Id</th><th>Rating</th><th>Review Text</th><th>Created At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Cruise Id</th><th>User Id</th><th>Rating</th><th>Review Text</th><th>Created At</th></tr>";
		}
		while($review=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"review/show/$review->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"review/edit/$review->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"review/confirm/$review->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$review->id</td><td>$review->cruise_id</td><td>$review->user_id</td><td>$review->rating</td><td>$review->review_text</td><td>$review->created_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,cruise_id,user_id,rating,review_text,created_at from {$tx}reviews where id={$id}");
		$review=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Review Show</th></tr>";
		$html.="<tr><th>Id</th><td>$review->id</td></tr>";
		$html.="<tr><th>Cruise Id</th><td>$review->cruise_id</td></tr>";
		$html.="<tr><th>User Id</th><td>$review->user_id</td></tr>";
		$html.="<tr><th>Rating</th><td>$review->rating</td></tr>";
		$html.="<tr><th>Review Text</th><td>$review->review_text</td></tr>";
		$html.="<tr><th>Created At</th><td>$review->created_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
