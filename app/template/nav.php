<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Journal universetaire</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample05">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
           
        <?php if ($this->_registry->session->__isset('u') && $this->_registry->session->u->usergroup == 21):?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Adminstration</a>
                <div class="dropdown-menu" aria-labelledby="dropdown05">
                    <a class="dropdown-item" href="/privilage/default">privilage</a>
                    <a class="dropdown-item" href="/usergroup/default">usergroup</a>
                    <a class="dropdown-item" href="/categorie/default">categorie</a>
                    <a class="dropdown-item" href="/user/adduser">Ajoute Un utilisateur </a>
                </div>
            </li>
        <?php endif; ?>
        <?php if ($this->_registry->session->__isset('u') && $this->_registry->session->u->usergroup != 20):?>
        <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">gestion de compte</a>
                <div class="dropdown-menu" aria-labelledby="dropdown05">
                    <a class="dropdown-item" href="/article/myarts">mes article</a>
                    <a class="dropdown-item" href="/eventes/myeve">mes evenement</a>
                    
                </div>
            </li>
        <?php endif; ?>
        </ul>
        <form class="form-inline my-2 my-md-0">
        <?php if (!$this->_registry->session->__isset('u')) :?>
            <a href="/authentication/sign" class='btn btn-primary'>Authentifie</a>
            <a href="/inscription/signup" class='btn btn-info'>inscrire</a>
            <?php else : ?>
            <a href="/authentication/logout" class='btn btn-danger'>logout</a>
            <?php endif;  ?>
        </form>
    </div>
</nav>
<div class="container-fluid" style="margin-top:10px ; ">
<?php if ($this->messenger->getMessages()):?>
    <?php foreach($this->messenger->_messages as $message ): ?>
    <div style="height: 50px;
    padding: 15px; border-raduis:5px;" class="aler alert-<?=$message['1']?>">
        <p><?=$message['0']?></p>
    </div>
    <?php endforeach;?>
    <?php endif; ?>
