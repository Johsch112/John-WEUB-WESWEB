document.getElementById("searcher").addEventListener('input', function (event) {
    event.preventDefault();
    const UserSearch = document.getElementById("search").value;
    const UserCategory = document.querySelector('input[name="type"]:checked').value;
    const DisplayBox = document.getElementById("searchdisplaybox");
    const searchInput = document.getElementById("search");

    // if (UserSearch.length >= 1) {

    // }
    console.log(UserSearch);
    console.log(UserCategory);

    fetch('http://localhost:8080/john-weub-wesweb/public/search.php?q=' + UserSearch + '&type=' + UserCategory)
        .then(response => response.text())
        .then(data => {

            const dataToTEXT = JSON.parse(data);
            console.log(dataToTEXT);

            //----------------------------------------------------------------

            if (UserCategory === "vehicles" && UserSearch.length >= 3) {
                const Vehiclemanu = dataToTEXT.map(item =>
                    `<h4>${item.Manufuacturer} ${item.Model} ${item.HP}HP - ${item.Rarity}</h4>`
                ).join("<br>");

                DisplayBox.innerHTML = "<h4>Vehicles</h4>" + Vehiclemanu;
                searchInput.classList.add("glow-animation");
                document.getElementById("search").scrollIntoView({
                    behavior: 'smooth'
                });
            }
            //-----------------------------------------------------------------

            else if (UserCategory === "items" && UserSearch.length >= 3) {
                const itemNAMES = dataToTEXT.map(item =>
                    `<h4>${item.Name} ${item.Type} ${item.HP}HP - ${item.Rarity}</h4>`
                ).join("<br>");

                DisplayBox.innerHTML = "<h4>Items</h4>" + itemNAMES;
                searchInput.classList.add("glow-animation");
                document.getElementById("search").scrollIntoView({
                    behavior: 'smooth'
                });
            }
            //-----------------------------------------------------------------
            else if (UserCategory === "all" && UserSearch.length >= 3) {
                const itemNAMES = dataToTEXT.filter(item => item.Name !== undefined).map(item =>
                    `<h4>${item.Name} ${item.Type} ${item.HP}HP - ${item.Rarity}</h4>`
                ).join("<br>");


                const Vehiclemanu = dataToTEXT.filter(item => item.Manufuacturer !== undefined).map(item =>
                    `<h4>${item.Manufuacturer} ${item.Model} ${item.HP}HP - ${item.Rarity}</h4>`
                ).join("<br>");

                DisplayBox.innerHTML = "<h4>Items</h4>" + itemNAMES + "<h4>Vehicles</h4>" + Vehiclemanu;
                searchInput.classList.add("glow-animation");
                document.getElementById("search").scrollIntoView({
                    behavior: 'smooth'
                });
            }
            else {
                searchInput.classList.remove("glow-animation");
            }
            //-----------------------------------------------------------------


            if (UserSearch === "" || UserSearch.length < 3) {
                DisplayBox.style.display = "none";
            }
            else if (dataToTEXT.length == 0) {
                DisplayBox.classList.add("nomatch")
                DisplayBox.style.display = "flex";
                DisplayBox.innerHTML = "<h4>No matches found<h4>";
                searchInput.classList.add("nomatch");
            }
            else {
                DisplayBox.style.display = "flex";
                DisplayBox.classList.remove("nomatch");
                searchInput.classList.remove("nomatch");
            }
        })
});
//Connection URL Example
// http://localhost:8080/john-weub-wesweb/public/search.php?q=nova&type=vehicles