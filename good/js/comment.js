/*
1. Реализовать возможность добавления комментариев. 
Комментарий вводится в textarea.
Комментарий добавляется по нажатию на кнопку Комментировать.
При добавлении комменария отображаются: аватар автора (пока у всех комментарие одинаковый), 
имя автора (пока у всех комментарие одинаковое), дата добавления комментария (текущая дата), 
текст комментария (тот, что был введен в textarea). 
*/

let info = document.getElementsByName('info');
console.log(info);

let input = document.getElementById('input');
console.log(input);

input.addEventListener('click', inputText);

function inputText() {
	let div = document.getElementById('div');
	console.log(div);

	let img = document.createElement('img');
	img.setAttribute('src', 'image/8.jpg');
	img.setAttribute('id', 'img');
	img.classList.add('img');
	div.appendChild(img);
	console.log(img);
	
	let address = document.createElement('address');
	address.classList.add('address');
	let name = 'Иванов';
	address.appendChild(document.createTextNode(name));
	div.appendChild(address);
	

	let info = document.getElementById('info').value;
	console.log(info);
	
	let div2 = document.createElement('div');
	div2.classList.add('div2');
	div.appendChild(div2);
	div2.innerHTML = info;

	let footer = document.createElement('footer');
	div.appendChild(footer);

	let time = document.createElement('time');
	time.classList.add('time');
	let date = Date();
	footer.appendChild(time);
	time.appendChild(document.createTextNode(date));
}