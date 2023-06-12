<?php

namespace app\traits;

trait Validations
{
    private $errors = [];

    protected function required($field)
    {
        if(empty($_POST[$field])) {
            $this->errors[$field][] = flash($field, error('Esse campo é obrigadtório'));
        }
    }

    protected function email($field)
    {
        if(!filter_var($_POST[$field], FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field][] = flash($field, error('Esse campo tem que ter um e-mail válido'));
        }
    }

    protected function telephone($field)
    {
        if(!preg_match("/[0-9]{2} [0-9]{5}\-[0-9]{4}/", $_POST[$field])) {
            $this->errors[$field][] = flash($field, error('Esse formato de telefone é inválido. Formato válido: xx xxxxx-xxxx'));
        }
    }
    
    protected function unique($field, $model)
    {
        $model = "app\\models\\" . ucfirst($model);
        $model = new $model();
        $find = $model->find($field, $_POST[$field]);
        if($find && !empty($_POST[$field])) {
            $this->errors[$field][] = flash($field, error('Esse valor já está cadastrado no banco de dados'));
        }
    }

    protected function max($field, $max)
    {
        //
    }

    public function hasErrors()
    {
        return !empty($this->errors);
    }

    public function errors()
    {
        dd($this->errors);
    }
}
