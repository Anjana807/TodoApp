// function addList(event) {
//     event.preventDefault();
//     const form = event.target;
//     const formdata = new FormData(form);

//     const xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function () {
//         if (this.readyState == 4 && this.status == 200) {
//             document.getElementById("todo-table").innerHTML = this.responseText;
//         }
//     };
//     xhttp.open("POST", "./backend/todoList.php", true);
//     xhttp.send(formdata);
    
// }