<?php require 'header.php';?>
        <form action = "/settings/post" method = "POST">
            <textarea name = "delaySendMessagesMilliseconds" type = "text" placeholder = "Задержка отправки сообщения (минуты)"></textarea>
            <button name="action" value="set">Отправить</button>
        </form>
        <form action = "/settings/post" method = "POST">
            <textarea name="sendFromUTC" type="text" placeholder = "Отправлять сообщения от"></textarea>
            <textarea name="sendToUTC" type="text" placeholder = "Отправлять сообщения до"></textarea>
            <button name="action" value="set">Отправить</button>
        </form>
        <h2>Текущие настройки</h2>
        <ul>
            <?php if ($array['delaySendMessagesMilliseconds']):?>
                <li>Задержка: <?= (($array['delaySendMessagesMilliseconds']/60)/1000); ?> минут(а/ы)</li>
            <?php endif ?>
            <?php if ($array['sendFromUTC']):?>
                <li>Отправлять от: <?= $array['sendFromUTC']; ?></li>
            <?php endif ?>
            <?php if ($array['sendToUTC']):?>
                <li>Отправлять до: <?= $array['sendToUTC']; ?></li>
            <?php endif ?>
        </ul>
        <a href="/">Назад</a>
<?php require 'footer.php';?>