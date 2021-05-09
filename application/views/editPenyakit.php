<?php
$userId = $userInfo->id;
$penyakit = $userInfo->penyakit;
$deskripsi = $userInfo->deskripsi;
$diagnosa1 = $userInfo->diagnosa1;
$diagnosa2 = $userInfo->diagnosa2;
$diagnosa3 = $userInfo->diagnosa3;
$diagnosa4 = $userInfo->diagnosa4;
$diagnosa5 = $userInfo->diagnosa5;
$diagnosa6 = $userInfo->diagnosa6;
$diagnosa7 = $userInfo->diagnosa7;
$diagnosa8 = $userInfo->diagnosa8;
$diagnosa9 = $userInfo->diagnosa9;
$diagnosa10 = $userInfo->diagnosa10;
/*$email = $userInfo->email;
$mobile = $userInfo->mobile;
$roleId = $userInfo->roleId;*/
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Penyakit Management
        <small>Add / Edit Penyakit</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Penyakit Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>editPenyakit" method="post" id="editUser" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="penyakit">Penyakit</label>
                                        <input type="text" class="form-control" id="penyakit" placeholder="Penyakit" name="penyakit" value="<?php echo $penyakit; ?>" maxlength="128">
                                        <input type="hidden" value="<?php echo $userId; ?>" name="userId" id="userId" />    
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi<?php //echo print_r($userInfo); ?></label>
                                        <textarea class="form-control" id="deskripsi"  name="deskripsi" >
											<?php echo $deskripsi; ?>
										</textarea>
                                    </div>
                                    
                                </div>
								<?php
									for($i=0;$i<10;$i++)
									{
								?>
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="diagnosa<?php echo $i+1;?>">Diagnosa <?php echo $i+1;?></label>
										<select name="diagnosa<?php echo $i+1;?>" id="diagnosa<?php echo $i+1;?>" class="form-control required">
										<?php
											echo "<option value='0' >[--Pilih--]</option>";
										for($j=0;$j<count($diagnosa);$j++)
										{
											$val = "diagnosa".($i+1);
											echo "<option value='".$diagnosa[$j]->id."' ".($$val == $diagnosa[$j]->id ? " selected='selected' " : '' ).">".$diagnosa[$j]->gejala." pada ".$diagnosa[$j]->bagian."</option>";
										}
										?>
										</select>
                                    </div>
                                </div>
									<?php } ?>
                            </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
</div>

<script src="<?php echo base_url(); ?>assets/js/editPenyakit.js" type="text/javascript"></script>