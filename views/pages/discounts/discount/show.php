<?php
echo Page::title(["title"=>"Show Discount"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"discount", "text"=>"Manage Discount"]);
echo Page::context_open();
echo Discount::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
