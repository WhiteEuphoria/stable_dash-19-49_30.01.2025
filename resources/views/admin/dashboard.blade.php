@extends('layouts.admin')
@section('title', 'Админка')
@section('content')

<div class="wrapper">
<main class="page">
<div class="admin-page">
<div class="container">
<div class="admin-panel">
<div class="admin-panel__block">
<div class="admin-panel__title">Account selection:</div>
<div class="admin-panel__line">
<select data-class-modif="form" name="form[]">
<option selected="" value="">Account</option>
<option value="2">Пункт №2</option>
<option value="3">Пункт №3</option>
<option value="4">Пункт №4</option>
</select>
<div class="admin-panel__item">
									Withdrawal to cryptocash

									<svg fill="none" height="40" viewbox="0 0 40 40" width="40" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_57_420)">
<path d="M31.2499 6.25H27.8616C27.3423 6.25036 26.8393 6.4314 26.4389 6.76205C26.0385 7.09271 25.7656 7.55238 25.6671 8.06223C25.5686 8.57208 25.6505 9.10032 25.8988 9.55637C26.1472 10.0124 26.5465 10.3678 27.0282 10.5617L30.4682 11.9383C30.95 12.1322 31.3493 12.4876 31.5976 12.9436C31.846 13.3997 31.9279 13.9279 31.8294 14.4378C31.7308 14.9476 31.458 15.4073 31.0576 15.7379C30.6572 16.0686 30.1542 16.2496 29.6349 16.25H28.7499M28.7499 6.25V5" stroke="#63616C" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
<path d="M30.0501 21.1667C31.9005 20.9237 33.6459 20.1677 35.0891 18.9844C36.5323 17.8011 37.6156 16.2376 38.2165 14.4708C38.8175 12.7039 38.9121 10.8041 38.4896 8.9863C38.0672 7.16847 37.1446 5.50509 35.8261 4.18426C34.5076 2.86343 32.8459 1.93785 31.0288 1.51217C29.2117 1.0865 27.3118 1.17772 25.5439 1.77552C23.7759 2.37331 22.2105 3.45384 21.0246 4.8949C19.8388 6.33597 19.0798 8.08009 18.8334 9.93003M26.2501 26.25C26.2501 22.9348 24.9331 19.7554 22.5889 17.4112C20.2447 15.067 17.0653 13.75 13.7501 13.75M3.75008 18.75C2.73682 20.1147 2.01252 21.6717 1.62147 23.3258C1.23041 24.9799 1.1808 26.6964 1.47569 28.3703C1.77057 30.0443 2.40375 31.6405 3.33651 33.0614C4.26926 34.4823 5.48201 35.6981 6.90061 36.6343C8.3192 37.5706 9.91384 38.2077 11.587 38.5068C13.2602 38.8058 14.9769 38.7604 16.6319 38.3735C18.287 37.9865 19.8458 37.2661 21.213 36.2562C22.5801 35.2463 23.727 33.9682 24.5834 32.5" stroke="#63616C" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
<path d="M15 26.25C15.663 26.25 16.2989 25.9866 16.7678 25.5178C17.2366 25.0489 17.5 24.413 17.5 23.75C17.5 23.087 17.2366 22.4511 16.7678 21.9822C16.2989 21.5134 15.663 21.25 15 21.25H11.25V31.25H15C15.663 31.25 16.2989 30.9866 16.7678 30.5178C17.2366 30.0489 17.5 29.413 17.5 28.75C17.5 28.087 17.2366 27.4511 16.7678 26.9822C16.2989 26.5134 15.663 26.25 15 26.25ZM15 26.25H11.25M13.75 21.25V18.75M13.75 31.25V33.75M1.25 7.5L5 13.75L11.25 10" stroke="#63616C" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
<path d="M13.6483 1.5C11.334 2.3433 9.36054 3.92279 8.03068 5.99601C6.70082 8.06923 6.08811 10.5216 6.2866 12.9767M38.7499 32.5L34.9999 26.25L28.7499 30" stroke="#63616C" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
<path d="M26.3516 38.5001C28.6652 37.6569 30.6383 36.0779 31.9681 34.0054C33.2979 31.9329 33.911 29.4813 33.7132 27.0267" stroke="#63616C" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
</g>
<defs>
<clippath id="clip0_57_420">
<rect fill="white" height="40" width="40"></rect>
</clippath>
</defs>
</svg>
</div>
<label class="switch">
<input aria-label="Переключатель" class="switch__input" type="checkbox"/>
<span class="switch__track">
<span class="switch__thumb"></span>
</span>
</label>
<button class="admin-panel__save" type="button">Сохранить

									<svg fill="none" height="24" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
<path d="M9 10L12.258 12.444C12.4598 12.5954 12.7114 12.6649 12.9624 12.6385C13.2133 12.6122 13.445 12.492 13.611 12.302L20 5" stroke="white" stroke-linecap="round" stroke-width="2"></path>
<path d="M21 12C21 13.8805 20.411 15.7138 19.3157 17.2424C18.2203 18.771 16.6736 19.918 14.8929 20.5225C13.1122 21.127 11.1868 21.1585 9.3873 20.6125C7.58776 20.0666 6.00442 18.9707 4.85967 17.4788C3.71492 15.9868 3.06627 14.1738 3.00481 12.2943C2.94335 10.4147 3.47218 8.56317 4.51702 6.99962C5.56187 5.43607 7.07023 4.23908 8.83027 3.57678C10.5903 2.91447 12.5136 2.82011 14.33 3.30696" stroke="white" stroke-linecap="round" stroke-width="2"></path>
</svg>
</button>
</div>
</div>
<div class="admin-panel__block">
<div class="admin-panel__title">Account info</div>
<div class="admin-panel__grid">
<div class="admin-panel__field">
<div class="admin-panel__field-label">FullName</div>
<input class="admin-panel__field-input" type="text" value="I. V. Client"/>
</div>
<div class="admin-panel__field">
<div class="admin-panel__field-label">Date of Birth</div>
<input class="admin-panel__field-info" type="text" value="04.21.1997"/>
</div>
<div class="admin-panel__field">
<div class="admin-panel__field-label">Country</div>
<input class="admin-panel__field-info" type="text" value="Spain"/>
</div>
<div class="admin-panel__field">
<div class="admin-panel__field-label">Status</div>
<input class="admin-panel__field-info" type="text" value="Verificated"/>
</div>
<div class="admin-panel__field">
<div class="admin-panel__field-label">Balance</div>
<input class="admin-panel__field-info" type="text" value="50 000 €"/>
</div>
</div>
</div>
<div class="admin-panel__block">
<div class="admin-panel__title">Bank accounts</div>
<div class="admin-panel__grid">
<select>
<option selected="" value="">Select an account</option>
<option value="2">Пункт №2</option>
<option value="3">Пункт №3</option>
<option value="4">Пункт №4</option>
</select>
<div class="admin-panel__field">
<div class="admin-panel__field-label">Account name</div>
<input class="admin-panel__field-input" type="text" value="Счёт 1"/>
</div>
</div>
<button class="btn btn--md" data-popup="#create-modal" type="button">Создать новый счёт
								<span><svg fill="none" height="24" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
<path d="M5 12H19M12 5V19" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
</svg>
</span></button>
</div>
<div class="admin-panel__block">
<div class="admin-panel__title">Transaction</div>
<div class="admin-panel__grid">
<select data-search="">
<option selected="" value="">Select a transaction</option>
<option value="2">Пункт №2</option>
<option value="3">Пункт №3</option>
<option value="4">Пункт №4</option>
</select>
<select>
<option selected="" value="">Status</option>
<option value="2">SENDING</option>
<option value="3">PENDING</option>
<option value="4">CANDELED</option>
</select>
<div class="admin-panel__field">
<div class="admin-panel__field-label">Transaction address</div>
<input class="admin-panel__field-input" type="text" value="1Fssj...qwet2"/>
</div>
<div class="admin-panel__field" style="width: fit-content;">
<div class="admin-panel__field-label">Amount</div>
<input class="admin-panel__field-input" type="text" value="1500 €"/>
</div>
</div>
</div>
<div class="admin-panel__block">
<div class="admin-panel__title">Brokers</div>
<div class="admin-panel__grid">
<select>
<option selected="" value="">Select an Brokerage Company</option>
<option value="2">Пункт №2</option>
<option value="3">Пункт №3</option>
<option value="4">Пункт №4</option>
</select>
<div class="admin-panel__col">
<select>
<option selected="" value="">Change currency</option>
<option data-group="currencies">World currencies</option>
<option data-parent="currencies" value="red">Euro (€)</option>
<option data-parent="currencies" value="green">Dollar ($)</option>
<option data-group="crypto">Crypto</option>
<option data-parent="crypto" value="s">BTC</option>
<option data-parent="crypto" value="m">USDT</option>
<option data-parent="crypto" value="m">EURC</option>
</select>
<div class="checkbox">
<input class="checkbox__input" data-error="Помилка" id="c_1" name="form[]" type="checkbox" value="1"/>
<label class="checkbox__label" for="c_1"><span class="checkbox__text">Change
												currency for all</span></label>
</div>
</div>
<select>
<option selected="" value="">Change type of account</option>
<option value="2">Classic</option>
<option value="3">ECN</option>
<option value="4">PAMM</option>
<option value="5">Gold</option>
<option value="6">Silver</option>
<option value="7">Platinum</option>
<option value="8">Transit</option>
<option value="9">Crypto</option>
<option value="10">VIP</option>
<option value="11">Credit</option>
</select>
</div>
</div>
</div>
</div>
</div>
</main>
</div>
<div aria-hidden="true" class="popup popup--md" id="violation">
<div class="popup__wrapper">
<div class="popup__content">
<button class="popup__close" data-close="" type="button">
<svg fill="none" height="20" viewbox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
<path d="M1 1L19 19M19 1L1 19" stroke="black" stroke-linecap="round" stroke-width="2"></path>
</svg>
</button>
<div class="modal-content">
<div class="modal-content__top">
<div class="logo"><img alt="logo" src="&lt;?= asset('personal-acc/img/logo.svg') ?&gt;"/></div>
<div class="modal-content__text">
<p>Describe your complaint</p>
</div>
</div>
<div class="modal-content__body">
<form action="#">
@csrf

<div class="field">
<textarea placeholder="Write here..."></textarea>
</div>
<button class="btn" type="submit">Send</button>
<label class="modal-content__file">
<input hidden="" type="file"/>
<span>Attach the file</span>
</label>
</form>
</div>
</div>
</div>
</div>
</div>
<div aria-hidden="true" class="popup popup--sm" id="create-modal">
<div class="popup__wrapper">
<div class="popup__content">
<div class="create-account">
<div class="create-account__title">Создание нового счёта</div>
<form action="#" class="create-account__form">
@csrf

<div class="field"><input placeholder="Название счёта (Account name)" type="text"/></div>
<div class="field"><input placeholder="Номер счёта (Account number)" type="text"/></div>
<div class="field"><input placeholder="Тип счёта (Account type)" type="text"/></div>
<div class="field"><input placeholder="Банк (Bank)" type="text"/></div>
<div class="field"><input placeholder="Инициалы клиента (Client's fullname)" type="text"/></div>
<div class="field"><input placeholder="Срок действия (Expiration date)" type="text"/></div>
<select>
<option disabled="" selected="" value="">Статус</option>
<option value="2">Active</option>
<option value="3">Hold</option>
<option value="4">Blocked</option>
</select>
<button class="btn btn--md" type="submit">Добавить новый счёт</button>
</form>
</div>
</div>
</div>
</div>
<div aria-hidden="true" class="popup" id="withdraw-modal">
<div class="popup__wrapper">
<div class="popup__content">
<button class="popup__close" data-close="" type="button">
<svg fill="none" height="20" viewbox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
<path d="M1 1L19 19M19 1L1 19" stroke="black" stroke-linecap="round" stroke-width="2"></path>
</svg>
</button>
<div class="modal-content">
<div class="modal-content__top">
<div class="logo"><img alt="logo" src="&lt;?= asset('personal-acc/img/logo.svg') ?&gt;"/></div>
<div class="modal-content__text">
<p>Choose a withdrawal method</p>
</div>
</div>
<div class="modal-content__body">
<div class="tabs" data-tabs="">
<nav class="tabs__navigation" data-tabs-titles="">
<button class="tabs__title _tab-active" type="button">
<span>
										Withdrawal to the card
									</span>
<span>
<svg fill="none" height="40" viewbox="0 0 41 40" width="41" xmlns="http://www.w3.org/2000/svg">
<mask height="32" id="mask0_41_232" maskunits="userSpaceOnUse" style="mask-type:luminance" width="37" x="2" y="4">
<path d="M12.1666 10.8333V7.49998C12.1666 7.05795 12.3422 6.63403 12.6548 6.32147C12.9673 6.00891 13.3913 5.83331 13.8333 5.83331H35.5C35.942 5.83331 36.3659 6.00891 36.6785 6.32147C36.991 6.63403 37.1666 7.05795 37.1666 7.49998V22.5C37.1666 22.942 36.991 23.3659 36.6785 23.6785C36.3659 23.991 35.942 24.1666 35.5 24.1666H33.8333" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
<path d="M27.1666 15.8333H5.49998C4.57951 15.8333 3.83331 16.5795 3.83331 17.5V32.5C3.83331 33.4205 4.57951 34.1666 5.49998 34.1666H27.1666C28.0871 34.1666 28.8333 33.4205 28.8333 32.5V17.5C28.8333 16.5795 28.0871 15.8333 27.1666 15.8333Z" fill="white" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
<path d="M3.83331 23.3333H28.8333" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
<path d="M28.8333 19.1666V29.1666M3.83331 19.1666V29.1666" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
<path d="M9.66663 28.3333H16.3333M21.3333 28.3333H23" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
</mask>
<g mask="url(#mask0_41_232)">
<path d="M0.5 0H40.5V40H0.5V0Z" fill="currentColor"></path>
</g>
</svg>
</span>
</button>
<button class="tabs__title" type="button">
<span>Withdrawal by IBAN</span>
<span><svg fill="none" height="40" viewbox="0 0 41 40" width="41" xmlns="http://www.w3.org/2000/svg">
<path d="M25.5 25V20H30.5V16.6666L37.1667 22.5L30.5 28.3333V25H25.5ZM23.8334 14.5V16.6666H3.83337V14.5L13.8334 8.33331L23.8334 14.5ZM3.83337 28.3333H23.8334V31.6666H3.83337V28.3333ZM12.1667 18.3333H15.5V26.6666H12.1667V18.3333ZM5.50004 18.3333H8.83337V26.6666H5.50004V18.3333ZM18.8334 18.3333H22.1667V26.6666H18.8334V18.3333Z" fill="currentColor"></path>
</svg>
</span>
</button>
<button class="tabs__title" type="button">
<span>Withdrawal to cryptocash</span>
<span><svg fill="none" height="40" viewbox="0 0 41 40" width="41" xmlns="http://www.w3.org/2000/svg">
<path d="M31.75 6.25H28.3617C27.8424 6.25036 27.3394 6.4314 26.939 6.76205C26.5386 7.09271 26.2658 7.55238 26.1672 8.06223C26.0687 8.57208 26.1506 9.10032 26.399 9.55637C26.6473 10.0124 27.0466 10.3678 27.5284 10.5617L30.9684 11.9383C31.4501 12.1322 31.8494 12.4876 32.0978 12.9436C32.3461 13.3997 32.428 13.9279 32.3295 14.4378C32.231 14.9476 31.9581 15.4073 31.5577 15.7379C31.1573 16.0686 30.6543 16.2496 30.135 16.25H29.25M29.25 6.25V5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
<path d="M30.55 21.1667C32.4003 20.9237 34.1458 20.1677 35.589 18.9844C37.0322 17.8011 38.1155 16.2376 38.7164 14.4708C39.3174 12.7039 39.412 10.8041 38.9895 8.9863C38.5671 7.16847 37.6445 5.50509 36.326 4.18426C35.0075 2.86343 33.3458 1.93785 31.5287 1.51217C29.7116 1.0865 27.8117 1.17772 26.0438 1.77552C24.2758 2.37331 22.7104 3.45384 21.5245 4.8949C20.3387 6.33597 19.5796 8.08009 19.3333 9.93003M26.75 26.25C26.75 22.9348 25.433 19.7554 23.0888 17.4112C20.7446 15.067 17.5652 13.75 14.25 13.75M4.24996 18.75C3.2367 20.1147 2.5124 21.6717 2.12134 23.3258C1.73029 24.9799 1.68068 26.6964 1.97557 28.3703C2.27045 30.0443 2.90362 31.6405 3.83638 33.0614C4.76914 34.4823 5.98189 35.6981 7.40048 36.6343C8.81908 37.5706 10.4137 38.2077 12.0869 38.5068C13.7601 38.8058 15.4767 38.7604 17.1318 38.3735C18.7869 37.9865 20.3457 37.2661 21.7128 36.2562C23.08 35.2463 24.2269 33.9682 25.0833 32.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
<path d="M15.5 26.25C16.163 26.25 16.7989 25.9866 17.2678 25.5178C17.7366 25.0489 18 24.413 18 23.75C18 23.087 17.7366 22.4511 17.2678 21.9822C16.7989 21.5134 16.163 21.25 15.5 21.25H11.75V31.25H15.5C16.163 31.25 16.7989 30.9866 17.2678 30.5178C17.7366 30.0489 18 29.413 18 28.75C18 28.087 17.7366 27.4511 17.2678 26.9822C16.7989 26.5134 16.163 26.25 15.5 26.25ZM15.5 26.25H11.75M14.25 21.25V18.75M14.25 31.25V33.75M1.75 7.5L5.5 13.75L11.75 10" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
<path d="M14.1484 1.5C11.8342 2.3433 9.86066 3.92279 8.5308 5.99601C7.20094 8.06923 6.58823 10.5216 6.78672 12.9767M39.2501 32.5L35.5001 26.25L29.2501 30" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
<path d="M26.8517 38.5C29.1653 37.6569 31.1384 36.0779 32.4682 34.0053C33.798 31.9328 34.4111 29.4812 34.2134 27.0267" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
</svg>
</span>
</button>
</nav>
<div class="tabs__content" data-tabs-body="">
<div class="tabs__body">
<form action="#">
@csrf

<div class="field has-error">
<input placeholder="1111 2222 3333 4444" type="number"/>
<span class="error-message">message error</span>
</div>
<div class="field">
<input placeholder="Fullname card holder" type="text"/>
<span class="error-message">message error</span>
</div>
<div class="field">
<input placeholder="Amount" type="number"/>
<span class="error-message">message error</span>
</div>
<button class="btn btn--md" disabled="" type="submit">Withdrawal</button>
</form>
</div>
<div class="tabs__body">
<form action="#">
@csrf

<div class="field">
<input placeholder="Enter IBAN" type="text"/>
<span class="error-message">message error</span>
</div>
<div class="field">
<input placeholder="BIC code" type="text"/>
<span class="error-message">message error</span>
</div>
<div class="field">
<input placeholder="Fullname bank account holder" type="text"/>
<span class="error-message">message error</span>
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
<input placeholder="Name of the bank" type="text"/>
<span class="error-message">message error</span>
</div>
<div class="field">
<input placeholder="Amount" type="number"/>
<span class="error-message">message error</span>
</div>
<button class="btn btn--md" disabled="" type="submit">Withdrawal</button>
</form>
</div>
<div class="tabs__body">
<button class="btn-toggle-crypto-window" style="padding: 0.5rem; border-radius: 0.25rem; border: 1px solid #63616C; font-size: 0.625rem; margin-bottom: 0.8rem; margin-inline: auto;" type="button">click
										show crypto type window</button>
<div class="type-crypto-window">
<img alt="attention" src="&lt;?= asset('personal-acc/img/icons/attention.svg') ?&gt;"/>
<p>At first you need to change the type of account to "Crypto" type</p>
</div>
<form action="#" class="form-crypto">
@csrf

<div class="field">
<input placeholder="Deposit address" type="text"/>
<span class="error-message">message error</span>
</div>
<div class="field">
<select>
<option selected="" value="">Network</option>
<option value="2">Пункт №2</option>
<option value="3">Пункт №3</option>
<option value="4">Пункт №4</option>
</select>
</div>
<div class="field">
<select>
<option selected="" value="">Coin</option>
<option value="2">Пункт №2</option>
<option value="3">Пункт №3</option>
<option value="4">Пункт №4</option>
</select>
</div>
<button class="btn btn--md" disabled="" type="submit">Withdrawal</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
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