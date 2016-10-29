<?php namespace App\Http\Controllers;

use App\Category;
use App\Article;
use Cache;

class CategoryController extends Controller {
  
  	public function show($title)
	{
		$category = Category::where('title',$title)->first();
		if($category){
			$articles = Article::where('cat_id','=',$category->id)->orderBy('created_at','desc')->paginate(getConfig('web_perpage'));
		}else{
			abort(404);
		}
		return view('frontend.category.show')->withArticles($articles)->withTitle($category->title);
	}

}