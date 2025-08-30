@extends('layouts.app')
@section('title', 'Enter')
@section('content')

<div class="wrapper">
<main class="page">
<div class="auth-page">
<div class="auth">
<div class="logo"><img alt="logo" src="&lt;?= asset('personal-acc/img/logo.svg') ?&gt;"/></div>
<form class="enter-block">
@csrf

<div class="enter-block__title">Attach your documents for verification</div>
<div class="enter-block__file">
<label class="file-btn">
<input hidden="" type="file"/>
<span class="file-btn__icon"><img alt="download" src="&lt;?= asset('personal-acc/img/icons/download.svg') ?&gt;"/></span>
<span>Upload file</span>
</label>
</div>
<div class="field">
<textarea placeholder="Write here..."></textarea>
</div>
<div class="enter-block__info">
<div class="enter-block__info-item">
<span>Allowed format</span>
<br/>
								PNG, JPG, JPEG and PDF
							</div>
<div class="enter-block__info-item">
<span>Max file size</span>
<br/>
								10MB
							</div>
</div>
<button class="btn btn--light" type="submit">Send</button>
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