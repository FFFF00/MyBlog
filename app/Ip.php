<?php
/*
 * Created on 2016��10��2��
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Ip extends Model{
    //protected $dateFormat = 'U';
    
    protected $primaryKey = 'ip_id';

    protected $guarded = [];
    
    public function articles(){
        return $this->belongsToMany('App\Article');
    }  
    
    public function anonyuser(){
        return $this->hasOne('App\Anonyuser');
    }   
}
?>
