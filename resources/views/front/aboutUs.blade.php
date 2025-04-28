@extends('layouts.front')
@section('content')

  
         <section class="secnewvideos secmostwatch">
            <div class="container">
            <div class="newvideos">
                <div class="pathpages">
                    <a href="{{route('home',App()->getLocale())}}">
                    <label>{{__('Home')}} /</label>
                    </a>
                    <a href="{{route('aboutus',App()->getLocale())}}">
                    <label>{{__('About')}} </label>
                   </a>
                </div>
                <div class="titlehead">
                    <div><h3>{{__('About')}}</h3></div>
                </div>
                <div class="divbars divbarsstart">
                    <div class="barone bar"></div>
                    <div class="bartwo bar"></div>
                    <div class="barthree bar"></div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div style="background-color: #fafafa; border-radius: 8px; padding: 30px;">
                            <p style="color:#707070; line-height: 1.5; font-size: 15px;">
                               {{__('(SEBA) is one of the leading platforms in the field of selling and buying online videos, it’s a cloud based solution powers shops for big and small content owners which enable secure digital content sales and marketing as we provide integrated services for both buyers and sellers. We help sellers through providing them with electronic displays and control panels on the site that allow the seller to display his videos and market them to reach the largest possible number of buyers. On the other side we are giving the buyers all possible amenities to watch suggested videos related to their desire by dividing the site into different categories and displaying the rate of each seller and showing the best seller videos through our website. We also ensuring that all electronic payment methods are provided to make it easy for the buyers to buy videos and sellers to withdraw funds, in addition to providing technical support services continuously.')}}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="divimgaboutus" style="max-width: 700px;">
                            <img src="{{asset('/assets/front/img/about-us-concept-illustration_114360-669.jpg')}}" style="width: 100%; height: auto;" alt="">
                        </div>
                    </div>

                </div>
              
            </div>
            <!--start from here-->
        </div>
        </section>

@endsection