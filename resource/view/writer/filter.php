<div class="collapse" id="filter">
    <div class="card">
        <div class="card-header">
            <h5 class="modal-title">Filter</h5>
        </div>
        <div class="card-body">
            <form id="form-category_filter" action="<?php echo "writer"; ?>" method="get">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="input-name" class="font-weight-bold">First Name</label>
                        <input type="text" name="firstName" id="firstName" class="form-control" value="" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input-name" class="font-weight-bold">Second Name</label>
                        <input type="text" name="secondName" id="secondName" class="form-control" value="" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input-name" class="font-weight-bold">Last Name</label>
                        <input type="text" name="lastName" id="lastName" class="form-control" value="" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input-created" class="font-weight-bold">Gender</label>
                        <input type="text" name="genderID" id="genderID" class="form-control" value="">
                    </div>
                </div>
                <button type="submit" data-toggle="filter" class="btn btn-primary btn-square float-right mb-2"><i class="fa fa-filter mr-1"></i><span class="line"> Fitrele</span></button>
            </form>
        </div>
        <div class="card-footer">
            <!--            <button type="submit" data-toggle="filter" class="btn btn-primary btn-square float-right mb-2" data-action="" data-form="form-category_filter"><i class="fa fa-filter mr-1"></i><span class="line"> Fitrele</span></button>-->
        </div>
    </div>
</div>