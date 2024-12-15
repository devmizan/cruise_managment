<?php
echo Page::title(["title"=>"Create Membership"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"membership", "text"=>"Manage Membership"]);
echo Page::context_open();
echo Form::open(["route"=>"membership/save"]);
	echo Form::input(["label"=>"User","name"=>"user_id","table"=>"users"]);
	echo Form::input(["label"=>"Membership Type","type"=>"text","name"=>"membership_type"]);
	echo Form::input(["label"=>"Start Date","type"=>"date","name"=>"start_date"]);
	echo Form::input(["label"=>"End Date","type"=>"date","name"=>"end_date"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
