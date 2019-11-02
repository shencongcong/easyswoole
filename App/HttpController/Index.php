<?php
namespace App\HttpController;


use EasySwoole\Http\AbstractInterface\Controller;

class Index extends Controller
{

    function index()
    {
        // TODO: Implement index() method.
        $this->response()->write('hello world');
    }

    function pool()
    {
        go(function (){

            $redis1=\EasySwoole\Pool\Manager::getInstance()->get('redis1')->getObj();

            $redis1->set('name','仙士可');
            var_dump($redis1->get('name'));

            //回收对象
            \EasySwoole\Pool\Manager::getInstance()->get('redis1')->recycleObj($redis1);
        });
    }
}
