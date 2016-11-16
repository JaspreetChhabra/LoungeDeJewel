function isName(id)
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
function isNull(id)
{
    if($("#"+id).val()==null || $("#"+id).val()=="")
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
function isWeight(id)
{
    var reg = /^[0-9]+$/;
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
    $(document).ready(

          function()
        {
            $("#pname").blur(function()

              {
                  if(!isName("pname"))
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
            $("#mrp").blur(function()

              {
                  if(!isNull("mrp"))
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
            $("#sp").blur(function()

              {
                  if(!isNull("sp"))
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
            $("#desc").blur(function()

              {
                  if(!isNull("desc"))
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
            $("#quantity").blur(function()

              {
                  if(!isNull("quantity"))
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
            $("#weight").blur(function()

              {
                  if(!isWeight("weight"))
                      {
                          return false;
                      }
              }
            );

        }

     );
         
   