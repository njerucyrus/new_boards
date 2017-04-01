<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/28/17
 * Time: 1:18 AM
 */

?>






<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/5/17
 * Time: 11:29 AM
 */

?>

<div class="container-fluid">
    <div class="row" style="margin-top: 25px;">
        <div class="col col-md-9 col-md-offset-3">
            <div class="col col-md-11">
                <form class="form-group">
                    <input type="text" placeholder="search billboard" class="form-control text-center">

                </form>
            </div>
            <?php
            $boards = \App\Controller\BoardController::all();
            if (!empty($boards)) {
                foreach ($boards as $board) {
                    ?>
                    <div class="container-fluid">

                        <div class="row">
                            <div class="container-fluid"></div>

                            <div class="col col-md-12">

                                <div class="row">
                                    <div class="col-md-3 thumbnail">
                                        <img
                                                src="<?php if (!empty($board['image'])) echo $board['image']; else echo '../assets/uploads/img/noimage.png'; ?>">
                                    </div>
                                    <div class="col col-md-8">
                                        <div class="panel" style="background-color: rgba(0,0,0,0.14)">
                                            <div class="panel-heading">
                                                <h4 style="color: rgba(235,69,3,0.93);"> <?php echo $board["town"] ?>
                                                    (<?php echo $board['location'] ?>)</h4>
                                            </div>
                                            <div class="panel-body">
                                                <p><span class="label label-info"
                                                         style="font-weight: bold;">&quot;<?php echo $board['width']; ?> &times; <?php echo $board['height']; ?>
                                                        &quot;</span> double-sided, digital billboard located in Santa
                                                    Clara, CA.
                                                    Visible to traffic traveling to <?php echo $board['seen_by']; ?>
                                                </p>
                                                <span
                                                        class="pull-right">Weekly impressions <strong><?php echo $board['weekly_impressions']; ?></strong></span>
                                                <span><button
                                                            class="btn btn-xs btn-danger">Request quote</button> </span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                ?>

                <div class="jumbotron">
                    <div class="alert alert-info">
                        <p>No Bill boards found!</p>
                    </div>
                </div>
                <?php
            }
            ?>

        </div>
    </div>
</div>

</div>
</body>
</html>
