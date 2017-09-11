// JavaScript Document
$(document).ready(function() {
//Hide Loading Image
function Hide_Load() {
	$("#loading").fadeOut('slow');
};
//Default Starting Page Results
$("#pagination li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});
$("#content").load("pagination_data.php?page=1", Hide_Load());
//Pagination Click
$("#pagination li").click(function(){
	//CSS Styles
	$("#pagination li").css({'border' : 'solid #dddddd 1px'}).css({'color' : '#0063DC'});
	$(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
	//Loading Data
	var pageNum = this.id;
	$("#content").load("pagination_data.php?page=" + pageNum, Hide_Load());
});
});