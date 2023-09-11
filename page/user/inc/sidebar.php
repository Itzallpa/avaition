<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="profile">
            <span class="align-middle">BUNNY VIR</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">Pages</li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="profile">
                <i class="align-middle" data-feather="sliders"></i>
                <span class="align-middle">Dashboard</span>
              </a>
            </li>

            <li class="sidebar-header">PILOT ADMINISTRATION</li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="infomation">
                <i class="align-middle me-2" data-feather="book"></i>
                <span class="align-middle">Infomation</span>
              </a>
            </li>


            <?php if($_SESSION['user_role'] == "Admin")
            {
               echo '<li class="sidebar-item">
              <a class="sidebar-link" href="Admin">
                <i class="align-middle me-2" data-feather="users"></i>
                <span class="align-middle">Admin</span>
              </a>
            </li>';

            }
            ?>

            

            <li class="sidebar-header">Leaderboard</li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="leaderboard">
                <i class="align-middle me-2" data-feather="star"></i>
                <span class="align-middle">Leaderboard</span>
              </a>
            </li>

            <li class="sidebar-header">Flight Oparetor</li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="flight_plan">
                <i class="align-middle me-2" data-feather="star"></i>
                <span class="align-middle">Flight Book</span>
              </a>
            </li>
        <ul>

    </div>
</nav>