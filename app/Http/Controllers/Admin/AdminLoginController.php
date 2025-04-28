<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\Vedio;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Offer;
use App\Models\Message;
use App\Models\UserDownloads;
use App\Models\VideoRequested;
use App\Models\Seller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\AdminRequest;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\App;
use App\Notifications\Blance100;


use DB;
use URL;
use File;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
//use Stichoza\GoogleTranslate\GoogleTranslate;

class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        //$tr= new GoogleTranslate($lang); // Translates into English
        $admins=Admin::select()->paginate(PAGE_COUNT);
        return view('admin.adminUsers.index',compact(['admins']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        return view('admin.adminUsers.create');
       
    }
    public function store(AdminRequest $request,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
              try {
            $filePath = "";
            if ($request->has('picture')) {
            $fileext=$request->file('picture')->getClientOriginalExtension();
            $filename=time().'.'.$fileext;
            $path = $request->file('picture')->move('/home/lnbeysmy/public_html/sebastock/Seba/storage/profile/', $filename);
            
            }
 
            Admin::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'picture' => $filename,
                'password'=>bcrypt($request['password'])
            ]);
           
              return redirect()->route('admin.admins',get_default_lang())->with(['error' => 'تم حفظ اللغة بنجاح']);
          } catch (Exception $ex) {
              return redirect()->route('admin.admins')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
          }
 
    }
    public function login(LoginRequest $request){
        //make validation
        // session()->put('locale', $lang);
        // APP::setLocale($lang);
        $remember_me = $request->has('remember_me') ? true : false;
        
        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")])) {
            //check offer time 
           $offers=Offer::all();
           foreach ($offers as $offer) {
               if($offer->enddate <= Carbon::now()->toDateTimeString())
               $offer->delete();
           }
           //check payments
           $sellers=Seller::all();
           foreach($sellers as $seller){
            $payments=Payment::where('state','on hold')->where('seller_id',$seller->seller_id)->get();
            if($seller->balance >= 100){
                foreach ($payments as $payment) {
                    if(now()->diffInDays($payment->created_at) >=14){
                    $payment->state='proceed';
                    $payment->save();
                    
                }
                    
                }
                
               
               
            }
           }
          
            // notify()->success('تم الدخول بنجاح  ');
           return redirect()->route('admin.dashboard',App()->getLocale());
            //return redirect() -> route('admin.dashboard');
        }
       // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
       //return 'هناك خطا بالبيانات';
        return redirect()->back()->withErrors(['error' => 'Username error or Password error']);
       
      
    }

    public function getlogin(){
        // session()->put('locale', $lang);
        // APP::setLocale($lang);
        return view('admin.login');
    }


    public function profile($id,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $admin=Admin::find($id);
        return view('admin.adminUsers.profile',compact('admin'));

    }

    public function update(Request $request,$id,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $admin=Admin::find($id);
        $filePath = "";
            if ($request->has('picture')) {
            $fileext=$request->file('picture')->getClientOriginalExtension();
            $filename=time().'.'.$fileext;
            $path = $request->file('picture')->move('/home/lnbeysmy/public_html/sebastock/Seba/storage/profile/', $filename);
            }
            else
            $filename=$admin->picture;
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->picture=$filename;
        $admin->update();

        return view('admin.adminUsers.profile',compact('admin'));

    }

    //Reports

    public function getbuyerReport($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        // dd(array_values(\App\Models\User::where('accept_reject_request',1)->inRandomOrder()->get('id')->toArray()));
        $user=User::all();
        $linechart = (new LarapexChart)->lineChart()
        ->setTitle('Buyers')
        ->addLine('Active users', \App\Models\User::query('select * from users where accept_reject_request=1')->inRandomOrder()->limit(6)->pluck('id')->toArray())
        ->addLine('Inactive users', \App\Models\User::query('select * from users where accept_reject_request=0')->inRandomOrder()->limit(6)->pluck('id')->toArray())
        ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'])
        ->setColors(['#ffc63b', '#ff6384']);
        return view('admin.reports.buyers',compact('user','linechart'));
    }

    public function getsellerReport($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $user=Seller::all();
        $barchart = (new LarapexChart)->barChart()
        ->setTitle('Sellers')
        ->addData('Active sellers', \App\Models\Seller::query('select * from users where accept_reject_request=1')->inRandomOrder()->limit(6)->pluck('seller_id')->toArray())
        ->addData('Inactive sellers', \App\Models\Seller::query('select * from users where accept_reject_request=0')->inRandomOrder()->limit(6)->pluck('seller_id')->toArray())
        ->setLabels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']); 


        return view('admin.reports.sellers',compact('user','barchart'));
    }

    public function getcontentReport($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $user=Vedio::all();
        $donutchart = (new LarapexChart)->donutChart()
        ->setTitle('Videos')
        ->addData( \App\Models\Vedio::query('select count(*) from vedios order by created_at desc')->inRandomOrder()->limit(2)->pluck('id')->toArray())
        ->addData( \App\Models\Vedio::query('select count(*) from vedios order by views desc')->inRandomOrder()->limit(2)->pluck('seller_id')->toArray())
        ->setLabels(['New Videos','Most Watch']); 
        return view('admin.reports.contents',compact('user','donutchart'));
    }

    public function getrequestReport($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $user=VideoRequested::all();
        $areachart = (new LarapexChart)->areaChart()
    ->setTitle('Requests')
    ->addData('Requests',\App\Models\VideoRequested::query('select count(*) from video_requests order by created_at desc')->inRandomOrder()->limit(6)->pluck('id')->toArray())
    ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);

        return view('admin.reports.requests',compact('user','areachart'));
    }

    public function buyerReport(Request $request,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $user = User::whereYear('created_at', '=', $request->year)
              ->whereMonth('created_at', '=', $request->month)
              ->get();

        return view('admin.reports.buyers',compact('user'));
    }
    public function backup($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        return view('admin.backup.backup');
    }

    public function backup_database()
    {
        $mysqlHostName      = env('DB_HOST');
        $mysqlUserName      = env('DB_USERNAME');
        $mysqlPassword      = env('DB_PASSWORD'); 
        $DbName             = env('DB_DATABASE'); 
        $backup_name        = "backup.sql";
        $tables             = array("users", "admins ", "categories", "comments", "offers","orders","order_videos","password_reset","rejected_videos","sellers","subcategory","user_downloads","vedios","video_accepteds","video_requests","watch_laters","failed_jobs","favorites","messages","migrations","notifications"); //here your tables...
    
        $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword",array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $get_all_table_query = "SHOW TABLES";
        $statement = $connect->prepare($get_all_table_query);
        $statement->execute();
        $result = $statement->fetchAll();
    
        $output = '';
        foreach($tables as $table)
        {
            $show_table_query = "SHOW CREATE TABLE " . $table . "";
            $statement = $connect->prepare($show_table_query);
            $statement->execute();
            $show_table_result = $statement->fetchAll();
    
            foreach($show_table_result as $show_table_row)
            {
                $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
            }
            $select_query = "SELECT * FROM " . $table . "";
            $statement = $connect->prepare($select_query);
            $statement->execute();
            $total_row = $statement->rowCount();
    
            for($count=0; $count<$total_row; $count++)
            {
                $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
                $table_column_array = array_keys($single_result);
                $table_value_array = array_values($single_result);
                $output .= "\nINSERT INTO $table (";
                $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
                $output .= "'" . implode("','", $table_value_array) . "');\n";
            }
        }
        $file_name = 'database_backup_on_' . date('y-m-d') . '.sql';
        $file_handle = fopen($file_name, 'w+');
        fwrite($file_handle, $output);

        fclose($file_handle);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_name));
        ob_clean();
        flush();
        readfile($file_name);
        unlink($file_name); 

    }

    public function backupimport($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        return view('admin.backup.backup-import');
        // dd($request->db);
        // DB::unprepared(file_get_contents($request->db));
    }

    public function postbackupimport(Request $request){
        ini_set('max_execution_time', 300);
        ini_set('allow-url-fopen', 'on');
        // dd(base_path($request->db));
       return  DB::unprepared(File::get(url()->to('/') . './database_backup_on_21-05-20.sql'));
    //    return  DB::unprepared(file_get_contents(public_path('database_backup_on_21-05-20.sql')));
    }


    public function payments($lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
            $cancelpayments=Payment::where('state','canceled')->get();
            $proceedpayments=Payment::where('state','proceed')->get();
            $holdpayments=Payment::where('state','on hold')->get();
        return view('admin.payment',compact('cancelpayments','proceedpayments','holdpayments'));
    }

    public function canceledpayments(Request $request,$id,$payID){
        $transferamount=$request->input('transferamount');
        $seller=Seller::where('seller_id',$id)->first();
        $seller->balance=$seller->balance-$transferamount;
        $payment=Payment::where('seller_id',$id)->where('id',$payID)->first();
        $payment->state='canceled';
        $payment->update();
        $seller->update();
        return redirect()->route('admin.payments',App()->getLocale());

    }

    public function paymentdetails($id,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
        $payment=Payment::where('id',$id)->first();
        return view('admin.paymentdetails',compact('payment'));

    }

    public function search(Request $request,$lang){
        session()->put('locale', $lang);
        APP::setLocale($lang);
    //    dd(URL::to('/').'/admin/sellers');
        $q=$request->q;
        if(url()->previous()==URL::to('/').'/admin/sellers/'.$lang){
            $filterdSellers=DB::table('sellers')
             ->where('sellers.seller_name','like','%'.$q.'%')
             ->select('sellers.*')
            ->get();
             // Vedio::where('name','like','%'.$q.'%')
     
             return view('admin.getsellersearched',compact('filterdSellers'));
             // dd($request->q);
         }
         if(url()->previous()==URL::to('/').'/admin/buyers/'.$lang){
            $userss=User::where('accept_reject_request',1)->where('name','like','%'.$q.'%')->get();    
             return view('admin.sortbuyers',compact('userss'));
         }

         if(url()->previous()==URL::to('/').'/admin/contents/'.$lang|| url()->previous()==URL::to('/').'/admin/dashboard/'.$lang){
        $filterdVideos=DB::table('vedios')
        ->join('sellers','sellers.seller_id','vedios.seller_id')
        ->join('categories','categories.id','vedios.cat_id')
        ->where('vedios.name','like','%'.$q.'%')
        ->orwhere('sellers.seller_name','like','%'.$q.'%')
        ->orwhere('categories.name','like','%'.$q.'%')
        ->select('vedios.*','sellers.*')
       ->get();
       return view('admin.getsearched',compact(['filterdVideos','filterdVideos']));
         } 
        //  dd(url()->previous());/admins/create/
         if(url()->previous()==URL::to('/').'/admin/search/'.$lang||url()->previous()==URL::to('/').'/admin/messages'||url()->previous()==URL::to('/').'/admin/admins/create/'.$lang||url()->previous()==URL::to('/').'/admin/search/'.$lang)
         return redirect()->back();

}

public function adminrequestsort($urlpram,$lang){
    session()->put('locale', $lang);
        APP::setLocale($lang);
    if($urlpram=='sort-asc'){
    $adminss=Admin::orderBy('name', 'asc')->get();
    return view('admin.sortuserrequests',compact('adminss'));
    }
    //admin/sort/contents
    elseif($urlpram=='sort-desc'){
        $adminss=Admin::orderBy('name', 'desc')->get();
        return view('admin.adminUsers.sortadmins',compact('adminss'));
    }
}

public function userrequestsort($urlpram,$lang){
    session()->put('locale', $lang);
        APP::setLocale($lang);
    if($urlpram=='sort-asc'){
    $userss=User::orderBy('name', 'asc')->get();
    $sellerss=Seller::orderBy('seller_name', 'asc')->get();
    return view('admin.sortuserrequests',compact(['userss','sellerss']));
    }
    //admin/sort/contents
    elseif($urlpram=='sort-desc'){
    $userss=User::orderBy('name', 'desc')->get();
        $sellerss=Seller::orderBy('seller_name', 'desc')->get();
    return view('admin.sortuserrequests',compact(['userss','sellerss']));
    }

    elseif($urlpram=='sort-recent'){
        $userss=User::orderBy('created_at', 'desc')->get();
            $sellerss=Seller::orderBy('created_at', 'desc')->get();
        return view('admin.sortuserrequests',compact(['userss','sellerss']));
        }
        elseif($urlpram=='sort-old'){
            $userss=User::orderBy('created_at', 'asc')->get();
                $sellerss=Seller::orderBy('created_at', 'asc')->get();
            return view('admin.sortuserrequests',compact(['userss','sellerss']));
            }
}

public function buyersort($urlpram,$lang){
    session()->put('locale', $lang);
        APP::setLocale($lang);
    if($urlpram=='sort-asc'){
    $userss=User::where('accept_reject_request',1)->orderBy('name', 'asc')->get();
    return view('admin.sortbuyers',compact('userss'));
    }
    //admin/sort/contents
    elseif($urlpram=='sort-desc'){
    $userss=User::where('accept_reject_request',1)->orderBy('name', 'desc')->get();
    return view('admin.sortbuyers',compact('userss'));
    }

    elseif($urlpram=='sort-recent'){
        $userss=User::where('accept_reject_request',1)->orderBy('created_at', 'desc')->get();
    return view('admin.sortbuyers',compact('userss'));
    }

    elseif($urlpram=='sort-old'){
        $userss=User::where('accept_reject_request',1)->orderBy('created_at', 'asc')->get();
    return view('admin.sortbuyers',compact('userss'));
    }
    //leastdownload
    elseif($urlpram=='sort-mostdownload'){
        $userss=User::where('accept_reject_request',1)->withCount('downloads')->orderBy('downloads_count','desc')->get();
    return view('admin.sortbuyers',compact('userss'));
    }
    elseif($urlpram=='sort-leastdownload'){
        $userss=User::where('accept_reject_request',1)->withCount('downloads')->orderBy('downloads_count','asc')->get();
    return view('admin.sortbuyers',compact('userss'));
    }
}

public function sellersort($urlpram,$lang){
    session()->put('locale', $lang);
        APP::setLocale($lang);
    if($urlpram=='sort-asc'){
    $sellerss=Seller::where('accept_reject',1)->orderBy('seller_name', 'asc')->get();
    return view('admin.sortsellers',compact('sellerss'));
    }
    //admin/sort/contents
    elseif($urlpram=='sort-desc'){
        $sellerss=Seller::where('accept_reject',1)->orderBy('seller_name', 'desc')->get();
    return view('admin.sortsellers',compact('sellerss'));
    }

    elseif($urlpram=='sort-recent'){
        $sellerss=Seller::where('accept_reject',1)->orderBy('created_at', 'desc')->get();
    return view('admin.sortsellers',compact('sellerss'));
    }

    elseif($urlpram=='sort-old'){
        $sellerss=Seller::where('accept_reject',1)->orderBy('created_at', 'asc')->get();
    return view('admin.sortsellers',compact('sellerss'));
    }
}


public function videorequestsort($urlpram,$lang){
    session()->put('locale', $lang);
        APP::setLocale($lang);
    if($urlpram=='sort-asc'){

        $vr=DB::table('video_requests')
        ->join('vedios','vedios.id','video_requests.video_id')
        ->join('sellers','sellers.seller_id','video_requests.seller_id')
        ->select('vedios.*','sellers.*')
        ->orderBy('sellers.seller_name', 'asc')
        ->get();
    return view('admin.sortvideorequest',compact('vr'));
    }
    //admin/sort/contents
    elseif($urlpram=='sort-desc'){
        $vr=DB::table('video_requests')
        ->join('vedios','vedios.id','video_requests.video_id')
        ->join('sellers','sellers.seller_id','video_requests.seller_id')
        ->select('vedios.*','sellers.*')
        ->orderBy('sellers.seller_name', 'desc')
        ->get();
    return view('admin.sortvideorequest',compact('vr'));
    }

    elseif($urlpram=='sort-recent'){
        $vr=DB::table('video_requests')
        ->join('vedios','vedios.id','video_requests.video_id')
        ->join('sellers','sellers.seller_id','video_requests.seller_id')
        ->select('vedios.*','sellers.*','video_requests.created_at')
        ->orderBy('video_requests.created_at', 'desc')
        ->get();
    return view('admin.sortvideorequest',compact('vr'));
    }

    elseif($urlpram=='sort-old'){
        $vr=DB::table('video_requests')
        ->join('vedios','vedios.id','video_requests.video_id')
        ->join('sellers','sellers.seller_id','video_requests.seller_id')
        ->select('vedios.*','sellers.*','video_requests.created_at')
        ->orderBy('video_requests.created_at', 'asc')
        ->get();
    return view('admin.sortvideorequest',compact('vr'));
    }
}
 public function messagessort($urlpram){
     
        if($urlpram=='sort-asc'){
            $contactus=ContactUs::orderBy('name', 'ASC')->get();
            $msg=Message::where('reciever_id',auth('admin')->id())->orderBy('sender_id', 'ASC')->get();
        return view('admin.messages.filtermsgs',compact('msg','contactus'));
        }
        //admin/sort/contents
        elseif($urlpram=='sort-desc'){
            $msg=Message::where('reciever_id',auth('admin')->id())->orderBy('sender_id', 'DESC')->get();
            $contactus=ContactUs::orderBy('name', 'DESC')->get();
            return view('admin.messages.filtermsgs',compact('msg','contactus'));
        }
    
    }

public function offerssort($urlpram,$lang){
    session()->put('locale', $lang);
        APP::setLocale($lang);
    if($urlpram=='sort-asc'){

        $of=DB::table('offers')
        ->join('vedios','vedios.id','offers.video_id')
        ->select('vedios.*','offers.*')
        ->orderBy('vedios.name', 'asc')
        ->get();
    return view('admin.offers.sortoffers',compact('of'));
    }
    //admin/sort/contents
    elseif($urlpram=='sort-desc'){
        $of=DB::table('offers')
        ->join('vedios','vedios.id','offers.video_id')
        ->select('vedios.*','offers.*')
        ->orderBy('vedios.name', 'desc')
        ->get();
    return view('admin.offers.sortoffers',compact('of'));
    }
    elseif($urlpram=='sort-recent'){
        $of=DB::table('offers')
        ->join('vedios','vedios.id','offers.video_id')
        ->select('vedios.*','offers.*')
        ->orderBy('offers.created_at', 'desc')
        ->get();
    return view('admin.offers.sortoffers',compact('of'));
    }

    elseif($urlpram=='sort-old'){
        $of=DB::table('offers')
        ->join('vedios','vedios.id','offers.video_id')
        ->select('vedios.*','offers.*')
        ->orderBy('offers.created_at', 'asc')
        ->get();
    return view('admin.offers.sortoffers',compact('of'));
    }
    $cats=Category::all();

    foreach ($cats as $cat) {
    if($urlpram=='cat-'.$cat->name){
        $of=DB::table('vedios')
        ->join('offers','offers.video_id','vedios.id')
        ->join('categories','categories.id','vedios.cat_id')
        ->select('vedios.*','offers.*')
        ->where('categories.name',$cat->name)
        ->get();
    return view('admin.offers.sortoffers',compact('of'));
        }
    }
    // elseif($urlpram=='cat-report'){
    //     $of=DB::table('vedios')
    //     ->join('offers','offers.video_id','vedios.id')
    //     ->join('categories','categories.id','vedios.cat_id')
    //     ->select('vedios.*','offers.*')
    //     ->where('categories.name','Reports')
    //     ->get();
    // return view('admin.offers.sortoffers',compact('of'));
    // }
    // elseif($urlpram=='cat-motion'){
    //     $of=DB::table('vedios')
    //     ->join('offers','offers.video_id','vedios.id')
    //     ->join('categories','categories.id','vedios.cat_id')
    //     ->select('vedios.*','offers.*')
    //     ->where('categories.name','Motion')
    //     ->get();
    // return view('admin.offers.sortoffers',compact('of'));
    // }
    // elseif($urlpram=='cat-fun'){
    //     $of=DB::table('vedios')
    //     ->join('offers','offers.video_id','vedios.id')
    //     ->join('categories','categories.id','vedios.cat_id')
    //     ->select('vedios.*','offers.*')
    //     ->where('categories.name','Funs')
    //     ->get();
    // return view('admin.offers.sortoffers',compact('of'));
    // }
}

public function deleteuser($id){
   $user=User::find($id)->delete();
   return redirect()->route('admin.buyers',App()->getLocale()); 
}
public function deleteseller($id){
    $seller=Seller::find($id)->delete();
    return redirect()->route('admin.sellers',App()->getLocale()); 
 }

public function balanceMarkASRead(){
     $admin=Admin::find(auth('admin')->id());
    $admin->unreadNotifications->first()->markAsRead();
    return redirect()->route('admin.payments',App()->getLocale());
}
public function acceptvideoMarkASRead(){
     $admin=Admin::find(auth('admin')->id());
    $admin->unreadNotifications->first()->markAsRead();
    return redirect()->route('admin.requests',App()->getLocale());
}


}
