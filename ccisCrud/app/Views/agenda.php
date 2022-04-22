<br><br><br>
<div class="container-xl2">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Gestion d' <b>Agenda</b></h2>
                        <a href="/dashboard" ><i class="material-icons" style="font-size: 48px;" title="Retourner à l'acceuil">&#xe5c4;</i></a>
					</div> 
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons" >&#xE147;</i> <span>Ajouter un événement</span></a>
						<button onClick="window.print()" class="btn btn-success"><span>Imprimer</span></button>
					</div>
					<!-- <div class="form-outline">
					        <form method='get' action="load" id="searchForm">
                                <input type='search' class="form-control" name='search'  value='<?= $search ?>'>
								<button type='button' class="btn btn-primary" id='btnsearch' value='Submit' onclick='document.getElementById("searchForm").submit();'><i class="material-icons" >&#xe8b6;</i></button>
                            </form>
                    </div> -->
					<div class="col-sm-6">
					<form method='get' action="load" id="searchForm" class="form">
                        <div class="form-inline">
                            <input type="search" name='search'  value='<?= $search ?>' class="form-control" autocomplete="off" placeholder="Chercher un evenement"/>
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
						<th>
							
						</th>
						<th>Date et heure</th>
						<th>Lieu</th>
						<th>Evénement</th>
						<th>Membres</th>
						<th class="actions">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($agenda as $ag): ?>
					<tr>
						<td>
						</td>
						<?php $date = date("d/m/Y H:i:s", strtotime($ag['date_heure'])); ?>
						<td><?php echo $date;?></td>
						<td><?php echo $ag['lieu']; ?></td>
						<td><?php echo $ag['evenement']; ?></td>
						<td><?php echo $ag['membre']; ?></td>
						<td class="actions">
						    <a href="<?php echo base_url('show-agenda/'.$ag['id']);?>" ><i class="material-icons" data-toggle="tooltip" title="Afficher cet événement">&#xe417;</i></a>
							<a href="<?php echo base_url('edit-agenda/'.$ag['id']);?>" class="edit"><i class="material-icons" title="Modifier cet événement">&#xE254;</i></a>
							<a href="<?php echo base_url('Agenda/delete/'.$ag['id']);?>" class="delete" ><i class="material-icons" title="Supprimer cet événement">&#xE872;</i></a>
						</td>
					</tr>
				<?php endforeach; ?>	
				</tbody>
			</table>
			<!-- Paginate --> 
			<div style='margin-top: 10px; color:#111;' class="pag"> 
                <?= $pager->links() ?>
            </div>
		</div>
	</div>        
</div>
<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
		<form method="post" id="ajouter" name="ajouter" action="<?= site_url('/submit-agenda') ?>">
				<div class="modal-header">						
					<h4 class="modal-title">Ajouter un événement</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Date et Heure</label>
						<input type="datetime-local" value="<?php echo date('d/m/Y H:i:s'); ?>" format="date('d/m/Y H:i:s')" class="form-control" name="date_heure" >
					</div>
					<div class="form-group">
						<label>Lieu</label>
						<input type="text" class="form-control" name="lieu" required>
					</div>
					<div class="form-group">
						<label>Evénement</label>
						<input type="text" class="form-control" name="evenement" required>
					</div>
					<div class="form-group">
						<label>Membres</label>
						<input type="text" class="form-control" name="membre" required>
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
        placeholder: '--- Chercher un evenement ---',
        ajax: {
          url: '<?php echo base_url('Agenda/ajaxSearch');?>',
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
	@media print {
  /* style sheet for print goes here */
  .btn-success,.form-title,.material-icons,.form-control,.pag,.form,.actions,h2{  display:none; }
	}
	.pagination li.active a, .pagination li.active a.page-link {
    background: #87AFC7;
	color: #111;
	}

</style>
