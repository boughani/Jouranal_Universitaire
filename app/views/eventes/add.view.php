<h1 style="border-bottom: 1px solid black;width: 400px">Ajoute une categorie </h1>
<form action="" method="POST" >

    <div class="form-group col-md-2 ">
        <label for="eventes">evenemnt</label>
        <input type="text" name="event" class="form-control" id="event"   placeholder="Enter votre evinement">
    </div>
    <div class="form-group">
    <label for="cars">choisir une categorie</label>

    <select class="form-control col-md-2" name="cat" id="cat">
        <?php foreach ($cats as $cat):?>
<option value="<?=$cat->id ?>" > <?=$cat->name ?></option>
        <?php endforeach;?>
    </select>
    </div>
    
    <button type="submit" name='submit' class="btn btn-primary">Submit</button>

</form>