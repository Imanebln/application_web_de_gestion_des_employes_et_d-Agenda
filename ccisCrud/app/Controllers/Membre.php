<?php 
namespace App\Controllers;
use App\Models\MembreModel;
use CodeIgniter\Controller;

class Membre extends Controller
{
    // afficher la liste des membres
    public function index(){
        echo view('templates/header');
        echo view('templates/footer');
        // $membreModel = new MembreModel();
        // $data['membre'] = $membreModel->orderBy('id')->findAll();
        // return view('membre', $data);
        return redirect()->route('loadMembre');

    }
    //Chercher un membre
    public function loadMembre(){
        echo view('templates/header');
        echo view('templates/footer');

        $request = service('request');
        $searchData = $request->getGet();
        $search = "";
        if(isset($searchData) && isset($searchData['search'])){
            $search = $searchData['search'];
        }
        // Get data 
        $membre = new MembreModel();
        if($search == ''){
            $paginateData = $membre->paginate(5);
        }else{
            $paginateData = $membre->select('*')
                ->orLike('CIN', $search)
                ->orLike('categorie', $search)
                ->orLike('ville', $search)
                ->orLike('nom', $search)
                ->paginate(5);
        }
        $data = [
            'membre' => $paginateData,
            'pager' => $membre->pager,
            'search' => $search
          ];
        return view('membre',$data); 


    }

 
    // ajouter un membre
    public function ajouter() {

        // if ($this->request->getMethod() == 'post') {
		// 	//let's do the validation here
		// 	$rules = [
		// 		'CIN' => 'required|is_unique',
        //         'email' => 'required|min_length[6]|max_length[50]|valid_email',
        //         'adresse' => 'required|min_length[6]|max_length[50]',
		// 	];
        //     if (! $this->validate($rules)) {
		// 		$data['validation'] = $this->validator;
		// 	}else{
        $membreModel = new MembreModel();
        $data = [
            'CIN' => $this->request->getVar('CIN'),
            'nom' => $this->request->getVar('nom'),
            'prenom'  => $this->request->getVar('prenom'),
            'adresse' => $this->request->getVar('adresse'),
            'ville' => $this->request->getVar('ville'),
            'email' => $this->request->getVar('email'),
            'telephone' => $this->request->getVar('telephone'),
            'fix' => $this->request->getVar('fix'),
            'fax' => $this->request->getVar('fax'),
            'categorie' => $this->request->getVar('categorie'),
            'profession' => $this->request->getVar('profession'),
            'qualite' => $this->request->getVar('qualite'),
        ];
        $membreModel->insert($data);
        return $this->response->redirect(site_url('/membre'));
    // }
    // }
    }

    // show single name
    public function singleMembre($id = null){
        echo view('templates/header');
        $membreModel = new MembreModel();
        $data['membre_obj'] = $membreModel->where('id', $id)->first();
        return view('editMembre', $data);
    }
     // afficher un seul membre
     public function single($id = null){
        echo view('templates/header');
        $membreModel = new MembreModel();
        $data['membre_obj'] = $membreModel->where('id', $id)->first();
        return view('showMembre', $data);
        
    }
    // rechercher un membre
    public function ajaxSearch(){
    
        helper(['form', 'url']);

        $data = [];
        $db      = \Config\Database::connect();
        $builder = $db->table('membre');   
        
        $query = $builder->like('ville', $this->request->getVar('q'))
                    ->orLike('categorie', $this->request->getVar('q'))
                    ->orLike('CIN', $this->request->getVar('q'))
                    ->select('nom as text, prenom as text')
                    ->limit(10)->get();
        $data = $query->getResult();
        
		echo json_encode($data);
    }

    // update name data
    public function update(){
        $membreModel = new MembreModel();
        $id = $this->request->getVar('id');
        $data = [
            'CIN' => $this->request->getVar('CIN'),
            'nom' => $this->request->getVar('nom'),
            'prenom'  => $this->request->getVar('prenom'),
            'adresse' => $this->request->getVar('adresse'),
            'ville' => $this->request->getVar('ville'),
            'email' => $this->request->getVar('email'),
            'telephone' => $this->request->getVar('telephone'),
            'fix' => $this->request->getVar('fix'),
            'fax' => $this->request->getVar('fax'),
            'categorie' => $this->request->getVar('categorie'),
            'profession' => $this->request->getVar('profession'),
            'qualite' => $this->request->getVar('qualite'),
        ];
        $membreModel->update($id, $data);
        return $this->response->redirect(site_url('/membre'));
    }
 
    // supprimer un membre
    public function delete($id = null){
        $membreModel = new MembreModel();
        $data['mem'] = $membreModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/membre'));
    }    
}