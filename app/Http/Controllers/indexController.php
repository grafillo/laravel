<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class indexController extends Controller
{
            public function index(){

                //$category = Category::all();
                $content = Topic::orderBy('id', 'desc')->paginate(3);

                if(isset(Auth::user()->id)){

                 $id = Auth::user()->id;
                 $topic_quantity = count(Topic::where('autor_id',$id)->get());
                 session()->put("quantity",$topic_quantity);

                 return view('index',['content'=>$content]);
                }

                return view('index',['content'=>$content]);


            }


    public function getCategory(Request $req, $category){

        $name_category = Category::where('alias',$category)->first();
        $category = Category::where('alias',$category)->first()->type()->paginate(2);

        //сделано через жопу вообще можно было не вязывать таблицы хэз мэни так как пагинация тупит
        //dd($category);

        return view('content',['name_category'=>$name_category,'category'=>$category]);
    }


    public function getTopic($id){

        $topic = Topic::where('id',$id)->get();

        return view('onetopic',['content'=>$topic]);

    }
}
