<?php
	include_once('shared/header.php');
?>
			<div class="col-md-6">
				<label><h1>Customer Information</h1></label>
				<div id="view"></div>
				<div id="message"></div>	
					<form id="contact-form">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" required="required" class="form-control" />
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" required="required" class="form-control"/>
						</div>

						<div class="form-group">
							<label>Subject</label>
							<input type="text" name="subject" required="required" class="form-control"/>
						</div>
						<div class="form-group">
							<label>Department</label>
							<select name="department" class="form-control" required="required">
								<option value="">Select Department</option>
								<option value="Marketing">Marketing</option>
								<option value="Support">Support</option>
								<option value="Administration">Administration</option>
							</select>
						</div>
						<div class="form-group">
							<label>Message</label>
							<textarea class="form-control" name="message"></textarea>
							
						</div>
						
						<button type="submit" name="send" class="btn btn-default" id="send-btn">Send</button>

					</form>					
			</div>
		<script>
			$(document).on('ready',function(){
				reload();

				$("#send-btn").on('click',function(){
					$.post('saveajax.php',$("#contact-form").serialize(),function(res){
						$("#message").html(res);
						reload();
						clearForms();
					});
					return false;
				}); 
			});

			function clearForms(){
				$("#contact-form input,select,textarea").val("");
			}

			
			function reload(){
				var $view=$("#view").html("<h1>Loading...</h1>");
				
				$.get("views/contact",function(res){
					$view.html(res);
				});
			}
		</script>
	
<?php
	include_once('shared/footer.php');
?>