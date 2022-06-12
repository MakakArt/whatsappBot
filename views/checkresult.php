<?php require 'header.php';?>
        <a href="/check">Назад</a>
        <h2>Проверенные номера</h2>
        <h2>Есть WhatsApp</h2>
        <ul>
            <?php foreach ($result as $res):?>
                <?php if ($res['existsWhatsapp'] == 1):?>
                    <li>+<?=$res['phoneNumber'];?></li>
                <?php endif;?>
            <?php endforeach;?>
        </ul>
        <h2>Нет WhatsApp</h2>
        <ul>
            <?php foreach ($result as $res):?>
                <?php if ($res['existsWhatsapp'] == 0):?>
                    <li>+<?=$res['phoneNumber'];?></li>
                <?php endif;?>
            <?php endforeach;?>
        </ul>
<?php require 'footer.php';?>