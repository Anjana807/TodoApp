class Actions
{
addList(event)
{
    // event.preventDefault();
    const form = event.target;
    const formdata = new FormData(form);
    const xhttp = new XMLHttpRequest();
    form.reset();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("todo-table").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "./backend/todoList.php", true);
    xhttp.send(formdata);
}

deleteItem(index)
{
    const row = document.getElementById(index);
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status ==200)
        {
                row.remove(); 
        }
    };
    xhttp.open("POST","/todo/backend/deleteBack.php",true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("index="+index); 
}

}

let actions = new Actions();
window.addList = function(event)
{
    actions.addList(event);
};

window.deleteItem = function(index)
{
    actions.deleteItem(index);
}

