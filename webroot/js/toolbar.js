$(document).ready(function(){
$('#save_token').click(function() {
    //alert("The paragraph was clicked.");
    //queryOrdersExtraRow() ;
    var token = $('#token').val();
    getFp(token);
});
function queryOrdersExtraRow() {
//Get data from fb
var app_id = $('#app_id').val();
var app_secret = $('#app_secret').val();
var token = $('#token').val();
var url = "https://graph.facebook.com/oauth/access_token?client_id="+app_id+"&client_secret="+app_secret+"&grant_type=fb_exchange_token&fb_exchange_token="+token;
//alert(url);

$.get(url, function(data, status){
        //alert("Data: " + data + "\nStatus: " + status);
        var token =data.replace("access_token=", "");
        getFp(token);
    });
}
function getFp(token){
	 var url ="https://graph.facebook.com/me/accounts?access_token=" +token;
	     $.getJSON(url, function(result){
	        $.each(result.data, function(key, val){
	            var checkbox ="<input type='checkbox' name='group[]' value='"+val.id+" - "+val.access_token+"'"+">"+val.name+"<br>";
	            $("#fan_pages").append(checkbox );
	        });
	    });
	 }
	 $('#share').click(function() {
	    postFb();
	});
	 function postFb(){
	 var searchIDs = $("#fan_pages input:checkbox:checked").map(function(){
	      return $(this).val();
	    }).get(); // <----
	    
	    $.each(searchIDs, function( index, value ) {
	  		//alert( index + ": " + value );
	    	var isLast = index==searchIDs.length-1?true:false;
	  		console.log(value);
	  		var arr = value.split(' - ');
	  		postToPage(arr[0], arr[1], isLast);
		});
	 }
	 function postToPage(id, token, isLast){
	 var url = "https://graph.facebook.com/v2.5/"+id+"/feed";
	  $.ajax({
	  url: url,
	  type: 'POST',
	  data: { 
	          access_token: token, 
	          link: $('#link').val(), 
	          picture: $('#picture').val(),
	          caption: $('#caption').val(),
	          message: $('#message').val(),
	          description: '  ',
	          name: '  '
	        },
	          success: function(result) {
	            console.log(result);
	            //alert(result);
	            var checkbox ="<p>Post success</p>";
	            $("#result").append(checkbox );
	            if(isLast){
	            	//alert('last');
                    $(location).attr('href', $('#main_link').val()+'post-shares/success');

	            }
	        },
	        error: function(XMLHttpRequest, textStatus, errorThrown) {
	            console.log(textStatus);
	            //alert(textStatus);
	            var checkbox ="<p>Post Error</p>";
	            $("#result").append(checkbox );
	            if(isLast){
                    $(location).attr('href', $('#main_link').val()+'post-shares/failed');

	            }
	        }
	});
	 }
	 
	 
	});

