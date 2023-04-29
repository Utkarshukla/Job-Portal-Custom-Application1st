<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class InsertController extends Controller
{


    public function index()
    {
        if(session()->has('name')){
            return view('post');
        }else{
            return redirect('/login');
        }
        
    }

    public function display()
    {
        $jobs = DB::table('post')->orderBY('jobid', 'DESC')->paginate(10);
        return view('welcome', ['jobs' => $jobs]);
    }
    public function insert(Request $request)
    {
       
        if (session()->has('name')) {
            DB::table('post')->insert([
                'position' => $request->position,
                'slug'=>Str::slug($request->position).'-'.date('dmYHis'),
                'company' => $request->company,
                'experience' => $request->experience,
                'skills' => $request->skills,
                'description' => $request->description,
                'location' => $request->location,
                'salary' => $request->salary,
                'created_at' => date('Y-m-d H:i:s'),
                'id'=>session('loginId'),  //foreign key from users 
            ]);
            return redirect(route('index'));
        }else{
            return redirect('/login');
        };
    }


    public function search()
    {
        $filtervalue = $_GET['search'] ?? "";

        if ($filtervalue != "") {
            $data = DB::table('post')->where('position', 'LIKE', '%' . $filtervalue . '%')
                ->orWhere('company', 'LIKE', '%' . $filtervalue . '%')
                ->orWhere('skills', 'LIKE', '%' . $filtervalue . '%')
                ->orWhere('description', 'LIKE', '%' . $filtervalue . '%')
                ->orWhere('location', 'LIKE', '%' . $filtervalue . '%')
                ->paginate(4);
        } else {
            $data = DB::table('post')->orderBY('jobid', 'DESC')->paginate(8);
        }

        return view('welcome', ['jobs' => $data]);
    }

    public function profile(){
        if(session()->has('name')){
            return view('profile');
        }else{
            return redirect('/login');
        }
        
    }
    public function apply($slug){
        $data =DB::table('post')->where('slug','=',$slug)->get();
        return view('apply',['apply'=>$data]);
    }


}
