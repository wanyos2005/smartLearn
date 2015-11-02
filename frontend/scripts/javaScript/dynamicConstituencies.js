/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function dynamicConstituencies(county_id, div) {
    var data = null;

    $.ajax({
        type: 'POST',
        url: "<?= Yii::$app->urlManager->createUrl('site/dynamic-constituencies?county_id='); ?>" + county_id,
        data: data,
        dataType: 'html',
        success: function (data) {document.getElementById(div).innerHTML = data;},
        error: function () {alert("An Error Occured!");}
    });

}