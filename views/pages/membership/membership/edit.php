<?php
echo Page::title(["title"=>"Edit Membership"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"membership", "text"=>"Manage Membership"]);
echo Page::context_open();
echo Form::open(["route"=>"membership/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$membership->id"]);
	echo Form::input(["label"=>"User","name"=>"user_id","table"=>"users","value"=>"$membership->user_id"]);
	echo Form::input(["label"=>"Membership Type","type"=>"text","name"=>"membership_type","value"=>"$membership->membership_type"]);
	echo Form::input(["label"=>"Start Date","type"=>"date","name"=>"start_date","value"=>"$membership->start_date"]);
	echo Form::input(["label"=>"End Date","type"=>"date","name"=>"end_date","value"=>"$membership->end_date"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
