// function deleteItem(index)
// {
//     const row = document.getElementById(index);
//     const xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function()
//     {
//         if(this.readyState == 4 && this.status ==200)
//         {
//                 row.remove(); 
//         }
//     };
//     xhttp.open("POST","/todo/backend/deleteBack.php",true);
//     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     xhttp.send("index="+index); 
// }
