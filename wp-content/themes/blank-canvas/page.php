<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blank Canvas
 * @since 1.0.0
 */

get_header();
// print_r(count_post_publish());
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
var trHTML, optHTML = '';
var totalItems = 0; 
	
	$.ajax({
    type: 'POST',
    url: '<?php echo admin_url('admin-ajax.php');?>',
    dataType: "json", // add data type
	cache: false,
    data: { action : 'get_ajax_posts' },
    success: function( response ) {
		if(response.status == 200){
			
		$.each(response.data, function (i, item) {
        	trHTML += '<tr><td>' + (i+1)+'. '+ '</td><td>' + response.data[i].post.post_title + '</td><td>' +response.data[i].post.post_date +'</td><td>' + response.data[i].category.cat_name + '</td><td></td></tr>';
   	 	});
		
			totalItems = response.data.length;

		$('#totalitems').text(response.data.length);
    	$('#posts').append('<tbody>'+trHTML+'</tbody>');
			
		}else if(response.status == 0){
			trHTML += '<tr><td colspan="5">' +"You haven't posted any feeds or recipes yet."+ '</td></tr>';
    		$('#posts').append(trHTML);
			console.log(response.message)
		}
		
    }
});
	
	$.ajax({
    type: 'POST',
    url: '<?php echo admin_url('admin-ajax.php');?>',
    dataType: "json", // add data type
    data: { action : 'get_ajax_cats'},
    success: function( response ) {
		if(response.status == 200){
		$.each(response.data, function (i, item) {
        	optHTML += '<option value='+response.data[i].cat_ID+'>'+response.data[i].name+'</option>';
   	 	});
    	$('#cats').append(optHTML);
// 			console.log(response.data)
		}else if(response.status == 0){
			optHTML += '<option value="">No Category found</option>';
			$('#cats').append(optHTML);
			console.log(response.message);
		}
    }
});
	
	
	
	 $(document).on('change','#cats',function(){
// 		 alert();
// 		 return false;
		 $.ajax({
    type: 'POST',
    url: '<?php echo admin_url('admin-ajax.php');?>',
    dataType: "json", // add data type
			 cache: false,
    data: { action : 'get_ajax_posts', cat: $(this).val() },
    success: function( response ) {
		$('#posts tbody').empty();
		if(response.status == 200){
		$.each(response.data, function (i) {
                        var title = response.data[i].post.post_title;
                        var date = new Date().toDateString(response.data[i].post.post_date);
                        var category = response.data[i].category.cat_name;
                            $('tbody#emp').append(
                            '<tr><td>'+(i+1)+'.</td><td>'
                            + title
                            + '</td><td>'
                            + date
                            + '</td><td>'
                            + category
                            + '</td><td></td></tr>')
                    });
		}else{
			$('tbody#emp').append('<tr><td>You haven\'t posted any feed or recipes yet. </td></tr>');
		}
	}

});
	
	});
	
	$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#posts tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
	
	$(document).ready(function(){
  $("#postperpage").on("change", function() {
	  paginate(this.value);
  });
	});
	
	
	
	function paginate(rows = 10){

    $('#nav').empty();
  
  $('#posts').after('<div id="nav"></div>');  
    var rowsShown = rows;  
    var rowsTotal = $('#posts tbody tr').length;  

    var numPages = rowsTotal/rowsShown;  
    for (i = 0;i < numPages;i++) {  
        var pageNum = i + 1;  
        $('#nav').append ('<a href="#" rel="'+i+'">'+pageNum+'</a> ');  
    }  
 
    $('#posts tbody tr').slice (0, rowsShown).show();  
    $('#nav a:first').addClass('active');  
    $('#nav a').bind('click', function() {  
    $('#nav a').removeClass('active');  
   $(this).addClass('active');  
        var currPage = $(this).attr('rel');  
        var startItem = currPage * rowsShown;  
        var endItem = startItem + rowsShown;  
        $('#posts tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).  
        css('display','table-row').animate({opacity:1}, 300);  
    });  

	}

	
	
</script>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="top inline-div">
				<div>
				<h1>
					My Feeds &amp; Recipes
				</h1>
					<p class="paginate">
						Showing <strong>1-10</strong> item(s) of <strong><span id="totalitems"></span></strong> items
					</p>
				</div>
				<div>
					<input type="text" id="search" placeholder="Search my Feeds & Recipes"/> 
					<button id="searchBtn">
						Search
					</button>
				</div>
			</div>
			
			
			<div class="inline-div">
				<div>
				<label for="cats">Filter By</label>
			<select id="cats">
			<option value=''>All Categories</option>
			</select>
			<select id="postdates">
			<option value=''>Date</option>
			</select>
				</div>
				<div>
					<select id="postperpage">
			<option value='10'>10</option>
			<option value='20'>20</option>
			<option value='30'>30</option>
			<option value='40'>40</option>
			</select>
				<label>Per Page</label>
			</div>
				</div>
				
			
			
			<table id="posts" cellspacing="0" cellpadding="0">
    <thead>
        <th>Sr. NO.</th>
         <th>Title</th>
         <th>Date</th>
         <th>Category</th>
         <th>Reward</th>
    </thead>
				
				<tbody id="emp"></tbody>
</table>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
