<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Topic;
use App\Block;


class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $block=new Block;
        /**/
        $topics = Topic::pluck('topicname','id');
        return view('block.create', array('block'=>$block, 'topics'=>$topics, 'page'=>'AddBlock'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fname=$request->file('imagepath');
        if($fname != null)
        {
            /*фиксируем родное имя файла */
            $originalname=$request->file('imagepath')->getClientOriginalName();
            /*переносим файлик в указанное место. public_path - корневая папка нашего приложения*/
            $request->file('imagepath')->move(public_path().'/images',$originalname);
        } 

        $block= new Block;
        $block->title=$request->title;
        $block->topicid=$request->topicid;
        $block->content=$request->content;
        if($fname != null)
        {
            $block->imagepath="/images/".$originalname;
        }
        else
        {
            $block->imagepath='';
        }

         if(!$block->save())
         {
            $errors = $block->getErrors();
            return redirect()->action('BlockController@create')->with('errors',$errors)->withInput();
         }
           return redirect()->action('BlockController@create')->with('message', 'Новый блок  создан с айди = '.$block->id.'!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}