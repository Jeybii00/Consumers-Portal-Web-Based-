const container = document.querySelector('.bill-container form'),
submitbtn = container.querySelector('.submit input'),
errortxt = container.querySelector('.error-text');

container.onsubmit =(e) => {
    e.preventDefault();
}

submitbtn.onclick = () =>{
    //ajax starts

    let xhr = new XMLHttpRequest(); //create xml object
    xhr.open("POST","../ebill/generate_bill.php" ,true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                if(data == "Success"){
                    location.href = "../ebill/add-bill.php"
                    
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

