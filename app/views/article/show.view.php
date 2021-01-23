
 <div>
 <article class="article">
                <a href="article.html" class="article-img"> <img class="article-image" src="<?= isset($article->img) ?'/uploads/images/'.$article->img :'/uploads/images/noimage.jpg'  ?>" alt="image d'article"> </a>

                 <div class="article-content" style="display:inline;">
                    <div class="article-date">Publié le <?= $article->dofadd?>  categorie: <em> <?= $categorie->name ?></em></div>
                    <a href="article.html"> <h2 class="article-titre"><?= $article->title?></h2> </a>
                    <p >
                    <?= $article->content?>
                     </p>
                </div>
            </article>







<div class="container" style="margin-top:150px; " class="col-6">
<?php if($this->_registry->session->__isset('u')):?>
<form action="" method ='POST'>
<div class="form-group">
    <label for="comment">comment</label>
    <textarea class="form-control " name="com" style="border-raduis:5px ; " id="comment" rows="1" cols="30"></textarea>
  </div>
  <button class="btn-primary" name='sub' value='submit'>Submit</button>
</form>
<?php endif ; ?>
</div>



<div class ="container col-6" >


<?php if (!empty($allcoms)): ?>
    <?php foreach($allcoms as $com ):?>
    
    <div class="comment">
           
              <div class="comment-content"><p class="author"><strong><?=$com->username?></strong></p>
                <span>
                    <?=$com->content?>
                </span>
                <?php if($this->_registry->session->__isset('u')):?>
                <?php if($com->writter==$this->_registry->session->u->id ||$this->_registry->session->u->usergroup == 21 ):?>
                <a style='float:right; 'href="/article/artcomdel/<?=$com->id;?>"> supprimer</a>
        </div>
    </div>

<?php endif ; ?>
<?php endif;?>
    </div>
    <?php endforeach ;?>
<?php endif; ?>
</div>