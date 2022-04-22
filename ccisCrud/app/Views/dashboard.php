<section class="services" id="services">
        <div class="max-width">
            <h2 class="title">Les services disponibles</h2>
            <div class="serv-content">
                <div class="card">
                    <div class="box">
                        <i class=""></i>
                        <div><a href="/agenda" class="text">Agenda</a></div>
                    </div>
                </div>

                <div class="card">
                    <div class="box">
                        <i class=""></i>
                        <div ><a href="/salarie" class="text">Fonctionnaires</a></div>
                    </div>
                </div>
                
                <div class="card">
                <div class="box">
                        <i class=""></i>
                        <div ><a href="/membre" class="text">Membres</a></div>
                </div>
                </div>

                <div class="cardo">

                <div class="toast-header mt-0">
                <i class="material-icons" data-toggle="tooltip" title="Afficher cet événement">	&#xe7f4;</i>
      <strong class="me-auto">Rappel</strong>
      <small class="text-muted"></small>
    </div>
                <div class="content">
                <div class="cardEvent">
                <div>
                        <h6>Aujourd'hui</h6>
                        <p><?php echo date('d/m/Y'); ?></p>
                        <hr>
                        <div class="texty"><?php
                        $data = [];
                        $db      = \Config\Database::connect();
                        $builder = $db->table('agenda');
                        $date = new DateTime("now");
                        $today = $date->format('d/m/Y');
                        $query = $builder->where('DATE_FORMAT(date_heure,"%d/%m/%Y")',$today);
                        $query = $builder->get();
                        foreach($query->getResult() as $row){
                            echo $row->evenement."<br>";
                        }
                        ?>
                        </div>
                </div>
                </div>

                <div class="cardEvent">
                <div class="">
                <h6>Prochainement</h6>
                <p><?php $datetime = new DateTime('tomorrow');
echo $datetime->format('d/m/Y'); ?></p>
                <hr>
                        <div class="texty"><?php 
                        $data = [];
                        $db      = \Config\Database::connect();
                        $builder2 = $db->table('agenda');
                        
                        $date = new DateTime("tomorrow");
                        $tomorrow = $date->format('d/m/Y');
                        
                        $query2 = $builder2->where('DATE_FORMAT(date_heure,"%d/%m/%Y")',$tomorrow);
                        $query2 = $builder2->get();
                        
                        foreach($query2->getResult() as $row){
                            echo $row->evenement."<br>";
                        }
                         ?>
                         </div>
                </div>
                </div>
                </div>
                

                </div>
                </div>
                
                
                </div>
            
        </div>
    </section>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,300;1,400&family=Ubuntu:wght@400;500;700&display=swap');
      /* services section styling */
.services, .projects{
    color: #fff;
    background: #87AFC7;
    margin-top:0px;
    /* margin-bottom:0px; */
    height: 100%;
    width: 100%;
}
/* .services .title::before,
.projects .title::before
{
    background: #fff;
} */
.services .title::after,
.projects .title::after{
    background: #111;
}
.services .serv-content .card{
    width: calc(33% - 100px);
    background:#222 ;
    text-align: center;
    border-radius: 6px;
    padding: 60px 25px;
    margin: 40px 30px;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
}
.services .serv-content .cardo{
    width: calc(33% - 100px);
    background:	#87AFC7	 ;
    text-align: center;
    border-radius: 6px;
    /* padding: 60px 25px; */
    margin: 40px 30px;
    border: none;
    /* cursor: pointer; */
    transition: all 0.3s ease;
}
.services .serv-content .cardo .toaster-header{

}
.services .serv-content .cardEvent{
    width: calc(50% - 20px);
    background: #fff ;
    text-align: center;
    /* padding: 10px 25px; */
    /* margin: 40px 30px; */
    border-radius: 0px;
    /* border: none; */
    /* cursor: pointer; */
    transition: all 0.3s ease;
    color: #111; */
}
.services .content{
    display: flex;
    /* align-items: center; */
    flex-wrap: wrap;
    justify-content: space-between;
    
}
h6{
    margin-top: 5px;
}
.services .serv-content .card:hover{
    background: #2B547E;
}
.services .serv-content .card .box{
    transition: all 0.3s ease;
}
.services .serv-content .card:hover .box{
    transform: scale(1.05);
    color: #fff;
}

.services .serv-content .card i{
    font-size: 50px;
    color: #fff;
    transition: all 0.3s ease;
}
.services .serv-content .card .text:hover{
    color: #fff;
    text-decoration:none; 
}
.services .serv-content .card .text{
    font-size: 25px;
    font-weight: 500;
    margin: 10px 0 7px 0;
    color: #fff;
}
.services .serv-content .cardEvent .texty{
    font-size: 15px;
    font-weight: 100;
    margin: 10px 0 7px 0;
    color: #111;
}
/* all similar styling code */
section{
    padding: 100px 0;
}
.about, .services, .skills, .projects, .contact, .footer{
    font-family: 'Poppins';
}
.about .about-content,
.services .serv-content,
.skills .skills-content,
.contact .contact-content{
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    justify-content: space-between;
}
section .title{
    position: relative;
    text-align: center;
    font-size: 40px;
    font-weight: 500s;
    margin-bottom: 60px;
    padding-bottom: 20px;
    font-family: 'Ubuntu' sans-serif ;
}
section .title::before{
    content: "";
    position: absolute;
    bottom: 0px;
    left: 50%;
    width: 180px;
    height: 3px;
    background:#111;
    transform: translateX(-50%);

}
section .title::after{
    position: absolute;
    bottom: -17px;
    left: 50%;
    font-size: 20px;
    color: rgb(49, 123, 192);
    padding: 5px;
    background:#fff;
    transform: translateX(-50%);
}

@media (max-width:812px ){
    .services .serv-content .card{
        /* width: calc(50% - 10px); */
        margin-bottom: 20px;
        width: 100%;
    }
    .services .serv-content .cardo{
        /* width: calc(50% - 10px); */
        width: 100%;
        margin-bottom: 20px;
    }
}

@media (max-width: 1200px){
    .services .serv-content .cardo{
    width: 100%;
    }
    .services .serv-content .cardEvent{
    width: calc(50% - 10px);
    background: #fff ;
    text-align: center;
    font-size: 15px;
}
   
}


    </style>