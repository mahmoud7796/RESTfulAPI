<?php

namespace App\Http\Controllers;

use App\Exceptions\NotFoundException;
use App\Http\Resources\UsersResource;
use App\Models\User;
use App\Traits\ResponseJson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    use ResponseJson;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function data()
    {
          $users = DB::table('users')->find(1);
           // $users=array($users);
        return view('pages.about',['users'=>$users]);
    }

    public function users()
    {
        $users = User::get();
        return response()->json(['users'=>$users]);
    }

    public function filterUser()
    {
       return $all_users_with_all_direct_permissions = User::with('permissions')->get();

        $user = User::find(Auth::id());
      // return$all_users_with_all_their_roles = User::with('roles')->get();
        if ($user->can('edit articles')){
              return $this->jsonResponse(new UsersResource ($user),'data',200,'get successfully');
              // return response()->json(['users'=>UsersResource::collection($users)],200);
          }else{
              return 'not allow';
          }

    }


    public function excep()
    {
        $users = User::find(44444);
        if(!$users){
            throw new NotFoundException;
        }
        return response()->json(['users'=>new UsersResource($users)],200);
    }

    public function create(Request $request)
    {
        $users = User::create([
            'name'=>$request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
        ]);
        return response()->json(['users'=>$users]);
    }

    public function update(Request $request)
    {
        $users=User::findOrFail($request->id);
        $users -> update([
            'name'=>$request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
        ]);
        return response()->json(['users'=>$users]);
    }

    public function delete(Request $request)
    {
        $users=User::findOrFail($request->id);
        $users ->delete();
        return response()->json(['users'=>$users]);
    }
}
