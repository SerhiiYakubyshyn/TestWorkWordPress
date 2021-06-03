$("#continue").click(NextList);
$("#send").click(NextList);
$("#back").click(BackList);
$("#start").click(function() {
   location.reload();
});

function NextList(){
  if($("#ContactInfo").is(":visible") && ValidationFormConInf()){
    HideFormConInf();
    ShowQuantity();
  }
  else if($("#Quantity").is(":visible") && ValidationQuantity()){
    HideQuantity();
    ShowPrice();
  }
  else if ($("#Price").is(":visible")){
    HidePrice();
    ShowDone();
  }
}

function BackList(){
  if($("#Quantity").is(":visible") && ValidationQuantity()){
    HideQuantity();
    ShowFormConInf();
  }
  else if ($("#Price").is(":visible")){
    HidePrice();
    ShowQuantity();
  }
}

function HideFormConInf(){
  $("#ContactInfo").hide();
  $("#contactInfoLi a").css('color', '#4d4d4d');
}
function HideQuantity(){
  $("#Quantity").hide();
  $("#quantityLi a").css('color', '#4d4d4d');
}
function HidePrice(){
  $("#Price").hide();
  $("#send").hide();
  $("#priceLi a").css('color', '#4d4d4d');
}
function ShowDone(){
  $("#back").hide();
  $("#Done").show();
  $("#doneLi a").css('color', '#2a5bef');
  $("#start").show();
}
function ShowFormConInf(){
  $("#ContactInfo").show();
  $("#back").hide();
  $("#contactInfoLi a").css('color', '#2a5bef');
}
function ShowQuantity(){
  $("#Quantity").show();
  $("#continue").show();
  $("#back").show();
  $("#quantityLi a").css('color', '#2a5bef');
}
function ShowPrice(){
  $("#continue").hide();
  $("#Price").show();
  $("#send").show();
  $("#priceLi a").css('color', '#2a5bef');
  $("#priceText").val(CalcPrice());
}

function CalcPrice(){
  if($("#quantity").val()>=1 && $("#quantity").val()<=10){
    return '$10';
  }
  else if($("#quantity").val()>=11 && $("#quantity").val()<=100){
    return '$100';
  }
  else if($("#quantity").val()>=101 && $("#quantity").val()<=1000){
    return '$1000';
  }
}

function ValidationFormConInf(){
  if ($("#name").val().length <= 2){
    alert("Name Error! (name must be more than two characters)!");
    return false;
  }
  if($("#email").val().indexOf("@")<0 || $("#email").val().length < 5){
    alert("Email Error!");
    return false;
  }
  /*if($("#phone").val().length < 6){
    alert("Phone Error!");
    return false;
  }*/
  return true;
}
function ValidationQuantity(){
  if($("#quantity").val() == "undefined" || ($("#quantity").val()<=0 || $("#quantity").val()>1000)){
    alert("Quantity Error! (quantity must be more 0 and less than 1001)");
    return false;
  }
  return true;
}


$("#titleText").text($("title").text());
$("#descriptionText").text($('#description').attr('content'));

$( document ).ready(function() {
    $("#send").click(function(){
		sendAjaxForm('result_form', 'ajax_form', 'http://testtaskwordpress.great-site.net/wp-content/themes/twentytwentyone-child/assets/js/action_ajax_form.php');
			return false; 
		}
	);
});


function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url: url,
        type: "POST", 
        dataType: "html",
        data: $("#"+ajax_form).serialize(), 
        success: function(data) { 
			$("#doneIsSend").show();
    	},
    	error: function(data) { 
			$("#doneDontSend").show();
    	}
 	});
}

