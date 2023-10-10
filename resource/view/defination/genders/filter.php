<div class="collapse" id="filter">
    <div class="card">
        <div class="card-header">
            <h5 class="modal-title">Filter</h5>
        </div>
        <div class="card-body">
            <form id="form-category_filter" action="<?php echo "genders?active"; ?>" method="get">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name" class="font-weight-bold">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="status" class="font-weight-bold">Durum</label>
                        <select id="status" class="form-control" name="status">
                            <option value="" selected</option>
                            <option value="1">1</option>
                            <option value="0">0</option>
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