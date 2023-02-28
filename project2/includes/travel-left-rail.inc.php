         <div class="panel panel-default">
           <div class="panel-heading">Search</div>
           <div class="panel-body">
             <form>
               <div class="input-group">
                  <input type="text" class="form-control" placeholder="search ...">
                  <span class="input-group-btn">
                    <button class="btn btn-warning" type="button"><span class="glyphicon glyphicon-search"></span>          
                    </button>
                  </span>
               </div>  
             </form>
           </div>
         </div>  <!-- end search panel -->       
      
         <div class="panel panel-info">
           <div class="panel-heading">Continents</div>
           <ul class="nav list-group">   
              <?php foreach ($continents as $continents) { ?>
                  <li><a><?php echo $continents['continent_name']; ?></a></li>
               <?php } ?>
           </ul>
         </div>  <!-- end continents panel -->  
         <div class="panel panel-info">
           <div class="panel-heading">Popular Countries</div>
           <ul class="nav list-group">  
            <?php foreach ($countries as $countries) { ?>
                  <li><a><?php echo $countries['country_name']; ?></a></li>
               <?php } ?>

  
           </ul>
         </div>  <!-- end countries panel -->    