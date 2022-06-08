<?php require 'header.php';?>
        <form action = "/auth/post" method = "POST">
            <textarea name="idInstance" type="text" placeholder = "idInstance"></textarea>
            <textarea name="apiTokenInstance" type="text" placeholder = "apiTokenInstance"></textarea>
            <button name="action" value="auth">Отправить</button>
        </form>
        <a href="/">Назад</a>
<?php require 'footer.php';?>