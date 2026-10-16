<?php

spl_autoload_register(function ($className) {
    $file = __DIR__ . '/classes/' . $className . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});

$user1 = new User('Иван Иванов', 'ivan', '12345');
$user2 = new User('Пётр Петров', 'petr', 'qwerty');
$user3 = new User('Анна Сидорова', 'anna', 'pass123');

$user = new SuperUser('Администратор', 'admin', 'admin123', 'Администратор');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пользователи</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 850px;
            margin: 30px auto;
            padding: 0 20px;
            line-height: 1.5;
        }

        .user-card {
            margin: 10px 0;
            padding: 12px;
            border: 1px solid #bbb;
            border-radius: 8px;
        }

        .super-user {
            border-width: 2px;
        }

        pre {
            padding: 12px;
            background: #f4f4f4;
            border-radius: 8px;
        }

        .result {
            font-weight: bold;
        }

        .deleted {
            margin: 4px 0;
        }
    </style>
</head>
<body>
    <h1>Работа с классами User и SuperUser</h1>

    <h2>Обычные пользователи</h2>
    <?php
    $user1->showInfo();
    $user2->showInfo();
    $user3->showInfo();
    ?>

    <h2>Супер-пользователь</h2>
    <?php $user->showInfo(); ?>

    <h2>Метод getInfo()</h2>
    <pre><?php print_r($user->getInfo()); ?></pre>

    <h2>Метод auth()</h2>
    <p class="result">
        Результат авторизации:
        <?php echo $user->auth('admin', 'admin123') ? 'true' : 'false'; ?>
    </p>

    <h2>Статические счётчики</h2>
    <p>Всего обычных пользователей: <?php echo User::$count; ?></p>
    <p>Всего супер-пользователей: <?php echo SuperUser::$count; ?></p>

    <h2>Работа деструкторов</h2>
    <p>Сообщения ниже появятся при завершении работы скрипта:</p>
</body>
</html>
