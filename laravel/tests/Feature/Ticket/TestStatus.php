<?php

namespace Tests\Feature;
use app\models\Ticket;
use app\models\Status;
use Tests\TestCase;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;



class TestStatus extends Ticketlable{
    use Queueable, SerializesModels;
    use RefreshDatabase;

    /** @test list*/
    public function list_of_status_an_api_can_be_retrived(){

        $this -> withoutExceptionHandling();
        factory(Status::class)->create(); 
        $response = $this -> get('/tickets/{tid}/statuses');
        $response -> assertOk();

        $status = Status::all();

        $response -> assertViewIs('tickets/{tid}/statuses.index');
        $response -> assertViewHas('tickets/{tid}/statuses'. $status);
    }

     /** @test retrived*/

    public function a_status_an_api_can_be_retrived(){
        $this -> withoutExceptionHandling();
        $status=factory(Status::class)->create(); 
        $response = $this -> get('tickets/{tid}/statuses'. $status->id);
        $response -> assertOk();

        $status = Status::first();

        $response -> assertViewIs('tickets/{tid}/statuses.show');
        $response -> assertViewHas('tickets/{tid}/statuses'. $statuses);
    }

     /** @test create*/
     public function  a_statuses_an_api_can_be_created(){
        $this -> withoutExceptionHandling();
        
        $response = $this->postJson('/tickets/{tid}/statuses', [
            'name'=>"obert",
            
        ],[
            'name'=>"tancat",
        ]);

        $this-> assertCout(1, Status::all());
        $status = Status::first();

        $this -> assertEquals($status -> name,"obert");
        $this -> assertEquals($status -> name,"tancat");
     

        $response -> assertRedirect('/tickets/{tid}/statuses/'. $status->id);
    }

     /** @test name*/

     public function status_name_an_api_is_required(){
        $this -> withoutExceptionHandling();
        
        $response = $this->postJson('/tickets/{tid}/statuses', [
            'name'=>"",
            
        ],[
            'name'=>"",
        ]);

        $response -> assertSessionHasErrors(['name']);
    }

    /** @test update*/

    public function  a_status_an_api_can_be_update(){
        $this -> withoutExceptionHandling();

        $status = factory(Status::class)->create();
        
       
        $response = $this->postJson('/tickets/{tid}/statusses/'.$status -> id, [
            'name'=>"obert",
            
        ],[
            'name'=>"tancat",
        ]);

        $this-> assertCout(1, Status::all());
        $status = Status::fresh();

        
        $this -> assertEquals($status -> name,"obert");
        $this -> assertEquals($status -> name,"tancat");
     

        $response -> assertRedirect('/tickets/{tid}/statusses/'. $status->id);
    }

    /** @test delete*/
    public function  a_status_an_api_can_be_deleted(){
        
        $this -> withoutExceptionHandling();

        $status = factory(Status::class)->create(); 
        
        $response = $this->delete('/tickets/{tid}/statuses/'.$status->id);

        $this-> assertCout(0, Status::all());
       
        $response -> assertRedirect('/tickets/{tid}/statuses/');
    }


    /**@test Api */
    public function test_making_an_api_request()
    {
        
        $response = $this->postJson('/tickets/{tid}/statuses/'.$status->id, [
            'name'=>"obert",
            
        ],[
            'name'=>"tancat",
        ]);

        $this->assertTrue($response['created']);
    }



}