<?php 
use yii\helpers\Url;
$this->registerAssetBundle('FileUploadCustom');

 ?>

<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="upload"></div>
            <div class="upload1"></div>
            <div class="upload-single"></div>
        </div>
    </div>
</section>
<!-- ./wrapper -->
<?php $this->on($this::EVENT_END_PAGE, function () { ?>


<script>


$(function () {
    'use strict';
    // Initialize the jQuery File Upload widget:
    $('.upload').fileupload({
        paramName : 'filesss',
        url : "<?= Url::to(['demo/upload', 'fileparam'=>'filesss']); ?>",
    });

    var a = $('.upload1').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        maxNumberOfFiles:2,
        url : "http://v.test/jQuery-File-Upload/server/php/index.php",
    });


    $('.upload-single').fileupload({
        // Uncomment the following to send cross-domain cookies:
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        //xhrFields: {withCredentials: true},
        maxNumberOfFiles:1,
        url : "<?= Url::to(['demo/upload']); ?>",
        // url : "http://v.test/jQuery-File-Upload/server/php/index.php",
    });


})

</script>
<?php }); ?>
