<h1 style="border-bottom: 1px solid black;width: 400px">Ajoute un article </h1>
<form action="" method="POST" enctype="multipart/form-data" >
    <div class="form-group">
        <label for="title">titre</label>
        <input type="text"  name="title" class="form-control" placeholder="ci votre titre " value="<?=$article->title?>">
    </div>
    <div class="form-group">
        <label for="cars">choisir une categorie</label>

        <select class="form-control" name="cat" id="cat">
            <?php foreach ($cats as $cat):?>
                <option value="<?=$cat->id ?>" <?= ($cat->id==$article->categorie)?'selected':""?>><?=$cat->name ?></option>
            <?php endforeach;?>
        </select>
    </div>

    <div class="form-group">
        <input type="file" id="img"  name="img" accept="image/*">
    </div>
    <textarea name="content" id="content"  cols="30" rows="10"><?= $article->content?></textarea>
    <button type="submit" value="submit" name='submit' class="btn btn-primary">Submit</button>

</form>