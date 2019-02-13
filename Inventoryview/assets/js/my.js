$(function(){

	var url = "dashboard.php",
  urlRegExp = new RegExp(url.replace(/\/$/,''));
  
  $('.nav a').each(function(){
  	if(urlRegExp.test(this.href)){
    	$(this).addClass('active');
    }
  });
  
});