<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // if (Auth::user()->can('users.view')) {

        $users = User::all();
        return view('admin.users.index',compact('users'));

        // }
        // return redirect(route('dashboard'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if (Auth::user()->can('user.create')) {

            $roles = Role::all();
            return view('admin.users.create',compact('roles'));
        // }
        // return redirect(route('home'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     // 'name' => ['required', 'string', 'max:255'],
        //     // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);
        // return $request;

        $user = new User;

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->occupation = $request->occupation;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
//        if ($request->hasFile('image'))
            // $image = $request->image->store('public/users_image');
//        else $image = "no image";
        // $user->image = $image;
        $user->save();
        $user->roles()->sync($request->role);

        return redirect(route('users.index'));
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
        // if (Auth::user()->can('users.update')) {
            $roles = Role::all();
            $user = User::findorfail($id);
            return view('admin.users.edit',compact('user','roles'));

        // }
        // return redirect(route('home'));
    }
   public function __construct()
   {
       $this->middleware('auth');
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
//        $this->validate($request,[
//            'image' =>'max'
//        ]);
       $user->name = $request->name;
       $user->email = $request->email;
       $user->occupation = $request->occupation;
       $user->phone = $request->phone;
       $user->password = Hash::make($request->password);
//       if ($request->hasFile('image')) $user->image  = $request->image->store('public/users_image');

       $user->roles()->sync($request->roles);
       $user->update();
       return redirect(route('users.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // if (Auth::user()->can('users.delete')) {
        $user->delete();
        return redirect(route('users.index'));


        // }
        // return redirect(route('home'));
    }
}
