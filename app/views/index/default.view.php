

<?php foreach($articles as $article):?>

<article class="article">
                    <a href="/article/show/<?=$article->id?>" class="article-img"> <img class="article-image" src="<?= isset($article->img) ?'/uploads/images/'.$article->img :'/uploads/images/noimage.jpg'  ?>" alt="image d'article"> </a>
                    <div class="article-content">
                        <div class="article-date">publier le <?=$article->dofadd?></div>
                        <a href="/article/show/<?=$article->id?>"> <h2 class="article-titre"><?= $article->title?></h2> </a>
                        <p>
                        <?= $article->extract()?> <a href="/article/show/<?=$article->id?>"> ...</a>
                        </p>
                    </div>
                </article>

<?php endforeach;  ?>
</div> 