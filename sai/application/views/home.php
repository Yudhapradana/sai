<?php $this->load->view('header_footer/header_home'); 
?> 


<div class="row" style="margin-right: 5px; margin-left: 5px">
	
	<!-- coloumn block Kiri -->
	<div class="col-kiri">
		<!-- kalender body -->
		<div class="body-kalender" >
			<h5 class="text-titel">KALENDER KEGIATAN BULAN INI</h5>
			<div class="card bs-example">
				<center>
		        <h5 id="thismonth"></h5>
		        <table class="table table-bordered table-responsive-lg" id="calendar">
		            <thead>
		            <tr style="background-color: #E8E8E8">
		                <th>Minggu</th>
			            <th>Senin</th>
			            <th>Selasa</th>
			            <th>Rabu</th>
			            <th>Kamis</th>
			            <th>Jumat</th>
			            <th>Sabtu</th>
		            </tr> 
		            <tbody style="text-align: left;" id="calendarbody">

		            </tbody> 
		        </table>
		        </center>
		        <table class="table table-bordered"  style="margin-top: -10px; margin-bottom: -2px">
		        	<td> <img height="20px" src="<?php echo base_url() ?>assets/image/w_hijau.png">  : Bupati</td> 
		        	<td> <img height="20px" src="<?php echo base_url() ?>assets/image/w_orange.png"> : Kominfo</td> 
		        	<td> <img height="20px" src="<?php echo base_url() ?>assets/image/w_jam-parah.png"> : Bupati dan Kominfo</td>
		        </table>
		     </div>
	    </div>

	    <!-- kegiatan mingguan body -->
		<div class="body-kegiatan">
			<h5 class="text-titel">AGENDA KEGIATAN MINGGU INI</h5>
			<table class="table table-bordered table-responsive-lg">
			  <tr style="background-color: #E8E8E8">
			    <th style="text-align: center;width: 10%;">No</th>
			    <th style="text-align: center; width: 70%;">Kegiatan</th>
			    <th style="text-align: right; width: 20%">Tanggal</th>
			  </tr>
				
				<tbody id="tbl_agendakegiatan">
					
				</tbody> 
			</table>		 
		</div>	

	</div>

	<!-- coloumn block Tengah -->
	<div class="col-tengah" >
		<!-- bupati bulan ini -->
		<div class="body-agenda-bupati">
	    	<h5 class="text-titel">AGENDA BUPATI BULAN INI</h5>
		     <table class="table table-bordered" id="tbl_bupati">
				<thead>
					<tr style="background-color: #E8E8E8">
					   <th>Tgl</th>
					   <th style="text-align: center;">Kegiatan</th>
					</tr>
				</thead>	
				<tbody id="tbl_agendabupati">		
				</tbody> 
			</table>	
	    </div>
	    
	    <!-- kominfo bulan ini -->
	    <div class="body-agenda-kominfo">
	    	<h5 class="text-titel">AGENDA KOMINFO BULAN INI</h5>
		     <table class="table table-bordered" id="tbl_kominfo">
		     	<thead>
		     		<tr style="background-color: #E8E8E8">
					   <th>Tgl</th>
					   <th style="text-align: center;">Kegiatan</th>
					</tr>
		     	</thead>
				<tbody id="tbl_agendakominfo">		
				</tbody> 
			</table>	
	    </div>
	     
	</div>

	<!-- coloumn block Kanan -->
	<div class="col-kanan" >
		<!-- body agenda pengumuman -->
		<div class="body-agenda-pengumuman">
			<h5 class="text-titel">PENGUMUMAN</h5>
			<div id="con_lstpgumuman" class="list-pengumuman">	
			</div>

			<div class="card-body" id="card_pengumuman" style="display: none;">
				<div class="row" style="margin-bottom: -10px; ">
					<div class="col-sm-1" style="margin-top: -20px;">
						<a id="back" class="prevv" >❮</a>		
					</div>
					<div class="col-sm-11" style="margin-top: -15px; margin-left: 30px">
						<center><b><font id="judul" size="2"></font></b></center>
					</div>
				</div>
			    
			    <hr> 
			    <textarea  class="form-control" rows="7" readonly="" id="pengumuman" ></textarea>
			   
			    <div class="row align-items-center" >
			    	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

				    </div>
				    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
				    	<small class="text-muted" id="tanggal" style="text-align: right;"></small>
			  		</div>
			  	</div>
	  		</div>	
		</div>
		<!-- body gallary -->
	  	<div class="body-gallery rows">
			
		    <div class="col-xs-13 col-sm-13 col-md-13 col-lg-13">
		     	<h5 class="text-titel">GALERY</h5>	
		     		 	
		    </div>				 
			<div class="col-xs-13 col-sm-13 col-md-13 col-lg-12">
				<div style="margin-left: -13px; margin-right: -13px;">
					<div id="gal_home">	

					    <!-- container img gallery -->
					</div>
					<h5 class="prevgal" id="prev">❮</h5>
					<h5 class="nextgal" id="next">❯</h5>	
					  

					<div class="caption-container" id="capimg"> <a href="javascript:void(0);" id="caption" class="imgdetail" style="color: white;"></a></div>

					<div class="row" style="margin-left: 2px;margin-right: 2px;">

						<div id="column_imggallery">
						    <!-- container rowsColls img -->
					    </div> 
					</div>
				</div>
			</div>
		</div> 

	</div> 

	
</div>


<!-- Modal LIHAT -->
	<div class="modal fade" id="modal_lihat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title align-items-center" style="text-align: center; font-size:30px; font-weight: bold;" id="judul_m"></h5>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
	        	<div class="col-md-10"></div>
	        	<div class="col-md-2">
			  		<small style="text-align: right;" id="tanggal_m"></small>
			  	</div>

			  	<textarea class="form-control" id="pengumuman_m" rows="7" readonly=""></textarea>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">&nbsp OK &nbsp</button>
	      </div>
	    </div>
	  </div>
	</div>


<!-- The Image Modal -->
	<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">              
	      <div class="modal-body">
	      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <img src="" id="imagepreview" style="width: 100%;" >
	      </div>
	    </div>
	  </div>
	</div>



<?php $this->load->view('header_footer/footer_home'); ?>