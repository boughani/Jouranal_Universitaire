<h1 style="border-bottom: 1px solid black;width: 400px">Ajoute une privilage </h1>
<form action="" method="POST" >

    <div class="form-group col-md-2 ">
        <label for="categorie">categorie name </label>
        <input type="text" name="categorie" class="form-control" id="categorie" value="<?= $categorie->name  ?>"  placeholder="Enter Privilage name ">

    </div>


    <button type="submit" name='submit' class="btn btn-primary">Submit</button>

</form>