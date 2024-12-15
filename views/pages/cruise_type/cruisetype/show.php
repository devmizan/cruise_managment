<?php
echo Page::title(["title"=>"Show CruiseType"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"cruisetype", "text"=>"Manage CruiseType"]);
echo Page::context_open();
echo CruiseType::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
