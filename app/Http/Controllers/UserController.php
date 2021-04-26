<?php

namespace App\Http\Controllers;

use App\Http\Requests\addtopicRequest;
use App\Models\Image;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index(){

        return view('addtopic');
    }

    public function addTopic(addtopicRequest $req){

        $useruestions= new Topic();
        $useruestions->title = $req-> input('title');
        $useruestions->text = $req-> input('message');
        $useruestions->category = $req-> input('category');
        $useruestions->autor = Auth::user()->name;
        $useruestions->autor_id = Auth::user()->id;
        $useruestions->save();


        if(isset($req-> image)) {
        $img_name = $req->file('image')->store('uploads','public');
        //$img_name =  stristr($img_name, 'uploads/');

        $image = new Image();
        $image->source = $img_name;
        $image->content_id = $useruestions ->id;
        $image->save();


        }

        $topic_quantity = 1 +  session()->get('quantity');
        session()->put("quantity",$topic_quantity);

        return redirect()->route('addtopic')->with('success',"Ваша статья успешно добавлена!");


    }


    public function allTopics(){

        $user_id = Auth::user()->id;

        $content = Topic::where('autor_id',$user_id)->orderBy('id', 'desc')->get();

        return view('alltopic',['content'=>$content] );

    }

    public function deleteTopic($id){



        $topic = Topic::where('id',$id)->first();
        $this->authorize("update",$topic);
        foreach ($topic->getImage as $img ){
            $img =  $img->source;
            $img = 'public/'.$img;

            Storage::delete($img);
        }

        Topic::find($id)->delete();
        Image::where('content_id',$id)->delete();

        $topic_quantity = -1 +  session()->get('quantity');
        session()->put("quantity",$topic_quantity);

        return back()->with('success',"Статья Удалена!");

    }

    public function edittopic($id) {

        $topic = Topic::where('id',$id)->first();

        $this->authorize("update",$topic);

        return view('edittopic',['content'=>$topic]);

    }

    public function updeitTopic($id, Request $req) {



        $useruestions=  Topic::find($id);

        $this->authorize("update",$useruestions);
        $useruestions->title = $req-> input('title');
        $useruestions->text = $req-> input('message');
        $useruestions->category = $req-> input('category');
        $useruestions->save();

        return redirect()->route("edittopic", $id)->with('success',"Запись успешно изменена!");

    }

    public function autologin () {

        $user= User::first();
        Auth::login($user);
        return back();

    }


}
