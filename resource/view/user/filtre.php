<div class="collapse" id="filter">
    <div class="card">
        <div class="card-header">
            <h5 class="modal-title">Filter</h5>
        </div>
        <div class="card-body">
            <form id="form-category_filter" action="<?php echo "user"; ?>" method="get">
                <div class="form-row">
                    <div class="form">
                        <input type="hidden" name="limit" value="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input-name" class="font-weight-bold">Ad</label>
                        <input type="text" name="first_name" id="input-first_name" class="form-control" value="" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input-name" class="font-weight-bold">Soyad</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" value="" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input-name" class="font-weight-bold">TC</label>
                        <input type="text" name="identification_number" id="identification_number" class="form-control" value="" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input-created" class="font-weight-bold">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input-status" class="font-weight-bold">Durum</label>
                        <select id="status" class="form-control" name="status">
                            <option value="" selected</option>
                            <option value="1"></option>
                            <option value="0"></option>
                        </select>
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