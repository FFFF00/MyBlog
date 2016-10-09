<?php
/*
 * Created on 2016��10��6��
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model{
    //protected $dateFormat = 'U';
    
    protected $primaryKey = 'tag_id';

    protected $guarded = [];
    
    public function articles(){
        return $this->belongsToMany('App\Article');
    }  
}  
?>
