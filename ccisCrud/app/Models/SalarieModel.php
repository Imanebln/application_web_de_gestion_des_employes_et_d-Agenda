<?php 
namespace App\Models;
use CodeIgniter\Model;

class SalarieModel extends Model
{
    protected $table = 'salarie';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['id','CIN','nom','prenom','adresse','email','telephone','office_telephone','departement','poste','siege'];
}