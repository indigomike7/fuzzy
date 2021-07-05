<?php
$userId = $userInfo->id;
$deskripsi = $userInfo->deskripsi;
$penyakit_id = $userInfo->penyakit_id;
/*$email = $userInfo->email;
$mobile = $userInfo->mobile;
$roleId = $userInfo->roleId;*/
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Solusi Management
        <small>Add / Edit Solusi</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Solusi Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>editSolusi" method="post" id="editSolusi" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="bagian">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" placeholder="Deskrispsi" name="deskripsi">
										 <?php echo $deskripsi; ?>
										</textarea>
                                        <input type="hidden" value="<?php echo $userId; ?>" name="userId" id="userId" />    
                                    </div>
                                    
                                </div>
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Penyakit Tanaman</label>
										<select name="penyakit_id" id="penyakit_id" class="form-control required">
										<?php
										for($i=0;$i<count($penyakit);$i++)
										{
											echo "<option value='".$penyakit[$i]->id."' ".($penyakit_id==$penyakit[$i]->id ? " selected='selected' " : "").">".$penyakit[$i]->penyakit."</option>";
										}
										?>
										</select>
                                    </div>
                                </div>
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

<script src="<?php echo base_url(); ?>assets/js/editBagian.js" type="text/javascript"></script>