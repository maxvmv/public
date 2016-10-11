<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Topic;
use App\Block;

class TopicController extends Controller
{

    public function index()
    {
       $topics = Topic::all();
       $id = 0;
       return view('topic.index', ['page'=>'home','topics'=>$topics,'id'=>$id]);
    }


    public function create()
    {
        $topic = new Topic;
        return view('topic.create', ['topic'=>$topic, 'page'=>'']);
    }


    public function store(Request $request)
    {
         $topic = new Topic;
         $topic->topicname=$request->topicname;
         if(!$topic->save())
         {
            $errors = $topic->getErrors();
            return redirect()->action('TopicController@create')->with('errors',$errors)->withInput();
         }
         return redirect()->action('TopicController@create')->with('message', 'Новый топик '.$topic->topicname.' создан с айди = '.$topic->id.'!');
    }





    public function show($id)
    {
        $blocks = Block::where('topicid', '=', $id)->get();
        $topics = Topic::all();
        return view('topic.index', ['page'=>'home','topics'=>$topics, 'id'=>$id, 'blocks'=>$blocks]);
    }


    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }


    public function search (Request $request)
    {
        $search=$request->search;
        $search='%'.$search.'%';
        $topics = Topic::where('topicname','like', $search)->get();
        return view('topic.index', ['page'=>'home', 'topics'=>$topics,'id'=>0]);
    }
}
