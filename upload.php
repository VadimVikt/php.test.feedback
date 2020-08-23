<?php

if (!empty($_POST) && $_POST['check'] == 'nospam') {
    $error = '';
    include_once 'app/User.php';

    $user = new User(
        htmlspecialchars($_POST['name']),
        htmlspecialchars($_POST['email']),
        htmlspecialchars($_POST['text']));
    //Валидация
    try {
        if ($user->getName() =='') {
             throw new Exception('Введите имя');
        }
        if ($user->getEmail() == '') {
            throw new Exception('Введите емайл');
        }
        if ($user->getText() == '') {
            throw new Exception('Вы не ввели сообщение');
        }
        //Работа с базой данных
        include_once 'app/db.php';
        //Соединение с бд
        $connect = getConnection();
        //Создание таблицы если нет
        createTable($connect);
        //Записываем данные
        setFeedBack($user->getName(), $user->getEmail(), $user->getText());
        //Закрыть соединение с бд
        mysqli_close($connect);
    } catch (\Exception $e) {
        $error = $e->getMessage();
    }
} else {
    exit('Spam detected');
}
?>
<div class="<?=$error ? 'alert alert-warning' : 'alert alert-success'?>"><?echo ($error) ? $error : 'Спасибо ' . $user->getName() ?></div>




