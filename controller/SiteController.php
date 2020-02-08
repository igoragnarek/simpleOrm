<?php

namespace Controller;

use Model\Article;

class SiteController
{
    
    public function page($id = 1)
    {
        $article = Article::getById($id);

        //$article = new Article;
        //$article->setName("newName4");
        //$article->setText("newText4");
        //$article->setDate("2020-02-07 02:22:22");
        //$article->save();

        $article->delete();
    }

}