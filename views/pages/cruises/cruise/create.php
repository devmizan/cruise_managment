<?php
//include_once "header.php";
echo Page::title(["title" => "Create Cruise"]);
// echo Page::body_open();
// echo Html::link(["class"=>"btn btn-success", "route"=>"cruise", "text"=>"Manage Cruise"]);
// echo Page::context_open();
// echo Form::open(["route"=>"cruise/save"]);
// 	echo Form::input(["label"=>"Owner","name"=>"owner_id","table"=>"owners"]);
// 	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
// 	echo Form::input(["label"=>"Type","type"=>"text","name"=>"type"]);
// 	echo Form::input(["label"=>"Hourly Price","type"=>"text","name"=>"hourly_price"]);
// 	echo Form::input(["label"=>"Description","type"=>"textarea","name"=>"description"]);
// 	echo Form::input(["label"=>"Capacity","type"=>"text","name"=>"capacity"]);
// 	echo Form::input(["label"=>"Images","type"=>"text","name"=>"images"]);
// 	echo Form::input(["label"=>"Videos","type"=>"text","name"=>"videos"]);
// 	echo Form::input(["label"=>"Features","type"=>"text","name"=>"features"]);
// echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
// echo Form::close();
// echo Page::context_close();
// echo Page::body_close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Multipurpose, super flexible, powerful, clean modern responsive bootstrap 5 admin template">
  <meta name="keywords"
    content="admin template, ra-admin admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="la-themes">
  <link rel="icon" href="<?php echo $base_url; ?>/assets/images/logo/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="<?php echo $base_url; ?>/assets/images/logo/favicon.png" type="image/x-icon">

  <title>Add Product | ra-admin - Premium Admin Template</title>

  <!--font-awesome-css-->
  <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/vendor/fontawesome/css/all.css">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400..900&display=swap" rel="stylesheet">

  <!-- tabler icons-->
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/vendor/tabler-icons/tabler-icons.css">

  <!--flag Icon css-->
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/vendor/flag-icons-master/flag-icon.css">

  <!-- filepond css -->
  <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/vendor/filepond/filepond.css">
  <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/vendor/filepond/image-preview.min.css">

  <!-- editor css -->
  <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/vendor/trumbowyg/trumbowyg.min.css">

  <!-- Selecrt css -->
  <link href="<?php echo $base_url; ?>/assets/vendor/select/select2.min.css" rel="stylesheet">

  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/vendor/bootstrap/bootstrap.min.css">

  <!-- simplebar css-->
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/vendor/simplebar/simplebar.css">

  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/css/style.css">

  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/assets/css/responsive.css">

</head>

<body>
  <div class="app-wrapper">



    <!-- Body main section start -->


    <main>
      <div class="container-fluid">

        <!-- Add Product start -->
        <div class="row">
          <div class="col-lg-8 col-xxl-9">
            <div class="card">
              <div class="card-body">
                <div class="app-product-section">
                  <div class="main-title">
                    <h6>General Information</h6>
                  </div>
                  <div>
                    <form class="app-form">
                      <div class="mb-3">
                        <label class="form-label">Product Title</label>
                        <input type="text" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Brand Name</label>
                        <input type="text" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Product Description</label>
                        <div id="description-editor">
                          <p>Hello !</p>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="app-divider-v dashed"></div>

                  <div class="main-title">
                    <h6>Category</h6>
                  </div>

                  <div>
                    <form class="app-form">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Product Category</label>
                            <select class="category-select w-100">
                              <option value="IN">Industry</option>
                              <option value="FN">Functionality</option>
                              <option value="CN">Customer Needs</option>
                              <option value="CP">Customer Preferences</option>
                              <option value="DE">Demographics</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Product Tags</label>
                            <select class="category-select w-100">
                              <option value="Cl">Clothing</option>
                              <option value="SH">Shoes</option>
                              <option value="TO">Toys</option>
                              <option value="IT">Internet Of Things</option>
                              <option value="BS">Books & Stationaries</option>
                              <option value="AS">Art Supplies</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mt-4 d-flex justify-content-end gap-2 flex-column flex-sm-row text-end">
                          <button type="button" class="btn btn-light-secondary">Discard</button>
                          <a href="product_details.html" role="button" class="btn btn-primary">Add Product</a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-xxl-3">
            <div class="card">
              <div class="card-body">
                <div class="app-product-section">
                  <div class="main-title">
                    <h6>Product Media</h6>
                  </div>

                  <div>
                    <input class="app-file-upload addproduct" type="file" id="addProduct" multiple="multiple" data-allow-reorder="true">
                  </div>
                  <div class="app-divider-v dashed"></div>
                  <div class="main-title">
                    <h6>Pricing</h6>
                  </div>

                  <form class="app-form">
                    <div class="row">
                      <div class="col-12">
                        <div class="mb-3">
                          <label class="form-label">Price</label>
                          <div class="input-group mb-3">
                            <span class="input-group-text b-r-left" id="basic-addon1">$</span>
                            <input type="text" class="form-control b-r-right" aria-label="Username"
                              aria-describedby="basic-addon1">
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <label class="form-label">Compare at price</label>
                          <div class="input-group mb-3">
                            <span class="input-group-text b-r-left" id="basic-addon2">$</span>
                            <input type="text" class="form-control b-r-right" aria-label="Username"
                              aria-describedby="basic-addon1">
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <label class="form-label">Discount(%)</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <label class="form-label">Discount Type</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Add Product end -->
      </div>
    </main>

    <!-- Body main section ends -->
  </div>
  </div>
  </div>



  <!--customizer-->
  <div id="customizer"></div>

  <!-- latest jquery-->
  <script src="<?php echo $base_url; ?>/assets/js/jquery-3.6.3.min.js"></script>

  <!-- Bootstrap js-->
  <script src="<?php echo $base_url; ?>/assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>

  <!-- Simple bar js-->
  <script src="<?php echo $base_url; ?>/assets/vendor/simplebar/simplebar.js"></script>

  <!-- phosphor js -->
  <script src="<?php echo $base_url; ?>/assets/vendor/phosphor/phosphor.js"></script>

  <!-- select2 -->
  <script src="<?php echo $base_url; ?>/assets/vendor/select/select2.min.js"></script>

  <!-- filepond -->
  <script src="<?php echo $base_url; ?>/assets/vendor/filepond/file-encode.min.js"></script>
  <script src="<?php echo $base_url; ?>/assets/vendor/filepond/validate-size.min.js"></script>
  <script src="<?php echo $base_url; ?>/assets/vendor/filepond/validate-type.js"></script>
  <script src="<?php echo $base_url; ?>/assets/vendor/filepond/exif-orientation.min.js"></script>
  <script src="<?php echo $base_url; ?>/assets/vendor/filepond/image-preview.min.js"></script>
  <script src="<?php echo $base_url; ?>/assets/vendor/filepond/filepond.min.js"></script>

  <!-- Trumbowyg js -->
  <script src="<?php echo $base_url; ?>/assets/vendor/trumbowyg/trumbowyg.min.js"></script>

  <!-- add product -->
  <script src="<?php echo $base_url; ?>/assets/js/add_product.js"></script>

  <!-- App js-->
  <script src="<?php echo $base_url; ?>/assets/js/script.js"></script>

  <!-- Customizer js-->
  <script src="<?php echo $base_url; ?>/assets/js/customizer.js"></script>

</body>

</html>







