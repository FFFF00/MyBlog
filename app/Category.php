<?php
/*
 * Created on 2016��10��2��
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    //protected $dateFormat = 'U';
    
    protected $primaryKey = 'category_id';
    
    protected $table = 'categories';

    protected $guarded = [];
    
    public function articles(){
        return $this->hasMany('App\Article');
    }

}
?>
