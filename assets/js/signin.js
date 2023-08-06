$(".submit").on("click",function(e){

    e.preventDefault();
    
    const values = {
       "email"    : $("#email").val(),
       "password" : $("#password").val()
    }

    let postresquery = () => {
        $.post("execute/execute_signin.php",values,(data)=>{
           alert(data)
           console.log(data)
        })
    }

    (values['email'] == "" || values['password'] == "") ? alert("Please fill all the fields") : postresquery();
    
})// advanced javascript  (braniiblack) | very easy to understand