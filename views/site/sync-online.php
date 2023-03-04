<?php
/**
 * @var $campaigns \app\models\Compaign[]
 */

use yii\web\View;

?>

    <div class="blood-cpdetail-form">

        <?php $form = \yii\bootstrap5\ActiveForm::begin(); ?>
        <div class="row">
            <span class="glyphicon glyphicon-pencil"></span>
            <h3 style="color: red">Please upload data online only when campaign is over.</h3>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="campaign" class="form-label">Campaign: </label>
                <select id="campaign" class="form-control">
                    <option value="<?= '' ?>"><?= 'Choose Campaign Data To Upload' ?></option>
                    <?php foreach ($campaigns as $campaign) {
                        ?>
                        <option value="<?= $campaign->id ?>"><?= $campaign->name ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <hr/>

        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-danger" id="upload"><i
                            class='fa fa-database text-white fa-fw'></i>Upload Data To Online Database
                </button>
                <div id="campaign-info" style="display: none">
                    <br/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="upload-campaign-info" style="display: none">
                    <hr/>
                    Uploading the data ... please wait.
                </div>
            </div>
        </div>
    </div>


<?php

$js = <<<JS
    let liveDBURL = 'http://localhost:8000/api';
    var campaignData=null;
    var donorsData=null;
    $(function (){
        var selectedCampaign = null;
        $("#campaign").click(function (){
            var campaign = $("#campaign").val();
            selectedCampaign=campaign
            $.ajax({
              type: "GET",
              url: "/site/get-campaign-data",
              data: {
                  campaign_id: campaign
              },
              cache: false,
              success: function(data){
                  campaignData=data.campaign;
                  donorsData=data.donors;
                  $("#campaign-info").html(data.message).show();
                }
            });
        })
        $("#upload").click(function (){
            if(!confirm('Are you sure to upload selected campaign data online?')){
                return false;
            }
            $("#upload-campaign-info").show();
            sendAjaxToSaveCampaign(campaignData)
        })
    });
    
    function sendAjaxToSaveCampaign(campaignData){
        let latestCampaignID = null
        $.ajax({
              type: "POST",
              url: liveDBURL+"/campaign-importer",
              data: campaignData,
              cache: false,
              success: function(d){
                  latestCampaignID = d.id
                  donorsData.forEach(function (donor, i){
                        donor['compaign_id'] = latestCampaignID;
                        setTimeout(function (){
                             sendAjaxToSaveDonors(donor)
                        },
                       i * 1000)
                  })

                },
              beforeSend: function(data){
                },
              complete: function(data){
                }
        });
    }
    function sendAjaxToSaveDonors(donor){
        $.ajax({
              type: "POST",
              url: liveDBURL+"/donor-importer",
              data: donor,
              cache: false,
              success: function(d){
                $("#upload-campaign-info").append(d.message);
                },
              beforeSend: function(data){
                },
              complete: function(data){
                }
        });
    }
    JS;
$this->registerJs($js, View::POS_END, "select-2-js")
?>