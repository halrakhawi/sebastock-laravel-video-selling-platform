<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SEBA</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"-->
    <link rel="stylesheet" href="{{asset('/assets/seller/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/seller/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{asset('/assets/seller/css/fontastic.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    @if (App()->getLocale()=='ar')
    <link rel="stylesheet" href="{{asset('/assets/seller/css/style.default.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{asset('/assets/seller/css/styleAR.css') }}" >
    <link rel="stylesheet" href="{{asset('/assets/seller/css/SellerArabic.css') }}" >
    @else
    <link rel="stylesheet" href="{{asset('/assets/seller/css/style.default.css') }}" id="theme-stylesheet">
    @endif
    <link rel="stylesheet" href="{{asset('/assets/seller/css/custom.css') }}">
    <link rel="shortcut icon" href="{{asset('/assets/seller/img/favicon.ico') }}">
    <link rel="stylesheet" href="{{asset('/assets/seller/css/all.css') }}">
    <link rel="stylesheet" href="{{asset('/assets/seller/css/media.css') }}">
 
  </head>
  <body oncontextmenu="return true">
    <div class="page">
      <!-- Main Navbar-->
      <header>
   
      </header>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
           <!-- Sidebar Navidation Menus-->
           @include('front.sellers.includes.sidebar')
         @include('front.sellers.includes.header')
         
        </nav>
        </nav>
       
         
         @yield('content')
         
         
          <!-- Page Footer-->
         @include('front.sellers.includes.footer')
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <!--script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script-->
    <script src="{{asset('/assets/seller/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/assets/seller/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/assets/seller/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/assets/seller/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/assets/seller/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/assets/seller/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/assets/seller/js/charts-home.js')}}"></script>
    <script src="{{asset('/assets/seller/js/function.js')}}"></script>
    <!-- Main File-->
    <script src="{{asset('/assets/seller/js/front.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

    <script src="{{asset('/main.js')}}"></script>
    <script src="{{ LarapexChart::cdn() }}"></script>
     {{-- {{ $piechart->script() }} --}}
    @if (url()->current()==URL::to('/').'/sellerhome/'.App()->getLocale())
    {{ $barchart->script() }}
    {{ $linechart->script() }}
    {{ $balancelinechart->script() }}
    @endif

    {{-- {{ $areachart->script() }} --}}
    
    <script type="text/javascript">
    console.log('progresssss');
       $(function () {
            $(document).ready(function () {
                $('#addvidio').ajaxForm({
                    beforeSend: function () {
                        var percentage = '0';
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                        var percentage = percentComplete;
                        $('.progress .progress-bar').css("width", percentage+'%', function() {
                          return $(this).attr("aria-valuenow", percentage) + "%";
                        })
                    },
                    complete: function (xhr) {
                        alert('Your Video uploaded successfully..Please Wait until Admin accept your video!');
                        window.location.href="";
                        console.log('File has uploaded');
                    }
                });
            });
        });
</script>
    <script>
      // Get the modal
      var modal = document.getElementById("myModal");
      
      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");
      
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];
      
      // When the user clicks the button, open the modal 
      btn.onclick = function() {
        modal.style.display = "block";
      }
      
      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
      }
      
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
      
//      const progress = document.getElementById("progress");
// function progressLoop() {
//   setInterval(function () {
//     progress.value = 
// Math.round((video.currentTime / video.duration) * 100);
//   });
}
  
//progressLoop();
      </script>
      <script>
        document.getElementById('chkall').onclick = function() {
    var checkboxes = document.getElementsByName('checked[]');
    for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
    }
}

      </script>
      


</script>
    
 <script>
     $('#toggle-btn').on('click', function (e) {
        console.log('toggle');
        e.preventDefault();
        $(this).toggleClass('active');

        $('.side-navbar').toggleClass('shrinked');
        $('.content-inner').toggleClass('active');
        $(document).trigger('sidebarChanged');

        if ($(window).outerWidth() > 1183) {
            if ($('#toggle-btn').hasClass('active')) {
                $('.navbar-header .brand-small').hide();
                $('.navbar-header .brand-big').show();
            } else {
                $('.navbar-header .brand-small').show();
                $('.navbar-header .brand-big').hide();
            }
        }

        if ($(window).outerWidth() < 1183) {
            $('.navbar-header .brand-small').show();
        }
    });
    $(document).ready(function () {
        var url = window.location;
         $(".list-unstyled li.active").removeClass("active");
    // Will only work if string in href matches with location
        $('.list-unstyled li a[href="' + url + '"]').parent().addClass('active');

    // Will also work for relative and absolute hrefs
        $('.list-unstyled li a').filter(function () {
            return this.href == url;
        }).parent().addClass('active').parent().parent().addClass('active');
    });
   
      </script>
     


  </body>
</html>