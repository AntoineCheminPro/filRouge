


  <!-- show the account -->
  <section class="container d-flex justify-content-around">
  
<?php include "View\singleView.php"; ?>
  
    <!-- In case of error on getting single account -->

  <form action="" method="post" class="col-5 m-4 p-4 align-self-center" id="createOperation" name="createOperation" style="min-height: 18rem;">
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="inputState">Type d'operation</label>
        <select id="inputState" class="form-control" name="typeOfOperation">
          <option selected>Dépot</option>
          <option>Retrait</option>
          <option>Virement</option>
        </select>
      </div>
      <div class="form-group col-md-8">
        <label>Libellé</label>
        <input type="text" class="form-control" name="label">
      </div>
      <div class="form-group col-md-8">
        <label>Montant(€)</label>
        <input type="number" class="form-control" name="amount">
        <button type="submit" class="btn btn-warning text-center mt-3" >enregistrer l'operation</button>
      </div>
    </div>
  </form>

</section>
<?php
