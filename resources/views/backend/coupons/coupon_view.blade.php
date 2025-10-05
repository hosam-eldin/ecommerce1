@extends('admin.admin_master')
@section('title', 'Coupon View')
@section('admin')

   <section class="content">
      <div class="row">
         <div class="col-8">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">All Coupons</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="table-responsive">
                     <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                           <div class="col-sm-12 col-md-6">
                              <div class="dataTables_length" id="example1_length">
                                 <label>Show
                                    <select name="example1_length" aria-controls="example1"
                                       class="form-control form-control-sm">
                                       <option value="10">10</option>
                                       <option value="25">25</option>
                                       <option value="50">50</option>
                                       <option value="100">100</option>
                                    </select>
                                    entries</label>
                              </div>
                           </div>
                           <div class="col-sm-12 col-md-6">
                              <div id="example1_filter" class="dataTables_filter">
                                 <label>Search:<input type="search" class="form-control form-control-sm" placeholder=""
                                       aria-controls="example1" /></label>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12">
                              <table id="example1" class="table table-bordered table-striped">
                                 <thead>
                                    <tr>
                                       <td>Coupon Name</td>
                                       <td>Coupon Discount % </td>
                                       <td width="25%">
                                          Coupon Validate
                                       </td>
                                       <th>Actions</th>

                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($coupons as $item)
                                       <tr>
                                          <td> {{ $item->coupon_name }} </td>
                                          <td> {{ $item->coupon_discount }}% </td>
                                          <td width="25%">
                                             @if (Carbon\Carbon::parse($item->coupon_validity)->isFuture() || Carbon\Carbon::parse($item->coupon_validity)->isToday())
                                                <span class="badge badge-pill badge-success">Valid</span>
                                             @else
                                                <span class="badge badge-pill badge-danger">Invalid</span>
                                             @endif

                                          </td>
                                          <td width="25%">
                                             <a href="{{ route('coupon.edit', $item->id) }}" class="btn btn-info"><i
                                                   class="fa fa-edit"></i></a>
                                             <form action="{{ route('coupon.delete', $item->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button id="delete-{{ $item->id }}" type="submit"
                                                   class="btn btn-danger "><i class="fa fa-trash"></i></button>
                                             </form>
                                          </td>
                                       </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>

                     </div><!-- /.box-body -->
                  </div><!-- /.col-8 -->
               </div>
            </div>
         </div>
         <!---------------------------------- Add Coupon Page ------------------------------------------>
         <div class="col-4">
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Add Coupon</h3>
               </div><!-- /.box-header -->
               <div class="box-body">
                  <form method="post" action="{{ route('coupon.store') }}">
                     @csrf
                     <div class="form-group">
                        <label for="coupon_name">Coupon Name </label>
                        <input type="text" name="coupon_name" class="form-control" id="coupon_name"
                           placeholder="Enter Coupon Name ">
                     </div>
                     <div class="form-group">
                        <label for="coupon_discount">Coupon Discount % </label>
                        <input type="number" name="coupon_discount" class="form-control" id="coupon_discount"
                           placeholder="enter dicount num ">
                        @error('coupon_validity')
                           <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label for="coupon_validate"> Coupon Validatey </label>
                        <input type="date" name="coupon_validity" class="form-control"
                           min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                     </div>
                     <button type="submit" class="btn btn-primary">Add Coupon</button>
                  </form>
               </div><!-- /.box-body -->
            </div><!-- /.box -->

         </div><!-- /.col-4 -->
      </div><!-- /.row -->
   </section>





@endsection
