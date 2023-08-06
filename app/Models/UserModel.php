<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'users';

    public function getAllUser(){
        $users = DB::table($this->table)->get();
        return $users;
    }

    public function addUser($data){
        DB::insert('INSERT INTO users(name, email, password) VALUES (?, ?, ?)', $data);
    }

    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id=?', [$id]);
    }
    public function updateUser($data, $id){
        $data[] = $id;
        return DB::update('UPDATE '.$this->table.' SET name=?, email=?, password=? WHERE id = ?', $data);
    }

    public function deleteUser($id){
        return DB::delete('DELETE FROM users WHERE id = ?', [$id]);
    }

    public function learnQueryBuilder(){
        // DB::table('tablename')->get() => lấy ra tất cả dữ liệu
        // DB::table('tablename')->first() => lấy ra dữ liệu đầu tiên
        // DB::table('tablename')->select('column1', 'column2'..)->get() => select cột trong bảng
        // DB::table('tablename')->select('column1', 'column2'..)->where('column', 'value')->get() => select cột trong bảng và điều kiện where

        // kết hợp nhiều điều kiện :  ->where(['id'=> 2, 'name' => 'admin2'])

        // whereBetween  =>  ->whereBetween('id', [1, 4])

        //orderBy => ->orderBy('name', 'desc')->orderBy('email', 'desc')

        // ->inRandomOrder()  => sắp xếp ngẫu nhiên

        // select count =>  ->select(DB::raw('count(id) as email_count'), 'email')->groupBy('email')

        // giới hạn limit =>  ->offset(1)->limit(2)
        // HOẶC giới hạn limit =>  ->skip(2)->take(1)

        //join bảng =>  DB::table('users')->join('groups', 'users.group_id', '=', 'groups.id')


        // insert data to mysql
        // $lastId = DB::table('users')->insertGetId([
        //     'name' => 'nguyen van a',
        //     'email' => 'nguyenvana@gmail.com',
        //     'password'=>'PASSWORD'
        // ]);

        // update data
        // DB::table('users')
        //     ->where('id', 1)
        //     ->update(['votes' => 1]);

        //delete data

        // dd($lastId);

        // $sql = DB::getQueryLog();
        // dd($sql);
    }

}
