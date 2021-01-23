<h1>Privilages</h1>
<?php if($ugroup !==false): ?>

<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">#Id</th>
        <th scope="col">groupe name </th>

        <th scope="col">action</th>
    </tr>
    </thead>


    <tbody>
    <?php foreach($ugroup as $ug): ?>
        <tr>

            <td><?=$ug->groupeid?></td>
            <td><?=$ug->groupename?></td>

            <td><a class='btn btn-primary' href="/usergroup/edit/<?=$ug->groupeid ?>">edition</a>
                <form style="display: inline-block ; " action="/usergroup/delete" method="post">
                    <input type="hidden" value="<?=$ug->groupeid ?>" name="id">
                    <button style="display: inline-block ; " class="btn btn-danger" type="submit">suprime</button>
                </form>
            </td>
        </tr>
    <?php endforeach ; ?>
    <?php else: ?>
        <div class="alert alert-warning ">
            aucun user groupe Existant voullez vous Insirez des user groupe
        </div>
    <?php endif; ?>
    <a class="btn btn-primary" href="/usergroup/add">Ajouté un user groupe</a>