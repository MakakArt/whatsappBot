<?php require 'header.php';?>
        <form action = "/settings/post" method = "POST">
            <textarea name = "delaySendMessagesMilliseconds" type = "text" placeholder = "Задержка отправки сообщения (минуты)"><?= ($array['delaySendMessagesMilliseconds']/1000); ?></textarea>
            <textarea name="sendFromUTC" type="text" placeholder = "Отправлять сообщения от"><?= $array['sendFromUTC']; ?></textarea>
            <textarea name="sendToUTC" type="text" placeholder = "Отправлять сообщения до"><?= $array['sendToUTC']; ?></textarea>
            <textarea name="proxyInstance" type="text" placeholder = "Прокси в формате {ip}:{port}:{login}:{password}"><?= $array['proxyInstance']; ?></textarea>
            <button name="action" value="set">Отправить</button>
        </form>
        <h2>Текущие настройки</h2>
        <ul>
            <?php if ($array['delaySendMessagesMilliseconds']):?>
                <li>Задержка: <?= ($array['delaySendMessagesMilliseconds']/1000); ?> секунд(а/ы)</li>
            <?php endif ?>
            <?php if ($array['sendFromUTC']):?>
                <li>Отправлять от: <?= $array['sendFromUTC']; ?></li>
            <?php endif ?>
            <?php if ($array['sendToUTC']):?>
                <li>Отправлять до: <?= $array['sendToUTC']; ?></li>
            <?php endif ?>
            <?php if ($array['proxyInstance']):?>
                <li>Прокси: <?= $array['proxyInstance']; ?></li>
            <?php endif ?>
        </ul>
        <a href="/">Назад</a>
<?php require 'footer.php';?>