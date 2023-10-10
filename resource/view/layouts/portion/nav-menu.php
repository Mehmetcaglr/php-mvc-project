<div class="navigation-menu-body" tabindex="3" style="overflow: hidden; outline: none;">
    <!-- begin::navigation-logo -->
    <div>
        <div id="navigation-logo">
            <a href="index.html">
                <img class="logo" src="<?php echo asset("assets/media/image/garantibarter.png"); ?>" alt="logo">
            </a>
        </div>
    </div>
    <!-- end::navigation-logo -->
    <div class="navigation-menu-group">
        <div id="dashboards">
            <ul>
                <h5 class="ml-3">Modules</h5>
            </ul>
        </div>
        <div id="web">
            <ul>
                <h5 class="ml-3">Modules</h5>
                <li><a href="<?php echo "user"; ?>">User</a></li>

                <li><a href="<?php echo "book"; ?>">Book</a></li>

                <li><a href="<?php echo "writer"; ?>">Writer</a></li>

                <li>
                    <a href="">Banner<i class="sub-menu-arrow ti-angle-up"></i></a>
                    <ul>
                        <li>
                            <a href="">Banner Top</a>
                        </li>
                        <li>
                            <a href="">Banner Middle</a>
                        </li>
                        <li>
                            <a href="">Banner Lower</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <div id="shopping">
            <ul>
                <h5 class="ml-3">Shopping</h5>
                <li><a href="<?php echo "book"; ?>">Book</a></li>

                <li><a href="<?php echo "writer"; ?>">Brand</a></li>

                <li><a href="">Product</a></li>

            </ul>
        </div>
        <div id="defination">
            <div class="list-group">
                <h3>Defination</h3>
                <a  href="<?php echo "genders?active" ?>" class="list-group-item list-group-item-action <?php active(); ?>">Genders</a>
                <button type="button" class="list-group-item list-group-item-action">Book Material</button>
            </div>
        </div>
        <div id="pages">
            <ul>
                <h5 class="ml-3">Pages</h5>
            </ul>
        </div>
        <div id="settings">
            <ul>
                <h5 class="ml-3">Settings</h5>
            </ul>
        </div>
        <div id="logout">
            <ul>
                <h5 class="ml-3">Logout</h5>
            </ul>
        </div>
    </div>
</div>