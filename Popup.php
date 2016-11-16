<!--<modal popup>    -->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Expired Session</h4>
      </div>
      <div class="modal-body">
        Your Session has expired please login again!!
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="goBack()"  id='modaldel'  >Move To Login</button>
      </div>
    </div>
  </div>
</div>   
    
<!--</modalpopup>    -->
    
<?php
    if(!isset($_SESSION['username']))
{
   ?>
<script type="text/javascript">
    //alert("Your session has expired!");
    $(document).ready(function() {
        $('#myModal').modal('show');
       
    });
    
    
    function goBack() {
                location.replace("login.php");
            }
    
</script>
<?php
}
?>
    
