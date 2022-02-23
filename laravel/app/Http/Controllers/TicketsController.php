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
        return \response($tickets);

        
        /* $data["test"]=["vamos bien"];

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
        //
    

        $ticket=Ticket::create($data->all());
        return redirect('/tickets/'. $ticket -> id);
     
        
    }

    public function create(){
        return view('tickets.showAddForm');
        return redirect('/llistaTicket');
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
    public function destroy($id)
    {
        //
        Ticket::destroy($id);
 
        return \response( "La tarea con el id: ${id} ha sido eliminada");
    }
}
