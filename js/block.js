function chText()
{
var str=document.getElementById("aliasEntry");
var regex=/[^a-z ]/gi;
str.value=str.value.replace(regex ,"");
}

function chTextOne()
{
var str=document.getElementById("entryAlias");
var regex=/[^a-z ]/gi;
str.value=str.value.replace(regex ,"");
}