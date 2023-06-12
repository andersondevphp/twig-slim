<?php

namespace app\traits;

use app\src\Load;

trait View
{
    protected $twig;

    protected function twig()
    {
        //$loader = new \Twig\Loader\FilesystemLoader('../app');
        $loader = new \Twig\Loader\FilesystemLoader('app/views', getcwd() . '/..');
        $this->twig = new \Twig\Environment($loader, [
            //'cache' => '/path/to/compilation_cache',
            'debug' => true
        ]);
    }

    protected function functions()
    {
        $functions = Load::file('/functions/twig.php');
        foreach($functions as $function) {
            $this->twig->addFunction($function);
        }
    }

    protected function load()
    {
        $this->twig();
        $this->functions();
    }

    protected function view($view, $data)
    {
        $this->load();
        $template = $this->twig->load($view . '.html');
        echo $template->render($data);
    }
}
