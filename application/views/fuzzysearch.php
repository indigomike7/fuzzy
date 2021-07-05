<?php
$tinggi=array();
$sedang=array();
$rendah=array();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Pencarian Berdasarkan Methodology Fuzzy dan Case Based Reasoning (Kasus Lama)
        <small>Cari Jenis Penyakit</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
<!--                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addBagian"><i class="fa fa-plus"></i> Add New</a> -->
                </div>
            </div>
        </div>
		<form role="form" id="addUser" action="<?php echo base_url() ?>FuzzySearch" method="post" role="form">
		<div class="box-body">
        <div class="row">
			<?php
			for($i=0;$i<10;$i++) { 
					//echo $this->input->post("diagnosa".($i+1));
			?>
		   <div class="col-md-6">
				<div class="form-group">
					<label for="diagnosa<?php echo ($i+1);?>"><?php echo "Diagnosa ".($i+1);?></label>
					<select name="<?php echo "diagnosa".($i+1);?>" id="<?php echo "diagnosa".($i+1);?>" class="form-control required">
					<?php
					$selected="";
						echo "<option value='0'>[--Pilih--]</option>";
					for($j=0;$j<count($diagnosa);$j++)
					{
						if($this->input->post("diagnosa".($i+1)) != "0" ) { if($this->input->post("diagnosa".($i+1))==$diagnosa[$j]->id) { $selected=" selected='selected' "; }else { $selected=""; }}
						echo "<option value='".$diagnosa[$j]->id."' ".$selected .">".$diagnosa[$j]->gejala." pada ".$diagnosa[$j]->bagian."</option>";
					}
					?>
					</select>
				</div>
			</div>
			<?php } ?>
			<div class="box-footer">
				<input type="submit" class="btn btn-primary" value="Submit" />
				<input type="reset" class="btn btn-default" value="Reset" />
			</div>
		</form>
        </div>
	</div>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
				<?php
				echo "<h3>Kata Kunci :</h3>";
				$countdiag=0;
				for($i=0;$i<count($keyword);$i++)
				{
					for($j=0;$j<count($diagnosa);$j++)
					{
						if($this->input->post("diagnosa".($i+1)) != "0" ) 
						{ 
							if($this->input->post("diagnosa".($i+1))==$diagnosa[$j]->id) 
							{ 
								echo $diagnosa[$j]->gejala." pada ".$diagnosa[$j]->bagian."<br/>"; 
							}
								else {  }
						}
					}
					
				}
				if(count($results['results'])>0)
				{
					for($i=0;$i<count($results['results']);$i++)
					{
						if($results['results'][$i]->poin==60 || $results['results'][$i]->poin==80 || $results['results'][$i]->poin==100)
						{
							$tinggi[]=$results['results'][$i];
						}
						if($results['results'][$i]->poin==30 || $results['results'][$i]->poin==50 || $results['results'][$i]->poin==70)
						{
							$sedang[]=$results['results'][$i];
						}
						if($results['results'][$i]->poin==0 || $results['results'][$i]->poin==20  || $results['results'][$i]->poin==10 || $results['results'][$i]->poin==40)
						{
							$rendah[]=$results['results'][$i];
						}
					}
				}
				if(count($tinggi)>0)
				{
					echo "<h2>Found <b>".count($tinggi)." High Point </b> results</h2><p>&nbsp;</p><p>&nbsp;</p>";
					for($i=0;$i<count($tinggi);$i++)
					{
						echo "<h4>".$tinggi[$i]->penyakit."</h4>";
						echo "<p>".$tinggi[$i]->deskripsi."</p>";
						for($j=1;$j<11;$j++)
						{
							//$val = "diagnosa".$j;
							echo $tinggi[$i]->diagnosa1;
						}
						
						echo "<br/><p class='exact_p'><a href='javascript:exactly(".$tinggi[$i]->id."";
						for($k=0;$k<count($results['key']);$k++)
						{
							echo ",".$results['key'][$k];
						}
						echo ");'>Hasil Pencairan yang ini cocok!</a></p>";
						echo "<p>&nbsp;</p><p>&nbsp;</p>";
						echo "<p>&nbsp;</p><p>&nbsp;</p>";
					}
					
				}
				if(count($sedang)>0)
				{
					echo "<h2>Found <b>".count($sedang)." Fair Point </b> results</h2><p>&nbsp;</p><p>&nbsp;</p>";
					for($i=0;$i<count($sedang);$i++)
					{
						echo "<h4>".$sedang[$i]->penyakit."</h4>";
						echo "<p>".$sedang[$i]->deskripsi."</p>";
						for($j=1;$j<11;$j++)
						{
							//$val = "diagnosa".$j;
							echo $sedang[$i]->diagnosa1;
						}
						echo "<br/><p class='exact_p'><a href='javascript:exactly(".$sedang[$i]->id."";
						for($k=0;$k<count($results['key']);$k++)
						{
							echo ",".$results['key'][$k];
						}
						echo ");'>Hasil Pencairan yang ini cocok!</a></p>";
						echo "<p>&nbsp;</p><p>&nbsp;</p>";
						
						echo "<p>&nbsp;</p><p>&nbsp;</p>";
					}
					
				}
				if(count($rendah)>0)
				{
					echo "<h2>Found <b>".count($rendah)." Low Point </b> results</h2><p>&nbsp;</p><p>&nbsp;</p>";
					for($i=0;$i<count($rendah);$i++)
					{
						echo "<h4>".$rendah[$i]->penyakit."</h4>";
						echo "<p>".$rendah[$i]->deskripsi."</p>";
						for($j=1;$j<11;$j++)
						{
							//$val = "diagnosa".$j;
							echo $rendah[$i]->diagnosa1;
						}
						
						echo "<br/><p class='exact_p'><a href='javascript:exactly(".$rendah[$i]->id."";
						for($k=0;$k<count($results['key']);$k++)
						{
							echo ",".$results['key'][$k];
						}
						echo ");'>Hasil Pencairan yang ini cocok!</a></p>";
						echo "<p>&nbsp;</p><p>&nbsp;</p>";
						echo "<p>&nbsp;</p><p>&nbsp;</p>";
					}
					
				}
				if(isset($results))
				{
					if(count($results['results2'])>0)
					{
						echo "<h2>Found <b>".count($results['results2'])."</b> in ".count($results['results2'])." popular results (Case Based Reasoning</h2><p>&nbsp;</p><p>&nbsp;</p>";
						for($i=0;$i<count($results['results2']);$i++)
						{
							echo "<h4>".$results['results2'][$i]->penyakit."</h4>";
							echo "<p>".$results['results2'][$i]->deskripsi."</p>";
							for($j=1;$j<11;$j++)
							{
								//$val = "diagnosa".$j;
								echo $results['results2'][$i]->diagnosa1;
							}
							echo "<p>&nbsp;</p><p>&nbsp;</p>";
						}
					}
					if(count($results['results'])>0)
					{
						echo "<h2>Found <b>".count($results['results'])."</b> met the Plant Disease results</h2><p>&nbsp;</p><p>&nbsp;</p>";
						for($i=0;$i<count($results['results']);$i++)
						{
							echo "<h4>".$results['results'][$i]->penyakit."</h4>";
							echo "<p>".$results['results'][$i]->deskripsi."</p>";
							for($j=1;$j<11;$j++)
							{
								//$val = "diagnosa".$j;
								echo $results['results'][$i]->diagnosa1;
							}
							echo "<br/><p class='exact_p'><a href='javascript:exactly(".$results['results'][$i]->id."";
							for($k=0;$k<count($results['key']);$k++)
							{
								echo ",".$results['key'][$k];
							}
							echo ");'>Hasil Pencairan yang ini cocok!</a></p>";
							echo "<p>&nbsp;</p><p>&nbsp;</p>";
						}
					}
				}
				?>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "bagianListing/" + value);
            jQuery("#searchList").submit();
        });
    });
	function exactly(penyakitID,diagnosa1,diagnosa2=null,diagnosa3=null,diagnosa4=null,diagnosa5=null,diagnosa6=null,diagnosa7=null,diagnosa8=null,diagnosa9=null,diagnosa10=null)
	{
var r = confirm("Apakah hasil yang ini cocok untuk pencarian anda?");
if (r == true) {
		$.ajax({
		  url: "/fuzzy/FuzzySearch/setExact",
		  data: "penyakit_id=" + penyakitID + "&diagnosa1=" + diagnosa1  + "&diagnosa2=" + diagnosa2  + "&diagnosa3=" + diagnosa3 + "&diagnosa4=" + diagnosa4 + "&diagnosa5=" + diagnosa5 + "&diagnosa6=" + diagnosa6 + "&diagnosa7=" + diagnosa7 + "&diagnosa8=" + diagnosa8 + "&diagnosa9=" + diagnosa9 + "&diagnosa10=" + diagnosa10
		  ,method:"POST"
		}).done(function() {
			alert("Terima kasih. Data anda sudah dimasukkan untuk statistika kami");
			$(".exact_p").html("");
		});
} else {
	
}
	}
</script>

