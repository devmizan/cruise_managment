<?php
echo Page::title(["title"=>"Edit Booking"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"booking", "text"=>"Manage Booking"]);
echo Page::context_open();
echo Form::open(["route"=>"booking/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$booking->id"]);
	echo Form::input(["label"=>"User","name"=>"user_id","table"=>"users","value"=>"$booking->user_id"]);
	echo Form::input(["label"=>"Cruise","name"=>"cruise_id","table"=>"cruises","value"=>"$booking->cruise_id"]);
	echo Form::input(["label"=>"Booking Date","type"=>"date","name"=>"booking_date","value"=>"$booking->booking_date"]);
	echo Form::input(["label"=>"Status","type"=>"table","name"=>"status","value"=>"$booking->status"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
