<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Получить всех пользователей
        $users = User::all();

        // Передать данные в представление
        return view('users', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        // Обновление записи
        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email']));

        return redirect()->route('users.index')->with('success', 'Пользователь успешно обновлен.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Пользователь успешно удален.');
    }

    public function create()
    {

        return view('users-create'); // Отображение формы
    }

    public function store(Request $request)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',

        ]);

        // Создание пользователя
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password), // Хэшируем пароль
        ]);

        // Редирект на список пользователей
        return redirect()->route('users.index')->with('success', 'Пользователь успешно добавлен.');
    }



}
