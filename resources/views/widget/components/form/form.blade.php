{{--
   Все как в задании
   чистый JS / fetch / axios

   Маршрут: routes\web.php -> 'widget'
--}}
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Feedback widget</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f7f9;
            margin: 0;
            padding: 16px;
        }

        .widget {
            background: #fff;
            border-radius: 8px;
            padding: 16px;
        }

        input, textarea, button {
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="widget">
    <h3>Feedback</h3>

    <form id="ticketForm">
        <input type="text" name="name" placeholder="Ваше имя">
        <input type="email" name="email" placeholder="Email">
        <input type="tel" name="phone" placeholder="+77...">
        <input type="text" name="subject" placeholder="Тема">
        <textarea name="message" placeholder="Сообщение"></textarea>

        <button type="submit">Отправить</button>
    </form>

    <div id="result"></div>
</div>

<script>
    document.getElementById('ticketForm').addEventListener('submit', async (e) => {
        e.preventDefault();

        const form = e.target;
        const data = Object.fromEntries(new FormData(form));

        const response = await fetch('/api/tickets', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();
        document.getElementById('result').innerText = result.message;
    });
</script>
</body>
</html>
