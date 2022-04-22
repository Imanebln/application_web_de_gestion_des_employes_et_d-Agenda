<!DOCTYPE html>
<html>

<head>
  <title>Codeigniter 4 CRUD - Edit User Demo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 500px;
    }

    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
  </style>
</head>

<body>
  <div  class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
    <form method="post" id="update_user" name="update_user" 
    action="<?= site_url('/update-salarie') ?>">
      <div class="form-group">
          <?php 
          echo "<a href=\"javascript:history.go(-1)\" ><i class=\"material-icons\" style=\"font-size: 48px;\" title=\"Retourner à la liste des salariés\">&#xe5c4;</i></a>";
          ?>						
					<h4 class="form-title">Modifier ce salarié</h4>
          <hr>
				</div>
      <input type="hidden" name="id" id="id" value="<?php echo $salarie_obj['id']; ?>">

      <div class="form-group">
						<label>CIN</label>
						<input type="text" class="form-control" name="CIN" value="<?php echo $salarie_obj['CIN']; ?>" required>
					</div>
					<div class="form-group">
						<label>Nom</label>
						<input type="text" class="form-control" name="nom" value="<?php echo $salarie_obj['nom']; ?>" required>
					</div>
					<div class="form-group">
						<label>Prénom</label>
						<input type="text" class="form-control" name="prenom" value="<?php echo $salarie_obj['prenom']; ?>" required>
					</div>
					<div class="form-group">
						<label>Adresse</label>
						<input type="text" class="form-control" name="adresse" value="<?php echo $salarie_obj['adresse']; ?>" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" name="email" value="<?php echo $salarie_obj['email']; ?>">
					</div>
					<div class="form-group">
						<label>Téléphone</label>
						<input type="number" class="form-control" name="telephone" value="<?php echo $salarie_obj['telephone']; ?>" required>
					</div>
					<div class="form-group">
						<label>Office téléphone</label>
						<input type="number" class="form-control" name="office_telephone" value="<?php echo $salarie_obj['office_telephone']; ?>">
					</div>
					<div class="form-group">
						<label>Département</label>
						<input type="text" class="form-control" name="departement" value="<?php echo $salarie_obj['departement']; ?>"required>
					</div>
					<div class="form-group">
						<label>Poste</label>
						<input type="text" class="form-control" name="poste" value="<?php echo $salarie_obj['poste']; ?>" required>
					</div>
          <div class="form-group" >
					   <label for="siege">Siege</label><br>
                <div>
                
					        <select id="siege" name="siege">
                    <option value="<?php echo $salarie_obj['siege']; ?>" selected hidden><?php echo $salarie_obj['siege']; ?></option>
					          <option value="Nador">Nador</option>
                    <option value="Oujda">Oujda</option>
					        </select>   
				       </div>     
					</div>
					<!-- <div class="form-group">
						<label>Siege</label>
						<input type="text" class="form-control" name="siege" value="<?php echo $salarie_obj['siege']; ?>" required>
					</div> -->

      <div class="form-group">
        <button type="submit" class="btn btn-success">Enregistrer</button>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#update_user").length > 0) {
      $("#update_user").validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            maxlength: 60,
            email: true,
          },
        },
        messages: {
          name: {
            required: "Name is required.",
          },
          email: {
            required: "Email is required.",
            email: "It does not seem to be a valid email.",
            maxlength: "The email should be or equal to 60 chars.",
          },
        },
      })
    }
  </script>

<footer>
  <br><br>
<?php require_once("templates/footer.php"); ?>
</footer>
</body>
</body>

</html>