<?php


namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\status;
use App\Models\user;
use Illuminate\Http\Request;

use Illuminate\Http\Response;

class TicketsController extends Controller
{

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

        $status = status::all();
        return \response($status);
        
        $user = user::all();
        return \response($user);

       
       
        $data["test"]=["vamos bien"];

        $data["tickets"]=Ticket::all();
        
        return view('tickets.tickets',$data);
        
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
    }

    public function create(){
        return view('tickets.showAddForm');
        return redirect('listaTicket');
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
     /*   
        $status = status::fTndOrFail($status_id);
        $autho = status::fTndOrFail($author_id); 
    */
        return \response(ticket,status,);
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

        return redirect('listaTicket');

     /*   
        status::findOrFail($id);
        user::findOrFail($id);
        Ticket::findOrFail($id) 
            ->update($request->all());

        return \response("Tarea actualizada");
*/
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
  /*       user::destroy($id);
        status::destroy($id); */
        return \response( "La tarea con el id: ${id} ha sido eliminada");
    }
}
