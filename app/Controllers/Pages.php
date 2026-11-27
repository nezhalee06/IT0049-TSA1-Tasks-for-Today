<?php
namespace App\Controllers;
use App\Models\UserModel;
class Pages extends BaseController
{
    protected $helpers = ['url'];

    public function profile()
    {
        return view('profile', [
            'title' => 'Profile',
            'active' => 'profile',
            'user' => (new UserModel())->orderBy('id', 'ASC')->first(),
        ]);
    }

    public function about()
    {
        return view('about', ['title' => 'About', 'active' => 'about']);
    }
}
