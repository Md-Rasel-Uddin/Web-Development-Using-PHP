<?php 
@include ("header.php");
?>		

<div class="container">
	<div style="text-align:center">
	  <h2 style="background-color:  #b3e0d4;padding: 10px 0; margin-left: 22px;margin-right: 21px;">Our Some Cargo Ships Gallery</h2>
	  <p>Click on the images below for details:</p>
	</div>	

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-7">				
			  <span onclick="this.parentElement.style.display='none'" class="closebtn" style="color: gray">&times;</span>
			  <img id="expandedImg" style="width:600px;height: 400px;">
			  <div id="imgtext"><img src="images/h9.jpg" style="width:600px;height: 385px;"></div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>

	<div class="row">
		<div class="column">
		    <img src="images/gallery/h5.jpg" alt="The Axel Maersk is a Danish merchant ship. The container ship is part of the fleet of the Maersk Line." style="width:100%" onclick="myFunction(this);">
		</div>
	    <div class="column">
	   	   <img src="images/gallery/h1.jpg" alt="SS Bandırma was an Ottoman mixed-freight ship, which became famous for her historical role in taking Mustafa Kemal Pasha (Atatürk) from Constantinople (today-Istanbul) to Samsun in May 1919 that marked the establishment of the Turkish national movement." style="width:100%" onclick="myFunction(this);">
	    </div>
	    <div class="column">
	       <img src="images/gallery/h10.jpg" alt="CMA CGM Medea is a container ship built in 2006. Although she is among the largest in the world, she can carry four thousand fewer containers than the largest, Emma Mærsk." style="width:100%" onclick="myFunction(this);">
	    </div>
	    <div class="column">
	      <img src="images/gallery/n2.jpg" alt="The MV Delight is a Hong Kong-flagged grain carrier. It was attacked and hijacked in the Gulf of Aden " style="width:100%" onclick="myFunction(this);">
	    </div>
	</div>
	<div class="row">
		<div class="column">
		  <img src="images/gallery/h21.jpg" alt="The MV Delight is a Hong Kong-flagged grain carrier. It was attacked and hijacked in the Gulf of Aden " style="width:100%" onclick="myFunction(this);">
		</div>
	    <div class="column">
	      <img src="images/gallery/h2.jpg" alt="Edith Maersk is a container ship and the sister ship of Emma Maersk, thus one of the world's largest cargo ships. " style="width:100%" onclick="myFunction(this);">
	    </div>
	    <div class="column">
	      <img src="images/gallery/h21.jpg" alt="MOL Enterprise is a Panamax-type container ship owned by Mitsui O.S.K. Lines, a Japanese transport company" style="width:100%" onclick="myFunction(this);">
	    </div>
	    <div class="column">
	      <img src="images/gallery/k1.jpg" alt="SS Fatima was the first ship ever registered in Karachi, Pakistan in 1948." style="width:100%" onclick="myFunction(this);">
	    </div>
	</div>
	<div class="row">
	    <div class="column">
	     <img src="images/gallery/h4.jpg" alt="The Gudrun Maersk is a very large container ship, capable of carrying 8,500 TEU and with a deadweight (DWT) of 115,700 metric tons. " style="width:100%" onclick="myFunction(this);">
	    </div>
	    <div class="column">
	     <img src="images/gallery/h9.jpg" alt="The MV Golden Nori is a Japanese chemical tanker that was hijacked by pirates off the coast of Somalia on 28 October 2007. In news reports" style="width:100%" onclick="myFunction(this);">
	    </div>
	    <div class="column">
	     <img src="images/gallery/h21.jpg" alt="HMAS Westralia was a modified Leaf class replenishment oiler which served with the Royal Australian Navy (RAN) from 1989 to 2006. " style="width:100%" onclick="myFunction(this);">
	    </div>
	    <div class="column">
	     <img src="images/gallery/g2.jpg" alt="MV Empire MacKay was an oil tanker constructed with rudimentary aircraft handling facilities as a merchant aircraft carrier." style="width:100%" onclick="myFunction(this);">
	    </div>
	</div>
	<div class="row">
	    <div class="column">
	     <img src="images/gallery/v3.jpg" alt="The MV Golden Nori is a Japanese chemical tanker that was hijacked by pirates off the coast of Somalia on 28 October 2007. In news reports" style="width:100%" onclick="myFunction(this);">
	    </div>
	    <div class="column">
	     <img src="images/gallery/v2.jpg" alt="HMAS Westralia was a modified Leaf class replenishment oiler which served with the Royal Australian Navy (RAN) from 1989 to 2006. " style="width:100%" onclick="myFunction(this);">
	    </div>
	    <div class="column">
	     <img src="images/gallery/v1.jpg" alt="MV Empire MacKay was an oil tanker constructed with rudimentary aircraft handling facilities as a merchant aircraft carrier." style="width:100%" onclick="myFunction(this);">
	    </div>
	    <div class="column">
	     <img src="images/gallery/v4.jpg" alt="HMAS Westralia was a modified Leaf class replenishment oiler which served with the Royal Australian Navy (RAN) from 1989 to 2006. " style="width:100%" onclick="myFunction(this);">
	    </div>
	</div>
	    <div class="column">
	     <img src="images/gallery/h1.jpg" alt="MV Empire MacKay was an oil tanker constructed with rudimentary aircraft handling facilities as a merchant aircraft carrier." style="width:100%" onclick="myFunction(this);">
	    </div>
	    <div class="column">
	     <img src="images/gallery/h4.jpg" alt="HMAS Westralia was a modified Leaf class replenishment oiler which served with the Royal Australian Navy (RAN) from 1989 to 2006. " style="width:100%" onclick="myFunction(this);">
	    </div>
	    <div class="column">
	     <img src="images/gallery/l1.jpg" alt="HMAS Westralia was a modified Leaf class replenishment oiler which served with the Royal Australian Navy (RAN) from 1989 to 2006. " style="width:100%" onclick="myFunction(this);">
	    </div>
	    <div class="column">
	     <img src="images/gallery/l2.jpg" alt="MV Empire MacKay was an oil tanker constructed with rudimentary aircraft handling facilities as a merchant aircraft carrier." style="width:100%" onclick="myFunction(this);">
	    </div>
    </div> 
</div> 

<script>
function myFunction(imgs) {
    var expandImg = document.getElementById("expandedImg");
    var imgText = document.getElementById("imgtext");
    expandImg.src = imgs.src;
    imgText.innerHTML = imgs.alt;
    expandImg.parentElement.style.display = "block";
}
</script> 

<?php 
include("footer.php");
