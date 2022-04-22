<?php 
namespace App\Controllers;
use App\Models\SalarieModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;


class Salarie extends Controller
{
    // afficher la liste des salaries
    public function index(){
        echo view('templates/header');
        echo view('templates/footer');
        // $salarieModel = new SalarieModel();
        // $data['salarie'] = $salarieModel->orderBy('id')->findAll();
        // return view('salarie', $data);
        return redirect()->route('loadSalarie');

    }
     //Chercher un salarie
     public function loadSalarie(){
        echo view('templates/header');
        echo view('templates/footer');

        $request = service('request');
        $searchData = $request->getGet();
        $search = "";
        if(isset($searchData) && isset($searchData['search'])){
            $search = $searchData['search'];
        }
        // Get data 
        $salarie = new SalarieModel();
        if($search == ''){
            $paginateData = $salarie->paginate(5);
        }else{
            $paginateData = $salarie->select('*')
                ->orLike('CIN', $search)
                ->orLike('siege', $search)
                ->orLike('departement', $search)
                ->orLike('nom', $search)
                ->paginate(5);
        }
        $data = [
            'salarie' => $paginateData,
            'pager' => $salarie->pager,
            'search' => $search
          ];
        return view('salarie',$data); 


    }

 
    // ajouter un salarie
    public function ajouterSalarie() {
        $salarieModel = new SalarieModel();
        $data = [
            'CIN' => $this->request->getVar('CIN'),
            'nom' => $this->request->getVar('nom'),
            'prenom'  => $this->request->getVar('prenom'),
            'adresse' => $this->request->getVar('adresse'),
            'email' => $this->request->getVar('email'),
            'telephone' => $this->request->getVar('telephone'),
            'office_telephone' => $this->request->getVar('office_telephone'),
            'departement' => $this->request->getVar('departement'),
            'poste' => $this->request->getVar('poste'),
            'siege' => $this->request->getVar('siege'),
        ];
        $salarieModel->insert($data);
        return $this->response->redirect(site_url('/salarie'));
    }

    // show single name
    public function singleSalarie($id = null){
        echo view('templates/header');
        $salarieModel = new SalarieModel();
        $data['salarie_obj'] = $salarieModel->where('id', $id)->first();
        return view('editSalarie', $data);
    }
     // afficher un seul evenement
     public function single($id = null){
        echo view('templates/header');
        $salarieModel = new SalarieModel();
        $data['salarie_obj'] = $salarieModel->where('id', $id)->first();
        return view('showSalarie', $data);
    }

    // rechercher un salarie
    public function ajaxSearch(){
    
        helper(['form', 'url']);

        $data = [];
        $db      = \Config\Database::connect();
        $builder = $db->table('salarie');   
        
        $query = $builder->like('siege', $this->request->getVar('q'))
                    ->orLike('departement', $this->request->getVar('q'))
                    ->orLike('CIN', $this->request->getVar('q'))
                    ->select('nom as text')
                    ->limit(10)->get();
        $data = $query->getResult();
        
		echo json_encode($data);
    }
    

    // update name data
    public function update(){
        $salarieModel = new SalarieModel();
        $id = $this->request->getVar('id');
        $data = [
            'CIN' => $this->request->getVar('CIN'),
            'nom' => $this->request->getVar('nom'),
            'prenom'  => $this->request->getVar('prenom'),
            'adresse' => $this->request->getVar('adresse'),
            'email' => $this->request->getVar('email'),
            'telephone' => $this->request->getVar('telephone'),
            'office_telephone' => $this->request->getVar('office_telephone'),
            'departement' => $this->request->getVar('departement'),
            'poste' => $this->request->getVar('poste'),
            'siege' => $this->request->getVar('siege'),
        ];
        $salarieModel->update($id, $data);
        return $this->response->redirect(site_url('/salarie'));
    }
 
    // supprimer un salarie
    public function delete($id = null){
        $salarieModel = new SalarieModel();
        $data['sal'] = $salarieModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/salarie'));
    }    
}