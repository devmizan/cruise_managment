<?php
echo Page::title(["title"=>"Edit Review"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"review", "text"=>"Manage Review"]);
echo Page::context_open();
echo Form::open(["route"=>"review/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$review->id"]);
	echo Form::input(["label"=>"Cruise","name"=>"cruise_id","table"=>"cruises","value"=>"$review->cruise_id"]);
	echo Form::input(["label"=>"User","name"=>"user_id","table"=>"users","value"=>"$review->user_id"]);
	echo Form::input(["label"=>"Rating","type"=>"text","name"=>"rating","value"=>"$review->rating"]);
	echo Form::input(["label"=>"Review Text","type"=>"textarea","name"=>"review_text","value"=>"$review->review_text"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
