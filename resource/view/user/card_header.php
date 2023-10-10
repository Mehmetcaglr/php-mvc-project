<div class="card-header">
    <div class="card-title d-md-flex align-items-start justify-content-between">
        <div class="download-desktop" style="display: none">
            <a href="#" class="btn btn-outline-dark btn-square"><i class="fa fa-file-excel-o mr-1"></i><span class="line"></span>Excel</a>
            <a href="" class="btn btn-outline-dark btn-square"><i class="fa fa-file-pdf-o mr-1"></i><span class="line"></span>Pdf</a>
            <a href="#" class="btn btn-outline-dark btn-square"><i class="fa fa-file-word-o mr-1"></i><span class="line"></span>Word</a>
            <a href="javascript:window.print()"  class="btn btn-outline-dark btn-square"><i class="fa fa-print mr-1"></i><span class="line"></span>Print</a>
        </div>
        <div class="download-mobil">
            <div class="btn-group">
                <button class="btn btn-outline-dark btn-square" type="button">
                    <i class="fa fa-download mr-1"></i>
                </button>
                <button type="button" class="btn btn-outline-dark btn-square dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                <div class="dropdown-menu dropdown-menu-right m-r-0-minus w-100">
                    <a href="#" class="dropdown-item"><i class="fa fa-file-excel-o mr-1"></i><span class="line"></span>Excel</a>
                    <div class="dropdown-divider"></div>
                    <a href="" class="dropdown-item"><i class="fa fa-file-pdf-o mr-1"></i><span class="line"></span>Pdf</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="fa fa-file-word-o mr-1"></i><span class="line"></span>Word</a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:window.print()" class="dropdown-item"><i class="fa fa-print mr-1"></i><span class="line"></span>Print</a>
                    <div class="dropdown-divider"></div>
                </div>
            </div>
        </div>
        <div>
            <button class="btn btn-outline-danger btn-square d-none" data-checkbox="select-all" data-action="@if(request()->has('onlytrash')){{route('admin.web.category.forceDeleteAll')}}@else{{route('admin.web.category.onlyTrashAll')}}@endif"><i class="fa fa-trash mr-1"></i><span class="line"></span>Delete All</button>
            <button class="btn btn-outline-dark btn-square d-none" data-checkbox="select-all" data-action="{{route('admin.web.category.restoreAll')}}"><i class="ti-back-left font-weight-bold text-dark mr-1"></i><span class="line"></span>@lang('general.button_back')</button>
            <div class="btn-group">
                <button class="btn btn-outline-dark btn-square" type="button">
                    <i class="fa fa-list mr-1"></i><span class="line"></span>List
                </button>
                <button type="button" class="btn btn-outline-dark btn-square dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                <div class="dropdown-menu dropdown-menu-right m-r-0-minus w-100">
                    <a href="<?php echo "user"; ?>" class="dropdown-item"><i class="fa fa-list-ul mr-2"></i>Tümünü Listele</a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo  "user?status=1"; ?>" class="dropdown-item"><i class="fa fa-plus mr-2"></i>Aktifleri Listele</a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo "user?status=0"; ?>" class="dropdown-item"><i class="fa fa-minus mr-2"></i>Pasifleri Listele</a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo "user?sort=asc"; ?>" class="dropdown-item"><i class="fa fa-sort-alpha-asc mr-2"></i>A-Z Listele</a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo "user?sort=desc"; ?>" class="dropdown-item"><i class="fa fa-sort-alpha-desc mr-2"></i>Z-A Listele</a>
                </div>
            </div>
            <button class="btn btn-outline-dark btn-square" type="button" data-toggle="collapse" data-target="#filter" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-filter mr-1"></i><span class="line"></span></button>
        </div>
    </div>
</div>

