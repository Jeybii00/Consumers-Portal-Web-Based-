const otp = document.querySelectorAll('.otp_field');

//focus on first input
otp[0].focus();

otp.forEach((field, index) =>{


    field.addEventListener('keydown', (e) =>{
            if(e.key >= 0 && e.key <=9){
                otp[index].value = "";
                setTimeout(() => {
                    otp[index+1].focus();
                },4);
                
            }
            else if(e.key === 'Backspace'){
                setTimeout(() => {
                    otp[index-1].focus();
                },4); 
            }
    });
});

const container = document.querySelector('.container form'),
submitbtn = container.querySelector('.submit .button'),
errortxt = container.querySelector('.error-text');

container.onsubmit =(e) => {
    e.preventDefault();
}

submitbtn.onclick = () =>{
    //ajax starts

    let xhr = new XMLHttpRequest(); //create xml object
    xhr.open("POST","../php/otp.php" ,true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                if(data == "success"){
                    location.href = "../index.php"
                    
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