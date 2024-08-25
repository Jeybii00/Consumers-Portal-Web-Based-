const container = document.querySelector('.container form'),
submitbtn = container.querySelector('.submit input'),
errortxt = container.querySelector('.error-text');

container.onsubmit =(e) => {
    e.preventDefault();
}

submitbtn.onclick = () =>{
    //ajax starts

    let xhr = new XMLHttpRequest(); //create xml object
    xhr.open("POST","../php/login_function.php" ,true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                if(data == "success"){
                    location.href = "../php/user_dh.php"
                    
                }
                else{
                    errortxt.textContent = data;
                    errortxt.style.display = "block";
                }
            }
        }
    }
    //send data via ajax to php
    let formData = new FormData(container); //creating new object from the input data
    xhr.send(formData); //sending data to the php
}