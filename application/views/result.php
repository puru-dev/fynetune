<div class="message">
    <div class="row">
        <div class="col-md-12 text-center">
            <p>Quiz Result</p>
        </div>
    </div>
</div>

<main>
    <div class="container result">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">

                <?php if ($result == 5 || $result == 4): ?>
                    <img width="180" src="<?php echo base_url('img/win.png'); ?>" alt="">

                    <h2 class="text-success" style="margin-bottom: 0; color: #24ed27;">Congratulation!</h2>
                    <h3 style="margin-top: 5px; color: #ffffff;">Your <?=$result?> answers are correct.</h3>
                    <br>
                    <h3 style="margin-top: 5px; color:red;">Total 5 Questions.</h3>
                    <br>
                    <h1 class="text-success" style="margin-top: 5px; color: #24ed27;">Thank you</h1>

                    <br>
                    <br>

                    <a href="<?php echo site_url('home/logout'); ?>" class="btn btn-success">Go to Main Page</a>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>



                <?php else: ?>

                    <img width="180" src="<?php echo base_url('img/failed.png'); ?>" alt="">


                    <h2 class="text-danger" style="margin-bottom: 0; color: #ee2d28;">You are Failed.</h2>
                    <h2 class="text-warning" style="margin-top: 5px; color: #ffffff;">Only <?=$result?> answers are correct.</h2>
                    <br>
                    <h3 style="margin-top: 5px; color:red;">Total 5 Questions.</h3>
                    <br>
                    <br>
                    <a href="<?php echo site_url('home/logout'); ?>" class="btn btn-success">Go to Main Page</a>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                <?php endif; ?>


            </div>
        </div>
    </div>
</main>


