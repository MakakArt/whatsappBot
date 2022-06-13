<?php require_once 'header.php';?>
    <h1>Контакты отправленные на сервер</h1>
        <?php if ($array):?>
            <form action = "/send/deletelog" method = "POST">
                <?php $i = 0;?>
                <?php foreach ($array as $value):?>
                    <input type="checkbox" id="deleteNumber<?=$i?>" name="delete<?=$i?>" value="<?=$i?>">
                    <label style="cursor:pointer;-moz-user-select: -moz-none;-o-user-select: none;-khtml-user-select: none;-webkit-user-select: none;user-select: none;" for="deleteNumber<?=$i?>">Номер отправки: <?= str_replace("@c.us", "", $value['Number'])?>
                        <br>Результат: <?php if ($value['result']['idMessage']) {echo 'отправлено на сервер';} else {echo 'произошла ошибка';}?>
                        <br>idMessage: <?= $value['result']['idMessage'] ?>
                        <br>Сообщение: <?= $value['message'] ?>
                    </label><br><br>
                    <?php $i++;?>
                <?php endforeach ?>
                <button name="action" value="delete">Удалить</button><button name="action" value="deletemany">Удалить в интервале</button><br><br>
            </form>
        <?php else: ?>
            <p>Логи пустые</p>
        <?php endif ?>
    <a href="/send">Назад</a>
    <a href="/send/Clearlog">Очистить логи</a>
<?php require_once 'footer.php';?>