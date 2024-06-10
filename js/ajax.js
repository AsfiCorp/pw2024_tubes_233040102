var keyword = document.getElementById('keyword');
var searchButton = document.getElementById('searchButton');
var container = document.getElementById('searchPost');

searchButton.style.display = 'none';

keyword.addEventListener('keyup', function(){
    var xhr = new XMLHttpRequest();

    xhr .onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200 ) {
            container.innerHTML = xhr.responseText;
        }
    }
    xhr.open ('GET', 'ajax.php?keyword=' + keyword.value);
    xhr. send() ;

    
});

