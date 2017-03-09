    
                <div class="banner-top">
                        <div class="container">
                                <h3 >Register</h3>
                                <h4><a href="index.html">Home</a><label>/</label>Register</h4>
                                <div class="clearfix"> </div>
                        </div>
                </div>



                <div class="login">
                        <div class="main-agileits">
				<div class="form-w3agile form1">
					<h3>Register</h3>
                                        <form action="<?php echo base_url();?>/index.php/Main_Site/registration" method="post" enctype="multipart/form-data">
					    <div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" value="Full Name" name="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Full Name';}" required="">
							<div class="clearfix"></div>
					    </div>
                                            <div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" value="Contact" name="contact" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Contact';}" required="">
							<div class="clearfix"></div>
					    </div>
                                            <div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" value="Username" name="user_name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" required="">
							<div class="clearfix"></div>
                                            </div>
                                            <div class="key">
                                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                                    <input  type="text" value="Email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                                                    <div class="clearfix"></div>
                                            </div>
                                            <div class="key">
                                                    <label class="control-label">Select File</label>
                                                    <input id="input-1" type="file" class="file" name="profile_picture">
                                            </div>
                                            <div class="key">
                                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                                    <input  type="password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                                                    <div class="clearfix"></div>
                                            </div>
                                            <div class="key">
                                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                                    <input  type="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Confirm Password';}" required="">
                                                    <div class="clearfix"></div>
                                            </div>
                                            <input type="hidden" name="user_level" value="3">
                                            <input type="submit" value="Submit">
					</form>
				</div>
				
			</div>
		</div>