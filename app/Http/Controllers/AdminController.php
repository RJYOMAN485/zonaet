<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Video;

use App\Models\User;

use App\Models\Subscription;

use App\Models\Transaction;

use Illuminate\Http\UploadedFile;




use Validator;


use App\Models\Admin;
use Auth;
use Carbon\Carbon;




class AdminController extends Controller
{

    public function __construct()
    {

        $dt = Carbon::now();

    
        //check if the current subscription is expired
       
            
            Subscription::where('expires', '<=', $dt->toDateString())
                            ->update(['status'=> 'expired']);

            Transaction::where('expires', '<=', $dt->toDateString())
                            ->update(['status'=> 'expired']);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $videos = Video::all();
        return view('videos.index',compact('videos'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required',
            'video' => 'required'
        ]);
        $imagePath = $request->file('image')->store('images', ['disk' => 'public']);
        $videoPath = $request->file('video')->store('clips',['disk' => 'public']);
        

        $video =  new Video;
        $video->title = $request->title;
        $video->category = $request->category;
        $video->description = $request->description;
        $video->image = $imagePath;
        $video->video = $videoPath;


        $video->save();
       

        return redirect()->route('videos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $video = Video::find($id);
        return view('show',compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $video = Video::find($id);
        return view('videos.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->file('image'));
            
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            
            
        ]);

        $video = Video::find($id);
        $video->title = $request->title;
        $video->category = $request->category;
        $video->description = $request->description;

        if($request->file('image'))  {

            $imagePath = $request->file('image')->store('images', ['disk' => 'public']);
             $video->image = $imagePath;  

        }
            

        if($request->file('video')) {
            $videoPath = $request->file('video')->store('clips',['disk' => 'public']);
            $video->video = $videoPath;
          
        }
        
            

      

        $video->save();

        return redirect()->route('videos.index')->withSuccess('video updated successful');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $video = Video::find($id);

        $video->delete();

        return redirect()->route('videos.index')->withSuccess('video deleted successfully');

    }

    public function registeredAdmin(Request $request)
    {
        
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ])->validate();

        $user = new Admin;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('admin.login')->withSuccess('Registration sucessful');
    }

    public function postAdminLogin(Request $request) {

        

        if(Auth::guard('admin')->attempt(['email' => $request->email,'password' => $request->password])) {
            return redirect()->route('videos.index');
        }
        return back()->withErrors([
            'email' => 'Login error',
        ]);


    }

    public function getAdminLoginView() {
        if(Auth::guard('admin')->check())
            return redirect()->route('videos.index');
        return view('admin.login');
    }

    public function adminLogoutAuth(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('videos.index');
    }

    public function getAdminRegisterPage()
    {
        return view('admin.registration');
    }


    public function getAdminAccountPage() {

        $id = Auth::guard('admin')->id();
        $admin = Admin::find($id);
      

        return view('admin.auth_account',compact('admin'));
    }

    public function getAdminAccountSettingsPage() {
      
        $id = Auth::guard('admin')->id();
        $admin = Admin::find($id);
        return view('admin.account_settings',compact('admin'));
    }

    public function getUsersSubscriptionsPage() {

       
                            
        $subs = Transaction::get();

        return view('admin.user_subscriptions',compact('subs'));
    }

    public function authUpdateAdmin(Request $request) {
       
        $id = Auth::guard('admin')->id();
        $admin = Admin::find($id);
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$admin->id,
            'password' => 'required|confirmed|min:6',
            'phone' => 'required|min:10|max:10',
            'password_confirmation' => 'required',
        ])->validate();

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->save();

        return back()->withSuccess('Profile update sucessful');




    }
}
