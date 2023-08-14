 
  function submitData(){
    $(document).ready(function(){
      var data = {
        username: $("#username").val(),
        password: $("#password").val()
      };

      $.ajax({
        url: './login.php',
        type: 'POST',
        data: data,
        success:function(response){
          console.log(response);
          if(response == "Login Successful"){
            window.location.reload();
          }
        }
      });
    });
  }
