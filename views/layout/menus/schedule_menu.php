<?php
	echo Menu::item([
		"name"=>"Schedule",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"schedule/create","text"=>"Create Schedule","icon"=>"far fa-circle nav-icon"],
			["route"=>"schedule","text"=>"Manage Schedule","icon"=>"far fa-circle nav-icon"],
		]
	]);
