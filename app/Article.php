<?php
/*
 * Created on 2016��10��2��
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model{
    //protected $dateFormat = 'U';
    
    protected $primaryKey = 'article_id';

    protected $guarded = [];
    
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    
    public function ips(){
        return $this->belongsToMany('App\Ip');
    }
    
    public function category(){
        return $this->belongsTo('App\Category');
    }
    
	public function comments(){
        return $this->hasMany('App\Comment');
    }
}
?>
