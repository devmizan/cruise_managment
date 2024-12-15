<?php
echo Page::title(["title"=>"Show Schedule"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"schedule", "text"=>"Manage Schedule"]);
echo Page::context_open();
echo Schedule::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
