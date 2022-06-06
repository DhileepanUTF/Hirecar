//console.log(1234);
var pwd = document.getElementById("pwd");
var len = document.getElementById("Total");
var cap = document.getElementById("Capital");
var num = document.getElementById("Number");
var s = document.getElementById("Special");
var btn = document.getElementById("btn");
var show = document.getElementById("Show");
var special = /[!@#$%^&*()<>?:\\]/;
pwd.addEventListener('input',function(){
    //console.log(123);
    var pass = pwd.value;
    var rem = 8-pass.length
    //console.log(pass);
    var a = totallen(pass);
    var b = caps(pass);
    var c = nums(pass);
    var d = sp(pass);
    if( a === 1){
        len.style.color = "green";
        //len.style.background-color
        
        len.innerHTML = "Required characters: 0 ";
    }
    else{
        len.style.color = "red";
        len.innerHTML = "Required characters: "+ rem;
    }
    if(b === 1){
        cap.style.color = "green";
    }
    else{
        cap.style.color = "red";
    }
    if(c === 1){
        num.style.color = "green";
    }
    else{
        num.style.color = "red";
    }
    if( d=== 1){
        s.style.display = "block";
    }
    else{
        s.style.display = "none";
    }
    if(a&&b&&c){
        btn.style.display = "block";
        btn.style.height = "30px";
    }
    else{
        btn.style.display = "none";
        
    }
    
});
function totallen(string){
    if(string.length >= 8){
        return 1;
    }
    else{
        return 0;
    }
}
function caps(string){
    for(i=0;i<string.length;i++){
        if(string.charAt(i) === string.charAt(i).toUpperCase() && (isNaN(string.charAt(i) * 1) )&& !(special.test(string.charAt(i)))){
            return 1;
        }
    }
    return 0;
    
}
function nums(string){
   for(i=0;i<string.length;i++){
        if(!isNaN(string.charAt(i) * 1)){
            return 1;
        }
    }
    return 0;
}

function sp(string){
    for(i=0;i<string.length;i++){
        if(special.test(string.charAt(i))){
            return 1;
        }
    }
    return 0;
}
show.addEventListener('change',function(){
    if(this.checked){
        pwd.type = "text";
    }
    else{
        pwd.type = "password";
    }
});
$('#btn').click(function(e){
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: "index.php",
        data: { },
        success: function(result){
            //$('#maincontent').addClass('geeks');
            $('#maincontent').addClass('Uno');
            $('#maincontent').html(result);
        }
    });
});


