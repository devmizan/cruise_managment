<?php
echo Page::title(["title"=>"Create Review"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"review", "text"=>"Manage Review"]);
echo Page::context_open();
echo Form::open(["route"=>"review/save"]);
	echo Form::input(["label"=>"Cruise","name"=>"cruise_id","table"=>"cruises"]);
	echo Form::input(["label"=>"User","name"=>"user_id","table"=>"users"]);
	echo Form::input(["label"=>"Rating","type"=>"text","name"=>"rating"]);
	echo Form::input(["label"=>"Review Text","type"=>"textarea","name"=>"review_text"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
