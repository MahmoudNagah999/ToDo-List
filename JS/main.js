const checkboxes = document.querySelectorAll('input[type=checkbox]');
for(i = 0; i < checkboxes.length ; i++){
    checkboxes[i].onclick = function (){
        this.parentNode.submit();
    }
}
