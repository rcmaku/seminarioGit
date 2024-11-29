<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        // Check if users exist in the session; otherwise, initialize them
        $users = Session::get('users', [101, 102, 103, 104, 105]);
        return view('users.index', compact('users'));
    }

    public function rotate()
    {
        // Get users from the session
        $users = Session::get('users', []);

        // Perform rotation if users exist
        if (!empty($users)) {
            $firstUser = array_shift($users); // Remove the first user
            array_push($users, $firstUser); // Add the user to the end
        }

        // Save updated list back to session
        Session::put('users', $users);

        return redirect()->route('users.index');
    }
}
