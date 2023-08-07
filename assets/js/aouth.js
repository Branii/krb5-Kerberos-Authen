$(".submit").on("click",function(e){
    e.preventDefault();
    const code = $("#code").val()

    let postresquery = () => {
        $.post("execute/execute_oauth.php",{code:code},(data)=>{
           data == "true" ? window.location.href = "home.php" : alert(data)
        })
    }

    (code == "") ? alert("Enter the code") : postresquery()



})