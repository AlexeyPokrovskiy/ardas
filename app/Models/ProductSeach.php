<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSeach extends Model
{
    protected $builder;
    protected $request;

    public function __construct($builder,$request)
    {
        $this->builder = $builder;
        $this->request = $request;

    }

    public function apply()
    {
        foreach ($this->filters() as $filter=>$value){
            if(method_exists($this,$filter) and !empty($value)){
                $this->$filter($value);
            }
        }
        return $this->builder;
    }


    public function name($value){
        $this->builder->where('name','like',"%$value%");
    }


    public function filters()
    {
        return $this->request->all();
    }

}
