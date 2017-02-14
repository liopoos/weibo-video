/*
* @Author: Mayuko
* @Date:   2017-02-12 13:53:01
* @Last Modified by:   Mayuko
* @Last Modified time: 2017-02-12 14:00:42
*/

'use strict';
$(document).ready(function()
{
    $("#load-btn").click(function(){
        $.ajax({
            type: "GET",
            url: "s.php?u="+$('#load-url').val(),
            dataType: "json",
            success: function(result){
                if(result.code == 1){
                    $('#content').html('<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="'+result.url+'" id="play"></iframe></div>');
                    $('#msg').html('<div class="well">下载地址（右键另存为）：<a href="'+result.url+'">'+result.url+'</a></div>');
                }else{
                    $('#msg').html('<div class="alert alert-danger" role="alert">url解析出错</div>');
                }

            }
        });
    });
})