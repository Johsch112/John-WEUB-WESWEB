document.getElementById("searcher").addEventListener('input', function (event) {
    event.preventDefault();

    const UserSearch = document.getElementById("search").value;
    const UserCategory = document.querySelector('input[name="type"]:checked').value;
    const DisplayBox = document.getElementById("searchdisplaybox");

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
            }
            //-----------------------------------------------------------------
            else if (UserCategory === "items" && UserSearch.length >= 3) {
                const itemNAMES = dataToTEXT.map(item => item.Name);
                DisplayBox.innerHTML = "<h4>" + itemNAMES + "</h4>" + "<br>";
            }
            //-----------------------------------------------------------------
            else if (UserCategory === "all" && UserSearch.length >= 3) {
                const itemNAMES = dataToTEXT.filter(item => item.Name !== undefined).map(item => item.Name);
                const Vehiclemanu = dataToTEXT.filter(item => item.Manufuacturer !== undefined).map(item => item.Manufuacturer);
                DisplayBox.innerHTML = "<h4>"+"ITEMS" + "</h4>" + "<h4>" + itemNAMES + "</h4>" + "<br>" + "<h4>"+"VEHICLES" + "</h4>" + "<h4>" + Vehiclemanu + "</h4>" + "<br>"+"<br>";
            }
            //-----------------------------------------------------------------


            if (UserSearch === "" || UserSearch.length < 3) {
                DisplayBox.style.display = "none";

            } else {
                DisplayBox.style.display = "flex";
            }
        })
});
//Connection URL Example
// http://localhost:8080/john-weub-wesweb/public/search.php?q=nova&type=vehicles