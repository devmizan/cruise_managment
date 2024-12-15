<?php
echo Page::title(["title"=>"Show Cruise"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"cruise", "text"=>"Manage Cruise"]);
echo Page::context_open();
echo Cruise::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
