<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $table = 'course';
    //关联模型，关联专业，一对一
    public function profession(){
    	return $this -> hasOne('App\Admin\profession','id','profession_id');
    }
}
