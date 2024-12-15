<?php
echo Page::title(["title"=>"Edit Payment"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"payment", "text"=>"Manage Payment"]);
echo Page::context_open();
echo Form::open(["route"=>"payment/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$payment->id"]);
	echo Form::input(["label"=>"Booking","name"=>"booking_id","table"=>"bookings","value"=>"$payment->booking_id"]);
	echo Form::input(["label"=>"Amount","type"=>"text","name"=>"amount","value"=>"$payment->amount"]);
	echo Form::input(["label"=>"Payment Method","type"=>"text","name"=>"payment_method","value"=>"$payment->payment_method"]);
	echo Form::input(["label"=>"Payment Status","type"=>"text","name"=>"payment_status","value"=>"$payment->payment_status"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
