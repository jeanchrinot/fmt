
<!--Sidebar left-->
<div class="col-sm-3 col-xs-6 sidebar pl-0">
    <div class="inner-sidebar mr-3">
        <!--Image Avatar-->
        <div class="avatar text-center">
            <img src="{{ getUserImage($admin->image) }}" alt="" class="rounded-circle" />
            <p><strong>{{ $admin->surname }} {{ $admin->name }}</strong></p>
            <span class="text-secondary small"><strong>{{ getMemberType($admin->type) }}</strong></span>
        </div>
        <!--Image Avatar-->

        <!--Sidebar Navigation Menu-->
        <div class="sidebar-menu-container">
            <ul class="sidebar-menu mt-4 mb-4">
                <li class="parent">
                    <a href="{{ route('adminDashboard') }}" class=""><i class="fa fa-dashboard mr-3"> </i>
                        <span class="none">Dashboard</span>
                    </a>
                </li>


                <li class="parent">
                    <a href="{{ route('addMember') }}" class=""><i class="fa fa-user-plus mr-3"> </i>
                        <span class="none">Nouveau membre</span>
                    </a>
                </li>

                <li class="parent">
                    <a href="#" onclick="toggle_menu('tables'); return false" class=""><i class="fa fa-users mr-3"></i>
                        <span class="none">Membres <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                    </a>
                    <ul class="children" id="tables">
                        <li class="child"><a href="{{ route('listMember') }}" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Tous les membres</a></li>
                        <li class="child"><a href="{{ route('office.list') }}" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Membre de bureau</a></li>
                        <li class="child"><a href="{{ route('deputy.list') }}" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Députés</a></li>
                    </ul>
                </li>

                <li class="parent">
                    <a href="#" onclick="toggle_menu('modif-page'); return false" class=""><i class="fa fa-pencil-square mr-3"></i>
                        <span class="none">Pages <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                    </a>
                    <ul class="children" id="modif-page">
                        <li class="child"><a href="{{ route('page.item.list',['item'=>'slider']) }}" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Slider</a></li>
                        <li class="child"><a href="{{ route('page.item.list',['item'=>'about']) }}" class="ml-4"><i class="fa fa-angle-right mr-2"></i>A propos</a></li>
                        <li class="child"><a href="{{ route('page.item.list',['item'=>'student_words']) }}" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Mots des étudiants</a></li>
                    </ul>
                </li>

                <li class="parent">
                    <a href="#" onclick="toggle_menu('actuality'); return false" class=""><i class="fa fa-newspaper-o   
 mr-3"></i>
                        <span class="none">Actualités <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                    </a>
                    <ul class="children" id="actuality">
                        <li class="child"><a href="{{ route('actucategory.index') }}" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Catégories</a></li>
                        <li class="child"><a href="{{ route('actu.index') }}" class="ml-4"><i class="fa fa-angle-right mr-2"></i>ActualitéS</a></li>
                    </ul>
                </li>

                <li class="parent">
                    <a href="{{ route('activity.index') }}"><i class="fa fa-tasks mr-3"> </i>
                        <span class="none">Activités</span>
                    </a>
                </li>


                <li class="parent">
                    <a href="#" onclick="toggle_menu('gallery'); return false" class=""><i class="fa fa-camera mr-3"></i>
                        <span class="none">Galleries <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                    </a>
                    <ul class="children" id="gallery">
                        <li class="child"><a href="{{ route('gallerycategory.index') }}" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Catégories</a></li>
                        <li class="child"><a href="{{ route('gallery.index') }}" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Image Galerie</a></li>
                        <li class="child"><a href="{{ route('video.index') }}" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Vidéos Galerie</a></li>
                    </ul>
                </li>

                <li class="parent">
                    <a href="#" onclick="toggle_menu('Contact'); return false" class=""><i class="fa fa-address-card mr-3"></i>
                        <span class="none">Contacts <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                    </a>
                    <ul class="children" id="Contact">
                        <li class="child"><a href="{{ route('contact.show',['id'=>1]) }}" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Association</a></li>
                        <li class="child"><a href="{{ route('contact.show',['id'=>2]) }}" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Consulat</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--Sidebar Naigation Menu-->
    </div>
</div>
<!--Sidebar left-->