<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $password;
    public $confirmpassword;
    public $contact;
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|same:confirmpassword',
        // 'roles' => 'required'
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function submitForm()
    {
        $this->validate();
        $this->contact['name'] = $this->name;
        $this->contact['email'] = $this->email;
        $this->contact['password'] = $this->password;
        $this->contact['confirmpassword'] = $this->confirmpassword;
        
        // session()->flash('success', 'User successfully updated.');
        // dd($contact);
        // $this->resetForm();
    }
    private function resetForm()
    {
        $this->name='';
        $this->email='';
        $this->password='';
        $this->confirmpassword='';
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
