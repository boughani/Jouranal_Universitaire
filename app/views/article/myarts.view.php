<H1>La liste de tout les article </H1>

<?php if($articles !==false): ?>

<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">#Id</th>
        <th scope="col"> name</th>

        <th scope="col">action</th>
    </tr>
    </thead>


    <tbody>
    <?php foreach($articles as $article): ?>
        <tr>

            <td><?=$article->id?></td>
            <td><?=$article->title?></td>

            <td><a class='btn btn-primary' href="/article/edit/<?=$article->id ?>">edition</a>
                <form style="display: inline-block ; " action="/artcile/delete" method="post">
                    <input type="hidden" value="<?=$article->id ?>" name="id">
                    <button style="display: inline-block ; " class="btn btn-danger" type="submit">suprime</button>
                </form>
            </td>
        </tr>
    <?php endforeach ; ?>
    <?php else: ?>
        <div class="alert alert-warning ">
            les artilce n'existe pas Voulez vous inseres des categories
        </div>
    <?php endif; ?>
    <a class="btn btn-primary" href="/article/add">Ajouté un article</a>