//declaring html elements

const imgDiv = document.querySelector('#profile-pic-div');
const img = document.querySelector('#photo');
const file = document.querySelector('#file');
const uploadBtn = document.querySelector('#uploadBtn');

//if the user hover to the profile photo

imgDiv.addEventListener('mouseenter', function()
{
    uploadBtn.style.display = "block"
});

//if the user mouse pointer leave the profile photo

imgDiv.addEventListener('mouseleave', function()
{
    uploadBtn.style.display = "none"
});

//preview image when the user select  the photo

file.addEventListener('change', function()
{
    const choosedFile = this.files[0];

    if(choosedFile){
        const reader = new FileReader();

        reader.addEventListener('load', function()
        {
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(choosedFile);
    }
})