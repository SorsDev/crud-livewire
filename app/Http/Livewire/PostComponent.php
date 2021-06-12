<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class PostComponent extends Component
{
	use WithPagination;

	public $post_id, $title, $description;
	public $view = 'create'; //variables para la vista
	

    public function render()
    {
    	$posts = Post::orderBy('id','desc')->paginate(8);

        return view('livewire.post-component',compact('posts'));
    }



    public function store()
    {
    	$this->validate([
    		'title'			=>	'required',
    		'description' 	=> 	'required',
    	]);

    	$post = Post::create([
    		'title' 		=> $this->title,
    		'description' 	=> $this->description,
    	]);

    	$this->edit($post->id);
    }


    public function edit($id)
    {
    	$post = Post::find($id);

    	$this->post_id 	   = $post->id;
    	$this->title 	   = $post->title;
    	$this->description = $post->description;

    	$this->view = 'edit';  	
    }


    public function update()
    {
    	$this->validate([
    		'title'	      => 'required',
    		'description' => 'required',
    	]);

    	$post = Post::find($this->post_id);
    	$post->update([
    		'title' 	  => $this->title,
    		'description' => $this->description
    	]);

    	$this->default();
    }


	public function default()
	{
	   $this->title 		= '';
       $this->description 	= '';

       $this->view = 'create';
	}


    public function destroy($id)
    {
    	Post::destroy($id);
    }
}
