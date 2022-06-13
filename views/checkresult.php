<?php require 'header.php';?>
        <a href="/check">Назад</a>
        <h2>Проверенные номера</h2>
        <h2>Есть WhatsApp</h2>
        <ol>
            <?php foreach ($result as $res):?>
                <?php if ($res['existsWhatsapp'] == 1):?>
                    <li>+<?=$res['phoneNumber'];?></li>
                <?php endif;?>
            <?php endforeach;?>
        </ol>
        <h2>Нет WhatsApp</h2>
        <ol>
            <?php foreach ($result as $res):?>
                <?php if ($res['existsWhatsapp'] == 0):?>
                    <li>+<?=$res['phoneNumber'];?></li>
                <?php endif;?>
            <?php endforeach;?>
        </ol>
<?php require 'footer.php';?>