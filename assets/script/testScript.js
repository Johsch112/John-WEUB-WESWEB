document.getElementById("searcher").addEventListener('input', function (event) {
    event.preventDefault();
    const UserSearch = document.getElementById("search").value;
    const UserCategory = document.querySelector('input[name="type"]:checked').value;
    const DisplayBox = document.getElementById("searchdisplaybox");

    const searchInput = document.getElementById("search");

    console.log(UserSearch);
    console.log(UserCategory);

    fetch('http://localhost:8080/john-weub-wesweb/public/search.php?q=' + UserSearch + '&type=' + UserCategory)
        .then(response => response.text())
        .then(data => {

            const dataToTEXT = JSON.parse(data);
            console.log(dataToTEXT);

            //----------Now the time is for the ifs, buts, and maybes---------

            if (UserCategory === "vehicles" && UserSearch.length >= 3) {
                const Vehiclemanu = dataToTEXT.map(item => item.Manufuacturer);
                DisplayBox.innerHTML = "<h4>" + Vehiclemanu + "</h4>" + "<br>";

                searchInput.classList.add("glow-animation");
            }
            //-----------------------------------------------------------------
            else if (UserCategory === "items" && UserSearch.length >= 3) {
                const itemNAMES = dataToTEXT.map(item => item.Name);
                DisplayBox.innerHTML = "<h4>" + itemNAMES + "</h4>" + "<br>";

                searchInput.classList.add("glow-animation");
            }
            //-----------------------------------------------------------------
            else if (UserCategory === "all" && UserSearch.length >= 3) {
                const itemNAMES = dataToTEXT.filter(item => item.Name !== undefined).map(item => item.Name);
                const Vehiclemanu = dataToTEXT.filter(item => item.Manufuacturer !== undefined).map(item => item.Manufuacturer);
                DisplayBox.innerHTML = "<h4>"+"ITEMS" + "</h4>" + "<h4>" + itemNAMES + "</h4>" + "<br>" + "<h4>"+"VEHICLES" + "</h4>" + "<h4>" + Vehiclemanu + "</h4>" + "<br>"+"<br>";

               searchInput.classList.add("glow-animation");
            }
            else{
                searchInput.classList.remove("glow-animation");
            }
            //-----------------------------------------------------------------


            if (UserSearch === "" || UserSearch.length < 3) {
                DisplayBox.style.display = "none";
            }
            else if(dataToTEXT.length == 0){
                DisplayBox.classList.add("nomatch")
                DisplayBox.style.display = "flex";
                DisplayBox.innerHTML = "<h4><style>h4{color:red;}</style>No matches found<h4>";
            }
            else {
                DisplayBox.style.display = "flex";
            }
        })
});
//Connection URL Example
// http://localhost:8080/john-weub-wesweb/public/search.php?q=nova&type=vehicles