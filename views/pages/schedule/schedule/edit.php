<?php
echo Page::title(["title"=>"Edit Schedule"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"schedule", "text"=>"Manage Schedule"]);
echo Page::context_open();
echo Form::open(["route"=>"schedule/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$schedule->id"]);
	echo Form::input(["label"=>"Cruise","name"=>"cruise_id","table"=>"cruises","value"=>"$schedule->cruise_id"]);
	echo Form::input(["label"=>"Available Date","type"=>"text","name"=>"available_date","value"=>"$schedule->available_date"]);
	echo Form::input(["label"=>"Available Time","type"=>"text","name"=>"available_time","value"=>"$schedule->available_time"]);
	echo Form::input(["label"=>"Is Blackout","type"=>"checkbox","name"=>"is_blackout","value"=>"$schedule->is_blackout","checked"=>$schedule->is_blackout?"checked":""]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
