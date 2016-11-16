function validateText(id)
    {
        var reg = /^[a-zA-Z]+$/;
        if($("#"+id).val()==null || $("#"+id).val()=="")
        {
            
                       var div = $("#firstname").closest("div");
                       div.addClass("has-error");
                       $("#glypcn"+id).remove();
                       div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
                       return false;
                       //var nextTextFieldId = div.next().find(':text').attr("id");
                       
                
        }
        else if(!($("#"+id).val().match(reg)))
            {
                       var div = $("#firstname").closest("div");
                       div.addClass("has-error");
                       $("#glypcn"+id).remove();
                       div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
                       return false;
            }
        else
            {
               var div = $("#firstname").closest("div");
               div.removeClass("has-error");
                $("#glypcn"+id).remove();
               div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-ok form-control-feedback"></span>');

               return true;
            }
    }

    function validatelname(id)
    {
        var reg = /^[a-zA-Z]+$/;
        if($("#"+id).val()==null || $("#"+id).val()=="")
        {

                       var div = $("#lastname").closest("div");
                       div.addClass("has-error");
                       $("#glypcn"+id).remove();
                       div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
                       return false;

        }
        else if(!($("#"+id).val().match(reg)))
            {
                var div = $("#lastname").closest("div");
                       div.addClass("has-error");
                       $("#glypcn"+id).remove();
                       div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
                       return false;
            }
        else
            {
               var div = $("#lastname").closest("div");
               div.removeClass("has-error");
                $("#glypcn"+id).remove();
               div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-ok form-control-feedback"></span>');

               return true;
            }
    }

    function validatepass(id)
    {
        var reg = /^[a-zA-Z0-9]{8,}$/;
        if($("#"+id).val()==null || $("#"+id).val()=="")
        {

                       var div = $("#pass").closest("div");
                       div.addClass("has-error");
                       $("#glypcn"+id).remove();
                       div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
                       return false;

        }
        else if(!($("#"+id).val().match(reg)))
            {
                var div = $("#pass").closest("div");
                       div.addClass("has-error");
                       $("#glypcn"+id).remove();
                       div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
                       return false;
            }
        else
            {
               var div = $("#pass").closest("div");
               div.removeClass("has-error");
                $("#glypcn"+id).remove();
               div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-ok form-control-feedback"></span>');

               return true;
            }
    }

    function recheckpass(id)
    {
        if($("#"+id).val()==null || $("#"+id).val()=="")
        {

                       var div = $("#re-password").closest("div");
                       div.addClass("has-error");
                       $("#glypcn"+id).remove();
                       div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
                       return false;

        }
        else if(!($("#"+id).val() == $("#password").val()))
            {
                var div = $("#re-password").closest("div");
                       div.addClass("has-error");
                       $("#glypcn"+id).remove();
                       div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
                       return false;
            }
        else
            {
               var div = $("#re-password").closest("div");
               div.removeClass("has-error");
                $("#glypcn"+id).remove();
               div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-ok form-control-feedback"></span>');

               return true;
            }
    }


    function validatephone(id)
    {
        var reg = /^[0-9]{10,11}$/;
        if($("#"+id).val()==null || $("#"+id).val()=="")
        {

                       var div = $("#no").closest("div");
                       div.addClass("has-error");
                       $("#glypcn"+id).remove();
                       div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
                       return false;

        }
        else if(!($("#"+id).val().match(reg)))
            {
                var div = $("#no").closest("div");
                       div.addClass("has-error");
                       $("#glypcn"+id).remove();
                       div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
                       return false;
            }
        else
            {
               var div = $("#no").closest("div");
               div.removeClass("has-error");
                $("#glypcn"+id).remove();
               div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-ok form-control-feedback"></span>');

               return true;
            }
    }

    $(document).ready(

          function()
        {
            $("#fname").blur(function()

              {
                  if(!validateText("fname"))
                      {
                          return false;
                      }
              }
            );
           
        }

     );

     $(document).ready(

          function()
        {
            $("#lname").blur(function()

              {
                  if(!validatelname("lname"))
                      {
                          return false;
                      }
              }
            );

        }

     );
         $(document).ready(

          function()
        {
            $("#password").blur(function()

              {
                  if(!validatepass("password"))
                      {
                          return false;
                      }
              }
            );

        }

     );

          $(document).ready(

          function()
        {
            $("#re-pass").blur(function()

              {
                  if(!recheckpass("re-pass"))
                      {
                          return false;
                      }
              }
            );

        }

     );

         $(document).ready(

          function()
        {
            $("#phno").blur(function()

              {
                  if(!validatephone("phno"))
                      {
                          return false;
                      }
              }
            );

        }

     );





