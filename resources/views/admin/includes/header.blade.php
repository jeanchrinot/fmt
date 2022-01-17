<!--Header-->
<div class="row header shadow-sm">

    <!--Logo-->
    <div class="col-sm-3 pl-0 text-center header-logo">
        <div class="bg-theme mr-3 pt-3 pb-2 mb-0">
            <h3 class="logo"><a href="/" target="_blank" class="text-secondary logo"><span class="small">Malagasy eto
                        Torkia</span></a></h3>
        </div>
    </div>
    <!--Logo-->

    <!--Header Menu-->
    <div class="col-sm-9 header-menu pt-2 pb-0">
        <div class="row">

            <!--Menu Icons-->
            <div class="col-sm-4 col-8 pl-0">
                <!--Toggle sidebar-->
                <span class="menu-icon" onclick="toggle_sidebar()">
                    <span id="sidebar-toggle-btn"></span>
                </span>
                <!--Toggle sidebar-->




            </div>
            <!--Menu Icons-->

            <!--Search box and avatar-->
            <div class="col-sm-8 col-4 text-right flex-header-menu justify-content-end">
                <div class="nr-3">
                    <a class="dropdown-item" href="{{ route('adminLogout') }}"><i class="fa fa-power-off pr-2"></i> Se
                        déconnecter</a>
                </div>
                <!-- <div class="search-rounded mr-3">
                        <input type="text" class="form-control search-box" placeholder="Entrer le mot cle.." />
                    </div> -->
                <div class="mr-4">
                    <a class="" href="#" role="button" id="logout" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    </a>
                    <img src="{{ getUserImage($admin->image) }}" alt="Photo de profile" class="rounded-circle"
                        width="40px" height="40px">
                    <div class="dropdown-menu dropdown-menu-right mt-13" aria-labelledby="logout">
                        <a class="dropdown-item" href="{{ route('adminLogout') }}"><i class="fa fa-power-off pr-2"></i>
                            Se déconnecter</a>
                    </div>
                </div>
            </div>
            <!--Search box and avatar-->
        </div>
    </div>
    <!--Header Menu-->
</div>
<!--Header-->