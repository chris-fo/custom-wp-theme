<form id="new_post" name="new_post" method="post" enctype="multipart/form-data">
    <h2>Plaats een blog bericht</h2>
    <!-- post name -->
    <label for="title">Berichtnaam</label><br>
    <input class="text-input" type="text" id="title" name="title" placeholder="Geen titel" required><br>

    <!-- post category -->
    <label for="cat">Categorie</label><br>
    <?php wp_dropdown_categories( 'tab_index=10&taxonomy=category&hide_empty=&class=select-custom select-placeholder' ); ?>
    
    <!-- post image -->
    <label for="image">Header afbeedling</label><br>
    <div id="upload-image-container">
        <i class="fa-solid fa-camera" id="image-upload-icon"></i>
        <input type="file" id="image-upload" name="image-upload" class="hidden"/>
        <label for="image-upload">Kies bestand</label>
    </div><br>

    <!-- post content -->
    <label for="content">Bericht</label><br>
    <textarea name="content" id="content"></textarea>

    <!-- submit button -->   
    <input type="submit" value="Bericht aanmaken" class="customwptheme-button" id="submit" name="submit"> 
    

    <input type="hidden" name="action" value="new_post" />
    <?php wp_nonce_field( 'new-post' ); ?>
</form>