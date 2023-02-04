<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileHeader extends Component
{
  public $user;

  public function mount()
  {
    $this->user = Auth::user();
  }
  public function render()
  {
    return view('livewire.user.profile-header');
  }
}
