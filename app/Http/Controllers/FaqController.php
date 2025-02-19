<?php

namespace App\Http\Controllers;

use App\FaqStudent;
use Illuminate\Http\Request;
use DB;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = FaqStudent::all();
        return view('admin.faq.index',compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.faq_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'title'=>'required',
            'details'=>'required',
        ]);
        
        $input = $request->all();

        $data = FaqStudent::create($input);
        $data->type = $request->type;
        $data->save();

        return redirect('faq');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find= FaqStudent::find($id);
        return view('admin.faq.faq_edit', compact('find'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $data = $this->validate($request,[
            'title'=>'required',
            'details'=>'required',
        ]);

        $data = FaqStudent::findorfail($id);
        $input = $request->all();
        
        $data->update($input);
        $data->type = $request->type;
        $data->save();
        return redirect('faq'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('faq_students')->where('id',$id)->delete();
        return redirect('faq');
    }
}
