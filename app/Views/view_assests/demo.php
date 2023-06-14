<?php
                                if($category){
                                    foreach($category as $value){ 
                                        ?>
                                        <tr> 
                                          <td scope="row"><?=$value['c_id']?></td>
                                            <td><?php $dh = $value['c_name'];   echo substr($dh,0,18)?></td>
                                            <td style="width:40%"><?php $dt = $value['c_desc'];   echo substr($dt,0,100)?></td>  
                                            <td> 
                                            <a href="#"><button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button></a>
                                            <a href="<?=base_url()?>category_delete/<?=$value['c_id']?>"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                                          </td>
                                        </tr>
                                       
                                        <?php
                                    }
                                }

                                ?> 