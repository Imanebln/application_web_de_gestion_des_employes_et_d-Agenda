<br>
<br><br>
<div class="container-xl2">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Gestion des <b>Contacts</b> (Membres)</h2>
						<a href="/dashboard" ><i class="material-icons" style="font-size: 48px;" title="Retourner a l'acceuil">&#xe5c4;</i></a>

					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ajouter un membre</span></a>

					</div>
					<div class="col-sm-6">
					<form method='get' action="loadMembre" id="searchForm">
                        <div class="form-inline">
                            <input type="search" name='search'  value='<?= $search ?>' class="form-control" autocomplete="off" placeholder="Chercher un membre"/>
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
						<th>Ville</th>
						<th>Email</th>
						<th>Télephone</th>
						<th>FIX</th>
						<th>FAX</th>
						<th>Categorie</th>
						<th>Profession</th>
						<th>Qualité</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($membre as $mem): ?>
					<tr>
						
						<td><?php echo $mem['CIN']; ?></td>
						<td><?php echo $mem['nom']; ?></td>
						<td><?php echo $mem['prenom']; ?></td>
						<td><?php echo $mem['adresse']; ?></td>
						<td><?php echo $mem['ville']; ?></td>
						<td><?php echo $mem['email']; ?></td>
						<td><a href="tel:<?php echo $mem['telephone']; ?>"><?php echo $mem['telephone']; ?></a></td>
						<td><a href="tel:<?php echo $mem['fix']; ?>"><?php echo $mem['fix']; ?></a></td>
						<td><?php echo $mem['fax']; ?></td>
						<td><?php echo $mem['categorie']; ?></td>
						<td><?php echo $mem['profession']; ?></td>
						<td><?php echo $mem['qualite']; ?></td>
						<td>
						<a href="<?php echo base_url('show-membre/'.$mem['id']);?>" ><i class="material-icons" data-toggle="tooltip" title="View">&#xe417;</i></a>
						<a href="<?php echo base_url('edit-membre/'.$mem['id']);?>" class="edit"><i class="material-icons" title="Edit">&#xE254;</i></a>
						<a href="<?php echo base_url('Membre/delete/'.$mem['id']);?>" class="delete" ><i class="material-icons" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
				<?php endforeach; ?>	
				</tbody>
			</table>
			<!-- Paginate --> 
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
		<form method="post" id="ajouter" name="ajouter" action="<?= site_url('/submit-form') ?>">
				<div class="modal-header">						
					<h4 class="modal-title">Ajouter un membre</h4>
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
						<label>Ville</label>
						<input type="text" class="form-control" name="ville" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" name="email" >
					</div>
					<div class="form-group">
						<label>Telephone</label>
						<input type="number" class="form-control" name="telephone" required step="none">
					</div>
					<div class="form-group">
						<label>FIX</label>
						<input type="number" class="form-control" name="fix" >
					</div>
					<div class="form-group">
						<label>FAX</label>
						<input type="text" class="form-control" name="fax" >
					</div>
					<div class="form-group">
						<label>Profession</label>
						<input type="text" class="form-control" name="profession" required>
					</div>
					<div class="form-group">
						<label>Qualite</label>
						<input type="text" class="form-control" name="qualite" required>
					</div>	
					<div class="form-group">
					   <label for="categorie">Categorie</label><br>
                       <div classs="dropdown">
					      <select id="categorie" name="categorie">
						  <option value="" selected disabled hidden>Choisir ici</option>
					      <option value="Commerce">Commerce</option>
                          <option value="Industrie">Industrie</option>
						  <option value="Services">Services</option>
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
        placeholder: '--- Chercher un membre ---',
        ajax: {
          url: '<?php echo base_url('Membre/ajaxSearch');?>',
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