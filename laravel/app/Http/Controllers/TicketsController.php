<?php


namespace App\Http\Controllers;

use App\Models\Ticket;


use Illuminate\Http\Request;

use Illuminate\Http\Response;

class TicketsController extends Controller
{
//statuses abierto cerrado
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tickets = Ticket::all();

<<<<<<< HEAD

        
        /* $data["test"]=["vamos bien"];

=======
        
        /* $data["test"]=["vamos bien"];

>>>>>>> 1ca3ec147ecf5d54e5b18289b88ae302a288d279
        $data["tickets"]=Ticket::all(); */
        
        return view('tickets.index', compact('tickets'));
        
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
        $ticket = Ticket::fTndOrFail($id);
        return view('tickets.show', compact('ticket'));
      /*   return \response(ticket,status,); */
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'required|max:50',
            'desc' => 'required|max:255',
            'author_id' => 'required',
            'assigned_id' => 'required',
            'status_id' => 'required'
        ]);
<<<<<<< HEAD
       
       
    

        $ticket = Ticket::create($data->all());
        return redirect('/tickets/'. $ticket -> id);
     
    }

    public function create(){
       
        $data = request()->validate([
            'title' => 'required|max:50',
            'desc' => 'required|max:255',
            'author_id' => 'required',
            'assigned_id' => 'required',
            'status_id' => 'required'
        ]);

        $post -> update($data);
        return redirect('/tickets/'. $ticket -> id);
    }
=======
        //
<<<<<<< HEAD
       
    /*  
        $data->validate([
            'status_id' => 'required',
        ]);
        $data->validate([
            'author_id' => 'required',
        ]);
 */

        $ticket = Ticket::create($data->all());
       /*  
       $status = status::create($data->all());
        $user = user::create($data->all()); 
        */
        return ["ok" => "vale"];
        return \response($ticket/* ,$status,$user */);
=======
    

        $ticket=Ticket::create($data->all());
        return redirect('/tickets/'. $ticket -> id);
     
        
>>>>>>> 144cdc595cb5d5a458dfc36d48e69eb804356210
    }

    public function create(){
        return view('tickets.showAddForm');
        return redirect('/llistaTicket');
    }
<<<<<<< HEAD
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $ticket = Ticket::fTndOrFail($id);
     /*   
        $status = status::fTndOrFail($status_id);
        $autho = status::fTndOrFail($author_id); 
    */
        return \response(ticket,status,);
   }
=======
   
>>>>>>> 144cdc595cb5d5a458dfc36d48e69eb804356210
>>>>>>> 1ca3ec147ecf5d54e5b18289b88ae302a288d279

    public function update(Request $request)
    {
<<<<<<< HEAD
       
            $response = $this->put('/tickets/'.$ticket->id, [
                'title' => 'aixo es un ticket',
                'desc' => 'Tinc una incidencia',
                'author_id'=> 1,
                'assigned_id'=>1,
                'status_id'=>1,
            ]);
    
            $ticket=Ticket::create($data);
            return redirect('/tickets/'. $ticket -> id);
    
    
=======
        //
        $ticket=Ticket::find($request->id);
        $ticket->title=$request->title;
        $ticket->desc=$request->desc;
        $ticket->author_id=$request->author_id;
        $ticket->assigned_id=$request->assigned_id;
        $ticket->status_id=$request->status_id;

        return redirect('/llistaTicket');

        Ticket::findOrFail($id)
            ->update($request->all());

        return \response("Tarea actualizada");
>>>>>>> 1ca3ec147ecf5d54e5b18289b88ae302a288d279

    }

    //editar ticket
    public function edit($id){
        $tick = ticket::find($id);
        $ticket["ticket"]= $ticket ;
        return view('tickets.formEdit',$ticket);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
<<<<<<< HEAD
        $ticket -> delete();
     
        return redirect('/tickets/');


=======
        Ticket::destroy($id);
 
        return \response( "La tarea con el id: ${id} ha sido eliminada");
>>>>>>> 1ca3ec147ecf5d54e5b18289b88ae302a288d279
    }
}
