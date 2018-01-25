<?php namespace App\Http\Controllers;
use App\Article;
use App\Http\Requests;
use Request;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    public function index(){

        # This is one way to do a Query, however is too long
        #$articles = Article::latest('published_at')->where('published_at','<=', Carbon::now())->get();

        #QUERY SCOPES
        $articles = Article::latest('published_at')->Published()->get();

        return view('articles.index', compact('articles'));
    }


    public function show($id){
        
        $article = Article::findOrFail($id);

        dd($article->published_at);  

        return view('articles.show',compact('article'));
    }


    public function create(){
        
        return view('articles.create');
    }


   
    #One MEthod for validation
    public function store(ArticleRequest $request){

       
        Article::create($request->all());

        return redirect('articles');
    }



    public function edit($id)
    {

        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));
    }



    public function update($id, ArticleRequest $request)
    {

        $article = Article::findOrFail($id);

        $article->update($request->all());

        return redirect('articles');


    }


}



