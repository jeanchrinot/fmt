<!--Sidebar left-->
<div class="col-sm-3 col-xs-6 sidebar pl-0">
    <div class="inner-sidebar mr-3">
        <!--Image Avatar-->
        <div class="avatar text-center">
            <img src="assets/img/profile.jpg" alt="" class="rounded-circle" />
            <p><strong>Olvanot Rakotonirina</strong></p>
            <span class="text-secondary small"><strong>Web Admin</strong></span>
        </div>
        <!--Image Avatar-->

        <!--Sidebar Navigation Menu-->
        <div class="sidebar-menu-container">
            <ul class="sidebar-menu mt-4 mb-4">
                <li class="parent">
                    <a href="index.php" class=""><i class="fa fa-dashboard mr-3"> </i>
                        <span class="none">Dashboard</span>
                    </a>
                </li>


                <li class="parent">
                    <a href="new-member.php" class=""><i class="fa fa-user-plus mr-3"> </i>
                        <span class="none">Nouveau membre</span>
                    </a>
                </li>

                <li class="parent">
                    <a href="#" onclick="toggle_menu('tables'); return false" class=""><i class="fa fa-users mr-3"></i>
                        <span class="none">Membres <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                    </a>
                    <ul class="children" id="tables">
                        <li class="child"><a href="fetch-user.php" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Tous les membres</a></li>
                        <li class="child"><a href="fetch-membre-bureau.php" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Membre de bureau</a></li>
                        <li class="child"><a href="fetch-depute.php" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Deputes</a></li>
                    </ul>
                </li>

                <li class="parent">
                    <a href="#" onclick="toggle_menu('modif-page'); return false" class=""><i class="fa fa-pencil-square mr-3"></i>
                        <span class="none">Pages <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                    </a>
                    <ul class="children" id="modif-page">
                        <li class="child"><a href="slider.php" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Slider</a></li>
                        <li class="child"><a href="about.php" class="ml-4"><i class="fa fa-angle-right mr-2"></i>A propos</a></li>
                        <li class="child"><a href="student.php" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Mots des etudiants</a></li>
                        <li class="child"><a href="modif-bureau.php" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Bureau</a></li>
                    </ul>
                </li>

                <li class="parent">
                    <a href="actuality.php"><i class="fa fa-globe mr-3"> </i>
                        <span class="none">Actualites</span>
                    </a>
                </li>

                <li class="parent">
                    <a href="activity.php"><i class="fa fa-tasks mr-3"> </i>
                        <span class="none">Activites</span>
                    </a>
                </li>


                <li class="parent">
                    <a href="#" onclick="toggle_menu('gallery'); return false" class=""><i class="fa fa-camera mr-3"></i>
                        <span class="none">Galleries <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                    </a>
                    <ul class="children" id="gallery">
                        <li class="child"><a href="gallery.php" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Categories</a></li>
                        <li class="child"><a href="add-gallery.php" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Nouveau image ou video</a></li>
                    </ul>
                </li>

                <li class="parent">
                    <a href="#" onclick="toggle_menu('Contact'); return false" class=""><i class="fa fa-address-card mr-3"></i>
                        <span class="none">Contacts <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                    </a>
                    <ul class="children" id="Contact">
                        <li class="child"><a href="contact-association.php" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Association</a></li>
                        <li class="child"><a href="contact-consulat.php" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Consulat</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--Sidebar Naigation Menu-->
    </div>
</div>
<!--Sidebar left-->