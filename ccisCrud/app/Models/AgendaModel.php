<?php 
namespace App\Models;
use CodeIgniter\Model;

class AgendaModel extends Model
{
    protected $table = 'agenda';

    protected $primaryKey = 'id';

    protected $returnType = 'array';
    
    protected $allowedFields = ['id','date_heure','lieu','evenement','membre'];

    
    
}