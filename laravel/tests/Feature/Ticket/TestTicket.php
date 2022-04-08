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

    /** @test list*/
    public function list_of_tickets_an_api_can_be_retrived()
    {
        $this -> withoutExceptionHandling();
        factory(Ticket::class)->create(); // datos de prueba
        $response = $this -> get('/tickets');// llamo a la ruta
        $response -> assertOk();

        $ticket = Ticket::all();

        $response -> assertViewIs('tickets.index');
        $response -> assertViewHas('tickets'. $tickets);
    }

    /** @test retrived */
    public function a_ticket_api_an_can_be_retrived()
    {
        $this -> withoutExceptionHandling();
        $ticket=factory(Ticket::class)->create(); // datos de prueba
        $response = $this -> get('/tickets'. $ticket->id);// llamo a la ruta
        $response -> assertOk();

        $ticket = Ticket::first();

        $response -> assertViewIs('tickets.show');
        $response -> assertViewHas('tickets'. $tickets);
    }

    /** @test create*/
    public function  a_ticket_an_api_can_be_created()
    {
        $this -> withoutExceptionHandling();
        
        $response = $this->postJson('/tickets', [
            'title' => 'aixo es un ticket',
            'desc' => 'Tinc una incidencia',
            'author_id'=> 10,
            'assigned_id'=>1,
            'status_id'=>1,
        ]);

        $this-> assertCout(1, Ticket::all());
        $ticket = Ticket::first();

         $this -> assertEquals($ticket ->title,'aixo es un ticket');
         $this -> assertEquals($ticket ->desc,'Tinc una incidencia');
         $this -> assertEquals($ticket ->author_id,10);
         $this -> assertEquals($ticket ->assigned_id,1);
         $this -> assertEquals($ticket ->status_id,1);

         $response -> assertRedirect('/tickets/'. $ticket->id);
  

    }

    /** @test title*/
    public function ticket_title_an_api_is_required(){
        $this -> withoutExceptionHandling();
        


        $response = $this->postJson('/atickets', [
            'title' => '',
            'desc' => 'Tinc una incidencia',
            'author_id'=> 10,
            'assigned_id'=>1,
            'status_id'=>1,
        ]);

        $response -> assertSessionHasErrors(['title']);
    }

    /** @test desc*/

    public function ticket_desc_an_api_is_required(){
        $this -> withoutExceptionHandling();
        
        $response = $this->postJson('/atickets', [
            'title' => 'aixo es un ticket',
            'desc' => '',
            'author_id'=> 10,
            'assigned_id'=>1,
            'status_id'=>1,
        ]);

        $response -> assertSessionHasErrors(['desc']);
    }

     /** @test author_id*/


    public function ticket_author_an_api_id_is_required(){
        $this -> withoutExceptionHandling();
        
        $response = $this->postJson('/atickets', [
            'title' => 'aixo es un ticket',
            'desc' => 'Tinc una incidencia',
            'author_id'=> '',
            'assigned_id'=>1,
            'status_id'=>1,
        ]);

        $response -> assertSessionHasErrors(['author_id']);
    }

    /** @test assigned_id*/
    public function ticket_assigned_an_api_id_is_required(){
        $this -> withoutExceptionHandling();
        
        $response = $this->postJson('/atickets', [
            'title' => 'aixo es un ticket',
            'desc' => 'Tinc una incidencia',
            'author_id'=> 10,
            'assigned_id'=>'',
            'status_id'=>1,
        ]);

        $response -> assertSessionHasErrors(['assigned_id']);
    }

    /** @test status_id*/
    public function ticket_status_an_api_id_is_required(){
        $this -> withoutExceptionHandling();
        
        $response = $this->postJson('/atickets', [
            'title' => 'aixo es un ticket',
            'desc' => 'Tinc una incidencia',
            'author_id'=> 10,
            'assigned_id'=>1,
            'status_id'=>'',
        ]);

        $response -> assertSessionHasErrors(['status_id']);
    }




    /** @test update*/
    public function  a_ticket_an_api_can_be_update()
    {
        $this -> withoutExceptionHandling();

        $ticket = factory(Ticket::class)->create(); // datos de prueba
        
        $response = $this->postJson('/tickets/'.$ticket->id, [
            'title' => 'aixo es un ticket',
            'desc' => 'Tinc una incidencia',
            'author_id'=> 10,
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

    /** @test deleted*/
    public function  a_ticket_an_api_can_be_deleted()
    {
        $this -> withoutExceptionHandling();

        $ticket = factory(Ticket::class)->create(); // datos de prueba
        
        $response = $this->delete('/tickets/'.$ticket->id);

        $this-> assertCout(0, ticket::all());
       
        $response -> assertRedirect('/tickets/');

    }

     /** @test api*/
     public function ticket_making_an_api_request()
     {
       
        $response = $this->postJson('/tickets/'.$ticket->id, [
            'title' => 'aixo es un ticket',
            'desc' => 'Tinc una incidencia',
            'author_id'=> 10,
            'assigned_id'=>1,
            'status_id'=>1,
        ]);
        $this->assertTrue($response['created']);

     }

}