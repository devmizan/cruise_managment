<?php
echo Page::title(["title"=>"Show Membership"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"membership", "text"=>"Manage Membership"]);
echo Page::context_open();
echo Membership::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
