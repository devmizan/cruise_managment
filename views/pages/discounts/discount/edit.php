<?php
echo Page::title(["title"=>"Edit Discount"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"discount", "text"=>"Manage Discount"]);
echo Page::context_open();
echo Form::open(["route"=>"discount/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$discount->id"]);
	echo Form::input(["label"=>"Cruise","name"=>"cruise_id","table"=>"cruises","value"=>"$discount->cruise_id"]);
	echo Form::input(["label"=>"Discount Type","type"=>"text","name"=>"discount_type","value"=>"$discount->discount_type"]);
	echo Form::input(["label"=>"Value","type"=>"text","name"=>"value","value"=>"$discount->value"]);
	echo Form::input(["label"=>"Start Date","type"=>"date","name"=>"start_date","value"=>"$discount->start_date"]);
	echo Form::input(["label"=>"End Date","type"=>"date","name"=>"end_date","value"=>"$discount->end_date"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
