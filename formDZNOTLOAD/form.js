
let form = document.forms.someForm;

//отправка без перезагруки страницы

form.addEventListener('submit', ajaxHandler);

function FormValidator(form) {
    this._form = form;
    this._form.addEventListener('submit', this.some.bind(this));
    this._elems = document.querySelectorAll(".validate");
    this._res_form = [];
}

FormValidator.prototype.addRules = function(rules){
    this._rules = rules.rules;
    this._messages = rules.messages;
};

FormValidator.prototype.some = function(event){
console.log(event);
       for (let i = 0; i < this._elems.length; i++){
        if (!this._rules[this._elems[i].name].test(this._elems[i].value)) {
            console.log("error");
            console.log(this._messages[this._form[i].name]);
           this._form[i].style.background = "red";
            return false;
              
        }
          this._elems[i].style.background = "green";
            return true;
    }
   
};

let formValidator = new FormValidator(form);

console.log(formValidator);

formValidator.addRules({
    rules: {
        login: /login/,
        password: /pwd/,
        username:/user/,
        mail:/mail/,
        birth:/day/,
    },
    messages: {
        login: "Проверьте логин",
        password: "Проверьте пароль",
        username:"Проверьте Имя",
        mail:"Проверьте Email",
        birth:"Проверьте дату рождения"
    }
});

console.log(formValidator.some());

function ajaxHandler (event){
	event.preventDefault();
    let validate_fields = document.querySelectorAll('.validate');
       if (!formValidator.some()) {
		document.getElementById("errors").innerHTML = 
		'не все поля заполнены';
		return;
	}
    
	let form_data = new FormData(this);//встоенный объект
	console.log(form_data.get("login"));
	let xhr = new XMLHttpRequest(); //объект запроса
	console.log(xhr);

	//запрос будет отправлен методом POST на обработчик формы
	//в данном случае - "formhandle.php"
	xhr.open("POST", this.action, true);
	xhr.send(form_data);

	xhr.onload = function(event){
		//функция будет вызвона когда придет ответ от сервера
		if (xhr.status == 200) {
			responseHandler(xhr.responseText);
		}
	}
}

function responseHandler(text){

	console.log("ответ сервера" + text);
}


