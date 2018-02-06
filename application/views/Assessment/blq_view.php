<?php include_once('Lib/layout/header.php');?>


</head>
	<body>
		<div class = "container">
			<div class="row">
	       		<?php include_once('Lib/layout/progress.php');?>
	       	</div>
	    </div>

	    <div class="content">
			<div class = "container quiz-container">
			    <?php if ($index<18): ?>
			    	<form method="post" action="<?php echo base_url('index.php/blq/show_blq');?>" class="container">
			    <?php else: ?>
			    	<form method="post" action="<?php echo base_url('index.php/blq/show_result') ?>" class="container form-maroon">
			    <?php endif ?>
						<table class="table table-inverse" id = "white">
							<thead align="center">
								<tr>	
									<?php if ($index!=18): ?>
										<th class="col-md-9"><?php echo "Question #".$index." of 18"; ?> </th>
									<?php else: ?>
										<th class="col-md-9">Thank you for Answering</th>
									<?php endif ?>
								</tr>

								<tr>
									<td class="<?php if($index==37){echo 'collapse';} ?>">
										<!-- Progress Trackers -->
									       	<div class = "row">
									       		<div class = "col-lg-12">
									       			<div class="progress">
													 	<div class="progress-bar" role="progressbar" aria-valuenow="70"
													 	aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progress ?>%;">
													  	<?php echo round($progress) ?>%
													 	</div>
													</div>
									       		</div>
									      	 </div>
										<!-- Progress Trackers -->	
									</td>
								</tr>

							</thead>
							<tbody>
								<?php foreach($questiontab as $row): ?>
									<tr>
										<?php if ($row->qCat==$qcategory): ?>
										<?php $MyQuestion = json_decode($row->qAndA); ?>
											<td class="<?php if($index!=$row->qIndex){echo 'collapse';} ?>"><h2><?php echo $row->qIndex.". ".$MyQuestion->question;?></h2>
												<br>
												<input name="qIndex" type="hidden" value="<?php echo $row->qIndex; ?>">
												<input type="hidden" name="i"  value="<?php echo $index; ?>">
												<div class="btn-group" data-toggle="buttons">
														<?php for ($a=0; $a < count($MyQuestion->answer) ; $a++): ?>
															<?php if ($MyQuestion->answer[$a]!=""): ?>
																
																<label class="Rcontainer <?php $i=$row->qIndex; if(isset($curAns->$i)){if(trim($curAns->$i)==$MyQuestion->score[$a]){echo 'active';}} ?>">
															    	<input name="ans[<?php echo $row->qIndex ?>]" type="radio" value="<?php echo $MyQuestion->score[$a]; ?>" <?php $i=$row->qIndex; if(isset($curAns->$i)){if(trim($curAns->$i)==$MyQuestion->score[$a]){echo 'checked="checked"';}} ?>>
															    	<span class="checkmark"></span>
															    	<?php echo "  ".$MyQuestion->answer[$a]."  "?>
															    </label>

															 <?php endif ?>
														<?php endfor ?>
														<input name="qcategory" type="hidden" value="<?php echo $qcategory; ?>">
												</div>
											</td>
										<?php endif ?>
									</tr>
								<?php endforeach ?>
								<tr>
									<td class="<?php if($index!=18){echo 'collapse';} ?>">
										<h2>
											Average Health: <?php echo round($result) ?> %
										</h2>
									</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td>
										<input type="submit" name="submit" class="btn btn-primary" value="Back" 
											<?php if($index==1){echo "disabled";} ?>
										>
										<?php if ($index==18): ?>
											<input type="submit" name="submit" class="btn btn-primary" value="Save">
										<?php else: ?>
											<input type="submit" name="submit" class="btn btn-primary" value="Next">
										<?php endif ?>
									</td>
								</tr>	
							</tfoot>
						</table>
				</form>
			</div>
		</div>

<!-- ====================================FOOTER HERE=================================================== -->
    <?php include_once('Lib/layout/footer.php');?>
<!-- ====================================FOOTER HERE=================================================== -->