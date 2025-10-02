@extends('frontend.master')
@section('title', session()->get('language') == 'hindi' ? 'घर' : 'WishList')


@section('content')
   <div class="my-wishlist-page">
      <div class="row">
         <div class="col-md-12 my-wishlist">
            <div class="table-responsive">
               <table class="table">
                  <thead>
                     <tr>
                        <th colspan="4" class="heading-title">My Wishlist</th>
                     </tr>
                  </thead>
                  <tbody id="wishList">


                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <!-- /.row -->
   </div>
@endsection
