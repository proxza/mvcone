<?php

/**
 * Created by PhpStorm.
 * User: n00b.DetecteD
 * Date: 15.11.2017
 * Time: 10:01
 */
class PostsNew
{

    public function indexAction()
    {
        echo "PostsNew::index";
    }

    public function testAction()
    {
        echo "PostsNew::test";
    }

    public function testPageAction()
    {
        echo "PostsNew::testPage";
    }

    public function before()
    {
        echo "PostsNew::before";
    }
}