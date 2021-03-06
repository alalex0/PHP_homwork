
let form = document.forms.someForm;

//отправка без перезагруки страницы

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
    for (let i = 0; i < this._elems.length; i++){
        if (!this._rules[this._elems[i].name].test(this._elems[i].value)) {
            document.getElementById("errors").innerHTML = this._messages[this._form[i].name];
           console.log(this._messages[this._form[i].name]);
           this._form[i].style.background = "red";
           this._res_form.push(false);
           //  alert(this._messages[this._form[i].name]);           
        }
           this._elems[i].style.background = "green";
           this._res_form.push(true);
        }
        let sum = 0;
    for (let i = 0; i < this._res_form.length; i++) {
        if (!this._res_form[i]) {
            this._res_form.length = [];    
             return false;
        }
        if (this._res_form[i]) {
            sum++;
        }
        if (sum == this._res_form.length) {
            this._res_form.length = [];    
            return true;
        }
    }

};
let formValidator = new FormValidator(form);
formValidator.addRules({
    rules: {
        login: /^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$/,
        //пароль содержит строчные и происные буквы латиница + цифры
        password: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/,
        username:/^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$/,
        mail:/^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/,
        //дата в формате YYYY-MM-DD:
        birth:/[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])/,
    },
    messages: {
        login: "Проверьте логин",
        password: "Проверьте пароль",
        username:"Проверьте Имя",
        mail:"Проверьте Email",
        birth:"Проверьте дату рождения"
    }
});

form.addEventListener('submit', ajaxHandler);

function ajaxHandler (event){
	event.preventDefault();
    if (!formValidator.some()){
        document.getElementById("err").innerHTML =
            'Данные введены некорректно или не все поля заполнены';
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
    document.getElementById("err").innerHTML = '';
    document.getElementById("errors").innerHTML = '';
    document.getElementById("sarver").innerHTML = 'Спасибо, данные получены';
}


