<?php

namespace App\Http\Controllers;

use App\Models\Inventari;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Modelo;

class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view("models.index",
        [
            "categori" => Categoria::all()
          
        ],
        [
            "modelo" => Modelo::all()
        ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("models.createCate");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //codic que funciona:
  /*       

         $request->validate([
            'name' => 'required'
        ]);


        Categoria::create($request->all());
     
        return redirect()->route('models.index')
                        ->with('success','Categoria created successfully.');



 */


        // name file
        $name = $this->_name($request);

        if ($name) {
            // Inserir dades a BD
            $categori = Categoria::create([
                'filepath' => $name['filepath'],
                
            ]);
            \Log::debug("DB storage OK");
            // Patró PRG amb missatge d'èxit
            return redirect()->route('models.index', $categori)
                ->with('success', 'category successfully saved');
        } else {
            // Patró PRG amb missatge d'error
            return redirect()->route("models.createCate")
                ->with('error', 'ERROR nameing category');
        }
                        
    }



    /**
     * Refactor used at store and update
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|bool
     */
    private function _name(Request $request)
    {
        // Validar fitxer
        $validatedData = $request->validate([
            'name' => 'required'
        ]);
        
       
        Categoria::create($request->all());
     

        // Pujar fitxer al disc dur
     
        $exists = \Storage::disk('public');
        if ($exists) {
            \Log::debug("Local storage OK");
      
        } else {
            \Log::debug("Local storage FAILS");
        }

        
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
    public function edit(Categoria $categori)
    {
        //
        return view('models.editCAte',compact('categori'));
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categori)
    {
        //
        $request->validate([
            
            'name' => 'required'
        ]);

        
        $categori->update($request->all());

        return redirect()->route('models.index')
            ->with('success','categori updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categori)
    {
        //

        $categori->delete();
    
        return redirect()->route('models.index')
        ->with('success','categori delete successfully');

     
    }
}
