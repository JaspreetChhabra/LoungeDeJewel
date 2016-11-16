function validatetext(id)
    {
        var reg = /^[a-zA-Z]+$/;
        if($("#"+id).val()==null || $("#"+id).val()=="")
            {
                var div = $("#"+id).closest("div");
                div.addClass("has-error has-feedback");
                $("#glypcn"+id).remove();
                div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
                return false;
            }
            else if(!($("#"+id).val().match(reg)))
                {
                    var div = $("#"+id).closest("div");
                       div.addClass("has-error has-feedback");
                       $("#glypcn"+id).remove();
                       div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
                       return false;
                }
            else
                {
                var div = $("#"+id).closest("div");
                div.removeClass("has-error");
                div.addClass("has-success has-feedback");
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
                var div = $("#"+id).closest("div");
                div.addClass("has-error has-feedback");
                $("#glypcn"+id).remove();
                div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
                return false;
            }
            else if(!($("#"+id).val().match(reg)))
                {
                    var div = $("#"+id).closest("div");
                       div.addClass("has-error has-feedback");
                       $("#glypcn"+id).remove();
                       div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
                       return false;
                }
            else
                {
                var div = $("#"+id).closest("div");
                div.removeClass("has-error");
                div.addClass("has-success has-feedback");
                 $("#glypcn"+id).remove();
                div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-ok form-control-feedback"></span>');
                return true;
                }
    }

    function recheckpass(id)
    {
        if($("#"+id).val()==null || $("#"+id).val()=="")
            {
                var div = $("#"+id).closest("div");
                div.addClass("has-error has-feedback");
                $("#glypcn"+id).remove();
                div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
                return false;
            }
            else if(!($("#"+id).val() == $("#password").val()))
                {
                    var div = $("#"+id).closest("div");
                       div.addClass("has-error has-feedback");
                       $("#glypcn"+id).remove();
                       div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
                       return false;
                }
            else
                {
                var div = $("#"+id).closest("div");
                div.removeClass("has-error");
                div.addClass("has-success has-feedback");
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
                  if(!validatetext("fname"))
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
                  if(!validatetext("lname"))
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
            $("#password2").blur(function()

              {
                  if(!recheckpass("password2"))
                      {
                          return false;
                      }
              }
            );

        }

     );