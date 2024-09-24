
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms / Elements - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

              

              <div class="card md-6">


            <div class="card-body">
              <h5 class="card-title">Enter Your information</h5>
             

              <!-- Custom Styled Validation -->
              <form method="POST" action="{{route('regMember')}}" class="row g-3 needs-validation" novalidate>
                 @csrf
                <div class="col-md-6">
                  <label for="validationCustom01" class="form-label">First name</label>
                  <input type="text" name="fname" class="form-control" id="validationCustom01" value="" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="validationCustom02" class="form-label">Last name</label>
                  <input type="text" name="lname" class="form-control" id="validationCustom02" value="" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="validationCustom03" class="form-label">Email</label>
                  <input type="email"  name="email" class="form-control" id="validationCustom03" required>
                  <div class="invalid-feedback">
                    Please provide a valid email address.
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="validationCustomUsername" class="form-label">Phone</label>
                  <div class="input-group has-validation">
                    <input type="phone" name="phone" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                      Please enter phone number.
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="validationCustom04" class="form-label">Gender</label>
                  <select name="gender" class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Select gender</option>
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid state.
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="inputDate" class="form-label">Date</label>
                  <input type="date" name="date" class="form-control" min="1940-01-01">
                </div>
                <div class="col-md-6">
                  <label for="validationCustom04" class="form-label">Supervisor</label>
                  <select name="supervisor_id" class="form-select" id="validationCustom04" required>
                    <option selected disabled>Supervisor</option>
                     @foreach($users as $user)
                       @if($user->member)
                       
                    <option value="{{$user->member->id}}">{{$user->member->fname}} {{$user->member->lname}}</option>
                       @endif
                     @endforeach
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid state.
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="validationCustomUsername" class="form-label">Address</label>
                  <div class="input-group has-validation">
                    <input type="phone" name="address" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                      Please enter your address.
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                <fieldset class="row mb-6">
                  <legend class="col-form-label col-sm-1- pt-0">Marital Status</legend>
                  <div class="col-sm-8">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="marital_status" id="gridRadios1" value="Single" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Single
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="marital_status" id="gridRadios2" value="Married">
                      <label class="form-check-label" for="gridRadios2">
                        Married
                      </label>
                    </div>
                  </div>
                  </div>
                </fieldset>
               
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input"  type="checkbox" value="accepted" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                      Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                      You must agree before submitting.
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Register</button>
                </div>
              </form><!-- End Custom Styled Validation -->

            </div>
          </div>

            </div>
          </div>

        </div>
      </div>
    </section>
   </div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Ubungo ETMC</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

   <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js')"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js')"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')"></script>


</body>

</html>
