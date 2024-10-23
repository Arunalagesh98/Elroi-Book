<?php

namespace App\Livewire;

use Livewire\Component;
use WireUi\Traits\Actions;

class Blog extends Component
{
    use Actions;

    public function save()
    {
        $this->dispatch('openModal',  component: 'blog.store');
    }

    public function notif()
    {
        $this->notification()->success(
            $title = 'Profile saved',
            $description = 'Your profile was successfully saved'
        );
    }

    public function render()
    {
        return view('livewire.blog');
    }
}
