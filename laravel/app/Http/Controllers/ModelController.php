<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Modelo;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
        return view("models.createMod");
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

        $request->validate([
            'manufacturer' => 'required',
            'model' => 'required',
            'photo_id' => 'required',
            'category_id' => 'required',
            'price' => 'required'
        ]);

        Modelo::create($request->all());
     
        return redirect()->route('models.index')
                        ->with('success','Modelo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function show(Modelo $modelo)
    {
        //
        return view('models.show',compact('modelo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function edit(Modelo $modelo)
    {
        //
        return view('models.edit',compact('modelo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modelo $modelo)
    {
        //
        $request->validate([
            
            'manufacturer' => 'required',
            'model' => 'required',
            'photo_id' => 'required',
            'category_id' => 'required',
            'price' => 'required'
        ]);

        
        $modelo->update($request->all());

        return redirect()->route('models.index')
            ->with('success','model updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modelo $modelo)
    {
        //

        $modelo->delete();
    
        return redirect()->route('models.index')
        ->with('success','model delete successfully');
    }
}
