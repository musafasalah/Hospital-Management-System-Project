<!DOCTYPE html>
<html lang="en">
  <head>
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

            <div align="center" style="padding-top:100px;">

                <table>

                    <tr style="background-color: black; ">
                        <th style="padding:20px;">Customer Name</th>
                        <th style="padding:20px;">Email</th>
                        <th style="padding:20px;">phone</th>
                        <th style="padding:20px;">Doctor Name</th>
                        <th style="padding:20px;">Date</th>
                        <th style="padding:20px;">Message</th>
                        <th style="padding:20px;">Status</th>
                        <th style="padding:20px;">Approved</th>
                        <th style="padding:20px;">Canceled</th>
                        <th style="padding:20px;">Send Email</th>

                    </tr>

                    @foreach ($data as $appoint )

                    <tr align="center" style="background-color:skyblue;">
                        <td style="padding: 10px;">{{$appoint->name}}</td>
                        <td style="padding: 10px;">{{$appoint->email}}</td>
                        <td style="padding: 10px;">{{$appoint->phone}}</td>
                        <td style="padding: 10px;">{{$appoint->doctor}}</td>
                        <td style="padding: 10px;">{{$appoint->date}}</td>
                        <td style="padding: 10px;">{{$appoint->message}}</td>
                        <td style="padding: 10px;">{{$appoint->status}}</td>
                        <td style="padding: 10px;"><a class="btn btn-success" href="{{url('approved',$appoint->id)}}">Approved</a></td>
                        <td style="padding: 10px;"><a class="btn btn-danger" href="{{url('canceled',$appoint->id)}}">Canceled</a></td>
                        <td style="padding: 10px;"><a class="btn btn-primary" href="{{url('emailview',$appoint->id)}}">Send Email</a></td>
                    </tr>

                    @endforeach
                </table>
            </div>

        </div>
        <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script');
  </body>
</html>

