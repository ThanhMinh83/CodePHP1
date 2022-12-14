@extends('backend.master_layout')
@section('title', 'Dashboard')
@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div class="mb-3">
                        @can('category-post-add')
                            <a href="{{ URL::to('/admin/category-post/create-category-post') }}" class="btn btn-primary">Thêm danh mục bài viết</a>
                        @endcan
                        </div>
                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="datatable_length"><label>Đang show <select
                                                name="datatable_length" aria-controls="datatable"
                                                class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> mục</label></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="datatable_filter" class="dataTables_filter"><label>Tìm kiếm:<input
                                                type="search" class="form-control form-control-sm" placeholder=""
                                                aria-controls="datatable"></label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable"
                                        class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed"
                                        style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                        aria-describedby="datatable_info">
                                        <thead class="thead-light .background-color">
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label=": activate to sort column descending"><input type="checkbox"
                                                        name="" id="master"></th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Tên loại: activate to sort column ascending">Tên loại</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Trạng thái: activate to sort column ascending">Trạng thái
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable"
                                                    rowspan="1" style="width:250px " colspan="1"
                                                    aria-label="Hành động:  activate to sort column ascending">Hành động
                                                </th>
                                            </tr>
                                        </thead>
                                        @foreach ($category as $key => $cate)
                                            <tbody id="table_category">
                                                <tr id="category_2" role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1"><input type="checkbox"
                                                            class="sub_chk" name="data_ids" data-id="'.$item->id.'">
                                                    </td>
                                                    <td>{{ $cate->category_post_name }}</td>

                                                    {{-- ================active========================= --}}
                                                    <td class="text">
                                                        <?php if($cate->category_status == 0){ ?>
                                                        <a class=" btn btn-light "
                                                            onclick="return confirm('bạn có muốn kích hoạt Danh mục')"
                                                            href="{{ URL::to('/admin/active-category/' . $cate->category_post_id) }}">none</a>
                                                        <?php }elseif($cate->category_post_status == 1){ ?>
                                                        <a class=" btn btn-success "
                                                            onclick="return confirm('bạn có muốn kích hoạt Danh mục')"
                                                            href="{{ URL::to('/admin/unactive-category/' . $cate->category_post_id) }}">kích
                                                            hoạt</a>
                                                        <?php } ?>
                                                    </td>
                                                    {{-- ================active========================= --}}
                                                    <td>
                                                        {{-- <button class="btn btn-success"><i class="fa fa-edit"></i>Chỉnh sửa</button> --}}
                                                        @can('category-post-edit')
                                                        <a class="btn btn-success"
                                                            onclick="return confirm('bạn có muốn Sửa danh mục này')"
                                                            href="{{ URL::to('/admin/category-post/edit-category-post/' . $cate->category_post_id) }}">
                                                            <i class="fa fa-edit">
                                                            </i> Chỉnh Sửa</a>
                                                        @endcan
                                                        @can('category-post-delete')
                                                        <a class="btn btn-danger"
                                                            onclick="return confirm('bạn có muốn xóa danh mục này')"
                                                            href="{{ URL::to('/admin/category-post/destroy-category-post/' . $cate->category_post_id) }}">
                                                            <i class="fa fa-trash">
                                                            </i> Xóa</a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Đang
                                        show 1 → 8 → 8 mục</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled" id="datatable_previous">
                                                <a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0"
                                                    class="page-link">Trước</a></li>
                                            <li class="paginate_button page-item active"><a href="#"
                                                    aria-controls="datatable" data-dt-idx="1" tabindex="0"
                                                    class="page-link">1</a></li>
                                            <li class="paginate_button page-item next disabled" id="datatable_next"><a
                                                    href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0"
                                                    class="page-link">Kế tiếp</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container-fluid -->
    </div>
@endsection
