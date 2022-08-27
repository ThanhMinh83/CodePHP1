@extends('backend.master_layout')
@section('title', 'Dashboard')
@section('content')
<div class="content">
  <!-- Start Content-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card-box">

          <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <h4 class="header-title mb-4">đơn hàng</h4>
            <div class="row">
              <div class="col-sm-12">
                <table id="datatable"
                       class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed"
                       style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                       aria-describedby="datatable_info">
                  <thead class="thead-light .background-color">
                    <tr role="row">
                      <th><input type="checkbox"></th>
                      <th>Mã đơn hàng</th>
                      <th>tình trạng đơn hàng</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>

                  <tbody id="table_category">
                    <?php
                       $i = 1;
                    ?>
                    @foreach ($order as $value )
                    <tr id="category_2" role="row" class="odd">
                      <td>{{ $i++ }}</td>
                      <td>{{ $value->order_code }}</td>

                      @if ($value->order_status == 1)
                      <td>đang xử lý</td>
                      @elseif($value->order_status == 2)
                      <td>đã xử lý</td>
                      @elseif($value->order_status == 3)
                      <td>đã nhận hàng</td>
                      @else
                      <td>Đơn hàng đã hủy</td>
                      @endif

                      <td>

                        <a class="btn btn-success"
                           href="{{ URL::to('/admin/order/view-order/' .$value->order_code  ) }}">
                          <i class="fa fa-eye"> </i>
                          </i> Xem đơn hàng</a>

                      </td>
                    </tr>
                    @endforeach
                  </tbody>

                </table>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div> <!-- end row -->
  </div> <!-- end container-fluid -->
</div>
@endsection