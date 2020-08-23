<div class="container">
    <h3>Форма обратной связи</h3>
    <form id="form-feedback" action="/upload.php" method="post"  >
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Имя отправителя</span>
            </div>
            <input type="text" class="form-control" placeholder="Ваше имя" name="name" aria-label="Имя отправителя" aria-describedby="basic-addon1">
        </div>
    <div class="error">

    </div>
        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Ваш email" name="email" aria-label="Email отправителя" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">mail@example.com</span>
            </div>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Ваше сообщение</span>
            </div>
            <textarea class="form-control" aria-label="With textarea" name="text"></textarea>
        </div>
        <input id="check" name="check" type="hidden" value="">
        <div class="input-group mb-3">
<!--            Защита от спама-->
            <input type="submit" class="btn btn-primary" value="Отправить" name="send"
                   onclick="document.getElementById('check').value = 'nospam';"
            >
        </div>
    </form>
    <div id="formPicture">
        <!-- Сюда выводится результат из upload.php -->
    </div>
</div>