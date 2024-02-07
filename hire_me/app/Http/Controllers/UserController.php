<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    public function update(User $currentUser, User $user)
    {
        $this->authorize('update', $user);
        // Logique de mise à jour du profil utilisateur
    }
}
