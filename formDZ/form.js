
let form = document.forms.someForm;

function FormValidator(form) {
    this._form = form;
    this._form.addEventListener('submit', this.some.bind(this));
    this._elems = document.querySelectorAll(".validate");
    this._res_form =[];
}
//console.log(formValidator(form));


FormValidator.prototype.addRules = function(rules){
    this._rules = rules.rules;
    this._messages = rules.messages;
};

FormValidator.prototype.some = function(event){
console.log(event);
   // event.preventDefault();
    for (let i = 0; i < this._elems.length; i++){
        if (!this._rules[this._elems[i].name].test(this._elems[i].value)) {
            console.log("error");
            console.log(this._messages[this._form[i].name]);
           this._form[i].style.background = "red";
           return false;
          //  alert(this._messages[this._form[i].name]);           
        }
           this._elems[i].style.background = "green";
           return true;
    }
     
};


let formValidator = new FormValidator(form);

//console.log(formValidator);

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

form.addEventListener('submit', formHandler);

function formHandler(event) {
    event.preventDefault();
    let validate_fields = document.querySelectorAll('.validate');
    if (!formValidator.some()){
        document.getElementById("errors").innerHTML =
            'не все поля заполнены';
        return;
    }
    this.submit();
}
