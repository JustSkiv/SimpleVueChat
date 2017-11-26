<?php
/**
 * Created by Nikolay Tuzov
 */
?>

<div class="container">
    <button id="send" class="btn btn-default">Кнопка</button>
    <?php if(false): ?>
    <?php foreach ($windows as $window): ?>

        <div class="panel panel-default">
            <div class="panel-heading"><?= $window['title']; ?></div>
            <div class="panel-body">
                <?= $window['id']; ?>
            </div>
        </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>

<script src="/js/test.js"></script>
<script>
    $(function () {
        $('#send').click(function () {
            $.ajax({
                url: '/main/test',
                type: 'post',
                data: {'id': 16},
                success: function (res) {
                    console.log(res);
                },
                error: function () {
                    alert('Error!');
                }
            });
        });
    });
</script>