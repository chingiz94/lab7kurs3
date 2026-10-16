<?php

class User extends UserAbstract
{
    public $name;
    public $login;
    public $password;

    public static $count = 0;

    public function __construct($name, $login, $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;

        if (static::class === self::class) {
            self::$count++;
        }
    }

    public function showInfo()
    {
        echo '<div class="user-card">';
        echo '<strong>Имя:</strong> ' . htmlspecialchars($this->name) . '<br>';
        echo '<strong>Логин:</strong> ' . htmlspecialchars($this->login) . '<br>';
        echo '<strong>Пароль:</strong> ' . htmlspecialchars($this->password);
        echo '</div>';
    }

    public function __destruct()
    {
        echo '<p class="deleted">Пользователь ' . htmlspecialchars($this->login) . ' удален</p>';
    }
}
