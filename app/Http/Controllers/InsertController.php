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
        if (session()->has('name')) {
            return view('post');
        } else {
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
                'slug' => Str::slug($request->position) . '-' . date('dmYHis'),
                'company' => $request->company,
                'experience' => $request->experience,
                'skills' => $request->skills,
                'description' => $request->description,
                'location' => $request->location,
                'salary' => $request->salary,
                'created_at' => date('Y-m-d H:i:s'),
                'id' => session('loginId'),  //foreign key from users 
            ]);
            return redirect(route('index'));
        } else {
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

    public function profile()
    {
        if (session()->has('name')) {
            $data = DB::select('SELECT users.fname,users.lname,users.email,post.position,post.description FROM users JOIN application on users.id = application.userId JOIN post ON application.jobid=post.jobid WHERE application.uid =?',[session('loginId')]);
           // dd($data);
            return view('profile',['data'=>$data]);
        }elseif (session()->has('name')) {
            return view('/profile');
        } else {
            return redirect('/login');
        }
    }
    public function apply($slug)
    {
        $rdata = DB::select('select * from post left join users on post.id =users.id where slug = ?', [$slug]);
        $json = json_encode($rdata);
        $data = json_decode($json);
        $new = json_encode($data[0]);
        //dd($data);
        $arr = json_decode($new, true);
        $data=[
            'jobid'=>array_values($arr)[0],
            'position'=>array_values($arr)[1],
            'company'=>array_values($arr)[3],
            'description'=>array_values($arr)[6],
            'experience'=>array_values($arr)[4],
            'skills'=>array_values($arr)[5],
            'location'=>array_values($arr)[7],
            'id'=>array_values($arr)[10],
            'fname'=>array_values($arr)[11],
            'lname'=>array_values($arr)[12],
            'email'=>array_values($arr)[14],
        ];
        return view('apply', ['apply' => $data]);
    }

    public function application(Request $request){
        if (session()->has('name')) {
            $filename= time()."-rs.".$request->file('resume')->getClientOriginalExtension();
    
            $a=$request->file('resume')->storeAs('public/uploads',$filename);
            DB::table('application')->insert([
                'userId' => session('loginId'),
                'jobid'=>$request->jobid,
                'uid'=>$request->uid,
                'adescription' => $request->adescription,
                'resume'=>$a,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            return redirect(route('index'));
        } else {
            return redirect('/login');
        };
    }


    public function reject(){
        echo 'form has been rejected';

    }
    public function select(){
        echo 'Your form has been shortlisted';
    }
}
