<?php
echo Page::title(["title"=>"Show Notification"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"notification", "text"=>"Manage Notification"]);
echo Page::context_open();
echo Notification::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
