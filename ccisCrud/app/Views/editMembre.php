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
    action="<?= site_url('/update-membre') ?>">
      <div class="form-group">				
          <?php 
          echo "<a href=\"javascript:history.go(-1)\" ><i class=\"material-icons\" style=\"font-size: 48px;\" title=\"Retourner à la liste des membres\">&#xe5c4;</i></a>";
          ?>		
					<h4 class="form-title">Modifier ce membre</h4>
          <hr>
				</div>
      <input type="hidden" name="id" id="id" value="<?php echo $membre_obj['id']; ?>">

      <div class="form-group">
						<label>CIN</label>
						<input type="text" class="form-control" class="unique" name="CIN" value="<?php echo $membre_obj['CIN']; ?>" required>
					</div>
					<div class="form-group">
						<label>Nom</label>
						<input type="text" class="form-control" name="nom" value="<?php echo $membre_obj['nom']; ?>" required>
					</div>
					<div class="form-group">
						<label>Prenom</label>
						<input type="text" class="form-control" name="prenom" value="<?php echo $membre_obj['prenom']; ?>" required>
					</div>
					<div class="form-group">
						<label>Adresse</label>
						<input type="text" class="form-control" name="adresse" value="<?php echo $membre_obj['adresse']; ?>" required>
					</div>
					<div class="form-group">
						<label>Ville</label>
						<input type="text" class="form-control" name="ville" value="<?php echo $membre_obj['ville']; ?>" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" name="email" value="<?php echo $membre_obj['email']; ?>">
					</div>
					<div class="form-group">
						<label>Telephone</label>
						<input type="number" class="form-control" name="telephone" value="<?php echo $membre_obj['telephone']; ?>" required>
					</div>
					<div class="form-group">
						<label>FIX</label>
						<input type="number" class="form-control" name="fix" value="<?php echo $membre_obj['fix']; ?>">
					</div>
					<div class="form-group">
						<label>FAX</label>
						<input type="text" class="form-control" name="fax" value="<?php echo $membre_obj['fax']; ?>">
					</div>
					<div class="form-group">
						<label>Profession</label>
						<input type="text" class="form-control" name="profession" value="<?php echo $membre_obj['profession']; ?>" required>
					</div>
					<div class="form-group">
						<label>Qualite</label>
						<input type="text" class="form-control" name="qualite" value="<?php echo $membre_obj['qualite']; ?>" required>
					</div>
          <div class="form-group">
					   <label for="categorie">Categorie</label><br>
                       <div classs="dropdown">
					      <select id="categorie" name="categorie">
						  <option value="<?php echo $membre_obj['categorie']; ?>" selected hidden><?php echo $membre_obj['categorie']; ?></option>
					      <option value="Commerce">Commerce</option>
                          <option value="Industrie">Industrie</option>
						  <option value="Services">Services</option>
					      </select>   
				       </div>
					</div>

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
            unique: "value unique"
          },
        },
      })
    }

    $.validator.addMethod("unique", function(value, element) {
      var parentForm = $(element).closest('form');
      var timeRepeated = 0;
      if (value != '') {
         $(parentForm.find(':text')).each(function () {
            if ($(this).val() === value) {
               timeRepeated++;
            }
         });
      }
      return timeRepeated === 1 || timeRepeated === 0;
      
   }, "* Duplicate");
  </script>
<footer>
  <br><br>
<?php require_once("templates/footer.php"); ?>
</footer>
</body>
</body>

</html>