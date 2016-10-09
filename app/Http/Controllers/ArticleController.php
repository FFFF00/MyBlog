<?php
/*
 * Created on 2016��10��3��
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Http\Requests;
use App\Article;
use App\Category;
use App\Tag;
use App\Ip;

use Auth;


class ArticleController extends Controller{
	public function add(Request $req){
		$article_args = [
			'article_id' => $req->input('article_id'),
			'category_id' => $req->input('category_id'),
			'title' => $req->input('title'),
			'outline' => $req->input('outline'),
			'title_img' => $req->input('title_img'),
			'author' => $req->input('author'),
			'content' => $req->input('content'),
		];
		$article = Article::create($article_args);
		
		$category = $article->category;
		$category->count ++;
		$category->save();
		
		$tag_str = explode(';', $req->input('tags'));
		$tag_str = array_filter($tag_str);
		
		foreach($tag_str as $t){
			$tag = Tag::where('tag', $t)->first();
			if($tag){
				$tag->count ++;
				$tag->save();
			}else{
				$tag_args = [
					'tag_id'  => $req->input('tag_id'),
					'count' => 1,
					'tag' => $t,
				];
				$tag = Tag::Create($tag_args);
			}
			
			if($article->tags->where('tag_id', $tag->tag_id)->first() == null){
				$article->tags()->attach($tag->tag_id);					
			}						
		}
		return ;
	}
	
	public function queryById(Request $req){		
		$article = Article::find($req->input('article_id'));
		
		$realip = $this->_realip();
		$ip = Ip::where('ip', $realip)->first();
		
		if($ip){
			//do nothing
		}else{
			$ip_args = [
				'ip_id' => $req->input('ip_id'),
				'ip' => $realip,
			];
			$ip = Ip::create($ip_args);
		}
		
		if($article->ips->where('ip_id', $ip->ip_id)->first() == null){
				$article->ips()->attach($ip->ip_id);
				$article->view ++;
				$article->save();					
		}
		return view('article', ['article' => $article]);
	}
	
	public function hotfive(Request $req){
		
		return view('home', [
			'articles' => $articles,
			'tags' => $tags,
		]); 
	}
	
	private function _realip() {
	    if (getenv('HTTP_CLIENT_IP')){
	        $ip = getenv('HTTP_CLIENT_IP');
	    } elseif (getenv('HTTP_X_FORWARDED_FOR')){
	        $ip = getenv('HTTP_X_FORWARDED_FOR');
	    } elseif (getenv('REMOTE_ADDR')){
	        $ip = getenv('REMOTE_ADDR');
	    } else{
	        $ip = $HTTP_SERVER_VARS['REMOTE_ADDR'];
	    }
	    return $ip;
	} 
	
	public function delete(Request $req){
		Article::destroy($req->input('article_id'));
		
		return view('article', ['article' => $article]);
	}
	
	public function alter(Request $req){
		$article = Article::find($req->input('article_id'));
		
		return view('alter', ['article' => $article]);
	}
	
	public function update(Request $req){
		
	}
}

?>
