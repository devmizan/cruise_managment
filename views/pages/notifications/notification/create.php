<?php
echo Page::title(["title"=>"Create Notification"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"notification", "text"=>"Manage Notification"]);
echo Page::context_open();
echo Form::open(["route"=>"notification/save"]);
	echo Form::input(["label"=>"User","name"=>"user_id","table"=>"users"]);
	echo Form::input(["label"=>"Message","type"=>"textarea","name"=>"message"]);
	echo Form::input(["label"=>"Is Read","type"=>"checkbox","name"=>"is_read","value"=>"1"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
