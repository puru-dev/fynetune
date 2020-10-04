<div class="message">
    <div class="row ">
        <div class="col-md-12 text-center">
            <h3 >Admin Login.</h3>
        </div>
    </div>
</div>
<div class="text-center w-75 m-auto">
 <div class="alert alert-danger" style="display:none">
 </div>
</div>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <?php echo form_open('admin/check', array('id' => 'form', 'role' => 'form'));?>
                <div class="form-group">
                    <label class="text-dark">Email Address:</label>
                    <input type="email" name="email" class="form-control" required=""
                           value="<?php echo set_value('email'); ?>" placeholder="Enter your valid email">
                    <div id="error"></div>
                </div>

                <div class="form-group">
                    <label class="text-dark">Password:</label>
                    <input type="password" name="password" required=""
                           value="<?php echo set_value('password'); ?>" class="form-control"
                           placeholder="Enter your Password">
                    <div id="error"></div>
                </div>
                <br>
                <div class="form-group text-center">
                    <button class="btn btn-primary btn-submit">Submit</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</main>
