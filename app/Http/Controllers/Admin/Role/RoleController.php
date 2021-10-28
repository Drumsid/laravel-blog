<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RoleController extends Controller
{
    public function setWriter(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if (! $user) {
            return back()->with('error', 'Пользователь не найден!');
        }
        if ($user->getRoleNames()->first() == 'admin' || count($user->getRoleNames()) > 1) {
            return back()->with('error', 'действие не возможно!');
        }
        if ($user->getRoleNames()->first() == 'writer' || count($user->getRoleNames()) > 1) {
            return back()->with('error', 'Роль writer уже установлена!');
        }
        $user->assignRole('writer');
        return redirect()->route('user.index')->with('success', 'Роль writer установлена!');
    }
    public function unsetWriter(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if (! $user) {
            return back()->with('error', 'Пользователь не найден!');
        }
        if ($user->getRoleNames()->first() == 'admin' || count($user->getRoleNames()) > 1) {
            return back()->with('error', 'действие не возможно!');
        }
        $user->removeRole('writer');
        return redirect()->route('user.index')->with('success', 'Роль writer удалена!');
    }
}
