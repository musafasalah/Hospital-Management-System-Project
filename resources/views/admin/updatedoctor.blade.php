<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">

    <style type="text/css">

        label{
            display: inline-block;

            width: 200px;
            }
        </style>
    <!-- Required meta tags -->
  @include('admin.css');
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->

     @include('admin.sidebar');
      <!-- partial -->

     @include('admin.navbar');
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">

            <div class="container" align="center" style="padding-top:50px;">

                @if (session()->has('message'))

                <div class="alert alert-success">

                    {{session()->get('message')}}
                </div>

                @endif


                <form action="{{url('editdoctor',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div style="padding: 15px">
                        <label for="">Doctor Name:</label>
                        <input value="{{$data->name}}" type="text" name="name" style="color: black">
                    </div>

                    <div style="padding: 15px">
                        <label for="">Phone:</label>
                        <input value="{{$data->phone}}" type="number" name="phone" placeholder="write the name" style="color: black" required="">
                    </div>

                    <div style="padding: 15px">
                        <label for="">Specialty:</label>
                        <select value="{{$data->Specialty}}" name="Specialty" style="color: black; width:200px;">
                            <option>--select--</option>
                            <option value="skin">skin</option>
                            <option value="heart">heart</option>
                            <option value="eye">eye</option>
                            <option value="nose">nose</option>
                        </select>
                    </div>

                    <div style="padding: 15px">
                        <label for="">Room number:</label>
                        <input value="{{$data->room}}" type="text" name="room" style="color: black">
                    </div>

                    <div style="padding: 15px">
                        <label for="">OldImage:</label>
                        <img src="{{asset("storage/$data->image")}}" height="100" width="100" alt="">
                    </div>

                    <div style="padding: 15px">
                        <label for="">Change Image:</label>
                        <input type="file" name="file" >
                    </div>

                    <div style="padding: 15px">
                        <input type="submit" name="" value="update" class="btn btn-primary">
                    </div>
                </form>



            </div>

        </div>
        <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script');
  </body>
</html>
