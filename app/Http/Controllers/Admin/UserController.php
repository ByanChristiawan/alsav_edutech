<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class UserController extends Controller
{
    public function __construct() {
        $this->data['currentAdminMenu'] = 'role-user';
    }
    public function index(Request $request)
    {
        $this->data['currentAdminSubMenu'] = 'user';
        $user = User::orderBy('created_at', 'DESC');
        $this->data['users'] = $user->paginate(10) ;

        return view('admin.users.index', $this->data);
    }
    public function create()
    {
        $this->data['currentAdminSubMenu'] = 'user';
        return view('admin.users.create', $this->data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $params = $request->except('_token');
        $params['password'] = bcrypt($request->get('password'));
        if (User::create($params)) {
            Session::flash('success', 'User has been saved');
        }
        return redirect('admin/users');
    }
    public function edit($id)
    {
        $this->data['currentAdminSubMenu'] = 'user';
        $this->data['user'] = User::find($id);

        return view('admin.users.edit', $this->data);
    }
    public function update(Request $request, $id)
    {
        $params = $request->except('_token');
        $user = User::findOrFail($id);
        if($request->get('password')) {
            $params['password'] = bcrypt($request->get('password'));
        }else {
            $params['password'] = $user->password;
        }
        
        if ($user->update($params)) {
            Session::flash('success', 'user has been updated.');
        }
        return redirect('admin/users');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
       
        if ($user->delete()) {
            Session::flash('success', 'User has been deleted');
        }
        return redirect('admin/users');
    }
}
