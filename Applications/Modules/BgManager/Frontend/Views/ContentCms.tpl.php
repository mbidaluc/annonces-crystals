<div>
    <?php 
		if(($AnnoneType!='mobiles') && ($AnnoneType!='speciales') && ($AnnoneType!='alaune') && ($AnnoneType!='urgence') && ($AnnoneType!='evenements')){
			if(isset($infosPage)):
					echo '<div id="content-cms-page">'.$infosPage->getContenu().'</div>';
			 else :
					echo _PAGE_NOT_FUND;
			 endif;
		}else{ 
            if($AnnoneType=='alaune')
                $AnnoneType = 'a_la_une';
            if(isset($tabAnnonceByPoosition) && isset($tabAnnonceByPoosition[$AnnoneType]))
            $tabAnnonce = $tabAnnonceByPoosition[$AnnoneType];
            if(isset($tabAnnonce) && sizeof($tabAnnonce)):
            ?>
                <ul id ="listing_annonce" class="clearfix">
                 <?php  $i=1; foreach ($tabAnnonce as $speciales) : ?>
                    <li class="item-elt clearfix<?php echo ($i==count($dataList)?' last_elt':'')?>">
                         <a class="titre_annonce clearfix" href="<?php echo htmlspecialchars($speciales['urlSortant']);?>" title="<?php echo htmlspecialchars($speciales['designation']);?>" target="_blank"><?php echo htmlspecialchars($speciales['designation']);?> <span class="country">[<?php echo htmlspecialchars($speciales['pays']);?>]</span></a>
                         <div class="block_desc clearfix">
                             <div class="img_annonce"><a class="wrap_img_annonce" href="<?php echo htmlspecialchars($speciales['urlSortant']);?>" title="<?php echo htmlspecialchars($speciales['designation']);?>" target="_blank"><img src="<?php 
                             echo $tools->getLinkImage('Annonce','meduim',$speciales['imageP'],$dfltimgcat[$speciales['idCategorie']]);?>" alt="<?php echo htmlspecialchars($speciales['designation']);?>" /></a></div>
                             <div class="desc_annonce">
                                 <div class="texte_desc"><?php echo $speciales['texte'];?></div>
                                 <span class="wrap_price"><?php echo _PRICE_ANNONCE_;?><span class="price"><?php echo $tools->displayPrice($speciales['prixTotal']);?></span></span>
                                 <div class="bottom_desc clearfix">
                                     <!--<span class="wrap_span"><span class="contact"><?php echo _TEL_;?></span><?php echo htmlspecialchars($speciales['phone1']);?></span>
                                     <span class="wrap_span"><span class="email"><?php echo _EMAIL_;?></span><?php echo htmlspecialchars($speciales['email']);?></span>-->
                                     <span class="wrap_date"><?php echo _DATEDEBUT_;?><span><?php echo date_format(date_create($speciales['dateDebut']), 'd/m/Y');?></span></span>
                                     <span class="wrap_date"><?php echo _DATEEXPIRATION_;?><span><?php echo date_format(date_create($speciales['dateexp']), 'd/m/Y');?></span></span>
                                 </div>
                             </div>
                         </div>
                     </li>
             <?php $i++; endforeach;?>

             </ul>
             <?php endif; ?>	
            <?php } ?>
        </div>