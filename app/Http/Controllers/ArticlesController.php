<?php namespace App\Http\Controllers;
use App\Article;
use App\Tag;
use App\Http\Requests;
use Request;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;



class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' =>'create']);
    }


    public function index(){

        # This is one way to do a Query, however is too long
        #$articles = Article::latest('published_at')->where('published_at','<=', Carbon::now())->get();


        #QUERY SCOPES
        $articles = Article::latest('published_at')->Published()->get();

        return view('articles.index', compact('articles'));
    }


    public function show(Article $article){
        
        return view('articles.show',compact('article'));
    }


    public function create(){
        
        $tags = Tag::pluck('name','id');

        return view('articles.create', compact('tags'));
    }


   
    #One MEthod for validation
    public function store(ArticleRequest $request){

             
        $article = \Auth::user()->articles()->create($request->all());
        
        $article->tags()->attach($request->input('tag_list'));

        \Session::flash('flash_message','Your article has been created!');

        return redirect('articles');
    }



    public function edit(Article $article)
    {
        $tags = Tag::pluck('name','id');

        return view('articles.edit', compact('article','tags'));
    }



    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());

        return redirect('articles');
    }


}



