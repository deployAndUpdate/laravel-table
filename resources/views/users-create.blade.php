{{-- resources/views/users-create.blade.php --}}

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать пользователя</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Создать пользователя</h1>

    {{-- Вывод ошибок валидации --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf {{-- Токен CSRF обязателен --}}
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Введите имя" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Электронная почта</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Введите email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Введите пароль" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Подтвердите пароль</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Введите пароль еще раз" required>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
</body>
</html>
