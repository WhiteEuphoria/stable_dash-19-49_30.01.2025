@extends('layouts.app')
@section('title', 'Регистрация')
@section('content')

<div class="wrapper">
<main class="page">
<div class="auth-page">
<div class="auth">
<div class="logo"><img alt="logo" src="&lt;?= asset('personal-acc/img/logo.svg') ?&gt;"/></div>
<form action="#" class="auth-form" method="post">
@csrf

<div class="field">
<input placeholder="First Name" type="text"/>
</div>
<div class="field">
<input placeholder="Last Name" type="text"/>
</div>
<div class="field">
<input placeholder="E-mail" type="email"/>
</div>
<div class="field">
<select>
<option selected="" value="">Country</option>
<option value="2">Пункт №2</option>
<option value="3">Пункт №3</option>
<option value="4">Пункт №4</option>
</select>
</div>
<div class="field">
<input name="date-of-birth" type="date"/>
</div>
<div class="field">
<div class="field__wrapper">
<input placeholder="Password" type="password"/>
<button class="field__icon" type="button">
<img alt="eye" src="&lt;?= asset('personal-acc/img/icons/eye.svg') ?&gt;"/>
</button>
</div>
</div>
<button class="btn" type="submit">Sign in</button>
</form>
</div>
</div>
</main>
</div>
<script src="&lt;?= asset('personal-acc/js/app.min.js') ?&gt;"></script>
<script>
		const btnToggleCryptoBlock = document.querySelector('.btn-toggle-crypto-window')
		const cryptoWindowInfo = document.querySelector('.type-crypto-window')
		const cryptoForm = document.querySelector('.form-crypto')
		if (btnToggleCryptoBlock && cryptoWindowInfo && cryptoForm) {

			btnToggleCryptoBlock.addEventListener('click', () => {
				cryptoForm.classList.toggle('hide')
				cryptoWindowInfo.classList.toggle('show')
			})
		}
	</script>
<!-- Loader -->
<script>
		const loaders = document.querySelectorAll('.loading');

		loaders.forEach(loader => {
			const progressCircle = loader.querySelector('.progress');
			const percentText = loader.querySelector('.loading__percent');
			if (!progressCircle || !percentText) return;

			const radius = Number(progressCircle.getAttribute('r')) || 54;
			const circumference = 2 * Math.PI * radius;

			// стартовые значения
			progressCircle.style.strokeDasharray = circumference;
			progressCircle.style.strokeDashoffset = circumference;
			progressCircle.style.transition = 'stroke-dashoffset 0.6s ease';

			// функция обновления
			function updateCircle(percent) {
				percent = Math.min(Math.max(percent, 0), 100);
				const targetOffset = circumference - (percent / 100) * circumference;
				progressCircle.style.strokeDashoffset = targetOffset;
			}

			// следим за изменениями текста в .loading__percent
			const observer = new MutationObserver(() => {
				const raw = (percentText.textContent || '0').replace(/[^\d]/g, '');
				const newPercent = parseInt(raw, 10) || 0;
				updateCircle(newPercent);
			});

			observer.observe(percentText, {
				characterData: true,
				childList: true,
				subtree: true
			});

			// инициализация (если уже есть значение)
			const initial = parseInt((percentText.textContent || '0').replace(/[^\d]/g, ''), 10) || 0;
			updateCircle(initial);
		});
	</script>
<!-- Loader -->

@endsection