<?php

namespace app\controllers;

use app\src\Validate;

class RegisterController extends Controller
{
    public function create()
    {
        $this->view('register', [
            'title' => 'Cadastro'
        ]);
    }

    public function store()
    {
        $validate = new Validate;
        $data = $validate->validate([
            'name' => 'required:max@5',
            'email' => 'required:email:unique@users',
            'telephone' => 'required:telephone'
        ]);

        //$validate->errors();

        if($validate->hasErrors()) {
            return back();
        }
        //dd($data);
    }
}
