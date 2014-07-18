<script type="text/javascript">
	$(document).ready(function(){

		$('#cariside').on('submit',function(event){
			event.preventDefault();
			if($('#sidestring') != ''){
				window.location.href = "<?php echo base_url()?>user/search/0/pekerjaan/"+$('#sidestring').val();
			}
			else{

				window.location.href = "<?php echo base_url()?>user/search";	

			}

		})

	});
</script>

<div class="container-fluid" id="content">
		<div id="left">
			<div class="subnav">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Cari Pekerjaan</span></a>
				</div>
				<ul class="subnav-menu">
					<li>
						<form id='cariside' class='search-form'>
							<div class="search-pane">
								<input type="text" name="sidestring" id="sidestring" placeholder="Cari Pekerjaan">
								<button type="submit"><i class="icon-search"></i></button>
							</div>
						</form>
					</li>
					
				</ul>
			</div>


			
			
		</div>