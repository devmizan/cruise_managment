<?php
echo Page::title(["title" => "Create Booking"]);
echo Page::body_open();
echo Html::link(["class" => "btn btn-success", "route" => "booking", "text" => "Manage Booking"]);
echo Page::context_open();
echo Form::open(["route" => "booking/save"]);
echo Form::input(["label" => "User", "name" => "user_id", "table" => "users"]);
echo Form::input(["label" => "Cruise", "name" => "cruise_id", "table" => "cruises"]);
echo Form::input(["label" => "Booking Date", "type" => "date", "name" => "booking_date"]);
echo Form::input(["label" => "Status", "type" => "text", "name" => "status"]);

echo Form::input(["name" => "create", "class" => "btn btn-primary offset-2", "value" => "Save", "type" => "submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
?>

