$(".submit").on("click",function(e){

    e.preventDefault();
    
    const values = {
       "username" : $("#username").val(),
       "email"    : $("#email").val(),
       "moible"   : $("#mobile").val(),
       "password" : $("#password").val()
    }

    let postresquery = () => {
        $.post("execute/execute_register.php",values,(data)=>{
           alert(data)
           window.location.href = "index.php"
        })
    }

    (values['username'] == "" 
    || values['email'] == "" 
    || values['mobile'] == "" 
    || values['password'] == "") ? alert("Please fill all the fields") : postresquery();
    
})// advanced javascript  (braniiblack) | very easy to understand