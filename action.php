
<?php
    require 'users.php';
    //print_r($_POST);
    if(isset($_POST['action']) && $_POST['action']=='signup'  ){
        $users = validatesign();
        //echo "All is well";
        


        $objuser = new Users();
        $objuser->setUsername($users['uname']);
        $objuser->setEmail($users['uemail']);;
        $objuser->setPassword($users['upswd']);
        $objuser->setNumber($users['uroll']);
        $objuser->setYear($users['uyear']);
        /*$objuser->setActive(0);
        $objuser->setToken(NULL);
        $objuser->setCreated(date('Y-m-d'));*/
        $userData = $objuser->getUserByUsername();
        if($userData){
            echo "Username already exists";
            exit;
        }
        if($objuser->save()){
            /*$lastId = $objuser->conn->lastInsertId();
            $token = sha1($lastid);
            $url = 'http://'.$_SERVER['SERVER_NAME'].'/user/verify.php?username='.
            $lastId.'&token=' . $token;
            $html = '<div>Thank you for registering<br>'.$url.'</div>';*/
            echo "Registered ";
        }
        else{
            echo"Failed to save";}
    }
    function validatesign(){
        $users['uname'] = filter_input(INPUT_POST,'txt',FILTER_SANITIZE_STRING);
        //echo $uname."HIIIIIIIII";
        if(false == $users['uname']){
            echo "Enter valid name";
            exit;
        }
        $users['uemail'] = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
        if(false == $users['uemail']){
            echo "Enter valid email";
            exit;

        }
        $users['upswd'] = filter_input(INPUT_POST,'pswd',FILTER_SANITIZE_STRING);
        if(false == $users['upswd']){
            echo "Enter valid password";
            exit;

        }
        $users['uroll'] = filter_input(INPUT_POST,'roll',FILTER_SANITIZE_NUMBER_INT);
        if(false == $users['uroll']){
            echo "Enter valid roll no";
            exit;

        }
        $users['uyear'] = filter_input(INPUT_POST,'year',FILTER_SANITIZE_NUMBER_INT);
        if(false == $users['uyear']){
            echo "Enter valid year";
            exit;

        }
        return $users;
    }
    $pscrct = 0;
    //print_r($_POST);
    if(isset($_POST['action']) && $_POST['action']=='login'  ){
        //print_r($_POST);
        $users = validatelog();
        $objuser = new Users();
        $objuser->setEmail($users['uemail']);
        $objuser->setPassword($users['upswd']);

        $userData = $objuser->getUserByEmail();
        //if(is_array($userData) && count($userData)>0)
        if(($userData)){
            if($userData['password'] == $users['upswd']){
            echo "Login successfull";
            $pscrct = 1;
            }
            else{
                echo "Wrong password";

            }
            //echo $userData['id'];
        }
        else{
            echo "Check password and username";
            /*<script>
                console.log("GET OUT");
            </script>*/
        }
    }
    function validatelog(){
        $users['uemail'] = filter_input(INPUT_POST,'EMAIL',FILTER_VALIDATE_EMAIL);
        if(false == $users['uemail']){
            echo "Enter valid email";
            exit;

        }
        $users['upswd'] = filter_input(INPUT_POST,'PSWD',FILTER_SANITIZE_STRING);
        if(false == $users['upswd']){
            echo "Enter valid password";
            exit;

        }
        return $users;
    }
?>
<script>
    //var main = document.getElementById("maincontent");

    var pcheck = '<?=$pscrct?>';
    var username =  '<?=$userData['username']?>';
    var roll = '<?=$userData['number']?>';
    var age = '<?=$userData['year']?>';

    if(pcheck==1){
        console.log("carry on");
        $(document).ready(function(){
        $('#newpage').css("display","none");
        $("#header").css("background","white");
        //$("#header").css({"background": "white", "width": "1200px", "height":"900px"});
        var string="Hello " + username + "Roll" + roll + "age" + age;
        $("#header").html(string);
        $("#header").css("color","black");
        $('#maincontent').load("cars.html");
        });


    }
</script>