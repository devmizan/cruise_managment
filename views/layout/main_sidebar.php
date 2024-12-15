    <!-- Menu Navigation starts -->
    <nav>
      <div class="app-logo">
        <a class="logo d-inline-block" href="index.html">
          <img src="<?php echo $base_url; ?>/assets/images/logo/1.png" alt="#">
        </a>

        <span class="bg-light-primary toggle-semi-nav">
          <i class="ti ti-chevrons-right f-s-20"></i>
        </span>
      </div>
      <div class="app-nav" id="app-simple-bar">
        <ul class="main-nav p-0 mt-2">
          <li class="menu-title">
            <span>Dashboard</span>
          </li>
          <li>
            <a class="" data-bs-toggle="collapse" href="#dashboard" aria-expanded="false">
              <i class="ph-duotone  ph-house-line"></i>
              dashboard
              <span class="badge text-bg-success badge-notification ms-2">4</span>
            </a>
            <ul class="collapse" id="dashboard">
              <li><a href="<?php echo $base_url; ?>/home">Analytics</a></li>
            </ul>
          </li>
          <li>
            <a class="" data-bs-toggle="collapse" href="#cruise" aria-expanded="false">
              <i class="ph-duotone ph-stack"></i>
              Cruise
            </a>
            <ul class="collapse" id="cruise">
              <li><a href="<?php echo $base_url; ?>/cruise">All Cruises</a></li>
              <li><a href="<?php echo $base_url; ?>/cruise/create">Add New</a></li>
              <li><a href="<?php echo $base_url; ?>/cruisetype">Cruise Types</a></li>
            </ul>
          </li>
          <li>
            <a class="" data-bs-toggle="collapse" href="#bookings" aria-expanded="false">
              <i class="ph-duotone ph-stack"></i>
              Bookings
            </a>
            <ul class="collapse" id="bookings">
              <li><a href="<?php echo $base_url; ?>/booking">All Bookings</a></li>
              <li><a href="<?php echo $base_url; ?>/booking/create">Add New</a></li>
            </ul>
          </li>

          <li>
            <a class="" data-bs-toggle="collapse" href="#discounts" aria-expanded="false">
              <i class="ph-duotone ph-stack"></i>
              Discounts
            </a>
            <ul class="collapse" id="discounts">
              <li><a href="<?php echo $base_url; ?>/discount">All Discounts</a></li>
              <li><a href="<?php echo $base_url; ?>/discount/create">Add New</a></li>
            </ul>
          </li>

          <!-- <li>
            <a class="" data-bs-toggle="collapse" href="#membership" aria-expanded="false">
              <i class="ph-duotone ph-stack"></i>
              Membership
            </a>
            <ul class="collapse" id="membership">
              <li><a href="<?php echo $base_url; ?>/membership">All Memberships</a></li>
              <li><a href="<?php echo $base_url; ?>/membership/create">Add New</a></li>
            </ul>
          </li> -->

          <!-- <li>
            <a class="" data-bs-toggle="collapse" href="#notifications" aria-expanded="false">
              <i class="ph-duotone ph-stack"></i>
              Notifications
            </a>
            <ul class="collapse" id="notifications">
              <li><a href="<?php echo $base_url; ?>/notification">All Notifications</a></li>
              <li><a href="<?php echo $base_url; ?>/notification/create">Add New</a></li>
            </ul>
          </li> -->

          <li>
            <a class="" data-bs-toggle="collapse" href="#payments" aria-expanded="false">
              <i class="ph-duotone ph-stack"></i>
              Payments
            </a>
            <ul class="collapse" id="payments">
              <li><a href="<?php echo $base_url; ?>/payment">All Payments</a></li>
              <li><a href="<?php echo $base_url; ?>/payment/create">Add New</a></li>
            </ul>
          </li>

          <li>
            <a class="" data-bs-toggle="collapse" href="#reviews" aria-expanded="false">
              <i class="ph-duotone ph-stack"></i>
              Reviews
            </a>
            <ul class="collapse" id="reviews">
              <li><a href="<?php echo $base_url; ?>/review">All Reviews</a></li>
              <li><a href="<?php echo $base_url; ?>/review/create">Add New</a></li>
            </ul>
          </li>

          <li>
            <a class="" data-bs-toggle="collapse" href="#schedule" aria-expanded="false">
              <i class="ph-duotone ph-stack"></i>
              Schedule
            </a>
            <ul class="collapse" id="schedule">
              <li><a href="<?php echo $base_url; ?>/schedule">All Schedules</a></li>
              <li><a href="<?php echo $base_url; ?>/schedule/create">Add New</a></li>
            </ul>
          </li>

          <li>
            <a class="" data-bs-toggle="collapse" href="#roles" aria-expanded="false">
              <i class="ph-duotone ph-stack"></i>
              Roles
            </a>
            <ul class="collapse" id="roles">
              <li><a href="<?php echo $base_url; ?>/role">All Roles</a></li>
              <li><a href="<?php echo $base_url; ?>/role/create">Add New</a></li>
            </ul>
          </li>

          <li>
            <a class="" data-bs-toggle="collapse" href="#users" aria-expanded="false">
              <i class="ph-duotone ph-stack"></i>
              Users
            </a>
            <ul class="collapse" id="users">
              <li><a href="<?php echo $base_url; ?>/user">All Users</a></li>
              <li><a href="<?php echo $base_url; ?>/user/create">Add New</a></li>
            </ul>
          </li>
        </ul>
      </div>

      <div class="menu-navs">
        <span class="menu-previous"><i class="ti ti-chevron-left"></i></span>
        <span class="menu-next"><i class="ti ti-chevron-right"></i></span>
      </div>

    </nav>
    <!-- Menu Navigation ends -->