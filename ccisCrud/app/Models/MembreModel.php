<?php 
namespace App\Models;
use CodeIgniter\Model;

class MembreModel extends Model
{
    protected $table = 'membre';

    protected $primaryKey = 'id';

    protected $returnType = 'array';
    
    protected $allowedFields = ['id','CIN','nom','prenom','adresse','ville','email','telephone','fix','fax','categorie','profession','qualite'];
}