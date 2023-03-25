$(document).ready(function(){                  // 'ready' контролирует начало события 'click' только после загрузки всего Html-кода на странице
	$('#add_comment').on('click', function(){  // определяем событие выполняемое после нажатия (click) кнопки 'Add a review'
	
		// получение данных (val()) из полей ввода отзыва о продукте по их id (#)
		let token = $('#token').val()             // присваивается при реализации защиты @csrf
		let postId = $('#post_id').val()
		let message = $('#message').val()
		// console.log(message)

		/* проверка получаемых данных
		alert(mark)
		alert(postId); */

		$.post('add-comment', {  		 // ROUTE - файла обработчика
			token: token,               // данные из формы в JSON-формате
			post_id: postId,
			message: message
		})/* .done(function(response){         // после успешного выполнения предыдущих действий 
			
			 // вывод 'распарсенного' (преобразованного из JSON-формата) значения сразу после 'click', без перезагрузки
			// response = JSON.parse(response) 
			/*$("#comments").append("<div>Mark: " + response.mark + "</div>" + "<div>Comment: " + response.text + "</div>") 
			
			// получение ответа в консоли проекта от сервера в объекте 'response' для контроля
			console.log(response)        
		});		 */
	})       
});