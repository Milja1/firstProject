$(document).ready(function() {                  // 'ready' контролирует начало события 'click' только после загрузки всего Html-кода на странице
	$('#add_comment').on('click', function() {  // определяем событие выполняемое после нажатия (click) кнопки 'Add a review'

		// получение данных (val()) из полей ввода отзыва о продукте по их id (#)
		let token = $('#token').val()             // присваивается при реализации защиты @csrf
		let postId = $('#post_id').val()
		let message = $('#message').val()		

		// alert(_token) // проверка получаемых данных	

		$.post('{post}/comments', {  		 // ROUTE - файла обработчика
			_token: token,               // данные из формы в JSON-формате
			post_id: postId,
			message: message,
		}).done(function(response){         // после успешного выполнения предыдущих действий 
			console.log(response)  // получение ответа в консоли проекта от сервера в объекте 'response' для контроля      
			// вывод 'распарсенного' (преобразованного из JSON-формата) значения сразу после 'click', без перезагрузки
			response = JSON.parse(response) 
			$("#comments").append("<h5>Мой последний комментарий:</h5><div>" + response.message +  "</div>")
		});
	})
});