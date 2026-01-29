{{--
    Так ну здесь немного но все понятно можно разобраться
    я как всегда добавил Bootstrap
--}}
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Просмотр списка заявок</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <h1>Список заявок</h1>

        <form method="GET" class="mb-3">

            <input type="text" name="email" placeholder="Email" value="{{ request('email') }}">
            <input type="text" name="phone" placeholder="Телефон" value="{{ request('phone') }}">

            от<input type="date" name="from" value="{{ request('from') }}">
            до<input type="date" name="to" value="{{ request('to') }}">

            <select name="status">
                <option value="">Все статусы</option>
                <option value="new" {{ request('status')=='new'?'selected':'' }}>Новые</option>
                <option value="in_progress" {{ request('status')=='in_progress'?'selected':'' }}>В работе</option>
                <option value="completed" {{ request('status')=='completed'?'selected':'' }}>Обработаны</option>
            </select>

            <button class="btn btn-primary btn-sm">Фильтр</button>

        </form>

        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Клиент ID :)</th>
                <th>Email</th>
                <th>Телефон</th>
                <th>Тема</th>
                <th>Статус</th>
                <th>Дата создания</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>

            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>

                    <td>{{ $ticket->customer_id }}</td>

                    <td>{{ $ticket->customer_email }}</td>
                    <td>{{ $ticket->customer_phone }}</td>

                    <td>{{ $ticket->subject ?? '-' }}</td>  {{--  так и не понял зачем по этому на пожарный случай если нет!--}}

                    <td>{{ $ticket->status }}</td>

                    <td>{{ $ticket->created_at->format('Y-m-d H:i') }}</td>

                    <td>
                        <a href="{{ route('admin.tickets.show', $ticket) }}" class="btn btn-sm btn-info">Просмотр</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        @php

            //dd($tickets->links());

        @endphp


        {{ $tickets->links() }}


    </div>
</body>
</html>

