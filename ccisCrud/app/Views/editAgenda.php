<!DOCTYPE html>
<html>

<head>
  <title>Modifier l'agenda</title>
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
  <?php require_once('templates/header.php'); ?>
  <div  class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
    <form method="post" id="update_user" name="update_user" 
    action="<?= site_url('/update-agenda') ?>">
      <div class="form-group">						
      <?php 
          echo "<a href=\"javascript:history.go(-1)\" ><i class=\"material-icons\" style=\"font-size: 48px;\" title=\"Retourner a l'agenda\">&#xe5c4;</i></a>";
          ?>
					<h4 class="form-title">Modifier l'evenement</h4>
          
          <hr>
				</div>
      <input type="hidden" name="id" id="id" value="<?php echo $agenda_obj['id']; ?>">

      <div class="form-group">
        <label>Date et Heure</label>
        <?php $date = date('d/m/Y H:i:s', strtotime($agenda_obj['date_heure'])); ?>
        <input type="datetime-local" name="date_heure" id="date_heure" class="form-control" valueAsDate="<?php echo $date;?>" onload="getValue();">
      </div>

      <div class="form-group">
        <label>Lieu</label>
        <input type="text" name="lieu" class="form-control" value="<?php echo $agenda_obj['lieu']; ?>">
      </div>

      <div class="form-group">
        <label>Evenement</label>
        <input type="text" name="evenement" class="form-control" value="<?php echo $agenda_obj['evenement']; ?>">
      </div>

      <div class="form-group">
        <label>Membres</label>
        <input type="text" name="membre" class="form-control" value="<?php echo $agenda_obj['membre']; ?>">
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
    
  </script>

<footer>
  <br><br>
<?php require_once("templates/footer.php"); ?>
</footer>
<script>
  function getValue(){
    var datetime = document.getElementByID("date_heure").value;
    alert(datetime);
  }
  
</script>
</body>
</body>

</html>
