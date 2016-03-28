<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Clips;
use App\URLVideos;
use Illuminate\Http\Request;
use Input;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ComentarioController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function videoYoutube1()
    {

        $urlClip=  Input::get('url1');
        $urlClip=  str_replace(".com/", ".com/embed/", $urlClip);
        $Descripcion=Input::get('nameClip1');
        if(URLVideos::find(1)){
            $video=URLVideos::find(1);

            $video->url =$urlClip;
            $video->descripcion=$Descripcion;
            $video->update();
            return redirect()->back();
        }
        else{
            $nuevoVideo=new URLVideos;
            $nuevoVideo->url=$urlClip;
            $nuevoVideo->descripcion=$Descripcion;
            $nuevoVideo->save();
            return redirect()->back();

        }


    }
    public function videoYoutube2()
    {

        $urlClip=  Input::get('url2');
        $urlClip=  str_replace(".com/", ".com/embed/", $urlClip);
        $Descripcion=Input::get('nameClip2');
        if(URLVideos::find(1)){
            $video=URLVideos::find(1);

            $video->url =$urlClip;
            $video->descripcion=$Descripcion;
            $video->update();
            return redirect()->back();
        }
        else{
            $nuevoVideo=new URLVideos;
            $nuevoVideo->url=$urlClip;
            $nuevoVideo->descripcion=$Descripcion;
            $nuevoVideo->save();
            return redirect()->back();

        }
    }
    public function videoYoutube3()
    {

        $urlClip=  Input::get('url3');
        $urlClip=  str_replace(".com/", ".com/embed/", $urlClip);
        $Descripcion=Input::get('nameClip3');
        if(URLVideos::find(1)){
            $video=URLVideos::find(1);

            $video->url =$urlClip;
            $video->descripcion=$Descripcion;
            $video->update();
            return redirect()->back();
        }
        else{
            $nuevoVideo=new URLVideos;
            $nuevoVideo->url=$urlClip;
            $nuevoVideo->descripcion=$Descripcion;
            $nuevoVideo->save();
            return redirect()->back();

        }
    }


    public function clipscommen(){
        if(Auth::check()){
            $comentarioTexto=Input::get('comentarioTexto');
            $id=Input::get('InputId');
            //  var_dump(Input::all());

            $data = array(
                'message' => $comentarioTexto,
                'user_id' => $id

            );
        }
        $response = Clips::create($data);
        if ($response) {
            return redirect()->back();


        }

    }


    public function save(){

        if(Auth::check()){
        $comentarioTexto=Input::get('comentarioTexto');
        $id=Input::get('InputId');
      //  var_dump(Input::all());

            $data = array(
                'message' => $comentarioTexto,
                'user_id' => $id

            );
        }
            $response = Comment::create($data);
            if ($response) {
                return redirect()->back();

            }







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
