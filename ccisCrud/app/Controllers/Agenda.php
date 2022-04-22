<?php 
namespace App\Controllers;
use App\Models\AgendaModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;

class Agenda extends Controller
{
    // afficher l'agenda
    public function index(){
        echo view('templates/header');
        echo view('templates/footer');
        // $agendaModel = new AgendaModel();
        // $data['agenda'] = $agendaModel->orderBy('date_heure','ASC')->findAll();
        // return view('agenda', $data);
        return redirect()->route('load');

    }
    //Chercher un evenement 
    public function load(){
        echo view('templates/header');
        echo view('templates/footer');
        
        $pager = \Config\Services::pager();

        $request = service('request');
        $searchData = $request->getGet();
        $search = "";
        if(isset($searchData) && isset($searchData['search'])){
            $search = $searchData['search'];
        }
        // Get data 
        $agenda = new AgendaModel();
        if($search == ''){
            $paginateData = $agenda->paginate(5);
        }else{
            $paginateData = $agenda->select('*')
                ->like('evenement', $search)
                ->paginate(5);
        }
        $data = [
            'agenda' => $paginateData,
            'pager' => $agenda->pager,
            'search' => $search
          ];
        return view('agenda',$data); 


    }


    // // rechercher un evenement
    // public function ajaxSearch(){
    
    //     helper(['form', 'url']);

    //     $data = [];
    //     $db      = \Config\Database::connect();
    //     $builder = $db->table('agenda');   

    //     $query = $builder->like('lieu', $this->request->getVar('q'))
    //                 ->orLike('date_heure', $this->request->getVar('q'))
    //                 ->select('evenement as text')
    //                 ->limit(10)->get();
    //     $data = $query->getResult();
	// 	echo json_encode($data);
    // }

    //chercher par date
    
    
    // afficher un seul evenement
    public function singleEvent($id = null){
        $agendaModel = new AgendaModel();
        $data['agenda_obj'] = $agendaModel->where('id', $id)->first();
        return view('editAgenda', $data);
    }
    // afficher un seul evenement
    public function single($id = null){
        $agendaModel = new AgendaModel();
        $data['agenda_obj'] = $agendaModel->where('id', $id)->first();
        return view('showAgenda', $data);
    }
    // update user data
    public function update(){
        $agendaModel = new AgendaModel();
        $id = $this->request->getVar('id');
        $data = [
            'date_heure' => $this->request->getVar('date_heure'),
            'lieu' => $this->request->getVar('lieu'),
            'evenement'  => $this->request->getVar('evenement'),
            'membre' => $this->request->getVar('membre'),
        ];
        $agendaModel->update($id, $data);
        return $this->response->redirect(site_url('/agenda'));
    }

    // ajouter un evenement
    public function ajouter() {
        $agendaModel = new AgendaModel();
        $data = [
            'date_heure' => $this->request->getVar('date_heure'),
            'lieu' => $this->request->getVar('lieu'),
            'evenement'  => $this->request->getVar('evenement'),
            'membre' => $this->request->getVar('membre'),
        ];
        $agendaModel->insert($data);
        return $this->response->redirect(site_url('/agenda'));
    }

    // supprimer un evenement
    public function delete($id = null){
        $agendaModel = new AgendaModel();
        $data['ag'] = $agendaModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/agenda'));
    }    

}