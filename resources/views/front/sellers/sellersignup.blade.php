@extends('layouts.front')

@section('content')
<form action="{{route('sellerstore',App()->getLocale())}}" method="post" enctype="multipart/form-data">
@csrf
<div class="divmainFormlogin">
    <h2 class="hlogin">{{__('Create Account')}}</h2>
    <div class="divbars">
        <div class="barone bar"></div>
        <div class="bartwo bar"></div>
        <div class="barthree bar"></div>
    </div>
    <p class="plogin">{{__('Enter Your Personal Information to Create Account')}}</p>
        <div class="formsignup">
               <div class="row" style="width:200px; margin-bottom:30px">
                <div class="col-md-6 col-12">
                 <div>
                 <input type="radio" name="radio" value="buyer" onchange="change(this)">
                 <label style="color:#707070">Buyer</label>
             </div>
                </div>
               <div class="col-md-6 col-12">
             <div>
                 <input type="radio" name="radio" value="seller" onchange="change(this)">
                 <label  style="color:#707070">Seller</label>
             </div> 
            </div>
               </div>
            <div>
                <div class="divformsignup">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="forminputsignup">
                                <div>
                                    <input type="text" name="name" placeholder="{{__('Name')}}" minlength="2" class="inputsignup">
                                </div>
                                <div>
                                    <input type="password" name="password" maxlength="8" placeholder="{{__('Password')}}" class="inputsignup">
                                </div>
                                <div>
                                    <input type="number" name="mobile" placeholder="{{__('Phone')}}" class="inputsignup">
                                </div>
                                <div>
                                    <input type="text" name="store_name" placeholder="{{__('Channel Name')}}" minlength="2" class="inputsignup">
                                </div>
                                <div>
                                    <input type="text" name="account" placeholder="{{__('PayPal Account')}}" minlength="2" class="inputsignup">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="forminputsignup">
                                <div>
                                    <input type="email" name="email" placeholder="{{__('Email')}}" class="inputsignup">
                                </div>
                                <div>
                                    <input type="password" maxlength="8" placeholder="{{__('Confirm Password')}}" class="inputsignup">
                                </div>
                                <div>
                                    <input type="text" name="address" placeholder="{{__('address')}}" minlength="2" class="inputsignup">
                                </div>
                                {{-- <div>
                                    <select name="address" class="js-example-placeholder-single js-states form-control">
                                        <option></option>
                                        <option>Palestine</option>
                                        <option>Egypt</option>
                                        <option>India</option>
                                        <option>USA</option>
                                      </select>
                                </div> --}}
                                {{-- <form action="/action_page.php"> --}}
                                   
                                    <div class="custom-file mb-3">
                                      <input type="file" name="picture" class="inputsignup custom-file-input" id="customFile" name="filename">
                                      <label class="custom-file-label" for="customFile">{{__('Choose Image')}}</label>
                                    </div>
                                    
                                   
                                  
                                  {{-- </form> --}}
                                {{-- <div>
                                    <input type="file" name="picture" class="inputsignup">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="divprivacy" style="border:1px solid #eee ;overflow-y:scroll; height: 100px; max-width: 430px; background-color: #fafafa; color: #707070; font-size: 14px; padding: 15px; margin-bottom: 10px;">
                                <h6 style="color: #AA1B21;">Our Privacy Policy</h6>
                                <p style="text-align: justify;">
                                - Privacy Policy is a legal statement that specifies what our site does
                    with the personal data collected from users, along with how the data is
                    processed and for what purposes.
                    - If you will be using our online website that means you agree to our
                    privacy policy statements.
                    - Protecting the personal data of our online site visitors and
                    customers is one of our top priorities as we seek to protect personal
                    data using appropriate technical and organizational measures based on
                    the type of personal data and applicable processing activity.
                    -We did not design our site to collect data about you from your
                    computer, but rather the data that you enter willingly will be
                    collected.
                    - When you register for an Account, we may ask for your contact
                    information, including items such as name, company name, address,
                    email address, telephone number, zip code for your region and also
                    your payment method information.
                    - We are committed to ensuring that your personal information is
                    protected from access to it by any party not authorized to do so, and
                    we provide all necessary procedures electronically to protect and
                    secure the information collected on our site.
                    - We use your personally identifiable information collected online as
                    a basis to provide you with the service you have requested and to
                    inform you of other offers that may interest you.
                    - If any change in your personal information such as (name, address
                    or phone number) occurs, you must update this information through
                    the "Profile" section of your account or by contacting the site's
                    customer service.
                    - Like any other website, Website Name uses ‘cookies'. These cookies
                    are used to store information including visitors' preferences, and the
                    pages on the website that the visitor accessed or visited. The 
                    information is used to optimize the users' experience by customizing
                    our web page content based on visitors' browser type and/or other
                    information.
                    - In order to apply to the continuous development and change in the
                    scope of laws related to the electronic field, we have the right to
                    modify the terms of the privacy policy at any time we deem
                    appropriate, and you will be notified in case of any modifications
                    having an effect.
                    - If you have other questions or concerns about these privacy policies,
                    please send us an email.
                            </p>
                            </div>
                            <div>
                                <input type="checkbox" name="checkbox" id="">
                                <label style="color: #707070; font-size: 14px;">I have read and accepted your <span style="color: #AA1B21;">privacy policy</span></label>
                            </div>
               <div class="divbtnandhaveaccount">
                <div class="formbtn">
                    <button class="btnsend btnformlogin">{{__('Sign Up')}}</button>
                </div>
                <div>
                    <p class="psignup">{{__('I have account?')}} <a href="{{route('sellerlogin',App()->getLocale())}}" target="_blank"><span class="spansignup">{{__('Login')}}</span></a></p>
                </div>
               </div>
            </div>
        </div>
  </div>
</form>
@endsection