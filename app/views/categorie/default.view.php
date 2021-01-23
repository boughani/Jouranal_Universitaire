<h1>List of categorie </h1>
<?php if($categories !==false): ?>

<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">#Id</th>
        <th scope="col"> name</th>

        <th scope="col">action</th>
    </tr>
    </thead>


    <tbody>
    <?php foreach($categories as $categorie): ?>
        <tr>

            <td><?=$categorie->id?></td>
            <td><?=$categorie->name?></td>

            <td><a class='btn btn-primary' href="/categorie/edit/<?=$categorie->id ?>">edition</a>
                <form style="display: inline-block ; " action="/categorie/delete" method="post">
                    <input type="hidden" value="<?=$categorie->id ?>" name="id">
                    <button style="display: inline-block ; " class="btn btn-danger" type="submit">suprime</button>
                </form>
            </td>
        </tr>
    <?php endforeach ; ?>
    <?php else: ?>
        <div class="alert alert-warning ">
            les categorie n'existe pas Voulez vous inseres des categories
        </div>
    <?php endif; ?>
    <a class="btn btn-primary" href="/categorie/add">Ajouté de categorie</a>
