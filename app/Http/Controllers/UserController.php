<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserModel;



class UserController extends Controller
{
    private $users;
    public function __construct(){
       $this->users = new UserModel();
    }

    public function index(){
        $title = ' Danh sách người dùng ';
        $usersList = $this->users->getAllUser();
        return view('index', compact('title','usersList'));
    }
    public function addUser(){
        $title = 'Thêm mới người dùng';
        return view('add', compact('title'));
    }

    public function postAdd(Request $request){
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ],
        [
          'name.required' => 'Họ và tên bắt buộc phải nhập',
          'name.min' => 'Họ và tên phải từ :min ký tự trở lên',
          'email.required' => 'email bắt buộc phải nhập',
          'email.email' => 'email không đúng định dạng',
          'email.unique' => 'email đã tồn tại trong hệ thống',
          'password.required' => 'password bắt buộc phải nhập',
        ]);

        $dataInsert = [
            $request->name,
            $request->email,
            $request->password
        ];

        $this->users->addUser($dataInsert);
        return redirect()->route('users.')->with('msg', 'thêm người dùng thành công');
    }

    public function getEdit(Request $request, $id=0){
        $title = 'cập nhật người dùng';
        if(!empty($id)){
            $userDetail = $this->users->getDetail($id);
            if(!empty($userDetail[0])){
                $request->session()->put('id', $id);
                $userDetail = $userDetail[0];
            }else{
                return redirect()->route('users.')->with('msg', 'người dùng không tồn tại');
            }
        }else{
            return redirect()->route('users.')->with('msg', 'liên kết không tồn tại');
        }



        return view('edit', compact('title', 'userDetail'));
    }
    public function postEdit(Request $request){
        $id = session('id');
        if(empty($id)){
            return back()->with('msg', 'liên kết không tồn tại');
        }
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required'
        ],
        [
          'name.required' => 'Họ và tên bắt buộc phải nhập',
          'name.min' => 'Họ và tên phải từ :min ký tự trở lên',
          'email.required' => 'email bắt buộc phải nhập',
          'email.email' => 'email không đúng định dạng',
          'email.unique' => 'email đã tồn tại trong hệ thống',
          'password.required' => 'password bắt buộc phải nhập',
        ]);

        $dataUpdate = [
            $request->name,
            $request->email,
            $request->password
        ];
        $this->users->updateUser($dataUpdate, $id);
        return redirect()->route('users.')->with('msg', 'cập nhật người dùng thành công');
    }

    public function delete($id=0){
        $this->users->deleteUser($id);
        return redirect()->route('users.')->with('msg', 'xóa thành công');
    }
}
