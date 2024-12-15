<?php
echo Page::title(["title"=>"Edit Notification"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"notification", "text"=>"Manage Notification"]);
echo Page::context_open();
echo Form::open(["route"=>"notification/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$notification->id"]);
	echo Form::input(["label"=>"User","name"=>"user_id","table"=>"users","value"=>"$notification->user_id"]);
	echo Form::input(["label"=>"Message","type"=>"textarea","name"=>"message","value"=>"$notification->message"]);
	echo Form::input(["label"=>"Is Read","type"=>"checkbox","name"=>"is_read","value"=>"$notification->is_read","checked"=>$notification->is_read?"checked":""]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
