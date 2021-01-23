<H1>La liste de tout les evenment </H1>

<?php if($eventes !==false): ?>

<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">#Id</th>
        <th scope="col"> name</th>

        <th scope="col">action</th>
    </tr>
    </thead>


    <tbody>
    <?php foreach($eventes as $evente): ?>
        <tr>

            <td><?=$evente->id?></td>
            <td><?=$evente->evenement?></td>

            <td><a class='btn btn-primary' href="/eventes/edit/<?=$evente->id ?>">edition</a>
                <form style="display: inline-block ; " action="/eventes/delete" method="post">
                    <input type="hidden" value="<?=$evente->id ?>" name="id">
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
    <a class="btn btn-primary" href="/eventes/add">Ajouté un evenement</a>