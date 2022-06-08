<?php require_once 'header.php';?>
    <h1>Контакты отправленные на сервер</h1>
    <ul>
        <?php if ($array):?>
            <?php foreach ($array as $value):?>
                <li>Номер отправки: <?= str_replace("@c.us", "", $value['Number'])?>
                    <br>Результат: <?php if ($value['result']['idMessage']) {echo 'отправлено на сервер';} else {echo 'произошла ошибка';}?>
                    <ul>
                        <li>idMessage: <?= $value['result']['idMessage'] ?></li>
                    </ul>
                    <br>Сообщение: <?= $value['message'] ?>
                </li>
                <br>
            <?php endforeach ?>
        <?php else: ?>
            <p>Логи пустые</p>
        <?php endif ?>
    </ul>
    <a href="/send">Назад</a>
    <a href="/send/Clearlog">Очистить логи</a>

<?php require_once 'footer.php';?>