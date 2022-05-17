<?php


class CustomeError{

private $erros=[];


public function set($name,$message="خطا"):void
{
    # code...
    $this->errors[$name][]=$message;
}


public function has($name)
{
    # code...
    return isset($this->errors[$name]);
}

public function first($name)
{
    # code...
    return $this->has($name)?$this->errors[$name][0]:null;

}

public function count()
{
    # code...
    return count($this->errors);
}

}