<h1 style="border-bottom: 1px solid black;width: 400px">Ajoute une privilage </h1>
<form action="" method="POST" >

    <div class="form-group col-md-2 " style="display: block;">
        <label for="groupname">groupe name </label>
        <input type="text" name="groupename" class="form-control" id="groupname"   placeholder="Enterle groupe name " >

    </div>
    
    <?php if (!empty($privilages)) : ?>
    <?php
    foreach($privilages as $privilage ) :
    ?>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="prvgs[]" id="inlineCheckbox1" value="<?= $privilage->id?>">
            <label class="form-check-label" for="inlineCheckbox1"><?=$privilage->privilagename?></label>
        </div>
    <?php endforeach;?>
        <?php endif ; ?>
    <button type="submit" value="submit" name='submit' style="display: block" class="btn btn-primary">Submit</button>

</form>