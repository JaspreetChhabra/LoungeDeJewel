<html>
    	<head>
        		<title>Php code compress the image</title>
    	</head>
    	<body>

		<div class="message">
                    	<?php
                    		if($_POST){
                        		if ($error) {
                            		?>
                            		<label class="error"><?php echo $error; ?></label>
                        <?php
                            		}
                        	}
                    	?>
                	</div>
		<fieldset class="well">
            	    	<legend>Upload Image:</legend>                
			<form action="abc.php" name="myform" id="myform" method="post" enctype="multipart/form-data">
				<ul>
			            	<li>
						<label>Upload:</label>
			                                <input type="file" name="file" id="file"/>
					</li>
					<li>
						<input type="submit" name="submit" id="submit" class="submit btn-success"/>
					</li>
				</ul>
			</form>
		</fieldset>
	</body>
</html>
