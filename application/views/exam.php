<div class="message">
    <div class="row">
        <div class="col-md-12 text-center">
            <p>Choose the correct answer</p>
        </div>
    </div>
</div>


<main>
    <div class="container exam">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">


                <?php echo form_open('home/result'); ?>

                <?php
                $i = 0;
                //print_r($mcq['results']);exit;
                foreach ($mcq['results'] as $key => $item):
                    $i += 1;
                    if ($i === 6) {
                        break;
                    }
                    ?>
                    <?php echo form_hidden('question' . $i, $item->question); ?>
                    <h5><?php echo $i . ') ' . $item->question; ?></h5>
                    <?php foreach ($item->incorrect_answers as $key1 => $item1): ?>
                    <div class="radio">
                        <label class="text-danger">
                            <input required="" name="answer<?php echo $i; ?>" type="radio"
                                   value="<?php echo $item1; ?>">
                            <?php echo $item1; ?>
                        </label>
                    </div>
                    <?php endforeach; ?>
                    <div class="radio">
                        <label class="text-danger">
                            <input name="answer<?php echo $i; ?>" type="radio"
                                   value="<?php echo $item->correct_answer; ?>">
                            <?php echo $item->correct_answer; ?>
                        </label>
                    </div>
                    <br>
                <?php endforeach; ?>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</main>


