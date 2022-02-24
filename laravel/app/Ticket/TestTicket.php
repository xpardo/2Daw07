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


    /**
     *  A basic functional test example.
     *
     * @return void
     */
    public function test_making_an_api_request()
	{
        $this -> withoutExceptionHandling();
        $response = $this->postJson('/api/tickets', [
            'title' => 'aixo es un ticket',
            'desc' => 'Tinc una incidencia',
            'author_id'=> 1,
            'assigned_id'=>1,
            'status_id'=>1,
            ]);
            $this ->assertOK();
            $this-> assertCout(1, ticket::all());
            $postJson = ticket::first();
  
            $response = $this -> assertEquals($ticket ->title,'aixo es un ticket');
            $response = $this -> assertEquals($ticket ->desc,'Tinc una incidencia');
            $response = $this -> assertEquals($ticket ->author_id,1);
            $response = $this -> assertEquals($ticket ->assigned_id,1);
            $response = $this -> assertEquals($ticket ->status_id,1);
        
        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
        
        $this ->assertOK();
        $this-> assertCout(1, ticket::all());
        $ticket = ticket::first();
        $this->assertTrue($response['created']);
	}
    

}