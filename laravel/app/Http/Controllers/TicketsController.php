<?php


namespace App\Http\Controllers;

use App\Models\Ticket;

use App\Models\Comment;

use App\Models\Status;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

class TicketsController extends Controller
{

    /**
    * Display a listing of the resource.
    * Index
    * @return \Illuminate\Http\Response
    */

    public function index()
    {
        //
        $tickets = Ticket::all();
        return \response($tickets);
        
        return view('tickets.index', compact('tickets'));

        /**
        * /api/tickets/{tid}/comments
        */
        
        $comments = Comment::all();
        return \response($comments);

        return view('/tickets/{tid}/comments/.index', compact('coments'));

        /**
        * /api/tickets/{tid}/statuses
        */

        $statuses = Status::all();
        return \response($statuses);

        return view('/tickets/{tid}/statuses/.index', compact('statuses'));

    }


    /**
    * Show
    */
    public function show($id)
    {
        
        $ticket = Ticket::findOrFail($id);
        return \response($ticket);
        return view('tickets.show', compact('ticket'));

        $comments = Comment::findOrFail($id);
        return \response($comments);
        return view('/tickets/{tid}/comments/.show',compact('comment'));

        $statuses = Status::findOrFail($id);
        return \response($ticket);
        return view('/tickets/{tid}/statuses/.show',compact('status'));

    } 



    /**
     * Store
     */
    public function store(Request $request)
    {
        $tick = request()->validate([
            'title' => 'required|max:50',
            'desc' => 'required|max:255',
            'author_id' => 'required',
            'assigned_id' => 'required',
            'status_id' => 'required'
        ]);
      
        $ticket = Ticket::create($tick->all());
        return \response($ticket);

        return redirect('/tickets/'. $ticket -> id);

       /**
        * comments
        */
        $comm  = request()->validate([
            'author_id' => 'required',
            'ticket_id' => 'required',
            'msg'=> 'required|max:255'
        ]); 
        $comment = Comment::create($comm->all());
        return \response($comment);

        return redirect('/tickets/{tid}/comments/'. $comment -> id);

        /**
        * status
        */

        $stat  = request()->validate([
            'name' => 'required|max:30',   
        ]); 
        $status = Status::create($stat->all());
        return \response($status);

        return redirect('/tickets/{tid}/statuses/'. $status -> id);
    }


    /**
    * create
    */ 
    public function create(Request $request)
    {
       
        $tick = request()->validate([
            'title' => 'required|max:50',
            'desc' => 'required|max:255',
            'author_id' => 'required',
            'assigned_id' => 'required',
            'status_id' => 'required'
        ]);

        $ticket = Ticket::create($request->all());
        return redirect('/tickets/'. $ticket -> id);
        return \reponse($ticket);

       /**
        * comments
        */

        $comm  = request()->validate([
            'author_id' => 'required',
            'ticket_id' => 'required',
            'msg'=> 'required|max:255'
        ]);
        
        $comment = Comment::create($request->all());
        return redirect('/tickets/{tid}/comments/'. $comment -> id);
        return \response($comments);


        /**
        * status
        */

        $stat  = request()->validate([
            'name' => 'required|max:30',
        ]); 
        $status = Status::create($stat->all());
        
        return redirect('/tickets/{tid}/statuses/'. $status -> id);
        return \response($status);
    }

    /**
    * update
    */ 
    public function update(Request $request , $id)
    {
       
        $tick = $this->put('/tickets/'.$ticket->id,[
            'title' => 'aixo es un ticket',
            'desc' => 'Tinc una incidencia',
            'author_id'=> 1,
            'assigned_id'=>1,
            'status_id'=>1,
        ]);
        $ticket -> update($tick);
        $ticket=Ticket::update($ticket);
        return redirect('/tickets/'. $ticket -> id);

        $ticket = Ticket::findOrFail($id)
        ->update($request->all());
        return \reponse($ticket);

        /**
        * comments
        */
        $comm = $this->put('/tickets/{tid}/comments/'.$comment->id,[
            'author_id' => 1,
            'ticket_id' => 1,
            'msg'=> 'Aixo es un mistage'
        ]);

        $comment -> update($comm);
        $comment=Comment::update($comment);
        return redirect('/tickets/{tid}/comments/'. $comment -> id);

        $comment = Comment::findOrFail($id)
        ->update($request->all());
        return \response($comments);


        /**
        * status
        */
        $stat = $this->put('/tickets/{tid}/statuses/'.$status->id,[
            
            'name'=> 'Obert '
        ],[
            'name'=> 'Tencat'
        ]);

        $status -> update($stat);
        $status=Status::update($status);
        return redirect('/tickets/{tid}/statuses/'. $status->id);

        $status = status::findOrFail($id)
        ->update($request->all());
        return \response($statuses);
    }

    /**
    * edit
    */ 
    public function edit($id)
    {
        $tick = Ticket::find($id);
        $ticket["ticket"]= $ticket ;
        return view('tickets.formEdit',$ticket);

        /**
        * comments
        */

        $comm = Comment::find($id);
        $comment ["/tickets/{tid}/comments/"]=$comment;
        return view('/tickets/{tid}/comments/.formEdit',$comment);
    }

    /**
     * Remove
     */
    public function destroy(Ticket $ticket,$id)
    {
        
        $ticket -> delete();
     
        return redirect('/tickets/');

        Ticket::destroy($id);
        return \response("la id:${id} ha sigut eliminat");

        /**
        * comments
        */

        $comment -> delete();
        return redirect('/tickets/{tid}/comments/');
        Comment::destroy($id);
        return \response("la id:${id} ha sigut eliminat");
    }
}
