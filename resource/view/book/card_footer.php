<div class="card-footer">
    <div class="btn-group">
        <button class="btn btn-outline-dark btn-square" type="button">
            <i class="fa fa-eye mr-1"></i><span class="line"></span>
        </button>
        <button type="button" class="btn btn-outline-dark btn-square dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
        <div class="dropdown-menu dropdown-menu-right m-r-0-minus w-100">
            <a href="<?php echo "book?limit=2"; ?>" class="dropdown-item">2</a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo "book?limit=5"; ?>" class="dropdown-item">5</a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo "book?limit=10" ?>" class="dropdown-item">10</a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo "book?limit=15"; ?>" class="dropdown-item">15</a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo "book?limit=50"; ?>" class="dropdown-item">50</a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo "book?limit=100"; ?>" class="dropdown-item">100</a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo "book?limit=500"; ?>" class="dropdown-item">500</a>
        </div>
    </div>

    <?php  pagination($data["books"]["links"],"book"); ?>

    <!--    --><?php // pagination($data["users"]["links"], ); ?>
    <!--    <div class="float-right">-->
    <!--        <nav aria-label="Page navigation example" >-->
    <!--            <ul class="pagination">-->
    <!--                <li class="page-item"><a class="page-link" href="--><?php //if(isset($_GET["page"]) && $_GET["page"] > 1) {echo $_ENV["APP_URL"]."user"."?limit=5&page=".($_GET["page"] - 1); } else { echo $data["users"]["links"][0]["path"]; } ?><!-- ">Previous</a></li>-->
    <!--                --><?php //foreach ($data["users"]["links"] as $key => $datum): ?>
    <!--                <li class="page-item --><?php //if(isset($_GET["page"]) && $_GET["page"] == $datum["page"] ) { ?><!-- active --><?php //}else{ ?><!--  --><?php //} ?><!-- "><a class="page-link" href="--><?php //echo $datum["path"] ?><!--">--><?php //echo $datum["page"]; ?><!--</a></li>-->
    <!--                --><?php //endforeach; ?>
    <!--                <li class="page-item"><a class="page-link" href="--><?php //if(isset($_GET["page"]) && $_GET["page"] < 3 ) {echo $_ENV["APP_URL"]."user"."?limit=5&page=".($_GET["page"] + 1); } else { echo $data["users"]["links"][3]["path"]; } ?><!-- ">Next</a></li>-->
    <!--            </ul>-->
    <!--        </nav>-->
    <!--    </div>-->
</div>
