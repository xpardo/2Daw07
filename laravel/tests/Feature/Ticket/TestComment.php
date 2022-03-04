<?php

namespace Tests\Feature;
use app\models\Ticket;
use app\models\Comment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class TestComment extends Ticketlable{
    use Queueable, SerializesModels;
    use RefreshDatabase;


    
    /** @test list*/
    public function list_of_comment_an_api_can_be_retrived(){
        $this -> withoutExceptionHandling();
        factory(Comment::class)->create(); 
        $response = $this -> get('/tickets/{tid}/comments');
        $response -> assertOk();

        $comment = Comment::all();

        $response -> assertViewIs('tickets/{tid}/comment.index');
        $response -> assertViewHas('tickets/{tid}/comments'. $comment);
    }

    /** @test retrived*/

    public function a_comment_an_api_can_be_retrived(){
        $this -> withoutExceptionHandling();
        $comment=factory(Comment::class)->create(); 
        $response = $this -> get('tickets/{tid}/comments'. $comment->id);
        $response -> assertOk();

        $comment = Comment::first();

        $response -> assertViewIs('tickets/{tid}/comments.show');
        $response -> assertViewHas('tickets/{tid}/comments'. $comments);
    }

    /** @test create*/
    public function  a_comment_an_api_can_be_created(){
        $this -> withoutExceptionHandling();
        
        $response = $this->postJson('/tickets/{tid}/comments', [
            'author_id'=>1,
            'ticket_id'=>1,
            'msg'=>'aixo es un missatge',
        ]);

        $this-> assertCout(1, Comment::all());
        $comment = Comment::first();

        $this -> assertEquals($comment -> author_id,1);
        $this -> assertEquals($comment -> ticket_id,1);
        $this -> assertEquals($comment -> msg,'aixo es un missatge');

        $response -> assertRedirect('/tickets/{tid}/comments/'. $comment->id);
    }

    /** @test author_id*/

    public function comment_author_id_an_api_is_required(){
        $this -> withoutExceptionHandling();
        
        $response = $this->comment('/tickets/{tid}/comments', [
            'author_id'=>'',
            'ticket_id'=>1,
            'msg'=>'aixo es un missatge',
        ]);

        $response -> assertSessionHasErrors(['author_id']);
    }

    /** @test ticket_id*/
    public function comment_ticket_an_id_api_is_required(){
        $this -> withoutExceptionHandling();
        
        $response = $this->comment('/tickets/{tid}/comments', [
            'author_id'=>1,
            'ticket_id'=>'',
            'msg'=>'aixo es un missatge',
        ]);

        $response -> assertSessionHasErrors(['ticket_id']);
    }

    /** @test msg*/
    public function comment_msg_an_api_is_required(){
        $this -> withoutExceptionHandling();
        
        $response = $this->postJson('/tickets/{tid}/comments', [
            'author_id'=>1,
            'ticket_id'=>1,
            'msg'=>'',
        ]);

        $response -> assertSessionHasErrors(['msg']);
    }

    /** @test update*/

    public function  a_commet_an_api_can_be_update(){
        $this -> withoutExceptionHandling();

        $comment = factory(Comment::class)->create();
        
       
        $response = $this->postJson('/tickets/{tid}/comments'.$comment -> id, [
            'author_id'=>1,
            'ticket_id'=>1,
            'msg'=>'aixo es un missatge',
        ]);

        $this-> assertCout(1, Comment::all());
        $comment = Comment::fresh();

        $this -> assertEquals($comment -> author_id,1);
        $this -> assertEquals($comment -> ticket_id,1);
        $this -> assertEquals($comment -> msg,'aixo es un missatge');

        $response -> assertRedirect('/tickets/{tid}/comments/'. $comment->id);
    }

    /** @test delete*/
    public function  a_comment_an_api_can_be_deleted(){
        
        $this -> withoutExceptionHandling();

        $comment = factory(Comment::class)->create(); // datos de prueba
        
        $response = $this->delete('/tickets/{tid}/comments/'.$comment->id);

        $this-> assertCout(0, Comment::all());
       
        $response -> assertRedirect('/tickets/{tid}/comments/');
    }

     /** @test api*/
     public function comment_making_an_api_request()
     {
       
        $response = $this->postJson('/tickets/{tid}/comments/'.$comment->id, [
            'author_id'=>1,
            'ticket_id'=>1,
            'msg'=>'aixo es un missatge',
        ]);
        $this->assertTrue($response['created']);

     }
}