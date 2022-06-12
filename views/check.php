<?php require 'header.php';?>
        <form action = "/check/post" method = "POST">
            <textarea name="numbers" type="text" placeholder = "Введите номера"></textarea>
            <button name="action" value="auth">Отправить</button>
        </form>
        <a href="/">Назад</a>
<?php require 'footer.php';?>