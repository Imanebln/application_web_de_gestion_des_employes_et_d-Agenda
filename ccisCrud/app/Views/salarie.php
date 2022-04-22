<br><br><br>
<div class="container-xl2">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Gestion des <b>Contacts (Fonctionnaires)</b></h2>
						<a href="/dashboard" ><i class="material-icons" style="font-size: 48px;" title="Retourner a l'acceuil">&#xe5c4;</i></a>
					</div>
					<div class="col-sm-6">
					    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ajouter un fonctionnaire</span></a>
			
					</div>
					<div class="col-sm-6">
					<form method='get' action="loadSalarie" id="searchForm">
                        <div class="form-inline">
                            <input type="search" name='search'  value='<?= $search ?>' class="form-control" autocomplete="off" placeholder="Chercher un fonctionnaire"/>
							<button type='button' class="btn btn-primary" id='btnsearch' value='Submit' onclick='document.getElementById("searchForm").submit();'><i class="material-icons" >&#xe8b6;</i></button>
						</div>
					</form>
                    </div>
				</div>
			</div>
            <?php
             if(isset($_SESSION['msg'])){
             echo $_SESSION['msg'];
             }
            ?>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>CIN</th>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Adresse</th>
						<th>Email</th>
						<th>Télephone</th>
						<th>Office Télephone</th>
						<th>Département</th>
						<th>Poste</th>
						<th>Siege</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($salarie as $sal): ?>
					<tr>
						<td><?php echo $sal['CIN']; ?></td>
						<td><?php echo $sal['nom']; ?></td>
						<td><?php echo $sal['prenom']; ?></td>
						<td><?php echo $sal['adresse']; ?></td>
						<td><?php echo $sal['email']; ?></td>
						<td><a href="tel:<?php echo $sal['telephone']; ?>"><?php echo $sal['telephone']; ?></a></td>
						<td><a href="tel:<?php echo $sal['office_telephone']; ?>"><?php echo $sal['office_telephone']; ?></a></td>
						<td><?php echo $sal['departement']; ?></td>
						<td><?php echo $sal['poste']; ?></td>
						<td><?php echo $sal['siege']; ?></td>
						<td>
						<a href="<?php echo base_url('show-salarie/'.$sal['id']);?>" ><i class="material-icons" title="View">&#xe417;</i></a>
						<a href="<?php echo base_url('edit-salarie/'.$sal['id']);?>" class="edit"><i class="material-icons" title="Edit">&#xE254;</i></a>
						<a href="<?php echo base_url('Salarie/delete/'.$sal['id']);?>" class="delete" ><i class="material-icons" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
				<?php endforeach; ?>	
				</tbody>
			</table>
			<div style='margin-top: 10px; color:#111;'> 
                <?= $pager->links(); ?>
            </div>
		</div>
	</div>        
</div>
<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
		<form method="post" id="ajouterSalarie" name="ajouterSalarie" action="<?= site_url('/submit-salarie') ?>">
				<div class="modal-header">						
					<h4 class="modal-title">Ajouter un fonctionnaire</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>CIN</label>
						<input type="text" class="form-control" name="CIN" required>
					</div>
					<div class="form-group">
						<label>Nom</label>
						<input type="text" class="form-control" name="nom" required>
					</div>
					<div class="form-group">
						<label>Prenom</label>
						<input type="text" class="form-control" name="prenom" required>
					</div>
					<div class="form-group">
						<label>Adresse</label>
						<input type="text" class="form-control" name="adresse" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" >
					</div>
					<div class="form-group">
						<label>Téléphone</label>
						<input type="number" class="form-control" name="telephone" required>
					</div>
					<div class="form-group">
						<label>Office Téléphone</label>
						<input type="number" class="form-control" name="office_telephone" >
					</div>
					<div class="form-group">
						<label>Département</label>
						<input type="text" class="form-control" name="departement" >
					</div>
					<div class="form-group">
						<label>Poste</label>
						<input type="text" class="form-control" name="poste" required>
					</div>
					<div class="form-group">
					   <label for="siege">Siege</label><br>
                       <div classs="dropdown">
					      <select id="siege" name="siege">
						  <option value="" selected disabled hidden>Choisir ici</option>
					      <option value="Nador">Nador</option>
                          <option value="Oujda">Oujda</option>
					      </select>   
				       </div>
                    
					</div>
					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Ajouter">
				</div>
			</form>
		
		</div>
	</div>
</div>


<script>
      $('.search').select2({
        placeholder: '--- Chercher un salarie ---',
        ajax: {
          url: '<?php echo base_url('Salarie/ajaxSearch');?>',
          dataType: 'json',
          delay: 250,
          processResults: function(data){
            return {
              results: data
            };
          },
          cache: true
        }
      });
</script>
<style>
	.pagination li.active a, .pagination li.active a.page-link {
    background: #87AFC7;
	color: #111;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>