<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Service;
use Livewire\Component;

class ServiceFront extends Component
{
    public function render()
    {
        $images = Service::get();
        return view('livewire.frontend.service-front', compact('images'));
    }
}
