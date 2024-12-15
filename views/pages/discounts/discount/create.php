<?php
echo Page::title(["title"=>"Create Discount"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"discount", "text"=>"Manage Discount"]);
echo Page::context_open();
echo Form::open(["route"=>"discount/save"]);
	echo Form::input(["label"=>"Cruise","name"=>"cruise_id","table"=>"cruises"]);
	echo Form::input(["label"=>"Discount Type","type"=>"text","name"=>"discount_type"]);
	echo Form::input(["label"=>"Value","type"=>"text","name"=>"value"]);
	echo Form::input(["label"=>"Start Date","type"=>"date","name"=>"start_date"]);
	echo Form::input(["label"=>"End Date","type"=>"date","name"=>"end_date"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
