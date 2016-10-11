<?php
/*
 * Created on 2016��10��2��
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model{
    //protected $dateFormat = 'U';
    
    protected $primaryKey = 'comment_id';

    protected $guarded = [];    
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function anonyuser(){
        return $this->belongsTo('App\Anonyuser');
    }
    
    public function article(){
        return $this->belongsTo('App\Article');
    }
    
    public function lead(){
        return $this->hasMany('App\Comment');
    }
    
    public function follow(){
        return $this->belongsTo('App\Comment');
    }
}
?>
