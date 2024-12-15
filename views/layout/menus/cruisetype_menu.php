<?php
	echo Menu::item([
		"name"=>"Cruisetype",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"cruisetype/create","text"=>"Create Cruisetype","icon"=>"far fa-circle nav-icon"],
			["route"=>"cruisetype","text"=>"Manage Cruisetype","icon"=>"far fa-circle nav-icon"],
		]
	]);
