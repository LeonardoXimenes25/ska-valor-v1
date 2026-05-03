<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Register extends Component
{
    public $name = '';
    public $sex = '';
    public $date_of_birth = '';
    public $place_of_birth = '';
    public $address = '';
    public $phone_number = '';
    public $municipality = '';
    public $administrative_post = '';
    public $tribe = '';
    public $village = '';
    public $image = '';
    public $parent_name = '';
    public $parent_phone = '';
    public $status = '';
    public $is_active = '';
    public $program_category_id = '';
    public $enrollment_date = '';   

    public function render()
    {
        return view('livewire.auth.register');
    }
}
