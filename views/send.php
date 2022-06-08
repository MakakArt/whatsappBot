<?php require_once 'header.php';?>
        <form action = "/send/post" method = "POST">
            <textarea name="numbers" type="text" placeholder = "Номера"></textarea>
            <textarea name="message" type="text" placeholder = "Текст сообщения"></textarea>
            <button name="action" value="send">Отправить</button>
        </form>
        <a href="/">Назад</a>
        <a href="/send/viewlog">Логи</a>
<?php require_once 'footer.php';?>