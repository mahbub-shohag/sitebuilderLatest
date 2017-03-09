                                        <?php if(isset($message)){ ?>
                                        <div class="alert alert-success alert-dismissable col-lg-6 col-lg-offset-3" id="alert_div">
                                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                          <strong>Success!</strong> Sign Up Successful.
                                        </div>
                                        <?php } ?>

                                        <!-- Registration form -->
                                        <form action="" method="post">
						<div class="row">
							<div class="col-lg-6 col-lg-offset-3">
								<div class="panel registration-form">
									<div class="panel-body">
										<div class="text-center">
											<div class="icon-object border-success text-success">
                                                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                                                         </div>
											<h5 class="content-group-lg">Create account <small class="display-block">All fields are required</small></h5>
										</div>

										<div class="form-group has-feedback">
											<input type="text" class="form-control" placeholder="Choose username">
											<div class="form-control-feedback">
                                                                                            <i class="fa fa-user" aria-hidden="true"></i>
                                                                                        

											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="text" name="first_name" class="form-control" placeholder="First name">
													<div class="form-control-feedback">
                                                                                                            <i class="fa fa-user" aria-hidden="true"></i>

													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
                                                                                                    <input type="text" name="last_name" class="form-control" placeholder="Second name">
													<div class="form-control-feedback">
														<i class="fa fa-user" aria-hidden="true"></i>

													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
                                                                                                    <input type="password" name="password" class="form-control" placeholder="Create password">
													<div class="form-control-feedback">
														<i class="fa fa-user-secret"></i>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
                                                                                                    <input type="password" class="form-control" placeholder="Repeat password">
													<div class="form-control-feedback">
														<i class="fa fa-key" aria-hidden=="true"></i>
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
                                                                                                    <input type="email" name="email" class="form-control" placeholder="Your email">
													<div class="form-control-feedback">
														<i class="fa fa-envelope" aria-hidden="true"></i>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="email" class="form-control" placeholder="Repeat email">
													<div class="form-control-feedback">
														<i class="fa fa-envelope" aria-hidden="true"></i>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="checkbox">
												<label>
													<input type="checkbox" checked="checked">
													Send me <a href="#">test account settings</a>
												</label>
											</div>

											<div class="checkbox">
												<label>
													<input type="checkbox" checked="checked">
													Subscribe to monthly newsletter
												</label>
											</div>

											<div class="checkbox">
												<label>
													<input type="checkbox">
													Accept <a href="#">terms of service</a>
												</label>
											</div>
										</div>
                                                                            <input type="hidden" name="user_level" value="1">

										<div class="text-right">
                                                                                    <a href="login"><i class="fa fa-arrow-left"></i> Back to login form</a>											<button type="submit" id="btn_create" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"><b><i class="fa fa-plus"></i></b> Create account</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
					<!-- /registration form -->
                                        <script>
                                           $('#btn_create').click(function(){
                                             $('#alert_div').removeAttr('style');  
                                           }) 
                                        </script>   