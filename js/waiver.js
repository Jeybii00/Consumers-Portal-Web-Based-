const container = document.querySelector('.waiver-container form')
const sucesss = document.querySelector('success-text')
submitbtn = container.querySelector('.submit input'),
errortxt = container.querySelector('.error-text'),
successtxt = container.querySelector('.success-text');


    
container.onsubmit =(e) => {
    e.preventDefault();
}

submitbtn.onclick = () =>{
    //ajax starts

    let xhr = new XMLHttpRequest(); //create xml object
    xhr.open("POST","../php/waiver_function.php" ,true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                if(data == "Form Submitted Successfully!"){
                    successtxt.textContent = data;
                    successtxt.style.display = "block";
                setTimeout(() => {
                        location.href = "../forms/waiver.php"
                    },3100);
                }
                else{
                    errortxt.textContent = data;
                    errortxt.style.display = "block";
                }
                setTimeout(() => {
                    errortxt.style.display = 'none';
                    successtxt.style.display = 'none';
                },3000);
            }
        }
    }
    //send data via ajax to php
    let formData = new FormData(container); //creating new object from the input data
    xhr.send(formData); //sending data to the php
}