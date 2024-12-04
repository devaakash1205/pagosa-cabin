<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="./">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#pages-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Pages</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="pages-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <?php
                getAllPages();
                ?>
                <li>
                    <a href="forms-validation.html">
                        <i class="bi bi-circle"></i><span>Manage Pages</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>

        <!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="contact-message.php">
                <i class="bi bi-person"></i>
                <span>Contact Message</span>
            </a>
        </li>
        <!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-login.html">
                <i class="bx bx-log-out-circle"></i>
                <span>Log Out</span>
            </a>
        </li>
        <!-- End Login out Nav -->

    </ul>

</aside>
<!-- End Sidebar-->