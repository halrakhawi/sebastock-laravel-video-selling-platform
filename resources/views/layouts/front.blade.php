<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEBA</title>
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/font-awesome.min.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @if (App()->getLocale()=='ar')
    <link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/styleArabic.css')}}">
    @else
    <link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">
    @endif
    <link rel="stylesheet" href="{{asset('assets/front/css/mediaBuyer.css')}}">
    <link rel="icon" sizes="16*16" href="{{asset('assets/front/img/logo.png')}}">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    @yield('style')
</head>
<body oncontextmenu="return true">
    <main class="mainflex">
      <div class="alert alert-warning alert-dismissible fade show alertcart" role="alert">
        <strong>{{__('Added successfully')}}!</strong>{{__('You have a new video in the cart')}}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="alert alert-warning alert-dismissible fade show alertadd" role="alert">
                <strong>{{__('Added successfully')}}!</strong>{{__('You have a new video on your favorite list')}}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
          <div class="alert alert-warning alert-dismissible fade show alertaddwatch" role="alert">
            <strong>{{__('Added successfully')}}!</strong>{{__('You have a new video on the watch list later')}}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!--start header-->
         
          @if(Auth::guard('admin')->check())
            @include('front.includes.headerAuth')
          @elseif(Auth::guard('user')->check())
            @include('front.includes.headerAuth')
            @elseif(Auth::guard('seller')->check())
            @include('front.includes.headerAuth')
            @else
            @include('front.includes.header')
          @endif
         
         
        
           <!--End categories-->
        <!--End header-->
        <!--start section Body-->
        @yield('content')

         <!--End section Body-->
          <!--Start Footer-->
       @include('front.includes.footer')
         <!--End Footer-->
    </main>
    <script>
       function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
      }
      
      function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
      }
      function openNavuser() {
      document.getElementById("mySidebaruser").style.width = "250px";
      document.getElementById("mainuser").style.marginLeft = "250px";
    }
    
    function closeNavuser() {
      document.getElementById("mySidebaruser").style.width = "0";
      document.getElementById("mainuser").style.marginLeft= "0";
    }
    $( window ).on( "load", function(){
    $("#divseller").hide();
    });
    
    function change(x) {
        if(x.value=='buyer'){
            $("#divbuyer").show();
            $("#divseller").hide();
            x.value=='buyer'
            //window.location.href = "{{URL::to('/signup/en')}}"
        }

      else if(x.value=='seller'){
          $("#divbuyer").hide();
            $("#divseller").show();
          x.value=='seller'
         // window.location.href = "{{URL::to('/sellersignup/en')}}"
      }
      console.log(x.value);
    }
    </script>


    <script src="{{asset('assets/front/js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('assets/front/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/front/js/custom.js')}}"></script>
    <script src="{{asset('assets/front/js/morefunctoins.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="{{asset('/main.js')}}"></script>
    <!---- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>-->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}-->
    
       <!-- start video controls script  -->
     
    
     <!-- end video controls script  -->
    <script>
      // Get the modal
      var modal = document.getElementById("myModal");
      
      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");
      
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("closemsg")[0];
      
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

     
// Add the following code if you want the name of the file appear on select
// $(".custom-file-input").on("change", function() {
//   var fileName = $(this).val().split("\\").pop();
//   $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
// });


function play_vid(x)
{
  var video=document.getElementById(x);
  video.play(x);
  
}

function pause_vid(x)
{
  document.getElementById(x).pause(x);
}

var chooseimage = document.getElementById("customFile10");
chooseimage.onclick=function(){
    //var name1 = document.getElementById("customFile10").files[0].name;
    console.log('name1');
}

// $('#customFile10').on('change', function() {
    
//     let name = document.getElementById("customFile10").files[0].name; // this is in bytes
//     //$('[id$=label]').text(name);
//     console.log(name);
// });


      </script>

<script>
function hover(x)
{
  var video=document.getElementById(x);
  console.log(video);
video.muted = true;
 video.play();
 
}
function mouselet(x)
{
  var video=document.getElementById(x);
  console.log(video);
    
 video.pause();
 video.currentTime=0;
 video.load();
 
 
}
</script>
<script>
function getFileData(myFile){
var input = myFile.files[0];  
document.getElementById("sellerpic").textContent = input.name;
console.log(document.getElementById("sellerpic").textContent);
}
function getFileData1(myFile){
var input = myFile.files[0];  
document.getElementById("buyerpic").textContent = input.name;
console.log(document.getElementById("buyerpic").textContent);
}
</script>
<script>
    function ads(x) {
    var vid = document.getElementById("x"),
        adSrc = "url('Seba/storage/profile/1616243200.jpg')",
        src;

    var adEnded = function () {
        vid.removeEventListener("ended", adEnded, false);
        vid.src = src;
        vid.load();
        vid.play();
    };

    return {
        init: function () {
            src = vid.src;
            vid.src = adSrc;
            vid.load();
            vid.addEventListener("ended", adEnded, false);
        }
    };
}();
</script>

    @yield('script')

    <script>
      function loadMoreData(page){
        console.log(page);
        $.ajax({
          url:'?page='+page,
          type:'get',
          beforeSend:function(){
            $(".ajax-load").show();
          }
        })
        .done(function(newvideosData){
          if(newvideosData.html==" "){
            $(".ajax-load").html("No More Videos Found");
            return;
          }
          $(".ajax-load").hide();
          $("#post-data").append(newvideosData.html);
        })
        .fail(function(jqXHR,ajaxOptions,thrownError){
          alert("Server not responding");
        });
      }
      var page=1;
      $(window).scroll(function(){
        if($(window).scrollTop() + $(window).height() >= $(document).height()){
          page++;
          loadMoreData(page);
        }
       
      })
    </script>
    
</body>
</html>