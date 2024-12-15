<?php
// echo Page::title(["title" => "Create CruiseType"]);
// echo Page::body_open();
// echo Page::context_open();
// echo Form::open(["route" => "cruisetype/save"]);
// echo Html::link(["class" => "btn btn-success", "route" => "cruisetype", "text" => "Manage Cruise Type"]);
// echo Form::input(["label" => "Cruise Type Name", "type" => "text", "name" => "cruise_type_name"]);
// echo Form::input(["label" => "Cruise Type Image", "type" => "text", "name" => "cruise_type_image"]);

// echo Form::input(["name" => "create", "class" => "btn btn-primary offset-2", "value" => "Save", "type" => "submit"]);
// echo Form::close();
// echo Page::context_close();
// echo Page::body_close();

$info = CruiseType::find($_GET['id']);

$cruisetype=new CruiseType();
// $id=$_GET['id'];
// if (isset($_POST['cruiseBTN'])) {
// $name = $_POST['cruiseTypeName'];
// $image = $_FILES['cruiseTypeImage'];
	// $cruisetype->cruise_type_name=$name;
		// $cruisetype->cruise_type_image=$data["cruise_type_image"];

			// $cruisetype->update();

		
?>




<!-- Body main section starts -->
<main>
	<div class="container-fluid">
		<form action="" method="post" enctype="multipart/form-data">
		<div class="row">
			<!-- Book Appointment Form start -->
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h5>Book Appointment Form</h5>

					</div>
					<div class="card-body">
						<form class="app-form">
							<div class="row">
							<div class="col-4">
									<img width="200px" height="200px" class="rounded" src="<?php echo $base_url."/assets/images/". $info->cruise_type_image?>" alt="">
								</div>
								<div class="col-md-8">
									<div class="mb-3">
										<label class="form-label">Cruise Type Name</label>
										<input name="cruiseTypeName" type="text" class="form-control"
											placeholder="<?php echo $info->cruise_type_name?>" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Image</label>
										<input name="cruiseTypeImage" type="file" class="form-control"
											placeholder="Enter Your Last Name" >
									</div>
								</div>

								<div class="col-12">
									<div class="text-end">
										<button name="cruiseBTN" type="submit" class="btn btn-primary">Submit</button>
										<button type="reset" class="btn btn-secondary">Reset</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>

</main>
<!-- Body main section ends -->


<!-- tap on top -->
<div class="go-top">
	<span class="progress-value">
		<i class="ti ti-arrow-up"></i>
	</span>
</div>


</div>