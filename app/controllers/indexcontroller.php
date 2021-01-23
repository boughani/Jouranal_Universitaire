<?php
namespace PHPMVC\Controllers;

use PHPMVC\Models\ArticleModel;

class IndexController extends AbstractController
{
    public function defaultAction()
    {
       $k=new ArticleModel() ;

        $this->_data['articles'] = ArticleModel::getNewArticle() ;
        $this->_view();
    }
}
