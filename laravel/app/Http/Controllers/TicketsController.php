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
       
       
      
        $ticket = Ticket::create($data->all());
      return \response($ticket);

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
        $ticket = Ticket::create($request->all());
        return \reponse($ticket);
    }

    public function update(Request $request , $id)
    {
       
            $response = $this->put('/tickets/'.$ticket->id, [
                'title' => 'aixo es un ticket',
                'desc' => 'Tinc una incidencia',
                'author_id'=> 1,
                'assigned_id'=>1,
                'status_id'=>1,
            ]);
    
            $ticket=Ticket::create($data);
            return redirect('/tickets/'. $ticket -> id);
    
            $ticket = Ticket::findOrFail($id)
            ->update($request->all());
            return \reponse($ticket);

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
    public function destroy(Ticket $ticket,$id)
    {
        //
        $ticket -> delete();
     
        return redirect('/tickets/');

            ticket::destroy($id);
            return \response("la id:${id} ha sigut eliminat");

    }
}
