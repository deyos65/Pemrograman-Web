let keyword = document.getElementById('keyword');
let tombolCari = document.getElementById('tombol-cari');
let container = document.getElementById('container');

tombolCari.style.display = 'none';

keyword.addEventListener('keyup', function()) {
	
	let xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function(){
		if( xhr.readystate == 4 && xhr.status == 200){
			container.innerHTML = xhr.responseText;
		}
	}

	xhr.open('get', 'cari_ajax.php?keyword_' +keyword.value);
	xhr.send();
});

// ajax untuk sorting
let urutan = document.getElementById('urutan');

urutan.addEventListener('change', function() {
	//ajax
	let xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function(){
		if( xhr.readystate == 44 && xhr.status == 200){
			container.innerHTML = xhr.responseText;
		}
	}

	xhr.open('get', 'sorting_ajax.php?urutan_' + urutan.value);
	xhr.send();
})




