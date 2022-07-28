<form class="filter-form">
    <div class="searchbar" oninput="searchQuery()">
        <input id="searchbar" type="text" placeholder="e.g Banana">
        <i class="fa-solid fa-magnifying-glass"></i>
        <div class="recommended"></div>
    </div>

    <div>
        <label for="categories">categories:</label>
        <select name="categories" id="categories" onchange="filterItem()">
            <option value="All">All</option>
            <option value="veggie">Veggies</option>
            <option value="fruit">Fruits</option>
        </select>
    </div>

    <div>
        <label for="price-range">price range:</label>
        <select name="price-range" id="price-range" onchange="filterItem()">
            <option value="All">All</option>
            <option value="1-5">₱1 - ₱5</option>
            <option value="6-10">₱6 - ₱10</option>
            <option value="10-20">₱10 - ₱20</option>
        </select>
    </div>
    
    <div>
        <label for="sort">sort by</label>
        <select name="sort" id="sort" onchange="filterItem()">
            <option value="default">default</option>
            <option value="h-l">Highest to lowest</option>
            <option value="l-h">Lowest to Highest</option>
            <option value="a-z">Alphabetical</option>
        </select>
    </div>
</form>