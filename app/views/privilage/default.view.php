    <h1>Privilages</h1>
    <?php if($privilages !==false): ?>

    <table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">#Id</th>
        <th scope="col">privilage name</th>
        <th scope="col">privilage</th>
        <th scope="col">action</th>
    </tr>
    </thead>


    <tbody>
    <?php foreach($privilages as $privilage): ?>
    <tr>

        <td><?=$privilage->id?></td>
        <td><?=$privilage->privilagename?></td>
        <td><?=$privilage->privilage?></td>
        <td><a class='btn btn-primary' href="/privilage/edit/<?=$privilage->id ?>">edition</a>
            <form style="display: inline-block ; " action="/privilage/delete" method="post">
                <input type="hidden" value="<?=$privilage->id ?>" name="id">
                <button style="display: inline-block ; " class="btn btn-danger" type="submit">suprime</button>
            </form>
        </td>
    </tr>
    <?php endforeach ; ?>
    <?php else: ?>
   <div class="alert alert-warning ">
    les Privilages n'existe pas Voulez vous inseres des privilage
   </div>
<?php endif; ?>
    <a class="btn btn-primary" href="/privilage/add">Ajouté de Privilage</a>
