<?php
echo Page::title(["title"=>"Show Review"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"review", "text"=>"Manage Review"]);
echo Page::context_open();
echo Review::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
