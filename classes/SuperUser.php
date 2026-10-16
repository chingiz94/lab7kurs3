<?php

class SuperUser extends User implements ISuperUser, IAuthorizeUser
{
    public $role;

    public static $count = 0;

    public function __construct($name, $login, $password, $role)
    {
        parent::__construct($name, $login, $password);
        $this->role = $role;
        self::$count++;
    }

    public function showInfo()
    {
        echo '<div class="user-card super-user">';
        echo '<strong>Имя:</strong> ' . htmlspecialchars($this->name) . '<br>';
        echo '<strong>Логин:</strong> ' . htmlspecialchars($this->login) . '<br>';
        echo '<strong>Пароль:</strong> ' . htmlspecialchars($this->password) . '<br>';
        echo '<strong>Роль:</strong> ' . htmlspecialchars($this->role);
        echo '</div>';
    }

    public function getInfo()
    {
        return [
            'name' => $this->name,
            'login' => $this->login,
            'password' => $this->password,
            'role' => $this->role,
        ];
    }

    public function auth($login, $password)
    {
        return $this->login === $login && $this->password === $password;
    }
}
