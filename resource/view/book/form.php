<div class="modal fade modal-right" id="right_modal" tabindex="-1" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
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
                                <label class="font-weight-bold" for="bookName">Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-asterisk text-danger" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="bookName" name="bookName" value="<?php if(isset($data["book"]->name)) { echo $data["book"]->name ; } else { ?> <?php } ?>" autocomplete="off" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="font-weight-bold" for="writeId">Book's Writer</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-asterisk text-danger" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="writeId" name="writerId" value="<?php if(isset($data["book"]->writer_id)) { echo $data["book"]->writer_id ; } else { ?>  <?php } ?>" autocomplete="off" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="font-weight-bold" for="publishingHouseIid">Publishing House</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-asterisk text-danger" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="publishingHouseId" name="publishingHouseId" value="<?php if(isset($data["book"]->publishing_house_id)) { echo $data["book"]->publishing_house_id ; } else { ?> <?php } ?>">
                                </div>
                            </div>
                            <div class="info" style="display: flex;">
                                <div class="col-md-6 mb-3">
                                    <label class="font-weight-bold" for="numberOfPage">Number Of Page</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-asterisk text-danger" aria-hidden="true"></i></span>
                                        </div>
                                        <input type="number" class="form-control" id="numberOfPage" name="numberOfPage" value="<?php if(isset($data["book"]->number_of_page)) { echo $data["book"]->number_of_page ; } else { ?> <?php } ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="font-weight-bold" for="releaseDate">Release Date</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-asterisk text-danger" aria-hidden="true"></i></span>
                                        </div>
                                        <input type="email" class="form-control" id="releaseDate" name="releaseDate" value="<?php if(isset($data["book"]->release_date)) { echo $data["book"]->release_date ; } else { ?> <?php } ?>" autocomplete="off" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="font-weight-bold" for="materialId">Material</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-asterisk text-danger" aria-hidden="true"></i></span>
                                    </div>
                                    <select class="form-control" id="materialId" name="materialId">
                                        <option selected value="<?php if(isset($data["book"]->material_id)) { echo $data["book"]->material_id; } else { ?> <?php } ?>">Select</option>
                                        <?php foreach ($data["genders"] as $gender): ?>
                                            <option value="<?php echo $gender->id ?>" <?php if(isset($data["user"]->gender_id) && $data["user"]->gender_id == $gender->id) { echo "selected"; } ?>><?php echo  $gender->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="font-weight-bold" for="categoryId">Category</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-asterisk text-danger" aria-hidden="true"></i></span>
                                    </div>
                                    <select class="form-control" id="categoryId" name="categoryId">
                                        <option selected value="<?php if(isset($data["book"]->category_id)) { echo $data["book"]->category_id; } else { ?> <?php } ?>">Select</option>
                                        <?php foreach ($data["book"] as $book): ?>
                                            <option value="<?php echo $book->category_id ?>" <?php if(isset($data["book"]->category_id) && $data["book"]->category_id == $book->category_id) { echo "selected"; } ?>><?php echo  $book->category_id ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="font-weight-bold" for="pic">Add Book Image</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="pic" id="pic" required>
                                            <label class="custom-file-label" for="pic">Add Image</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                        <!--    <div class="col-md-4 mt-3">
                                <div class="avatar-upload">
                                    <div class="validation-image mb-2" id="file-row">
                                        <label for="categoryImages_{{$language->language_code}}_file" class="font-weight-bold">@lang('admin/web/category/category.image')</label>
                                        <label for="categoryImages_{{$language->language_code}}_file" class="preview">
                                            <img id="upload_img_{{$language->language_code}}" src="{{isset($category->categoryImages) ? haveFile($category, "categoryImages", $language, "uploads/category") : asset('uploads/upload.jpeg')}}" alt="{{isset($category->categoryImages) ? imgAlt($category, "categoryImages", $language) : ""}}">
                                            <div class="avatar-edit">
                                                <input type="file" name="categoryImages[{{$language->language_code}}][file]" hidden id="categoryImages_{{$language->language_code}}_file" data-code="{{$language->language_code}}" onclick="previewUpload(this.id)">
                                                <label for="categoryImages_{{$language->language_code}}_file"></label>
                                            </div>
                                            <div class="avatar-delet" id="avatar_delete_{{$language->language_code}}">
                                                <label class="file-clear" id="file_clear_{{$language->language_code}}" data-code="{{$language->language_code}}" onclick="fileDelet(this.id)"></label>
                                            </div>
                                        </label>
                                    </div>
                                    <div id="image-list">
                                        <div class="validation-image mb-3">
                                            <label class="font-weight-bold" for="input-categoryImage{{$language->language_code}}_name">@lang('admin/web/category/category.image_name')</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="categoryImages_{{$language->language_code}}_name" name="categoryImages[{{$language->language_code}}][name]" value="{{(isset($category->categoryImages) && !empty($category->categoryImages)) ? ($category->categoryImages->where('language_code', $language->language_code)->first()->name ?? "") : ""}}" autocomplete="off" placeholder="@lang('admin/web/category/category.image_name')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="request-status">
                                        <label class="font-weight-bold" for="status">Durum</label>
                                        <div class="input-group">
                                            <select class="form-control" id="status" name="status">
                                                <option selected value="">Seçiniz</option>
                                                <option value="1">Aktif</option>
                                                <option value="0">Pasif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="hr mb-2"></div>
                                    <div class="avatar-add">
                                        <button class="btn btn-outline-dark btn-square w-100 text-center justify-content-center"><i class="fa fa-plus"></i><span class="mr-2">@lang('general.button_add')</span></button>
                                    </div>
                                </div>
                            </div>-->
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

