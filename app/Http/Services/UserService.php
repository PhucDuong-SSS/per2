<?php
namespace App\Http\Services;
use App\Models\User;

class UserService 
{
    protected $userModel;
    
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;   
    }

    public function getAll()
    {
        return $this->userModel->all();
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return $user;

    }
    public function store($request)
    {
        
    }

}