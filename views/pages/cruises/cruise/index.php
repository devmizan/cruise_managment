<?php
// echo Page::title(["title"=>"Manage Cruise"]);
// echo Page::body_open();
// echo Page::context_open();
// $page = isset($_GET["page"]) ?$_GET["page"]:1;
// echo Cruise::html_table($page,10);
// echo Page::context_close();
// echo Page::body_close();
?>


<?php
include_once 'header.php';

// Fetch all cruise types
$cruises = Cruise::all();
?>

<div class="col-xl-12">
  <div class="card">
    <div class="card-header">
    <a href="<?php echo $base_url; ?>/cruise/create" class="btn  btn-primary">Create New Cruise</a>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-bottom-border table-hover align-middle mb-0">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Type</th>
              <th scope="col">Hourly Price</th>
              <th scope="col">Capacity</th>
              <th scope="col">Owner ID</th>
              <th scope="col">Status</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($cruises as $cruise): ?>
              <tr>
                <td><?= $cruise->id; ?></td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="h-30 w-30 d-flex-center b-r-50 overflow-hidden text-bg-primary me-2 simple-table-avtar">
                      <img src="<?= $cruise->images; ?>" alt="Cruise Image" class="img-fluid">
                    </div>
                    <p class="mb-0 f-w-500"><?= htmlspecialchars($cruise->name); ?></p>
                  </div>
                </td>
                <td class="f-w-500"><?= htmlspecialchars($cruise->type); ?></td>
                <td class="text-success f-w-500">$<?= number_format($cruise->hourly_price, 2); ?></td>
                <td class="f-w-500"><?= htmlspecialchars($cruise->capacity); ?></td>
                <td class="text-secondary f-w-600"><?= htmlspecialchars($cruise->owner_id); ?></td>
                <td><span class="badge text-light-primary">active</span></td>
                <td>
                  <a href="<?php echo $base_url; ?>/cruise/Show/<?= $cruise->id; ?>" class="btn btn-sm btn-primary">Show</a>
                  <a href="<?php echo $base_url; ?>/cruise/edit/<?= $cruise->id; ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="<?php echo $base_url; ?>/cruise/delete/<?= $cruise->id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<?php
include_once 'footer.php';
?>