<?php
// echo Page::title(["title" => "Manage CruiseType"]);
// echo Page::body_open();
// echo Page::context_open();
// $page = isset($_GET["page"]) ? $_GET["page"] : 1;
// echo CruiseType::html_table($page, 10);
// echo Page::context_close();
// echo Page::body_close();

?>

<div class="row">
    <!-- List Js Table start -->
    <div class="col-xxl-8">
        <div class="card equal-card ">
            <div class="card-header">
                <h5>Manage CruiseType</h5>
            </div>
            <div class="card-body p-0">
                <div id="myTable">
                    <div class="list-table-header d-flex justify-content-sm-between mb-3">
                        <a class="btn btn-primary" href="http://cruisemanagement.test/admin/cruisetype/create">Add</a>


                        <form class="app-form app-icon-form " action="#">
                            <div class="position-relative ">
                                <input type="search" class="form-control search" placeholder="Search..." aria-label="Search">
                                <i class="ti ti-search text-dark"></i>
                            </div>
                        </form>
                    </div>
                    <?php

                    ?>
                    <?php


                    // Fetch all cruise types
                    $cruiseTypes = CruiseType::all();
                    ?>

                    <div class="overflow-auto app-scroll">
                        <table class="table table-bottom-border list-table-data align-middle mb-0">
                            <thead>
                                <tr class="app-sort">
                                    <th>
                                        <input type="checkbox" class="form-check-input checkAll" name="checkAll">
                                    </th>
                                    <th class="sort">ID</th>
                                    <th class="sort" data-sort="employee" scope="col">Cruise Type Name</th>
                                    <th class="sort" data-sort="email" scope="col">Cruise Type Image</th>
                                    <th class="sort" data-sort="action" scope="col">Edit</th>
                                    <th class="sort" data-sort="action" scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody class="list" id="t-data">
                                
                                <?php
                                
                                // print_r($cruiseTypes);
                                
                                foreach ($cruiseTypes as $cruiseType): ?>
                                    <tr>
                                        <th scope="row"><input class="form-check-input mt-0 ms-2" type="checkbox" name="item"></th>
                                        <td class="id"><?php echo $cruiseType->id; ?></td>
                                        <td class="employee"><?php echo htmlspecialchars($cruiseType->cruise_type_name); ?></td>
                                        <td class="email"><img src="<?php echo $base_url."/assets/images/".$cruiseType->cruise_type_image; ?>" alt="<?php echo htmlspecialchars($cruiseType->cruise_type_name); ?>" style="width: 50px; height: auto;"></td>
                                        <td class="edit">
                                            <a href="cruisetype/edit?id=<?php echo $cruiseType->id; ?>" class="btn edit-item-btn btn-sm btn-success">Edit</a>
                                        </td>
                                        <td class="remove">
                                            <button class="btn remove-item-btn btn-sm btn-danger" data-id="<?php echo $cruiseType->id; ?>">Remove</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="list-pagination">
                        <ul class="pagination">
                            <li class="active"><a class="page" href="#" data-i="1" data-page="4">1</a></li>
                            <li><a class="page" href="#" data-i="2" data-page="4">2</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table with Pagination Table end -->
</div>