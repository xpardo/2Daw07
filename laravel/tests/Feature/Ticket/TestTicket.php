<?php

namespace Tests\Feature;
use app\models\Ticket;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestTicket extends Ticketlable{
    use Queueable, SerializesModels;
    use RefreshDatabase;

    /**
     * Create a new message instance.
     *
     * @param array
     * @return void
     */
	public function __construct(array $content)
	{
		$this->content = $content;
    }

    /** @test */
    public function list_of_tickets_can_be_retrived()
    {
        $this -> withoutExceptionHandling();
        factory(Ticket::class)->create(); // datos de prueba
        $response = $this -> get('/tickets');// llamo a la ruta
        $response -> assertOk();

        $ticket = Ticket::all();

        $response -> assertViewIs('tiquet.index');
        $response -> assertViewHas('tiquet'. $tiquets);
    }

    public function a_ticket_can_be_retrived()
    {
        $this -> withoutExceptionHandling();
        $ticket=factory(Ticket::class)->create(); // datos de prueba
        $response = $this -> get('/tickets'. $ticket->id);// llamo a la ruta
        $response -> assertOk();

        $ticket = Ticket::first();

        $response -> assertViewIs('tiquet.show');
        $response -> assertViewHas('tiquet'. $tiquets);
    }




    /** @test */
    public function  a_ticket_can_be_created()
    {
        $this -> withoutExceptionHandling();
        


        $response = $this->tiket('/atickets', [
            'title' => 'aixo es un ticket',
            'desc' => 'Tinc una incidencia',
            'author_id'=> 1,
            'assigned_id'=>1,
            'status_id'=>1,
            ]);

        $this-> assertCout(1, ticket::all());
        $ticket = ticket::first();

         $this -> assertEquals($ticket ->title,'aixo es un ticket');
         $this -> assertEquals($ticket ->desc,'Tinc una incidencia');
         $this -> assertEquals($ticket ->author_id,1);
         $this -> assertEquals($ticket ->assigned_id,1);
         $this -> assertEquals($ticket ->status_id,1);

         $response -> assertRedirect('/tickets/'. $ticket->id);
  

    }

    /** @test */
    public function ticket_title_is_required(){
        $this -> withoutExceptionHandling();
        


        $response = $this->tiket('/atickets', [
            'title' => '',
            'desc' => 'Tinc una incidencia',
            'author_id'=> 1,
            'assigned_id'=>1,
            'status_id'=>1,
            ]);

            $response -> assertSessionHasErrors(['title']);
    }

    /** @test */
    public function  a_ticket_can_be_update()
    {
        $this -> withoutExceptionHandling();

        $ticket = factory(Ticket::class)->create(); // datos de prueba
        
        $response = $this->put('/tickets/'.$ticket->id, [
            'title' => 'aixo es un ticket',
            'desc' => 'Tinc una incidencia',
            'author_id'=> 1,
            'assigned_id'=>1,
            'status_id'=>1,
        ]);

        $this-> assertCout(1, ticket::all());
        $ticket = $ticket->fresh();

        $this -> assertEquals($ticket ->title,'aixo es un ticket');
        $this -> assertEquals($ticket ->desc,'Tinc una incidencia');
        $this -> assertEquals($ticket ->author_id,1);
        $this -> assertEquals($ticket ->assigned_id,1);
        $this -> assertEquals($ticket ->status_id,1);

        $response -> assertRedirect('/tickets/'. $ticket->id);

    }

    /** @test */
    public function  a_ticket_can_be_deleted()
    {
        $this -> withoutExceptionHandling();

        $ticket = factory(Ticket::class)->create(); // datos de prueba
        
        $response = $this->delete('/tickets/'.$ticket->id);

        $this-> assertCout(0, ticket::all());
       
        $response -> assertRedirect('/tickets/');

    }


}