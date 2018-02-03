<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.registerLogin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('rname');
        $email = $request->input('remail');
        $password = $request->input('rpassword');
        $confirmPassword = $request->input('rconfirmPassword');
        $hashedPassword = Hash::make($password);
        $count= DB::select('select count(Email) AS NUM from Users where Email=?',[$email]);
        $number=$count[0]->NUM;
        $errfound=0;
        if($password!=$confirmPassword){
            $errorMessage="Both Password fields didn't match, Type it again.";
            $errfound=1;
        }
        else if($number>0){
            $errorMessage="The email you entered is already registered.";
            $errfound=1;
            
        }
        else{
            $errfound=0;
        }
        if($errfound==1){

            return view('user.registerLogin',["rname"=>$name ,"remail"=>$email, "rpassword"=>$password , "rerrorMessage"=>$errorMessage]);
        }
       else{
        DB::insert('insert into Users (Name,Email,Password) values(?,?,?)',[$name,$email,$hashedPassword]);
        //redirect here if signup successful
        $id=DB::table('Users')->select('Id')->orderBy('Id', 'desc')->first()->Id;
        $request->session()->put('email',$email);
        $request->session()->put('userId',$id);
        return redirect('home')->withCookie(cookie()->forever('email',$email))->withCookie(cookie()->forever('id',$id));
        }
    }
    public function checkLogin(Request $request){
        $email = $request->input('lemail');
        $password = $request->input('lpassword');
        $dpass = DB::table('Users')->select('Password','Id')->where('Email', '=', $email)->first();
        if(!$dpass){

            $errorMessage="Wrong Login Credentials.";
            return view('user.registerLogin',["lemail"=>$email, "lpassword"=>$password , "lerrorMessage"=>$errorMessage]);
        }
       if(Hash::check($password, $dpass->Password)){
            //Redirects to home page
        $request->session()->put('email',$email);
        $request->session()->put('userId',$dpass->Id);
        return redirect('home')->withCookie(cookie()->forever('email',$email))->withCookie(cookie()->forever('id',$dpass->Id));
        }
        else{
            $errorMessage="Wrong Login Credentials.";
            return view('user.registerLogin',["lemail"=>$email, "lpassword"=>$password , "lerrorMessage"=>$errorMessage]);
        }
     }
     public function showAddressPage(Request $request){
        $userId=$request->session()->get('userId');
         $data=DB::table('users')->where('id','=',$userId)->first();
         return view("user.getAddress",['data'=>$data]);
     }
     public function getAddress(Request $request){
        $add1 = $request->input('add1');
        $state = $request->input('state');
        $pin = $request->input('pin');
        $country = $request->input('country');
        $phone = $request->input('phone');
        $landmark = $request->input('landmark');
        $city = $request->input('city');
        $userId=$request->session()->get('userId');
        DB::table('users')
        ->where('id', $userId)
        ->update(['add1' => $add1,'state'=>$state,'pin'=>$pin,'country'=>$country,'phone'=>$phone,'landmark'=>$landmark,'city'=>$city]);
        return redirect("home");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
