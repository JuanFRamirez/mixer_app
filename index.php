<?php
include 'header.php';
?>
 <div class="content">
    <div class="column-one">
        <h2>Search a Mix</h2>
        <form methos="POST">
            Search by name: <input type="search" class="search-box-input" name="drink">
            <br>
            Or try a tag:
            <select name="tag">
                <option>Select</option>
            <option value="herbal">Herbal</option>
                <option value="sweet">Sweet</options>
                <option value="citric">Citric</option>
                <option value="bitter">Bitter</option>
                <option value="classic">Classic</option>
                <option value="smoothie">Smoothie</option>
                <option value="frutal">Frutal</option>
            </select>
            <br>
            <button class="button search-drink">Search</button>
        </form>
    </div>
    <div class="column-two"></div>
    <i class="fas fa-times close-content"></i>
</div>
 
<!--Add a Drink-->
<div class="insert">
    <div class="column-one">
        <h2>Add Your Drink</h2>
        <form methos="POST">
            <label>Name:</label> 
            <input type="text" class="search-box-input" name="drink" placeholder="Drink's name">
            <br>
            <label>Base:</label> 
            <input type="text" class="search-box-input" name="base" placeholder="Main alcohol component">
            <br>
            Ingredients: 
            <textarea class="search-box-input" name="ingredients" placeholder="Other components"></textarea>
            <br>
            Preparation: 
            <textarea class="search-box-input" name="preparation" placeholder="Preparation or serving"></textarea>
            <br>
            Glass: 
            <input type="text" class="search-box-input" name="glass" placeholder="type de glass">
            <br>
            Serving: 
            <select class="search-box-input" name="serve">
                <option value="Chilled">Chilled</option>
                <option value="Cold">Cold</option>
                <option value="Normal">Normal</option>
                <option value="Hot">Hot</option>
            </select>
            <br>
            Tag:
            <select name="tag">
                <option value="Herbal">Herbal</option>
                <option value="Sweet">Sweet</options>
                <option value="Citric">Citric</option>
                <option value="Bitter">Bitter</option>
                <option value="Classic">Classic</option>
                <option value="Smoothie">Smoothie</option>
                <option value="Frutal">Frutal</option>
            </select>
            <br>
            <button class="button add-drink">Add</button>
        </form>
    </div>
    <div class="column-two column-two-add"></div>
    <i class="fas fa-times close-add-drink"></i>
</div>

<!--Modify Drink-->

<div class="modify">
    <div class="column-one">
        <h2>Mod Your Drink</h2>
        <form methos="POST">
            <label>Name:</label> 
            <input type="text" class="search-box-input" name="drink" placeholder="Drink's name">
            <br>
            <label>Base:</label> 
            <input type="text" class="search-box-input" name="base" placeholder="Main alcohol component">
            <br>
            Ingredients: 
            <textarea class="search-box-input" name="ingredients" placeholder="Other components"></textarea>
            <br>
            Preparation: 
            <textarea class="search-box-input" name="preparation" placeholder="Preparation or serving"></textarea>
            <br>
            Glass: 
            <input type="text" class="search-box-input" name="glass" placeholder="type de glass">
            <br>
            Serving: 
            <select class="search-box-input" name="serve">
                <option value="Chilled">Chilled</option>
                <option value="Cold">Cold</option>
                <option value="Normal">Normal</option>
                <option value="Hot">Hot</option>
            </select>
            <br>
            Tag:
            <select name="tag">
                <option value="Herbal">Herbal</option>
                <option value="Sweet">Sweet</options>
                <option value="Citric">Citric</option>
                <option value="Bitter">Bitter</option>
                <option value="Classic">Classic</option>
                <option value="Smoothie">Smoothie</option>
                <option value="Frutal">Frutal</option>
            </select>
            <br>
            <button class="button mod-drink">Update</button>
        </form>
    </div>
    <div class="column-two column-two-update"></div>
    <i class="fas fa-times close-update-drink"></i>
</div>

<!---->

<div class="main-block">
    <?php include 'sidebar.php'?>
        <h1 class="main-title">Try and Search for a tasty drink for this weekend!</h1>
            <div class="toggle-menu">
                <i class="fas fa-bars"></i>
            </div>
</div>
<?php
include 'connection.php';
?>
<?php
include 'footer.php';

?>
