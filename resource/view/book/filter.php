<div class="collapse" id="filter">
    <div class="card">
        <div class="card-header">
            <h5 class="modal-title">Filter</h5>
        </div>
        <div class="card-body">
            <form id="form-category_filter" action="<?php echo "book"; ?>" method="get">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="input-name" class="font-weight-bold">Name</label>
                        <input type="text" name="bookName" id="bookName" class="form-control" value="" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input-name" class="font-weight-bold">Publishing House</label>
                        <input type="text" name="publishingHouse" id="PublishingHouse" class="form-control" value="" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input-name" class="font-weight-bold">Writer</label>
                        <input type="text" name="writer" id="writer" class="form-control" value="" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input-name" class="font-weight-bold">Material</label>
                        <input type="text" name="material" id="material" class="form-control" value="" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input-name" class="font-weight-bold">Number Of Page</label>
                        <input type="text" name="numberOfPage" id="numberOfPage" class="form-control" value="" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input-status" class="font-weight-bold">Book Status</label>
                        <select id="status" class="form-control" name="status">
                            <option value="" selected</option>
                            <option value="1">Pasif</option>
                            <option value="0">Aktif</option>
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