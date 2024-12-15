<?php
// echo Page::title(["title"=>"Edit Cruise"]);
// echo Page::body_open();
// echo Html::link(["class"=>"btn btn-success", "route"=>"cruise", "text"=>"Manage Cruise"]);
// echo Page::context_open();
// echo Form::open(["route"=>"cruise/update"]);
// 	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$cruise->id"]);
// 	echo Form::input(["label"=>"Owner","name"=>"owner_id","table"=>"owners","value"=>"$cruise->owner_id"]);
// 	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$cruise->name"]);
// 	echo Form::input(["label"=>"Type","type"=>"text","name"=>"type","value"=>"$cruise->type"]);
// 	echo Form::input(["label"=>"Hourly Price","type"=>"text","name"=>"hourly_price","value"=>"$cruise->hourly_price"]);
// 	echo Form::input(["label"=>"Description","type"=>"textarea","name"=>"description","value"=>"$cruise->description"]);
// 	echo Form::input(["label"=>"Capacity","type"=>"text","name"=>"capacity","value"=>"$cruise->capacity"]);
// 	echo Form::input(["label"=>"Images","type"=>"text","name"=>"images","value"=>"$cruise->images"]);
// 	echo Form::input(["label"=>"Videos","type"=>"text","name"=>"videos","value"=>"$cruise->videos"]);
// 	echo Form::input(["label"=>"Features","type"=>"text","name"=>"features","value"=>"$cruise->features"]);

// echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
// echo Form::close();
// echo Page::context_close();
// echo Page::body_close();

?>
<?php
// Fetch the specific cruise to edit
$cruise = $data ?? null;

if (!$cruise) {
  echo "<div class='alert alert-danger'>Cruise not found.</div>";
  return;
}
?>

<div class="col-xl-8 mx-auto">
  <div class="card">
    <div class="card-header">
      <h5>Edit Cruise</h5>
    </div>
    <div class="card-body">
      <form action="<?= $base_url; ?>/cruise/update" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= htmlspecialchars($cruise->id); ?>">

        <div class="mb-3">
          <label for="name" class="form-label">Cruise Name</label>
          <input type="text" id="name" name="name" class="form-control" value="<?= htmlspecialchars($cruise->name); ?>" required>
        </div>

        <div class="mb-3">
          <label for="type" class="form-label">Type</label>
          <input type="text" id="type" name="type" class="form-control" value="<?= htmlspecialchars($cruise->type); ?>" required>
        </div>

        <div class="mb-3">
          <label for="hourly_price" class="form-label">Hourly Price</label>
          <input type="number" id="hourly_price" name="hourly_price" class="form-control" value="<?= htmlspecialchars($cruise->hourly_price); ?>" step="0.01" required>
        </div>

        <div class="mb-3">
          <label for="capacity" class="form-label">Capacity</label>
          <input type="number" id="capacity" name="capacity" class="form-control" value="<?= htmlspecialchars($cruise->capacity); ?>" required>
        </div>

        <div class="mb-3">
          <label for="owner_id" class="form-label">Owner ID</label>
          <input type="text" id="owner_id" name="owner_id" class="form-control" value="<?= htmlspecialchars($cruise->owner_id); ?>" required>
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea id="description" name="description" class="form-control" rows="4" required><?= htmlspecialchars($cruise->description); ?></textarea>
        </div>

        <div class="mb-3">
          <label for="images" class="form-label">Cruise Image</label>
          <input type="file" id="images" name="images" class="form-control">
          <?php if ($cruise->images): ?>
            <div class="mt-2">
              <img src="<?= $cruise->images; ?>" alt="Current Image" class="img-thumbnail" width="150">
            </div>
          <?php endif; ?>
        </div>

        <div class="mb-3">
          <label for="videos" class="form-label">Cruise Videos</label>
          <input type="file" id="videos" name="videos" class="form-control">
        </div>

        <div class="mb-3">
          <label for="features" class="form-label">Features</label>
          <textarea id="features" name="features" class="form-control" rows="3"><?= htmlspecialchars($cruise->features); ?></textarea>
        </div>

        <div class="text-end">
          <button type="submit" name="update" class="btn btn-success">Update Cruise</button>
          <a href="<?= $base_url; ?>/cruise" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
