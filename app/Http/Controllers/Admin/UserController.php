<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends BaseController
{

    public function profile()
    {
        $data = [];
        $data['user'] = auth()->user();//give login user instance
        return view(parent::loadCommonDataToView('admin.user.profile'), compact('data'));
    }
    public function profileUpdate(Request $request){
        $this->validateProfileUpdate($request);

        $user = auth()->user();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->first_name=$request->get('first_name');
        $user->middle_name=$request->get('middle_name');
        $user->last_name=$request->get('last_name');
        $user->contact=$request->get('contact');
        $user->address=$request->get('address');

        if ($request->get('password')) {
            //if user enter password then only update the password otherwise do nothing
            $user->password = bcrypt($request->get('password'));
        }

        $user->save();

        $request->session()->flash('success_message', 'Profile updated successfully.');
        return redirect()->route('admin.profile');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['rows'] = User::select('id', 'email', 'first_name', 'middle_name', 'last_name', 'created_at')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view(parent::loadCommonDataToView('admin.user.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateProfileAdd($request);
        $row = new User();
        $row->name = $request->get('name');
        $row->email = $request->get('email');
        $row->first_name = $request->get('first_name');
        $row->middle_name = $request->get('middle_name');
        $row->last_name = $request->get('last_name');
        $row->contact = $request->get('contact');

        $row->address = $request->get('address');
        $row->password = bcrypt($request->get('password'));
        $row->save();
        $request->session()->flash('success_message', 'User Successfully Added');

        return redirect()->route('admin.user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        $data['row'] = User::find($id);
        if (!$data['row'])
            return redirect()->route('admin.user');

        return view(parent::loadCommonDataToView('admin.user.show'), compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $data['user'] = User::find($id);
        return view('admin.user.edit', compact('data'));
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

        $this->validateProfileUpdateOfCustomUser($request,$id);
        $row = User::find($id);
        $row->name = $request->get('name');
        $row->email = $request->get('email');
        $row->first_name = $request->get('first_name');
        $row->middle_name = $request->get('middle_name');
        $row->last_name = $request->get('last_name');
        $row->contact = $request->get('contact');
        $row->address = $request->get('address');
        if($request->get('password'))
            $row->password = bcrypt($request->get('password'));
        $row->save();
        $request->session()->flash('success_message', 'User Successfully Updated');
        return redirect()->route('admin.user.edit',$row->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        $row = User::find($id);
        $row->delete();
        $request->session()->flash('success_message', 'User Successfully Deleted ');

        return redirect()->route('admin.user');
    }

    protected function validateProfileUpdate($request)
    {
        $rules = [
            'name' => 'required|string|unique:users,name,'.auth()->user()->id,
            'email' => 'required|string|email|unique:users,email,'.auth()->user()->id,
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'contact'=>'required|numeric'



        ];

        if ($request->get('password')) {
            $rules['password'] = 'confirmed|string|min:6';
        }

        $this->validate($request, $rules);
    }
    protected function validateProfileAdd($request)
    {

        $rules = [
             'name' => 'required|string|unique:users,name',
             'email' => 'required|string|email|unique:users,email,',
             'password' => 'required|string|min:6',
             'first_name'=>'required|string',
             'last_name'=>'required|string',
             'address'=>'required|string',
            'contact'=>'required|numeric|unique:users,contact'



        ];
        $this->validate($request, $rules);
    }
    protected function validateProfileUpdateOfCustomUser($request,$id)
    {
        $user=User::find($id);
        $rules = [
            'name' => 'required|string|unique:users,name,'.$user->id,
            'email' => 'required|string|email|unique:users,email,'.$user->id,
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'address'=>'required|string',
            'contact'=>'required|numeric|unique:users,contact,'.$user->id



        ];

        if ($request->get('password')) {
            $rules['password'] = 'confirmed|string|min:6';
        }

        $this->validate($request, $rules);
    }

}
