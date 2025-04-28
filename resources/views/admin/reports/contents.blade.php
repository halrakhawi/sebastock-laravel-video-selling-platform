@extends('layouts.admin')
@section('content')

   
<div class="Table-SubUser">
    <!-- Page Header-->
   
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder container-fluid">
      <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard',App()->getLocale())}}">{{__('Dashboard')}}</a></li>
        <li class="breadcrumb-item active">{{__('Reports')}}</li>
      </ul>
      </div>
      {{-- <div class="col-sm-12 col-md-6 col-lg-6 right">               
        <button class="backbtn" style="margin-top: 10px;"><i class="fas fa-arrow-down" style="color: #ffffff !important;"></i> Backup Data</button>
      </div> --}}
    </div>
  </div>

      <div class="">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">                  
              <div class="card-header d-flex align-items-center">
                <h3 class="h4">{{__('Reports')}}</h3>
              </div>                     
            </div>
          </div>                
        </div>
 <!--==========================Start div reports button==========================-->
 <div class="container-fluid">
 <div class="Report-btn">
  <a href="{{route('admin.sellerReport',App()->getLocale())}}"><button class="report1">{{__('Sellers')}}</button></a>
  <a href="{{route('admin.getbuyerReport',App()->getLocale())}}"><button  class="report1" >{{__('Buyers')}}</button></a>
  <a href="{{route('admin.contentReport',App()->getLocale())}}"><button class="reportactive">{{__('Contents')}}</button></a>
  <a href="{{route('admin.requestReport',App()->getLocale())}}"><button class="report1">{{__('Requests')}}</button></a>
   {{-- <a href=""><button class="report1">Payments</button></a> --}}
 </div>
</div>
   <!--==========================End div reports button==========================-->
 <!--==========================Start div reports chart==========================-->
<div class="container-fluid">
      <div class="row chart-div">
        <div class="col-sm-12 col-md-6 col-lg-6">                    
        <form action="{{route('admin.buyerReport',App()->getLocale())}}" method="post">
            @csrf
              {{-- <div class="date-div">
                  <div class="col-sm-12 col-md-6 col-lg-6">
                  </select><select name="month" class="option1">
                      <option class="option1">Month</option>
                      <option value="January">January</option>
                      <option value="Febuary">Febuary</option>
                      <option value="March">March</option>
                      <option value="April">April</option>
                      <option value="May">May</option>
                      <option value="June">June</option>
                      <option value="July">July</option>
                      <option value="August">August</option>
                      <option value="September">September</option>
                      <option value="October">October</option>
                      <option value="November">November</option>
                      <option value="December">December</option>
                    </select>
                  </div>
            
                  <div class="col-sm-12 col-md-6 col-lg-6">
                  </select>  <select name="year" class="option2" type="submit">
                  <option> Year </option>
                  <option value="2020">2024</option>
                  <option value="2020">2023</option>
                  <option value="2020">2022</option>
                  <option value="2020">2021</option>
                  <option value="2020">2020</option>
                  <option value="2019">2019</option>
                  <option value="2018">2018</option>
                  <option value="2017">2017</option>
                  <option value="2016">2016</option>
                  <option value="2015">2015</option>
                  <option value="2014">2014</option>
                  <option value="2013">2013</option>
                  <option value="2012">2012</option>
                  <option value="2011">2011</option>
                  <option value="2010">2010</option>
                  <option value="2009">2009</option>
                  <option value="2008">2008</option>
                  <option value="2007">2007</option>
                  <option value="2006">2006</option>
                  <option value="2005">2005</option>
                  <option value="2004">2004</option>
                  <option value="2003">2003</option>
                  <option value="2002">2002</option>
                  <option value="2001">2001</option>
                  <option value="2000">2000</option>
                  <option value="1999">1999</option>
                  <option value="1998">1998</option>
                  <option value="1997">1997</option>
                  <option value="1996">1996</option>
                  <option value="1995">1995</option>
                  <option value="1994">1994</option>
                  <option value="1993">1993</option>
                  <option value="1992">1992</option>
                  <option value="1991">1991</option>
                  <option value="1990">1990</option>
                  <option value="1989">1989</option>
                  <option value="1988">1988</option>
                  <option value="1987">1987</option>
                  <option value="1986">1986</option>
                  <option value="1985">1985</option>
                  <option value="1984">1984</option>
                  <option value="1983">1983</option>
                  <option value="1982">1982</option>
                  <option value="1981">1981</option>
                  <option value="1980">1980</option>
                  <option value="1979">1979</option>
                  <option value="1978">1978</option>
                  <option value="1977">1977</option>
                  <option value="1976">1976</option>
                  <option value="1975">1975</option>
                  <option value="1974">1974</option>
                  <option value="1973">1973</option>
                  <option value="1972">1972</option>
                  <option value="1971">1971</option>
                  <option value="1970">1970</option>
                  <option value="1969">1969</option>
                  <option value="1968">1968</option>
                  <option value="1967">1967</option>
                  <option value="1966">1966</option>
                  <option value="1965">1965</option>
                  <option value="1964">1964</option>
                  <option value="1963">1963</option>
                  <option value="1962">1962</option>
                  <option value="1961">1961</option>
                  <option value="1960">1960</option>
                  <option value="1959">1959</option>
                  <option value="1958">1958</option>
                  <option value="1957">1957</option>
                  <option value="1956">1956</option>
                  <option value="1955">1955</option>
                  <option value="1954">1954</option>
                  <option value="1953">1953</option>
                  <option value="1952">1952</option>
                  <option value="1951">1951</option>
                  <option value="1950">1950</option>
                  <option value="1949">1949</option>
                  <option value="1948">1948</option>
                  <option value="1947">1947</option>
                  <option value="1946">1946</option>
                  <option value="1945">1945</option>
                  <option value="1944">1944</option>
                  <option value="1943">1943</option>
                  <option value="1942">1942</option>
                  <option value="1941">1941</option>
                  <option value="1940">1940</option>
                  <option value="1939">1939</option>
                  <option value="1938">1938</option>
                  <option value="1937">1937</option>
                  <option value="1936">1936</option>
                  <option value="1935">1935</option>
                  <option value="1934">1934</option>
                  <option value="1933">1933</option>
                  <option value="1932">1932</option>
                  <option value="1931">1931</option>
                  <option value="1930">1930</option>
                  </select>
                  </div>

              </div> --}}
              <!--===============================================-->
              <div class="Members">
                <div class="members-name">
                  <h3 class="member-title">{{__('MEMBERS')}}</h3>
                </div>
                <div class="number">
                  <h3 class="M-num">{{count($user)}}</h4>
                </div>
              </div>
        </form>
      </div>

          <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="line-chart bg-white d-flex align-items-center justify-content-center has-shadow"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            {{$donutchart->container()}}              </div>
      </div>
  </div>



@endsection