<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = User::query();
        
        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }
        
        $users = $query->orderBy('created_at', 'desc')->paginate(15);
        
        return view('admin.users.index', compact('users'));
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Check if user is trying to delete themselves
        if (Auth::id() == $id) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Вы не можете удалить свой собственный аккаунт.');
        }
        
        $user = User::findOrFail($id);
        
        // Delete user's related data
        if (method_exists($user, 'userBooks')) {
            $user->userBooks()->delete();
        }
        if (method_exists($user, 'reviews')) {
            $user->reviews()->delete();
        }
        
        $userName = $user->name;
        
        // Delete the user
        $user->delete();
        
        return redirect()->route('admin.users.index')
            ->with('success', "Пользователь {$userName} успешно удален.");
    }
}
