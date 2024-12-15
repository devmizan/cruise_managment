<?php
echo Page::title(["title"=>"Create Schedule"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"schedule", "text"=>"Manage Schedule"]);
echo Page::context_open();
echo Form::open(["route"=>"schedule/save"]);
	echo Form::input(["label"=>"Cruise","name"=>"cruise_id","table"=>"cruises"]);
	echo Form::input(["label"=>"Available Date","type"=>"text","name"=>"available_date"]);
	echo Form::input(["label"=>"Available Time","type"=>"text","name"=>"available_time"]);
	echo Form::input(["label"=>"Is Blackout","type"=>"checkbox","name"=>"is_blackout","value"=>"1"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
