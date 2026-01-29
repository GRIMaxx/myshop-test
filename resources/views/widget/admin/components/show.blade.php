{{--
    Здесь тоже для красоты и легкости использую Bootstrap
--}}
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Просмотром деталей заявки</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <h1>Заявка #{{ $ticket->id }}</h1>
        <p><strong>Клиент ID:</strong> {{ $ticket->customer_id  }}</p>
        <p><strong>Email:</strong> {{ $ticket->customer_email }}</p>
        <p><strong>Телефон:</strong> {{ $ticket->customer_phone }}</p>
        <p><strong>Тема:</strong> {{ $ticket->subject ?? '-'}}</p>
        <p><strong>Сообщение:</strong> {{ $ticket->message ?? '-'}}</p>

        {{--
            Статус можно выводить текстом но для ноглядности какой ключ я оставляю так!
        --}}
        <p><strong>Статус:</strong> {{ $ticket->status }}</p>

        <p><strong>Дата ответа:</strong> {{ $ticket->answered_at?->format('Y-m-d H:i') ?? '-' }}</p>

        <h3>Файлы (у меня используеться 1 файл для всех так что если несколько они все одинаковы)</h3>
        <ul>
            @foreach($attachments as $file)
                <li><a href="{{ $file->getUrl() }}" target="_blank">{{ $file->name }}</a></li>
            @endforeach
        </ul>

        <form method="POST" action="{{ route('admin.tickets.updateStatus', $ticket) }}">
            @csrf    {{-- Это устаревшый метод но для ТЗ я не вижу смысла усложнять + для виджета тоже подойдет так как для новых технологий нужна пересборка Vite --}}
            @method('PATCH')
            <select name="status" class="form-select mb-2">
                <option value="new" {{ $ticket->status == 'new' ? 'selected' : '' }}>Новая</option>
                <option value="in_progress" {{ $ticket->status == 'in_progress' ? 'selected' : '' }}>В работе</option>
                <option value="completed" {{ $ticket->status == 'completed' ? 'selected' : '' }}>Обработана</option>
            </select>
            <button class="btn btn-success btn-sm">Сохранить</button>
        </form>
    </div>
</body>
</html>

