<?php

class Cruise extends Model implements JsonSerializable
{
    public $id;
    public $owner_id;
    public $name;
    public $type;
    public $hourly_price;
    public $description;
    public $capacity;
    public $images;
    public $videos;
    public $features;
    public $created_at;
    public $updated_at;

    // Constructor
    public function __construct() {}

    // Setter
    public function set(
        $id, $owner_id, $name, $type, $hourly_price, 
        $description, $capacity, $images, $videos, 
        $features, $created_at, $updated_at
    ) {
        $this->id = $id;
        $this->owner_id = $owner_id;
        $this->name = $name;
        $this->type = $type;
        $this->hourly_price = $hourly_price;
        $this->description = $description;
        $this->capacity = $capacity;
        $this->images = $images;
        $this->videos = $videos;
        $this->features = $features;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    // Save Cruise
    public function save()
    {
        global $db, $tx;
        $db->query("INSERT INTO {$tx}cruises(owner_id, name, type, hourly_price, description, capacity, images, videos, features, created_at, updated_at)
                    VALUES('$this->owner_id', '$this->name', '$this->type', '$this->hourly_price', '$this->description', 
                           '$this->capacity', '$this->images', '$this->videos', '$this->features', '$this->created_at', '$this->updated_at')");
        return $db->insert_id;
    }

    // Update Cruise
    public function update()
    {
        global $db, $tx;
        $db->query("UPDATE {$tx}cruises 
                    SET owner_id='$this->owner_id', name='$this->name', type='$this->type', hourly_price='$this->hourly_price', 
                        description='$this->description', capacity='$this->capacity', images='$this->images', 
                        videos='$this->videos', features='$this->features', created_at='$this->created_at', updated_at='$this->updated_at' 
                    WHERE id='$this->id'");
    }

    // Delete Cruise
    public static function delete($id)
    {
        global $db, $tx;
        $db->query("DELETE FROM {$tx}cruises WHERE id={$id}");
    }

    // JSON Serialization
    public function jsonSerialize():mixed
    {
        return get_object_vars($this);
    }

    // Get All Cruises
    public static function all()
    {
        global $db, $tx;
        $result = $db->query("SELECT id, owner_id, name, type, hourly_price, description, capacity, images, videos, features, created_at, updated_at 
                              FROM {$tx}cruises");
        $data = [];
        while ($cruise = $result->fetch_object()) {
            $data[] = $cruise;
        }
        return $data;
    }

    // Paginated Cruises
    public static function pagination($page = 1, $perpage = 10, $criteria = "")
    {
        global $db, $tx;
        $top = ($page - 1) * $perpage;
        $result = $db->query("SELECT id, owner_id, name, type, hourly_price, description, capacity, images, videos, features FROM {$tx}cruises $criteria LIMIT $top, $perpage");
        $data = [];
        while ($cruise = $result->fetch_object()) {
            $data[] = $cruise;
        }
        return $data;
    }

    // Count Cruises
    public static function count($criteria = "")
    {
        global $db, $tx;
        $result = $db->query("SELECT count(*) FROM {$tx}cruises $criteria");
        list($count) = $result->fetch_row();
        return $count;
    }

    // Find a Cruise by ID
    public static function find($id)
    {
        global $db, $tx;
        $result = $db->query("SELECT id, owner_id, name, type, hourly_price, description, capacity, images, videos, features FROM {$tx}cruises WHERE id='$id'");
        return $result->fetch_object();
    }

    // Get Last ID
    public static function get_last_id()
    {
        global $db, $tx;
        $result = $db->query("SELECT max(id) last_id FROM {$tx}cruises");
        return $result->fetch_object()->last_id;
    }

    // JSON Representation
    public function json()
    {
        return json_encode($this);
    }

    // String Representation
    public function __toString()
    {
        return "Id: $this->id<br> 
                Owner Id: $this->owner_id<br> 
                Name: $this->name<br> 
                Type: $this->type<br> 
                Hourly Price: $this->hourly_price<br> 
                Description: $this->description<br> 
                Capacity: $this->capacity<br> 
                Images: $this->images<br> 
                Videos: $this->videos<br> 
                Features: $this->features<br> 
                Created At: $this->created_at<br> 
                Updated At: $this->updated_at<br>";
    }

    // HTML Components
    public static function html_select($name = "cmbCruise")
    {
        global $db, $tx;
        $html = "<select id='$name' name='$name'>";
        $result = $db->query("SELECT id, name FROM {$tx}cruises");
        while ($cruise = $result->fetch_object()) {
            $html .= "<option value='$cruise->id'>$cruise->name</option>";
        }
        $html .= "</select>";
        return $html;
    }

    public static function html_table($page = 1, $perpage = 10, $criteria = "", $action = true)
{
    global $db, $tx, $base_url;
    $count_result = $db->query("SELECT count(*) total FROM {$tx}cruises $criteria");
    list($total_rows) = $count_result->fetch_row();
    $total_pages = ceil($total_rows / $perpage);
    $top = ($page - 1) * $perpage;
    $result = $db->query("SELECT id, owner_id, name, type, hourly_price, description, capacity, images, videos, features, created_at, updated_at 
                          FROM {$tx}cruises $criteria LIMIT $top, $perpage");

    $html = "<table class='table'>";
    $html .= "<tr><th colspan='3'>" . Html::link(["class" => "btn btn-success", "route" => "cruise/create", "text" => "New Cruise"]) . "</th></tr>";

    if ($action) {
        $html .= "<tr>
                    <th>Id</th>
                    <th>Owner Id</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Hourly Price</th>
                    <th>Description</th>
                    <th>Capacity</th>
                    <th>Images</th>
                    <th>Features</th>
                    <th>Action</th>
                  </tr>";
    } else {
        $html .= "<tr>
                    <th>Id</th>
                    <th>Owner Id</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Hourly Price</th>
                    <th>Description</th>
                    <th>Capacity</th>
                    <th>Images</th>
                    <th>Features</th>
                  </tr>";
    }

    while ($cruise = $result->fetch_object()) {
        // Decode and format the features JSON
        $features = json_decode($cruise->features, true);
        $formattedFeatures = '';
        if ($features) {
            foreach ($features as $key => $value) {
                $value = is_bool($value) ? ($value ? 'Yes' : 'No') : $value;
                $formattedFeatures .= "$key: $value<br>";
            }
        } else {
            $formattedFeatures = "No features available";
        }

        $action_buttons = $action ? "
            <td>
                <div class='btn-group' style='display:flex;flex-direction: row;flex-wrap: nowrap;'>
                    " . Event::button(["name" => "show",  "value" => "<i class='fas fa-eye'></i>", "class" => "btn btn-info", "route" => "cruise/show/$cruise->id"]) . "
                    " . Event::button(["name" => "edit",  "value" => "<i class='fas fa-edit'></i>", "class" => "btn btn-primary", "route" => "cruise/edit/$cruise->id"]) . "
                    " . Event::button(["name" => "delete",  "value" => "<i class='fas fa-trash'></i>", "class" => "btn btn-danger", "route" => "cruise/confirm/$cruise->id"]) . "
                </div>
            </td>" : "";

        $html .= "<tr>
                    <td>$cruise->id</td>
                    <td>$cruise->owner_id</td>
                    <td>$cruise->name</td>
                    <td>$cruise->type</td>
                    <td>$cruise->hourly_price</td>
                    <td>$cruise->description</td>
                    <td>$cruise->capacity</td>
                    <td>$cruise->images</td>
                    <td>$formattedFeatures</td>$action_buttons
                  </tr>";
    }

    $html .= "</table>";
    $html .= pagination($page, $total_pages);
    return $html;
}


public static function html_row_details($id)
{
    global $db, $tx, $base_url;
    $result = $db->query("SELECT id, owner_id, name, type, hourly_price, description, capacity, images, features 
                          FROM {$tx}cruises WHERE id={$id}");
    $cruise = $result->fetch_object();

    // Decode and format the features JSON
    $features = json_decode($cruise->features, true);
    $formattedFeatures = '';
    if ($features) {
        foreach ($features as $key => $value) {
            $value = is_bool($value) ? ($value ? 'Yes' : 'No') : $value;
            $formattedFeatures .= "$key: $value<br>";
        }
    } else {
        $formattedFeatures = "No features available";
    }

    $html = "<table class='table'>
                <tr><th colspan='2'>Cruise Show</th></tr>
                <tr><th>Id</th><td>$cruise->id</td></tr>
                <tr><th>Owner Id</th><td>$cruise->owner_id</td></tr>
                <tr><th>Name</th><td>$cruise->name</td></tr>
                <tr><th>Type</th><td>$cruise->type</td></tr>
                <tr><th>Hourly Price</th><td>$cruise->hourly_price</td></tr>
                <tr><th>Description</th><td>$cruise->description</td></tr>
                <tr><th>Capacity</th><td>$cruise->capacity</td></tr>
                <tr><th>Images</th><td>$cruise->images</td></tr>
                <tr><th>Features</th><td>$formattedFeatures</td></tr>
            </table>";

    return $html;
}

}
