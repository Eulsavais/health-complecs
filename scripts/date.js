document.addEventListener('DOMContentLoaded', () => {
	// Получаем элементы полей ввода дат
	let dateInInput = document.getElementById('date_in_check');
	let dateOutInput = document.getElementById('date_out_check');

	// Устанавливаем обработчики событий на изменение значений полей ввода дат
	dateInInput.addEventListener('input', function () {
		// При изменении даты въезда обновляем минимальное значение для поля ввода даты выезда
		dateOutInput.min = dateInInput.value;
	});

	dateOutInput.addEventListener('input', function () {
		// При изменении даты выезда обновляем максимальное значение для поля ввода даты въезда
		dateInInput.max = dateOutInput.value;
	});
});
