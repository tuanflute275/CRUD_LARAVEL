<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'users';

    public function getAllUser(){
        $users = DB::select('SELECT * FROM users');
        return $users;
    }

    public function addUser($data){
        DB::insert('INSERT INTO users(name, email, password) VALUES (?, ?, ?)', $data);
    }

    public function deleteUser($id){
        return DB::delete('DELETE FROM users WHERE id = ?', [$id]);
    }

    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id=?', [$id]);
    }
    public function updateUser($data, $id){
        $data[] = $id;
        return DB::update('UPDATE '.$this->table.' SET name=?, email=?, password=? WHERE id = ?', $data);
    }
}
