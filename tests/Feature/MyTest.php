<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_a_article_view_can_be_rendered()
    {
        $view = $this->view('article', [
          'article' => 'Taylor',
          'category' => 'vvv'
      ]);

        $view->assertSee('Taylor','vvv');
    }

    public function test_download_form_with_errors(){
      $view = $this->withViewErrors([
     'name' => ['Please provide a valid name.'],
     'phone' => ['The phone number field is required'],
     'email' => ['The email field is required']
      ])->view('admin.download');

     $view->assertSee('Please provide a valid name.');
     $view->assertSee('The phone number field is required');
     $view->assertSee('The email field is required');
    }

    public function test_download_form_with_get(){
      $response = $this->get('/download/submit');

      $response->assertStatus(404);
    }
}
