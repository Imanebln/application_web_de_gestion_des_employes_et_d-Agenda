<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class UserModel extends Model{
    protected $table = 'utilisateur';

    protected $allowedFields = ['id','email','password'];

    protected function passwordHash(array $data){
        if(isset($data['data']['password']))
          $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
    
        return $data;
    }

}