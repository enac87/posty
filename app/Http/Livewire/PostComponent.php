<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PostComponent extends Component
{

    use WithPagination;

    public $body;

    protected $posts;

    protected $postsLoaded = false;

    protected $rules = [
        'body' => 'required',
    ];


    private function resetInputFields(){
        $this->body = '';
    }

    public function hydrate() {

        
        $this->posts = Post::paginate(4); // Collection
        
        $this->postsLoaded = true;
        
    }

    public function render()
    {

        if($this->postsLoaded) {
            $this->posts = Post::paginate(4); // Collection 
        }
        
        return view('livewire.post-component', [
            'posts' => $this->posts
        ])->extends('layouts.app');
    }

    public function create() {

        $validatedData = $this->validate();

        // Create a Post
        Auth::user()->posts()->create(["body" => $this->body]);

        $this->resetInputFields();

        // session()->flash('message', 'Post has been added Successfully.');

        // $this->hydrate();

        // return redirect()->to(URL::previous());

    }
}
