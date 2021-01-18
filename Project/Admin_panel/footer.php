<link href="vendors/chosen.min.css" rel="stylesheet" media="screen">
<script src="vendors/chosen.jquery.min.js"></script>

<script>
$(function() {
    $(".datepicker").datepicker(); 
     $(".uniform_on").uniform();
    $(".chzn-select").chosen();
    $('.textarea').wysihtml5(); 

});
</script>
<script src="js/bootstrap.min.js"></script>
<script src="jGrowl/jquery.jgrowl.js"></script>   
<script>
  $(function() {
    $('.tooltip').tooltip();  
    $('.tooltip-left').tooltip({ placement: 'left' });  
    $('.tooltip-right').tooltip({ placement: 'right' });  
    $('.tooltip-top').tooltip({ placement: 'top' });  
    $('.tooltip-bottom').tooltip({ placement: 'bottom' });
    $('.popover-left').popover({placement: 'left', trigger: 'hover'});
    $('.popover-right').popover({placement: 'right', trigger: 'hover'});
    $('.popover-top').popover({placement: 'top', trigger: 'hover'});
    $('.popover-bottom').popover({placement: 'bottom', trigger: 'hover'});
    $('.notification').click(function() {
      var $id = $(this).attr('id');
      switch($id) {
        case 'notification-sticky':
          $.jGrowl("Stick this!", { sticky: true });
        break;
        case 'notification-header':
          $.jGrowl("A message with a header", { header: 'Important' });
        break;
        default:
          $.jGrowl("Hello world!");
        break;
      }
    });
  });
</script>

<div class="container">
	<div class="footer_all">
		<div class="row">
			<div class="col-md-12">
				<div class="footer_top">TSU Shipping Agent</div>
					<div class="footer_bottom">
						<ul>
							<li><a href="">Contact</a></li>
							<li>|</li>
							<li><a href="">FAQ</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<link href="vendors/chosen.min.css" rel="stylesheet" media="screen">
<script src="vendors/chosen.jquery.min.js"></script>

<script>
  $(function() {
   $(".datepicker").datepicker(); 
   $(".uniform_on").uniform();
   $(".chzn-select").chosen();
   $('.textarea').wysihtml5();
  });
</script>

<script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"add_comment.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"fetch_comment.php",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 }); 
});
</script>
	
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>