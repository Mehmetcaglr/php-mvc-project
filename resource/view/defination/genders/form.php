<div class="modal fade modal-right" id="right_modal" tabindex="-1" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header p-3">
                <h4 class="modal-title"><?php echo $data["title"]; ?></h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body mt-1">
                <form id="form-data" method="post" data-action="<?php echo  (isset( $data["action"] )) ?  $data["action"] : "" ; ?>" enctype="multipart/form-data" novalidate>
                    <?php if(count(error())>0): ?>
                        <div class="col-md-12">
                            <div class="alert">
                                <?php foreach (error() as $error ): ?>
                                    <div class="alert alert-danger"><?php echo $error ?></div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="col-md-12 mb-3">
                                <label class="font-weight-bold" for="name">Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-asterisk text-danger" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($data["gender"]->name)) { echo $data["gender"]->name; } else { ?> <?php } ?>" autocomplete="off" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="font-weight-bold" for="status">Status</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-asterisk text-danger" aria-hidden="true"></i></span>
                                    </div>
                                    <select class="form-control" id="status" name="status">
                                        <option selected value="">Select</option>
                                        <?php foreach ($data["status"] as $value )  ?>
                                        <option value="<?php if(isset($data["gender"]->status)) { echo $data["gender"]->status; } else { ?> <?php } ?>"></option>
                                    </select>
                                </div>
                            </div>


                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="data-submit" data-form="form-data"><i class="fa fa-save mr-1"></i><span class="line"></span>Kaydet</button>
                <button class="btn btn-outline-dark" data-dismiss="modal"><i class="fa fa-close mr-1"></i><span class="line"></span>Kapat</button>
            </div>
        </div>
    </div>
</div>


