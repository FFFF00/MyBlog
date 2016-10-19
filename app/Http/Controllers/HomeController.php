<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Http\Requests;
use App\Article;
use App\Category;
use App\Anonyuser;
use App\Tag;
use App\Ip;

use Auth;
use Redis;

class HomeController extends Controller
{
    public function index(Request $req){
		$model = $req->input('model');
		$parameter = $req->input('parameter');
		$hotfive = Article::orderBy('view', 'desc')->take(5)->get();
		$tags = Tag::All()->take(10);
		$user = Auth::user();
		//如果用户未登录，找到一个匿名用户
		if($user == null){			
			//根据token找到该匿名用户		
			$user = $req->session()->get('anony_user');									
		}
		if($model == 'tag'){
			$tag = Tag::where('tag', $parameter)->get()->first();
			$articles = $tag->articles()->orderBy('created_at', 'desc')->paginate(3);			
		}elseif($model == 'category'){
			$category = Category::where('category', $parameter)->get()->first();
			$articles = $category->articles()->orderBy('created_at', 'desc')->paginate(3);			
		}elseif($model == 'hot'){
			$articles = Article::orderBy('view', 'desc')->paginate(3);
		}elseif($model == null){
			$articles = Article::orderBy('created_at', 'desc')->paginate(3);
		}else{
			return 'error model';
		}
		
		$classify = [
			'model' => $model,
			'parameter' => $parameter,
		];
		return view('home', [
			'user' => $user,
			'classify' => $classify,
			'hotfive' => $hotfive,
			'articles' => $articles,
			'tags' => $tags,
		]); 
	}
}
