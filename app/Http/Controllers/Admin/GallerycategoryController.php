<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gallerycategory;
use Illuminate\Validation\Rule;
class GallerycategoryController extends Controller
{
    
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallerycategories = Gallerycategory::all();

        return view('admin.gallerycategory')->with('gallerycategories',$gallerycategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallerycategory_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Request()->validate([
            'name'=>'required|unique:gallerycategories'
        ]);

        Gallerycategory::create([
         'name'=>$data['name'],
         'slug'=>createSlug($data['name'])
        ]);

        return redirect()->back()->with('success','Catégorie ajoutée avec succès.');
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
        $category = Gallerycategory::where('id',$id)->firstOrFail();
        return view('admin.gallerycategory_form')->with('category',$category);
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
        $data = Request()->validate([
            'name'=>[
                'required',
                Rule::unique('gallerycategories')->ignore($id),
            ]
        ]);

        $category = Gallerycategory::where('id',$id)->firstOrFail();

        $category->update([
         'name'=>$data['name'],
         'slug'=>createSlug($data['name'])
        ]);
        $gallerycategories = Gallerycategory::all();

        return redirect()->route('gallerycategory.index')->with(['success'=>'Catégorie modifiée avec succès.','gallerycategories'=>$gallerycategories]);
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
