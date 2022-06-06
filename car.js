
var btn = document.getElementById("btn");
var btn2 = document.getElementById("selector")
var header = document.getElementById("tableheader");

btn2.addEventListener("click", function(){
    $('#maincontent').css("background", "black");
    alert("We will contact you soon, Thank you for using our services");
    

})
btn.addEventListener("click",function(){
    $.getJSON("car.json", 
                            function (data) {
                        var carr = '';
  
                        // ITERATING THROUGH OBJECTS
                        $.each(data, function (key, value) {
  
                            //CONSTRUCTION OF ROWS HAVING
                            // DATA FROM JSON OBJECT
                            carr += '<tr>';
                            carr += '<td>' + 
                                value.id + '</td>';
                            carr += '<td>' + 
                                value.Name + '</td>';
  
                            carr += '<td>' + 
                                value.Horsepower + '</td>';
  
                            carr += '<td>' + 
                                value.Acceleration+ '</td>';
  
                            carr += '<td>' + 
                                value.Displacement + '</td>';

                            carr += '<td>' + 
                                value.Amount + '</td>';
  
                            carr += '</tr>';
                        });
                          
                        //INSERTING ROWS INTO TABLE
                        //$("#tableheader").show(); 
                        $("#last").css("display","block");
                        $('#maincontent').css("background-image","url('https://cdn.pixabay.com/photo/2019/03/08/02/12/flat-4041617_960_720.png')");
                        $('#maincontent').css({"background-repeat": "no-repeat",
                            "background-attachment": "fixed",
                            "background-size": "100% 100%"})
                        $('#table').show();
                        $('#table').append(carr);
                        btn.style.display = "none";
                        btn2.style.display ="block";
                    });
})
