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
    @media print {
  /* style sheet for print goes here */
  .btn-success,.form-title,.material-icons{  display:none; }
}
  </style>
</head>

<body>
  <?php require_once('templates/header.php'); ?>
  <div  class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
    <form method="post" id="update_user" name="update_user" 
    action="">
      <div class="form-group">			
          <?php 
          echo "<a href=\"javascript:history.go(-1)\" ><i class=\"material-icons\" style=\"font-size: 48px;\" title=\"Retourner a l'agenda\">&#xe5c4;</i></a>";
          ?>			
		  <h4 class="form-title">Afficher l'evenement</h4>
          <hr>
	  </div>

      <div class="form-group">
        <label>Date et Heure</label>
        <input type="datetime" name="date_heure" class="form-control" value="<?php echo $agendaD['date_heure']; ?>" readonly>
      </div>

      <div class="form-group">
        <label>Lieu</label>
        <input type="text" name="lieu" class="form-control" value="<?php echo $agendaD['lieu']; ?>" readonly>
      </div>

      <div class="form-group">
        <label>Evenement</label>
        <input type="text" name="evenement" class="form-control" value="<?php echo $agendaD['evenement']; ?>" readonly>
      </div>

      <div class="form-group">
        <label>Membres</label>
        <input type="text" name="membre" class="form-control" value="<?php echo $agendaD['membre']; ?>" readonly>
      </div>

      <div class="form-group">
        <!-- <a href="" class="btn btn-success" onload="window.print()"><span>Imprimer</span></a> -->
        <button onClick="window.print()" class="btn btn-success"><span>Imprimer</span></button>
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