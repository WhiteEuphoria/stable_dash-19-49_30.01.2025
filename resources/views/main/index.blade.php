@extends('layouts.app')
@section('title', 'Главная')
@section('content')

<div class="rootpage">
<h1>Адаптивная верстка «personal-acc»</h1>
<p><b>Описание:</b> Адаптиваня верстка. Анимации и проработка адаптива. Грамотная и чистая верстка</p>
<span class="descpro">Ниже вы найдете ссылки на все страницы. Для просмотра кликайте на нужную страничку
			(откроется
			в новом окне)</span>
<div class="rootpage__info">
</div>
<h2>Cтраницы:</h2>
<ol class="rootpage__list">
<li><a href="login.html" target="_blank">Логин</a></li>
<li><a href="register.html" target="_blank">Регистрация</a></li>
<li><a href="enter.html" target="_blank">Прикрепите ваши документы для проверки</a></li>
<li><a href="verify.html" target="_blank">Верификация</a></li>
<li><a href="user.html" target="_blank">Личный кабинет</a></li>
<li><a href="violation.html" target="_blank">Сообщить о наружении(моб)</a></li>
<li><a href="withdraw.html" target="_blank">Вывод(моб)</a></li>
<li><a href="login-admin.html" target="_blank">Вход (Админка)</a></li>
<li><a href="admin.html" target="_blank">Админка</a></li>
</ol>
<!-- <h2>Страницы в разработке:</h2>
    <ol class="rootpage__list">

    </ol> -->
<h2>Модальные окна:</h2>
<ol class="rootpage__list">
<!-- <li><a target="_blank" href="modal.html">Модальные окна</a></li> -->
</ol>
<!-- -->
</div>

@endsection