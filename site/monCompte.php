

      <!-- CONTENEUR PRINCIPAL -->
    <main class="container">  
            
               <!-- Tab panes -->
              
                    <div id="mesOeuvres">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                
                                <nav>
                                    <ul>
                                        <li><a href="index.php?s=monCompte">Ma liste des ouvrages</a></li>
                                    </ul>

                                </nav>
                                <?php

                                //include_once "../vues/templates/navConnecte.php";
                                Controleur::gererOuvrage();
                                include_once "../vues/templates/footer.php"; 
                                
                                ?>
                            </div>                
                            
                        </div>
                        
                        
                    </div>
                   
               
        </main> <!-- /container -->
        <br>
      
     