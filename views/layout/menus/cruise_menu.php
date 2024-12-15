<?php
	echo Menu::item([
		"name"=>"Cruise",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"cruise/create","text"=>"Create Cruise","icon"=>"far fa-circle nav-icon"],
			["route"=>"cruise","text"=>"Manage Cruise","icon"=>"far fa-circle nav-icon"],
		]
	]);
