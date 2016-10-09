<?php
/*
 * Created on 2016��10��2��
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Anonyuser extends Model{
    //protected $dateFormat = 'U';
    
    protected $primaryKey = 'anonyuser_id';

    protected $guarded = [];    
    
    public function ip(){
        return $this->hasOne('App\Ip');
    }
    
	public function comments(){
        return $this->hasMany('App\Comment');
    }
}
?>
