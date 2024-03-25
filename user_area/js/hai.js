$(document).ready(function(){
   $.validator.setDefaults({
      submitHandler: function()
      {`
         {
           ` let passwed= new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,})');
            let medium=new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))');
            
            var name=$('input[name=user_username]').val();
            var email=$('input[name=user_user_email]').val();
            var image=$('input[name=user_image]').val();
            var password=$('input[name=user_password]').val();
            var cPassword=$('input[name=conf_user_password]').val();
            var address=$('input[name=user_address]').val();
            var contact=$('input[name=user_contact]').val();
            var formData={name:name,image:image,email:email,password:password,cPassword:cPassword,address:address, contact:contact};
            $.ajax({url:"user_registraction.php",type: 'POST', data: formData, success:function(response)
              {}
             });
             
   }}});
   $("#frm").validate({
      rules:{
         user_username:"required",
         user_email:{
                   required:true,
                   email:true
         }, 
         user_image:"required",
         user_password:
         
         {  
            required:true,
            minlength:8,
          
            
   

         },
            conf_user_password:
            {
               required:true,
               equalTo:"#user_password"
            },
            user_address :"required",
            user_contact:
            {
               required:true,
               digits:true,
               minlength:10,
               maxlength:10 
               
            },
           
},
      messages:{
         user_username:"Enter your name",
         user_email:{
            required:"Enter your email id",
            email:"please enter valid email id"
           

         },
         user_password:{
            required:"Enter your password ",
             minlength:"password length must be 8",
             equalTo:"altest on char"
      }, 
      conf_user_password:
      {
         required:"Enter your  confirm password ",
         minlength:"password length must be 8",
         equalTo:"password mismatch"  
      },
      user_address:"Enter your address details",
  
      user_contact:
      {
         required:"Enter your  mobile number ",
         minlength:"only 10 allowed",
         maxlength:" only 10 allowed",
         digits:"please enter numeric values",

      }  
   }


   });

});





